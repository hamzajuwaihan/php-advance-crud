<?php
if (isset($_POST['edit'])) {
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
            $sql = "UPDATE employees SET name='$name',address='$address',salary='$salary',image='$filename' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }
    }else{
        if ($img == 'default.png') {
            $sql = "UPDATE employees SET name='$name',address='$address',salary='$salary',image='default.png' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            $sql = "UPDATE employees SET name='$name',address='$address',salary='$salary',image='$img' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                header('Location: index.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    }
}

?>
