<?php

include('db.php');


if (isset($_POST['event_id']) && isset($_POST['attendee_id'])) {
  $eventId = intval($_POST['event_id']);
  $attendeeId = intval($_POST['attendee_id']);


  $sql = "INSERT INTO attended_by (attendee_id, event_id) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $attendeeId, $eventId);

  if ($stmt->execute()) {
    echo "Registered successfully!";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Invalid request.";
}
?>
