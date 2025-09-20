<?php include 'header.php'; ?>

<h1 style="text-align: center;">Asian College Run for Cause (Marathon)</h1><br>

    <div class="con1">
    <form action="insert.php" method="POST" enctype="multipart/form-data">
        <label>First Name: </label>
        <input type="text" name="firstName" autocomplete="off" required><br><br>

        <label>Middle Name: </label>
        <input type="text" name="middleName" autocomplete="off" required><br><br>

        <label>Last Name: </label>
        <input type="text" name="lastName" autocomplete="off" required><br><br>

        <label>Email: </label>
        <input type="email" name="email" autocomplete="off" required><br><br>

        <label>Date Of Birth: </label>
        <input type="date" name="dateOfBirth" autocomplete="off" required><br><br>

        <label>Sex: </label>    
        <input type="radio" name="sex" value="Male" required> Male
        <input type="radio" name="sex" value="Female" required> Female <br><br>
        
        <label>Distance (in km): </label>
        <input type="number" name="distance" step="0.01" autocomplete="off" required><br><br>

        <label>Image: </label>
        <input type="file" name="photo" autocomplete="off" required><br><br>

        <button type="submit" name="register">Submit</button><br><br>

        <a href="view.php"><button type="button">View Participants</button></a>
    </form>
    </div>

<?php include 'footer.php'; ?>

