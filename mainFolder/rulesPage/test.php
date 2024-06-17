<?php
include ('connection.php');

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];

    $insert_query = mysqli_query($connection, "INSERT INTO call_to_user (user_name, user_phone) VALUES ('$user_name', '$user_phone')");

    if ($insert_query) {
        $msg = "Подія створена";
    } else {
        $msg = "Подія не створена: " . mysqli_error($connection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <label for="user_name">Name</label><br>
            <input type="text" name="user_name" id="user_name">
            <br>
            <br>
            <label for="user_phone">Phone</label>
            <input type="tel" name="user_phone" id="user_phone">
            <br>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
