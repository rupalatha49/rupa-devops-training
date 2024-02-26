<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        
        <input type="submit" value="Login">
    </form>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define your database connection credentials
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // SQL query to check if the provided credentials exist in the database
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Login successful
            echo "Login successful!";
            // Redirect to another page or perform any other actions
        } else {
            // Login failed
            echo '<p class="error">Invalid username or password. Please try again.</p>';
        }

        // Close the connection
        $conn->close();
    }
    ?>
</body>
</html>
