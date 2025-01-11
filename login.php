<?php
// Start the session
session_start();
// Check if the user is already logged in, redirect to dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard/index.php");
    exit;
}


include 'includes/db.php';



$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($phone) || empty($password)) {
        $error = "Please fill in both fields.";
    } else {
        // Prepare the query to check login credentials
        $query = "SELECT user_id, full_name FROM users WHERE phone = ? AND national_id = ?";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("ss", $phone, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // Valid login
                $user = $result->fetch_assoc();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['full_name'] = $user['full_name'];
                header("Location: dashboard/index.php");
                exit;
            } else {
                $error = "Invalid phone number or password.";
            }
        } else {
            $error = "Error with the database query.";
        }
    }
}

include 'includes/header.php';
?>


<div class="login-container content">
        <h1>Login</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="password">National ID</label>
                <input type="password" id="password" name="password" placeholder="Enter your national ID" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>

<?php include'includes/footer.php'; ?>