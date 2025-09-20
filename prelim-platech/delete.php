<?php 

    include 'connectdb.php';

    if(isset($_GET['delete'])){
        $id = intval($_GET['delete']);
        $delete = mysqli_query($connectionToDatabase, "DELETE FROM participants WHERE id = $id");

        if ($dlete) {
            header("location: view.php");
            exit();
        }else{
            echo "Delete failed. ";
        }
    }else{
        echo "Invalid request. ";
    }
?>
