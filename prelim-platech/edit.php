<?php 
include 'connectdb.php';
include 'header.php';

$id = intval($_GET['GetId']);
$retrieveData = mysqli_query($connectionToDatabase, "SELECT * FROM participants WHERE id = $id");

if ($row = mysqli_fetch_assoc($retrieveData)) {
    $firstName = $row['firstName'];
    $middleName = $row['middleName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $dateOfBirth = $row['dateOfBirth'];
    $sex = $row['sex'];
    $distance = $row['distance'];
    $image = $row['image'];
} else {
    echo "Participant not found.";
    exit();
}
?>

<h1>Edit User: <?php echo "$firstName $middleName $lastName"; ?></h1>
<form action="update.php?GetId=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
    <label>First Name:</label>
    <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" required><br>

    <label>Middle Name: </label>
    <input type="text" name="middleName" value="<?php echo htmlspecialchars($middleName); ?>" required><br>

    <label>Last Name: </label>
    <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" required><br>

    <label>Email: </label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required><br>

    <label>Date Of Birth: </label>
    <input type="date" name="dateOfBirth" value="<?php echo $dateOfBirth; ?>" required><br>

    <label>Sex: </label>
    <input type="radio" name="sex" value="Male" <?php if ($sex == "Male") echo "checked"; ?>> Male
    <input type="radio" name="sex" value="Female" <?php if($sex == "Female") echo "checked"; ?>> Female <br>

    <label>Distance (in km): </label>
    <input type="number" name="distance" step="0.01" value="<?php echo $distance; ?>" required><br>

    <label>Image: </label>
    <input type="file" name="photo"><br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php include 'footer.php'; ?>

