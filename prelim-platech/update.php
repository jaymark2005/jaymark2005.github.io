<?php 
include 'connectdb.php';

if (isset($_POST['update'])) {
    $id = intval($_GET['GetId']);

    $firstName = ucwords(trim($_POST['firstName']));
    $middleName = ucwords(trim($_POST['middleName']));
    $lastName = ucwords(trim($_POST['lastName']));
    $email = trim($_POST['email']);
    $dateOfBirth = $_POST['dateOfBirth'];
    $sex = $_POST['sex'];

    $distance = floatval($_POST['distance']);

    $image = $_FILES['photo']['name'];
    $tempLocation = $_FILES['photo']['tmp_name'];
    $fileDestination = 'images/' . $image;

    $updateQuery = "UPDATE participants 
                    SET firstName='$firstName', middleName='$middleName', lastName='$lastName', email='$email',
                        dateOfBirth='$dateOfBirth', sex='$sex', distance=$distance, image='$image'
                    WHERE id=$id";

    if (mysqli_query($connectionToDatabase, $updateQuery) && move_uploaded_file($tempLocation, $fileDestination)) {
        header("Location: view.php");
        exit();
    } else {
        echo "Update failed.";
    }
} else {
    echo "Invalid request.";
}
?>
