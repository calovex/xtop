<?php
$pageTitle = "Job Details - Employment Agency";
include 'includes/header.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employment_agency"; // Updated database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get job ID from URL
$jobId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM jobs WHERE id = $jobId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $job = $result->fetch_assoc();
} else {
    echo "<div class='container py-5'><p>Job not found.</p></div>";
    include 'includes/footer.php';
    exit();
}
?>

<div class="container py-5">
    <h2 class="mb-4"><?= $job['role'] ?></h2>
    <p><strong>Type:</strong> <?= $job['type'] ?></p>
    <p><strong>Country:</strong> <?= $job['country'] ?></p>
    <p><strong>Salary:</strong> <?= $job['salary'] ?></p>
    <p><strong>Start Date:</strong> <?= date("F j, Y", strtotime($job['start_date'])) ?></p>
    <p><strong>Contact Details:</strong> <?= $job['contact_details'] ?></p>
    <a href="jobs.php" class="btn btn-secondary">Back to Jobs</a>
</div>

<?php
$conn->close();
include 'includes/footer.php';
?>
