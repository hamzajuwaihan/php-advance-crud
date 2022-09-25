<?php 
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $img = $row['image'];
    if ($img == null) {
      $img = './upload/default.png';
    }else{
      $img = './upload/'.$row['image'];
    }
    echo ("
        <tr>".
        "<td>".$row['id']."</td>".
        "<td>"
        ."<img src='$img' style='border-radius:50%;height:50px; margin-right:3px;'/>"
        .$row['name']."</td>".
        "<td>".$row['address']."</td>".
        "<td>$".$row['salary']."</td>".
        "<td>
        <a href='view.php?id=".$row['id']."'><i class='bi bi-eye-fill fs-5 mx-2'></i></a>
        <a href='edit.php?id=".$row['id']."'><i class='bi bi-pencil-fill text-info fs-5 mx-2'></i></a>
        <a href='./operations/delete.php?id=".$row['id']."'><i class='bi bi-trash-fill text-danger fs-5 mx-2'></i></a>
        </td>"
        ."</tr>
    ");
  }
} else {
  echo "<tr >
        <td colspan='5' class='fs-1 text-center' >
        No Employees Yet
        </td>
        </tr>";
}
$conn->close();
