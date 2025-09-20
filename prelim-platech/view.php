<?php 
    include 'connectdb.php';
    include 'header.php';
    
    if(isset($_GET['GetId']) && is_numeric($_GET['GetId'])){
        $id = intval($_GET['GetId']);

        $query = "SELECT * FROM participants WHERE id = $id";
        $result = mysqli_query($connectionToDatabase, $query);

        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            $firstName = $row['firstName'];
            $middleName = $row['middleName'];
            $lastName = $row['lastName'];
            $email = $row ['email'];
            $dateOfBirth = $row['dateOfBirth'];
            $sex = $row['sex'];
            $distance = $row['distance'];
            $image = $row['image'];

            $fullName = trim("$firstName $middleName $lastName");

            $dob = new dateTime($dateOfBirth);
            $today = new dateTime();
            $age = $dob->diff($today)->y;

            echo "<h1 style= 'text-align: center;'>View Participants</h1>";
            ?>


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Sex</th>
                    <th>distance</th>
                    <th>image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $id?></td>
                    <td><?= htmlspecialchars($fullName) ?></td>
                    <td><?= $age?></td>
                    <td><?= htmlspecialchars($email) ?></td>
                    <td><?= $dateOfBirth?></td>
                    <td><?= $sex?></td>
                    <td><?= $distance?></td>
                    <td><?= $image?></td>
                    <td><img src="images/<?= htmlspecialchars($image) ?>" width="80" height="80" style="border-radius:50%; border:2px solid #2f4f4f;">
                </td>
                </tr>
            </tbody>
        </table>
        <br>
        <a href="view.php"><button>Administrator's View</button></a>

        <?php 
        }else{
            echo "<p style='color: red; text-align: center;'>Participant not found.</p>";
        }
    }else{
        echo "<h1 style='text-align: center;'>Administrator's View: All Participants</h1>";

        $result = mysqli_query($connectionToDatabase, "SELECT * FROM participants ORDER BY id ASC");
        
        if ($result && mysqli_num_rows($result) > 0){
            echo "<table>";
            echo "<thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Sex</th>
                        <th>Distance</th>
                        <th>Actions</th>
                    </tr>
                </thead><tbody>";

        while ($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $fullName = $row['firstName']. ' ' . $row['middleName']. ' ' . $row['lastName'];
            $email = $row['email']; 
            $sex = $row['sex'];
            $distance = $row['distance'];

            echo "<tr>
                    <td>$id</td>
                    <td>" . htmlspecialchars($fullName) . "</td>
                    <td>" . htmlspecialchars($email) . "</td>
                    <td>$sex</td>
                    <td>$distance km</td>
                    <td>
                        <a href='view.php?GetId=$id'>View</a> |
                        <a href='edit.php?GetId=$id'>Edit</a> |
                        <a href='delete.php?delete=$id' onclick='return confirm(\"are you sure?\")'>delete</a>
                    </td>
                </tr>";
        }

            echo "</tbody></table>";
        }else{
            echo "<p style='text-align:center;'> No participants found.</p>";
        } 
            echo '<br><a href="index.php"><button>Back to Registration</button></a>';
        
}
?>

<style>
    table{
        border-collapse: collapse;
        width: 100%;
        text-align: center;
        margin-top: 20px;

    }
    table th, table td{
        border: 1px solid #121826;
        padding-top: 8px;

    }
    table img{
        border-radius: 50%;
        border: 2px solid #2f4f4f;

    }
    button{
        padding: 8px 16px;
        margin-top: 10px;
        cursor: pointer;
    }
</style>
<?php require 'footer.php'; ?>

