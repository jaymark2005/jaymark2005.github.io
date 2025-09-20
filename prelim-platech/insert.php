<?php
include 'connectdb.php';

if (isset($_POST['register'])) {
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $sex = $_POST['sex'];
    $distance = $_POST['distance'];

   
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $imageName = $_FILES['photo']['name'];
        $tempPath = $_FILES['photo']['tmp_name'];
        $destination = 'images/' . $imageName;

        
        $sql = "INSERT INTO participants 
                (firstName, middleName, lastName, email, dateOfBirth, sex, distance, image) 
                VALUES 
                ('$firstName', '$middleName', '$lastName', '$email', '$dateOfBirth', '$sex', '$distance', '$imageName')";

        if (mysqli_query($connectionToDatabase, $sql)) {
            
            if (move_uploaded_file($tempPath, $destination)) {
                echo "✅ Registration successful and image uploaded!";
            } else {
                echo "❌ Image upload failed.";
            }
        } else {
            echo "❌ Database error.";
        }
    } else {
        echo "❌ No image uploaded or there was an error.";
    }
} else {
    echo "❌ Form not submitted.";
}
?>



