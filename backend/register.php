<?php
include('db.php'); 


$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = trim($_POST['username']);
  $first_name = trim($_POST['first_name']);
  $last_name = trim($_POST['last_name']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  $username = htmlspecialchars($username);
  $first_name = htmlspecialchars($first_name);
  $last_name = htmlspecialchars($last_name);
  $email = htmlspecialchars($email);

  $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

  // Check if the username or email already exists
  $check_sql = "SELECT * FROM user WHERE username = ? OR email = ?";
  $stmt = $conn->prepare($check_sql);
  $stmt->bind_param("ss", $username, $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // Username or email is already taken
    $error = "Username or email is already taken.";
  } else {
    // Insert the new user into the database
    $insert_sql = "INSERT INTO user (username, first_name, last_name, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sssss", $username, $first_name, $last_name, $email, $hashed_password);

    if ($stmt->execute()) {
      // Registration successful
      echo "<script>alert('Registration successful! Redirecting to login page.');</script>";
      echo "<script>window.location.href = '../login.php';</script>";
      exit();
    } else {
      $error = "Something went wrong. Please try again.";
    }
  }

  $stmt->close();
}

$conn->close(); // Close the database connection
?>