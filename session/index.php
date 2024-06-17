
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вхід/Реєстрація</title>
</head>
<style>
    

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
        /* background-color:black ; */
    }
    .login-for-admin {
        margin: 0;
        padding: 0;
        text-align: center;
    }

    .login-for-admin a {
        /* text-decoration: none; */
        color: white;

    }

    .form-one {
        margin-bottom: -16px;

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
        margin-bottom: 4px;
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


<body>
    <div class="container">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="login">
                <form class="form form-one" method="POST" action="login.php" autocomplete="off">
                    <label for="chk" aria-hidden="true">Ввійти</label>
                    <input class="input" type="email" name="userEmail" id="loginUserEmail" required placeholder="Email" value="" />
                    <input class="input" type="password" name="userPassword" id="loginUserPassword" required placeholder="Пароль" autocomplete="new-password" value="" />
                    <button type="submit" name="login_submit">Ввійти</button>
                </form>
            </div>
            <div class="register">
                <form method="POST" class="form" action="register.php" autocomplete="off">
                    <label for="chk" aria-hidden="true">Зареєструватися</label>
                    <input class="input" type="text" name="userName" required placeholder="Ім'я користувача" autocomplete="off" id="registerUserName" value="" />
                    <input class="input" type="email" name="userEmail" id="registerUserEmail" required placeholder="Email" autocomplete="off" value="" />
                    <input class="input" type="password" name="userPassword" id="registerUserPassword" required placeholder="Пароль" autocomplete="new-password" value="" />
                    <input class="input" type="password" name="userPasswordConf" id="registerUserPasswordConf" required placeholder="Підтвердіть пароль" autocomplete="new-password" />
                    <button type="submit" name="register_submit">Зареєструватися</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
