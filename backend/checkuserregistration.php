<?php

include('db.php');
include('session.php');
checkUserLoggedIn();


$event = null;
$isRegistered = false;
$error = "";

// Get the user ID from session
$userId = $_SESSION['user_id'];


if (isset($_GET['id'])) {
  $eventId = intval($_GET['id']); 

  $sql = "SELECT * FROM event WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $eventId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $event = $result->fetch_assoc(); 

    
    $check_sql = "SELECT * FROM attended_by WHERE attendee_id = ? AND event_id = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("ii", $userId, $eventId);
    $stmt_check->execute();
    $check_result = $stmt_check->get_result();

    $isRegistered = ($check_result->num_rows > 0); // Determine if the user is registered

    $stmt_check->close();
  } else {
    $error = "Event not found.";
  }

  $stmt->close();
} else {
  $error = "Invalid event ID.";
}

// Close the database connection
$conn->close();
?>