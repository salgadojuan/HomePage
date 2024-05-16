<?php
$title = "Register";
include "includes/header.php";
include "includes/db.php"; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Insert the new user into the database
    $stmt = $pdo->prepare('INSERT INTO users (user_name, password, first_name, last_name, email, is_admin) VALUES (:username, :password, :first_name, :last_name, :email, 0)');
    $stmt->execute([
        'username' => $username,
        'password' => $password,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email
    ]);

    echo "User registered successfully!";
}
?>

<h2>Register</h2>
<main class="main-content">
    <div class="register-container">
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit" class="register-button">Register</button>
        </form>
    </div>
</main>
<hr class="footer-divider">
<?php require "includes/footer.php"; ?>
