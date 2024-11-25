<?php
// Include the database connection
include('backend/db.php');
include('backend/session.php');
checkUserLoggedIn();

// Get the user ID from session
$userId = $_SESSION['user_id'];  // Assuming user ID is stored in session

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
  $eventId = intval($_GET['id']); // Get the event ID and sanitize it

  // Fetch event details from the database
  $sql = "SELECT * FROM event WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $eventId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $event = $result->fetch_assoc(); // Get the event details
  } else {
    $error = "Event not found.";
  }

  // Check if the user is already registered for the event
  $check_sql = "SELECT * FROM attended_by WHERE attendee_id = ? AND event_id = ?";
  $stmt_check = $conn->prepare($check_sql);
  $stmt_check->bind_param("ii", $userId, $eventId);
  $stmt_check->execute();
  $check_result = $stmt_check->get_result();

  // If the user is already registered, set the flag to true
  $isRegistered = ($check_result->num_rows > 0);

  $stmt_check->close();
  $stmt->close();
} else {
  $error = "Invalid event ID.";
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Details</title>
  <link rel="stylesheet" href="assets/css/main.css"> <!-- Link to your CSS -->
  <link rel="stylesheet" href="assets/css/event-details.css">
</head>

<body>
  <!-- Header -->
  <header>
    <a href="index.php">&larr; Back to Events</a>
  </header>

  <!-- Main Content -->
  <main>
    <?php if (isset($event)): ?>
      <h1><?php echo htmlspecialchars($event['title']); ?></h1>
      <div class="event-image">
        <img src="assets/images/<?php echo htmlspecialchars($event['image']); ?>"
          alt="<?php echo htmlspecialchars($event['title']); ?>">
      </div>

      <div class="event-details">
        <!-- Location -->
        <p class="location">
          <strong>Location:</strong>
          <?php echo htmlspecialchars($event['location']); ?>
        </p>

        <!-- Date -->
        <p class="date-time">
          <strong>Date:</strong>
          <?php echo date("F d, Y", strtotime(htmlspecialchars($event['date']))); ?>
        </p>

        <!-- Time -->
        <p class="date-time">
          <strong>Time:</strong>
          <?php echo date("h:i A", strtotime(htmlspecialchars($event['time']))); ?>
        </p>

        <!-- Description -->
        <p class="description">
          <strong>Description:</strong>
          <?php echo htmlspecialchars($event['description']); ?>
        </p>
      </div>
      <!-- Registration Button -->
      <div style="text-align: center; margin-top: 20px;">
        <form action="backend/attend_event.php" method="POST">
          <!-- Hidden fields for attendee_id and event_id -->
          <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($eventId); ?>">
          <input type="hidden" name="attendee_id" value="<?php echo htmlspecialchars($userId); ?>">

          <!-- Conditionally render the input styles based on registration status -->
          <?php if ($isRegistered): ?>
            <input type="submit" name="attend_event" style="background-color: #dc3545 !important; color: #ffffff !important; font-size: 16px !important; 
                     padding: 10px 20px !important; border: none !important; border-radius: 5px !important; cursor: pointer !important; 
                     font-weight: bold !important; transition: background-color 0.3s ease !important; "
              value="Cancel Registration" onmouseover="this.style.backgroundColor='#a71d2a'"
              onmouseout="this.style.backgroundColor='#dc3545'">
          <?php else: ?>
            <input type="submit" name="attend_event" style="background-color: #007bff !important; color: #ffffff !important; font-size: 16px !important; 
                     padding: 10px 20px !important; border: none !important; border-radius: 5px !important; cursor: pointer !important; 
                     font-weight: bold !important; transition: background-color 0.3s ease !important; "
              value="Register for a Seat" onmouseover="this.style.backgroundColor='#0056b3'"
              onmouseout="this.style.backgroundColor='#007bff'">
          <?php endif; ?>

        </form>
      </div>




    <?php else: ?>
      <p><?php echo $error; ?></p>
    <?php endif; ?>
  </main>


  <!-- Footer -->
  <footer>
    <p>&copy; Made with love by Youssef Aoun</p>
  </footer>
</body>

</html>