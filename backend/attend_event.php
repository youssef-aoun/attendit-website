<?php

session_start();


include('db.php');
include('session.php');

checkUserLoggedIn();

$user_id = $_SESSION['user_id'];

$event_id = $_POST['event_id'];  // Assuming event_id is passed via POST


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['attend_event'])) {
    // Check if the user is already registered for the event
    $check_sql = "SELECT * FROM attended_by WHERE attendee_id = ? AND event_id = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("ii", $user_id, $event_id);
    $stmt_check->execute();
    $check_result = $stmt_check->get_result();

    if ($check_result->num_rows > 0) {
      // User is already registered, cancel the registration
      $delete_sql = "DELETE FROM attended_by WHERE attendee_id = ? AND event_id = ?";
      $stmt_delete = $conn->prepare($delete_sql);
      $stmt_delete->bind_param("ii", $user_id, $event_id);

      if ($stmt_delete->execute()) {
        echo "<script>alert('Your registration has been cancelled!');</script>";
      } else {
        echo "<script>alert('There was an issue cancelling your registration. Please try again.');</script>";
      }

      $stmt_delete->close();
    } else {
      // User is not registered, register them
      $insert_sql = "INSERT INTO attended_by (attendee_id, event_id) VALUES (?, ?)";
      $stmt_insert = $conn->prepare($insert_sql);
      $stmt_insert->bind_param("ii", $user_id, $event_id);

      if ($stmt_insert->execute()) {
        echo "<script>alert('You have successfully registered for the event!');</script>";
      } else {
        echo "<script>alert('There was an issue registering for the event. Please try again.');</script>";
      }

      $stmt_insert->close();
    }

    echo "<script>window.location.href = '../event_details.php?id=" . $event_id . "';</script>";
  }
}

$conn->close();
?>