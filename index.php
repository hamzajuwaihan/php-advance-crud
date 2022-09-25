<?php
include "./includes/header.php";
include "./includes/conn.php";
?>

<div class="container mt-5">
    <div class="row ">
    <h1 class="col-9 px-0">Employee Details</h1>
    <a class="btn btn-success fs-4 col-3" href="./create.php"><i class="bi bi-plus fs-3"></i>Add New Employee</a>
    </div>
    <div class="row">
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Employee</th>
                <th scope="col">Address</th>
                <th scope="col">Salary</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        include "./operations/viewAll.php";
        ?>
        </tbody>
    </table>
    </div>
</div>


<?php 
include "./includes/footer.php";
?>
