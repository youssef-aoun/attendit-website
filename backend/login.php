<?php
include('db.php'); 
include('session.php'); 

$response = array('status' => 'error', 'message' => ''); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  
  $sql = "SELECT * FROM user WHERE username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  // Check if the user exists and the password matches
  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      // Set session variables
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['first_name'] = $user['first_name'];
      $_SESSION['last_name'] = $user['last_name'];
      $_SESSION['email'] = $user['email'];

      // Return success response
      $response['status'] = 'success';
      $response['message'] = 'Login successful!';
    } else {
      // Incorrect password
      $response['message'] = 'Incorrect username or password.';
    }
  } else {
    // Username not found
    $response['message'] = 'Incorrect username or password.';
  }

  $stmt->close();
}

$conn->close();

echo json_encode($response);
?>