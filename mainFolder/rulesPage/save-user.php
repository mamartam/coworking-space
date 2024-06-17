<?php
include ('connection.php');

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $country_code = $_POST['country_code'];

    $insert_query = mysqli_query($connection, "INSERT INTO call_to_user (user_name, user_phone, country_code) VALUES ('$user_name', '$user_phone', '$country_code')");

    if ($insert_query) {
        $msg = "Подія створена";
        header('location:rules.php');
    } else {
        $msg = "Подія не створена: " . mysqli_error($connection);
    }
}
?>
