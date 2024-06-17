<?php
include("db_connection.php");
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $delete_query = mysqli_query($connection, "DELETE FROM dt_event WHERE id='$id'");
}
?>