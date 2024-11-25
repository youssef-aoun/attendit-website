<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/css/signuplogin.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
</head>

<body>
  <div class="login-container">
    <h1>Login</h1>
    <p id="error-message" class="error"></p> <!-- Error message container -->
    <form id="login-form" action="backend/login.php" method="POST">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>

      <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
  </div>

  <script>
    $(document).ready(function () {
      $('#login-form').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting the traditional way

        // Get the form data
        var formData = $(this).serialize();

        // Send the data to the backend via AJAX
        $.ajax({
          url: 'backend/login.php',
          type: 'POST',
          data: formData,
          dataType: 'json',
          success: function (response) {
            if (response.status === 'success') {
              // Redirect to the index page on success
              window.location.href = 'index.php';
            } else {
              // Show the error message if login fails
              $('#error-message').text(response.message);
            }
          },
          error: function () {
            $('#error-message').text('An error occurred. Please try again later.');
          }
        });
      });
    });
  </script>
</body>

</html>