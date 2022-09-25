<?php
include "./includes/conn.php";
include "./includes/header.php";
$id = $_GET['id'];
$sql = "SELECT id, name, address,salary,image FROM employees WHERE id='$id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $address = $row['address'];
        $salary = $row['salary'];
        $img = $row['image'];

?>
        <form class="container mt-5" method="POST" action="" enctype="multipart/form-data">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="name">Employee Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $name ?>" class="form-control" required />
                    </div>
                </div>

            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="address">Address</label>
                <input type="text" id="address" class="form-control" value="<?php echo $address ?>" name="address" required />
            </div>


            <!-- Number input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="salary">salary</label>
                <input type="number" id="salary" name="salary" value="<?php echo $salary ?>" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="file">
            </div>



            <!-- Submit button -->

            <div class="text-center mt-5">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary fs-4 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit Employee
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                are you sure that you want this edit?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" value="editEmployee" name="edit" class="btn btn-primary">Edit Employee</button>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="btn btn-outline-secondary fs-4 mb-4 " href="./index.php">Return Home</a>
            </div>
        </form>

<?php
    }
} else {
    echo "Error 404";
}











include "./operations/editEmployee.php";

$conn->close();
include "./includes/footer.php";
?>