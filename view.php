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
        if ($img == null) {
            
            $img = "./upload/default.png";
        }else{
            
            $img = "./upload/".$row['image'];
        }
?>
        <div class="container mt-5 ">
            <div class="card text-center" style="width: 18rem; margin: 0 auto;">
                <img src="<?php echo $img?>" class="card-img-top" alt="..." style="">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $name ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Address: <?php echo $address ?></li>
                    <li class="list-group-item">Salary: <?php echo $salary ?></li>
                </ul>

            </div>
            <div class="text-center mt-5">
                <a class="btn  btn-outline-info fs-4 " href="./edit.php?id=<?php echo $id ?>">Edit Employee</a>
                <a class="btn btn-primary fs-4 " href="./index.php">Return Home</a>
            </div>


        </div>

<?php
    }
} else {
    echo "Error 404";
}
$conn->close();
include "./includes/footer.php";
?>