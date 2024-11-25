<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="assets/css/signuplogin.css"> <!-- Link to your CSS -->
</head>

<body>
  <div class="signup-container">
    <h1>Sign Up</h1>
    <!-- Display the error message -->
    <?php if (!empty($error)): ?>
      <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form action="backend/register.php" method="POST"> <!-- Self-submitting form -->
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>

      <label for="first_name">First Name</label>
      <input type="text" id="first_name" name="first_name" required>

      <label for="last_name">Last Name</label>
      <input type="text" id="last_name" name="last_name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>
</body>
</html>