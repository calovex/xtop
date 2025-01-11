<?php
$pageTitle = "Job Listings - Certification & Jobs Portal";
include 'includes/header.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employment_agency";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch jobs
$sql = "SELECT id, type, country, role, salary, start_date FROM jobs ORDER BY start_date ASC";
$result = $conn->query($sql);
?>

<div class="container py-5">
    <h2 class="text-center mb-4">Available Job Listings</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Country</th>
                    <th>Role</th>
                    <th>Salary</th>
                    <th>Start Date</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['type'] ?></td>
                            <td><?= $row['country'] ?></td>
                            <td><?= $row['role'] ?></td>
                            <td><?= $row['salary'] ?></td>
                            <td><?= date("F j, Y", strtotime($row['start_date'])) ?></td>
                            <td>
                                <a href="job_details.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No jobs available at the moment.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$conn->close();
include 'includes/footer.php';
?>
