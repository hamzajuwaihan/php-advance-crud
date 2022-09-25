<?php
if (isset($_POST['addEmployee'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $filename = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $filename)) {
            // Insert record
            $sql = "INSERT INTO Employees (name, address, salary,image)
            VALUES ('$name', '$address', '$salary','$filename')";
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                
                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

