<?php include "../base-start.php" ?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

// Assuming you have a function to fetch student data from the database
function getStudentsFromDatabase() {
    global $connection;
    $query = "SELECT * FROM student_info";
    $result = mysqli_query($connection, $query);
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $students;
}

// Fetch the students from the database
$students = getStudentsFromDatabase();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lrn = $_POST['lrn'];
    $gwa = $_POST['gwa'];

    $query = "UPDATE student_info SET gwa = $gwa WHERE lrn = '$lrn'";
    mysqli_query($connection, $query);
}
?>

<!-- <link rel="stylesheet" href="style.css"> -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Grade Report</h1>
</div>
    <div class="container mt-4">
        <table class="table table-striped" id="studentTable" width="50%" cellspacing="0">
            <thead>
                <tr>
                    <th class="text-success">Student Number</th>
                    <th class="text-success">Name</th>
                    <th class="text-success">General Weighted Average</th>
                </tr>
            </thead>
            <tbody>
                <!-- Assuming $students is an array containing student data fetched from the database -->
                <?php foreach ($students as $student): ?>
                <tr class="student-row" data-lrn="<?php echo $student['lrn']; ?>">
                    <td><?php echo $student['lrn']; ?></td>
                    <td><?php echo $student['firstname']; ?>  <?php echo $student['lastname']; ?></td>
                    <td class="gwa-cell"><?php echo $student['gwa']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<!-- Custom modal for entering the new GWA -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Enter the average:</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="number" id="gwa-input" class="form-control" step="0.01">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="modal-save-btn">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="scripts.js"></script>



<?php include "../base-end.php" ?>