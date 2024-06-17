<?php
require 'configForAdmin.php';



if (isset($_POST['register_submit'])) {
    $adminName = $_POST["adminName"];
    $adminEmail = $_POST["adminEmail"];
    $adminPassword = $_POST["adminPassword"];
    $adminPasswordConf = $_POST["adminPasswordConf"];

    $duplicate = mysqli_query($conn, "SELECT * FROM admin_data WHERE adminName = '$adminName' OR adminEmail = '$adminEmail'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or email has already been taken');</script>";
    } else {
        if ($adminPassword == $adminPasswordConf) {
            $query = "INSERT INTO `admin_data` VALUES('', '$adminName', '$adminEmail', '$adminPassword')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Succesfull');</script>";
        } else {
            echo "<script>alert('Password does not match');</script>";

        }
    }
}


if (isset($_POST['login_submit'])) {
    $adminEmail = $_POST["adminEmail"]; // Отримання значення email
    $adminPassword = $_POST["adminPassword"];

    // Використання підготовленого запиту для запобігання SQL-ін'єкціям
    $stmt = mysqli_prepare($conn, "SELECT * FROM admin_data WHERE adminName = ? OR adminEmail = ?");
    mysqli_stmt_bind_param($stmt, "ss", $adminEmail, $adminEmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($adminPassword == $row["adminPassword"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: http://localhost/CoWorkingSpace/calendar/view-calendar.php"); // Перенаправлення на особистий кабінет або головну сторінку
            exit();
        } else {
            echo "<script>alert('Wrong password');</script>";
        }
    } else {
        echo "<script>alert('User not registered');</script>";
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід для адміністраторів</title>
</head>

<body>
    <div class="container">

        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="login">
                <form class="form form-one" method="POST" action="http://localhost/CoWorkingSpace/calendar/view-calendar.php" autocomplete="off">
                    <label for="chk" aria-hidden="true" >Вхід</label>
                    <!-- <label for="chk" aria-hidden="true" class="chk-span">(для адміністратора)</label> -->
                    

                    <input class="input" type="email" name="adminEmail" id="adminEmail" required="" placeholder="Email" value="" />
                    <input class="input" type="password" name="adminPassword" id="adminPassword" required="" placeholder="Пароль" autocomplete="new-password" value="" />
                    <button type="submit" name="login_submit">Ввійти як адміністратор</button>
                </form>
            </div>




            <div class="register">
                <form method="POST" class="form" action="" autocomplete="off">
                    <label for="chk" aria-hidden="true">Зареєструватися</label>
                    <input class="input" type="text" name="adminName" required placeholder="Ім'я користувача" autocomplete="off" id="adminName" value="" />
                    <input class="input" type="email" name="adminEmail" id="adminEmail" required placeholder="Email" autocomplete="off" value="" />
                    <input class="input" type="password" name="adminPassword" id="adminPassword"required placeholder="Пароль" autocomplete="new-password" value="" />
                    <input class="input" type="password" name="adminPasswordConf" id="adminPasswordConf" required placeholder="Пароль" autocomplete="new-password" />
                    <button type="submit" name="register_submit">Зареєструватися</button>

                </form>
            </div>
        </div>

    </div>

</body>

</html>
<style>

    /* .chk-span{
        font-size: 15px;
    } */
    @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;400;500;600;700;800&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Mulish', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 100vh;
    }

    .main {
        position: relative;
        display: flex;
        flex-direction: column;
        background-color: #EDAB03;
        max-height: 420px;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 7px 7px 10px 3px #24004628;
    }

    .form {
        display: flex;
        flex-direction: column;
        gap: 16px;
        padding: 24px;
    }

    #chk {
        display: none;
    }

    /*Login*/
    .login {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .login label {
        margin: 25% 0 5%;
    }

    label {
        color: #fff;
        font-size: 1.5rem;
        justify-content: center;
        display: flex;
        font-weight: bold;
        cursor: pointer;
        transition: .5s ease-in-out;
    }

    .input {
        width: 100%;
        height: 36px;
        background: #e0dede;
        padding: 10px;
        border: none;
        outline: none;
        border-radius: 4px;
    }

    /*Register*/
    .register {
        background: #eee;
        border-radius: 60% / 10%;
        transform: translateY(5%);
        transition: .8s ease-in-out;
    }

    .register label {
        color: #EDAB03;
        transform: scale(.6);
    }

    #chk:checked~.register {
        transform: translateY(-60%);
    }

    #chk:checked~.register label {
        transform: scale(1);
        margin: 0% 0 0;
    }

    #chk:checked~.login label {
        transform: scale(.6);
        margin: 5% 0 5%;
    }

    /*Button*/
    .form button {
        width: 85%;
        height: 40px;
        margin: 12px auto 10%;
        color: #fff;
        background: #EDAB03;
        font-size: 1rem;
        font-weight: bold;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: .2s ease-in;
    }

    .form button:hover {
        background-color: #EDAB03;
    }
</style>