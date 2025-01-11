<?php
include 'dashboard/includes/db.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = trim($_POST['full_name']);
    $dob = trim($_POST['dob']);
    $phone = trim($_POST['phone']);
    $national_id = trim($_POST['national_id']);

    // Validate inputs
    if (empty($full_name) || empty($dob) || empty($phone) || empty($national_id)) {
        $error = "All fields are required.";
    } else {
        // Check if the phone or ID already exists
        $query = "SELECT user_id FROM users WHERE phone = ? OR national_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $phone, $national_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Phone number or National ID already registered.";
        } else {
            // Insert new user into the database
            $insert_query = "INSERT INTO users (full_name, date_of_birth, phone, national_id) VALUES (?, ?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_query);
            if ($insert_stmt) {
                $insert_stmt->bind_param("ssss", $full_name, $dob, $phone, $national_id);
                if ($insert_stmt->execute()) {
                    $success = "Registration successful! You can now log in.";
                } else {
                    $error = "Error during registration. Please try again.";
                }
            } else {
                $error = "Database error: Unable to prepare statement.";
            }
        }
    }
}
include 'includes/header.php';
?>

<div class="login-container">
        <h1>Register</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="national_id">National ID / Passport ID</label>
                <input type="text" id="national_id" name="national_id" placeholder="Enter your ID or passport number" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Log in here</a></p>
    </div>
<?php include"includes/footer.php"; ?>