<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<?php
include ('db_connection.php');

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];

    $insert_query = mysqli_query($connection, "INSERT INTO call_to_user (user_name, user_phone) VALUES ('$user_name', '$user_phone')");

    if ($insert_query) {
        $msg = "Подія створена";
        header('location:rules.php');
    } else {
        $msg = "Подія не створена: " . mysqli_error($connection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <title>Правила</title>
</head>
<style>
    :root {
        --primary: #111;
        --secondary: fd0;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        justify-content: center;
        background-color: whitesmoke;
        /* background-color: black; */
    }

    /* General style */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    .page {
        display: flex;
        flex-direction: column;
    }

    .mainHeader h1 {
        text-align: center;
    }

    .allHeaders {
        font-weight: bold;
    }

    .allDescriptions {
        text-align: justify;

    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .callMeContainer {
        position: absolute;
        width: 1024px;
        height: 100%;
        /* background-color: #EDAB03; */
        display: flex;
        justify-content: end;

    }

    .fixed-element {
        width: 150px;
        height: 150px;
        background-color: white;
        opacity: 90%;
        position: fixed;
        border-radius: 50%;
        margin-right: 20px;
        margin-top: 400px;
        cursor: pointer;
    }

    .phoneCallImg {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 43px;
        padding-left: 43px;
    }

    .fixed-element i:nth-child(1) {
        border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
        animation: animate 6s linear infinite;
    }

    .fixed-element i:nth-child(2) {
        border-radius: 41% 44% 56% 59% / 38% 62% 63% 37%;
        animation: animate 8s linear infinite;
    }

    .fixed-element i {
        position: absolute;
        inset: 0;
        border: 1px solid #EDAB03;
        transition: all .25s ease;
        transition: 0.5s;

    }

    @keyframes animate {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* General style */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    @media screen and (min-width:420px) and (max-width:839px) {
        .page {
            /* background-color: blueviolet; */
            width: 420px;
        }

        .mainFeeling {
            padding: 10px;

        }

        .mainHeader h1 {
            font-size: 25px;
            margin: 7px 0 7px 0;
            line-height: 20px;
        }

        .generalProvosions {
            margin: 7px 0 7px 0;
        }

        .allHeaders {
            font-size: 20px;
            margin: 5px 0 5px 0;
        }

        .allDescriptions {
            font-size: 20px;
            line-height: 20px;
        }

        /* CallMeContainer */
        .callMeContainer {
            width: 420px;
            height: 100%;

        }

        .fixed-element {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .fixed-element img {
            width: 54px;
            height: 54px;
        }

        .phoneCallImg {
            padding-top: 17px;
            padding-left: 17px;
        }

        /* --------------- */

        /* footer */
        .footer {
            width: 420px;
            height: 380px;
            display: flex;
            flex-direction: column;
        }

        .fooooter {
            display: flex;
            flex-direction: row;
        }

        .footer-information {
            width: 500px;
            height: 300px;
            background-color: #fbfbfb;
            position: absolute;
            margin-left: 50px;
            margin-top: 10px;
        }

        /* ---------------------------------------------------------------------------- */
        .backgroundDiv {
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            height: 100%;
            right: 0;
            top: 0;
            position: absolute;
            left: 0;

        }

        .PopUpFormCallMe {
            background-color: rgba(0, 0, 0, 0.6);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .popUp-container {
            height: 400px;
            width: 300px;
            /* background-color: white; */
            background-color: #111;
            padding: 15px;
            border-radius: 4px;
            position: relative;
            display: flex;
            flex-direction: row;

        }

        .popUpImgContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 150px;
        }

        .inputYourName {
            display: flex;
            flex-direction: column;
            justify-content: left;
        }

        .nameLabel {
            color: #eee;
            font-size: 12px;
            font-weight: bold;
        }

        input {
            display: block;
            width: 70%;
            height: 50px;
            padding: 5px;
            border: 1px solid whitesmoke;
            border-radius: 8px;
        }

        .close {
            width: 25px;
            height: 25px;
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #eee;
            border-radius: 50%;
            cursor: pointer;
        }


        /* ---------------------------------------------------------------------------- */
        .select-box {
            position: relative;

            width: 15rem;
            margin: 1rem auto;
        }

        .select-box input {
            width: 100%;
            padding: 0.6rem .4rem;
            font-size: 1rem;

            border: .1rem solid transparent;
            outline: none;
        }

        input[type="tel"] {
            border-radius: 0 .3rem .3rem 0;
        }

        .select-box input:focus {
            border: .1rem solid var(--primary);
        }

        .selected-option {
            background-color: #eee;
            border-radius: .3rem;
            overflow: hidden;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .selected-option div {
            position: relative;

            width: 5rem;
            padding: 0 2.2rem 0 .3rem;
            text-align: center;
            cursor: pointer;
        }

        .selected-option div::after {
            position: absolute;
            content: "";
            right: .5rem;
            top: 50%;
            transform: translateY(-50%) rotate(40deg);

            width: .5rem;
            height: .5rem;
            border-right: .10rem solid var(--primary);
            border-bottom: .10rem solid var(--primary);

            transition: .2s;
        }

        .selected-option div.active::after {
            transform: translateY(-50%) rotate(200deg);
        }

        .select-box .options {
            position: absolute;
            top: 4rem;

            width: 100%;
            background-color: #fff;
            border-radius: .3rem;

            display: none;
            z-index: 5;
        }

        .select-box .options.active {
            display: block;
        }

        .select-box .options::before {
            position: absolute;
            content: "";
            left: 1rem;
            top: -1.2rem;

            width: 0;
            height: 0;
            border: .4rem solid transparent;
            border-bottom-color: var(--primary);
        }

        input.search-box {
            background-color: var(--primary);
            color: #fff;
            border-radius: .3rem .3rem 0 0;
            padding: 1.1rem 1rem;
        }

        .select-box ol {
            list-style: none;
            max-height: 9rem;
            overflow: overlay;
        }

        .select-box ol::-webkit-scrollbar {
            width: 0.4rem;
        }

        .select-box ol::-webkit-scrollbar-thumb {
            width: 0.4rem;
            height: 2rem;
            background-color: #ccc;
            border-radius: .3rem;
        }

        .select-box ol li {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
        }

        .select-box ol li.hide {
            display: none;
        }

        .select-box ol li:not(:last-child) {
            border-bottom: .1rem solid #eee;
        }

        .select-box ol li:hover {
            background-color: lightcyan;
        }

        .select-box ol li .country-name {
            margin-left: .3rem;
        }

        /* ------------------------------------------------------ */

        .footer-navigation-and-contacts {
            display: flex;
            background-color: #000000;
            position: absolute;
            flex-direction: column;
            padding-top: 20px;
            padding-bottom: 15px;
            padding-left: 10px;
            padding-right: 10px;
            margin-top: 7.5px;
            margin-left: 7.5px;
        }

        .footer-navigation-list {
            display: flex;
            flex-direction: column;
        }

        .footer-navigation-item {
            text-transform: uppercase;
            color: #fbfbfb;
            font-size: 7.5px;
        }

        .footer-navigation-item:hover {
            color: #EDAB03;
            transition: all .25s ease;

        }

        .footer-navigation-container {
            padding-left: 10px;
            padding-right: 24px;
        }

        .footer-contacts-and-social-media {
            padding-left: 24px;
        }

        .footer-contacts {
            color: #fbfbfb;
            margin-bottom: 20px;
        }

        .social-media-items {
            display: inline-block;
            height: 20px;
            width: 20px;
            background-color: #fbfbfb;
            border-radius: 50%;
            margin-right: 5px;
            text-align: center;
            line-height: 30px;
            padding-top: 3px;
        }

        .social-media-items:hover {
            background-color: #EDAB03;
            transition: all .25s ease;
        }

        .footer-contacts-item {
            font-size: 6px;
        }

        .footer-hr {
            margin-top: 20px;
            background-color: #fbfbfb;
            width: 230px;
        }

        .creator-h6 {
            margin-top: 5px;
            color: #fbfbfb;
            padding-left: 40px;
            font-weight: normal;
            font-size: 5.5px;
        }


        .footer-social-media-container i {
            display: flex;
            align-items: center;
            justify-content: center;

        }

    }

    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    @media screen and (min-width:840px) and (max-width:1023px) {
        .page {
            /* background-color: brown; */
            width: 840px;
        }

        .mainFeeling {
            padding: 15px;

        }

        .mainHeader h1 {
            font-size: 27px;
            margin: 10px 0 10px 0;
            line-height: 20px;
        }

        .generalProvosions {
            margin: 10px 0 10px 0;
        }

        .allHeaders {
            font-size: 20px;
            margin: 7px 0 7px 0;
        }

        .allDescriptions {
            font-size: 15px;
            line-height: 25px;
        }

        /* CallMeButton */
        .callMeContainer {
            width: 840px;
            height: 100%;
        }

        .fixed-element {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .phoneCallImg {
            padding-top: 18px;
            padding-left: 18px;
        }

        /* ------------ */

        .footer {
            width: 840px;
            height: 380px;
            display: flex;
            flex-direction: column;
        }

        .first-map {
            display: none;
        }

        .fooooter {
            display: flex;
            flex-direction: row;
        }

        .footer-information {
            width: 500px;
            height: 300px;
            background-color: #fbfbfb;
            position: absolute;
            margin-left: 50px;
            margin-top: 10px;
        }

        .footer-navigation-and-contacts {
            display: flex;
            background-color: #000000;
            position: absolute;
            flex-direction: column;
            padding-top: 40px;
            padding-bottom: 30px;
            padding-left: 20px;
            padding-right: 20px;
            margin-top: 15px;
            margin-left: 15px;
        }

        .footer-navigation-list {
            display: flex;
            flex-direction: column;
        }

        .footer-navigation-item {
            text-transform: uppercase;
            color: #fbfbfb;
            font-size: 15px;
        }

        .footer-navigation-item:hover {
            color: #EDAB03;
            transition: all .25s ease;

        }

        .footer-navigation-container {
            padding-left: 20px;
            padding-right: 48px;
        }

        .footer-contacts-and-social-media {
            padding-left: 48px;
        }

        .footer-contacts {
            color: #fbfbfb;
            margin-bottom: 20px;
        }

        .social-media-items {
            display: inline-block;
            height: 30px;
            width: 30px;
            background-color: #fbfbfb;
            border-radius: 50%;
            margin-right: 10px;
            text-align: center;
            line-height: 30px;
            padding-top: 6px;
        }

        .social-media-items:hover {
            background-color: #EDAB03;
            transition: all .25s ease;
        }

        .footer-contacts-item {
            font-size: 12px;
        }

        .footer-hr {
            margin-top: 40px;
            background-color: #fbfbfb;
            width: 460px;
        }

        .creator-h6 {
            margin-top: 10px;
            color: #fbfbfb;
            padding-left: 40px;
            font-weight: normal;
            font-size: 11px;
        }

        .footer-social-media-container i {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        /* ---------------------------------------------------------------------------- */
        .PopUpFormCallMe {
            background-color: rgba(0, 0, 0, 0.6);
            width: 840px;
            height: 100%;
            position: absolute;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popUp-container {
            height: 500px;
            width: 400px;
            background-color: #111;
            padding: 20px;
            border-radius: 4px;
            position: relative;
            display: flex;
            flex-direction: row;
        }

        .inputYourName {
            display: flex;
            flex-direction: column;
            justify-content: left;
        }

        .nameLabel {
            color: #eee;
            font-size: 15px;
            font-weight: bold;
        }

        input {
            display: block;
            width: 70%;
            height: 50px;
            padding: 7px;
            border: 1px solid whitesmoke;
            border-radius: 8px;
        }

        .close {
            width: 40px;
            height: 40px;
            position: absolute;
            top: -13px;
            right: -13px;
            background-color: #eee;
            border-radius: 50%;
            cursor: pointer;
        }

        .CallButtonSend a {
            position: relative;
            display: inline-block;
            padding: 13px 27px;
            border: 2px solid #fefefe;
            text-transform: uppercase;
            color: #fefefe;
            text-decoration: none;
            font-weight: bold;
            font-size: 17px;
        }

        .CallButtonSend a::before {
            content: '';
            position: absolute;
            top: 6px;
            left: -2px;
            width: calc(100% + 4px);
            height: calc(100% - 12px);
            background-color: #212121;
            transition: 0.3s ease-in-out;
            transform: scaleY(1);
        }

        .CallButtonSend a:hover::before {
            transform: scaleY(0);
        }

        .CallButtonSend a::after {
            content: '';
            position: absolute;
            left: 6px;
            top: -2px;
            height: calc(100% + 4px);
            width: calc(100% - 12px);
            background-color: #212121;
            transition: 0.3s ease-in-out;
            transform: scaleX(1);
            transition-delay: 0.5s;
        }

        .CallButtonSend a:hover::after {
            transform: scaleX(0);
        }

        .CallButtonSend a span {
            position: relative;
            z-index: 3;
        }

        .CallButtonSend {
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: none; */
            text-decoration: none;
            background-color: #212121;
            border: none;
        }

        /* ---------------------------------------------------------- */

        /* ---------------------------------------------------------------------------- */
        .select-box {
            position: relative;

            width: 20rem;
            margin: 1rem auto;
        }

        .select-box input {
            width: 100%;
            padding: 0.8rem .5rem;
            font-size: 1.1rem;

            border: .1rem solid transparent;
            outline: none;
        }

        input[type="tel"] {
            border-radius: 0 .4rem .4rem 0;
        }

        .select-box input:focus {
            border: .1rem solid var(--primary);
        }

        .selected-option {
            background-color: #eee;
            border-radius: .4rem;
            overflow: hidden;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .selected-option div {
            position: relative;

            width: 5rem;
            padding: 0 2.6rem 0 .4rem;
            text-align: center;
            cursor: pointer;
        }

        .selected-option div::after {
            position: absolute;
            content: "";
            right: .6rem;
            top: 50%;
            transform: translateY(-50%) rotate(40deg);

            width: .6rem;
            height: .6rem;
            border-right: .10rem solid var(--primary);
            border-bottom: .10rem solid var(--primary);

            transition: .2s;
        }

        .selected-option div.active::after {
            transform: translateY(-50%) rotate(200deg);
        }

        .select-box .options {
            position: absolute;
            top: 4rem;

            width: 100%;
            background-color: #fff;
            border-radius: .4rem;

            display: none;
            z-index: 5;
        }

        .select-box .options.active {
            display: block;
        }

        .select-box .options::before {
            position: absolute;
            content: "";
            left: 1rem;
            top: -1.2rem;

            width: 0;
            height: 0;
            border: .5rem solid transparent;
            border-bottom-color: var(--primary);
        }

        input.search-box {
            background-color: var(--primary);
            color: #fff;
            border-radius: .4rem .4rem 0 0;
            padding: 1.3rem 1rem;
        }

        .select-box ol {
            list-style: none;
            max-height: 11rem;
            overflow: overlay;
        }

        .select-box ol::-webkit-scrollbar {
            width: 0.5rem;
        }

        .select-box ol::-webkit-scrollbar-thumb {
            width: 0.4rem;
            height: 2rem;
            background-color: #ccc;
            border-radius: .3rem;
        }

        .select-box ol li {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
        }

        .select-box ol li.hide {
            display: none;
        }

        .select-box ol li:not(:last-child) {
            border-bottom: .1rem solid #eee;
        }

        .select-box ol li:hover {
            background-color: lightcyan;
        }

        .select-box ol li .country-name {
            margin-left: .3rem;
        }


    }

    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    @media screen and (min-width:1024px) {
        .page {
            /* background-color: aquamarine; */
            background-color: white;
            /* background-color: white; */
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            width: 1024px;
        }

        .mainFeeling {
            padding: 15px;

        }

        .mainHeader h1 {
            font-size: 35px;
            margin: 15px 0 15px 0;
            line-height: 30px;
        }

        .generalProvosions {
            margin: 15px 0 15px 0;
        }

        .allHeaders {
            font-size: 25px;
            margin: 10px 0 10px 0;
        }

        .allDescriptions {
            font-size: 20px;
            line-height: 30px;
        }

        /* CallMeContainer */
        .callMeContainer {
            width: 1024px;
            height: 100%;

        }

        .fixed-element {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;


        }

        .phoneCallImg {
            padding-top: 43px;
            padding-left: 43px;
        }

        /* footer */
        .footer {
            width: 1024px;
            height: 380px;
            display: flex;
            flex-direction: column;
        }

        .fooooter {
            display: flex;
            flex-direction: row;
        }

        .footer-information {
            width: 500px;
            height: 300px;
            background-color: #fbfbfb;
            position: absolute;
            margin-left: 50px;
            margin-top: 10px;
        }

        .footer-navigation-and-contacts {
            display: flex;
            background-color: #000000;
            position: absolute;
            flex-direction: column;
            padding-top: 40px;
            padding-bottom: 30px;
            padding-left: 20px;
            padding-right: 20px;
            margin-top: 15px;
            margin-left: 15px;
        }

        .footer-navigation-list {
            display: flex;
            flex-direction: column;
        }

        .footer-navigation-item {
            text-transform: uppercase;
            color: #fbfbfb;
            font-size: 15px;
        }

        .footer-navigation-item:hover {
            color: #EDAB03;
            transition: all .25s ease;

        }

        .footer-navigation-container {
            padding-left: 20px;
            padding-right: 48px;
        }

        .footer-contacts-and-social-media {
            padding-left: 48px;
        }

        .footer-contacts {
            color: #fbfbfb;
            margin-bottom: 20px;
        }

        .social-media-items {
            display: inline-block;
            height: 30px;
            width: 30px;
            background-color: #fbfbfb;
            border-radius: 50%;
            margin-right: 10px;
            text-align: center;
            line-height: 30px;
            padding-top: 6px;
        }

        .social-media-items:hover {
            background-color: #EDAB03;
            transition: all .25s ease;
        }

        .footer-contacts-item {
            font-size: 12px;
        }

        .footer-hr {
            margin-top: 40px;
            background-color: #fbfbfb;
            width: 460px;
        }

        .creator-h6 {
            margin-top: 10px;
            color: #fbfbfb;
            padding-left: 40px;
            font-weight: normal;
            font-size: 11px;
        }


        .footer-social-media-container i {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        /* ------------------------------------------------------- */
        .PopUpFormCallMe {
            /* background-color: rgba(0, 0, 0, 0.6); */
            width: 1024px;
            height: 100%;
            position: fixed;
            top: 12px;
            display: none;
            justify-content: center;
            align-items: flex-start;
            z-index: 1;
            padding-top: 10px;

        }

        .backgroundDiv {
            display: none;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            /* filter: blur(3px); */
            backdrop-filter: blur(3px);
            height: 100%;
            right: 0;
            top: 0;
            position: fixed;
            left: 0;
            z-index: 1;

        }

        .popUp-container {
            /* height: 500px; */
            width: 500px;
            /* background-color: white; */
            /* background-color: #EDAB03; */
            background-color: #111;
            /* opacity: 80%; */
            padding: 40px;
            border-radius: 10px;
            position: relative;
            display: none;
            flex-direction: row;
            justify-content: center;
        }



    }

    .inputYourName {
        display: flex;
        flex-direction: column;
        justify-content: left;

    }

    .nameLabel {
        position: absolute;
        /* color: #000000; */
        /* color: #eee; */
        /* font-size: 20px; */
        /* font-weight: bold; */
        /* top: 0; */
        /* left: 0; */
        padding: 10px 0;
        color: #fff;
        pointer-events: none;
        transition: .5s;
    }

    input {
        font-size: 16px;
        margin-bottom: 30px;
        display: block;
        width: 100%;
        /* height: 50px; */
        padding: 10px 0;
        border: none;
        /* border-radius: 10px; */
        color: #fff;
        outline: none;
        border-bottom: 1px solid #EDAB03;
        background-color: transparent;
    }

    .close {
        width: 50px;
        height: 50px;
        position: absolute;
        top: -15px;
        right: -15px;
        /* background-color: #eee; */
        border-radius: 50%;
        cursor: pointer;
    }

    .CallButtonSend a {
        position: relative;
        display: inline-block;
        padding: 15px 30px;
        border: 2px solid #fefefe;
        text-transform: uppercase;
        color: #fefefe;
        text-decoration: none;
        font-weight: 600;
        font-size: 20px;
    }

    .CallButtonSend a::before {
        content: '';
        position: absolute;
        top: 6px;
        left: -2px;
        width: calc(100% + 4px);
        height: calc(100% - 12px);
        background-color: #212121;
        transition: 0.3s ease-in-out;
        transform: scaleY(1);
    }

    .CallButtonSend a:hover::before {
        transform: scaleY(0);
    }

    .CallButtonSend a::after {
        content: '';
        position: absolute;
        left: 6px;
        top: -2px;
        height: calc(100% + 4px);
        width: calc(100% - 12px);
        background-color: #212121;
        transition: 0.3s ease-in-out;
        transform: scaleX(1);
        transition-delay: 0.5s;
    }

    .CallButtonSend a:hover::after {
        transform: scaleX(0);
    }

    .CallButtonSend a span {
        position: relative;
        z-index: 3;
    }

    .CallButtonSend {
        display: flex;
        justify-content: center;
        align-items: center;
        /* background-color: none; */
        text-decoration: none;
        background-color: #212121;
        border: none;
    }

    /* ---------------------------------------------------------- */
    .select-box {
        position: relative;
        width: 26rem;
        margin: 1rem auto;
    }

    .select-box input {
        width: 100%;

        /* padding: 1rem .6rem; */
        /* font-size: 1.1rem; */
        /* border: .1rem solid transparent; */
        /* outline: none; */
        font-size: 16px;
        margin-bottom: 30px;
        display: block;
        width: 100%;
        /* height: 50px; */
        padding: 10px 0;
        border: none;
        /* border-radius: 10px; */
        color: #fff;
        outline: none;
        border-bottom: 1px solid #EDAB03;
        background-color: transparent;
    }


    input[type="tel"] {
        border-radius: 0 .5rem .5rem 0;
    }

    .select-box input:focus {
        border: .1rem solid var(--primary);
    }

    .selected-option {
        /* background-color: #eee; */
        border-radius: .5rem;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .selected-option div {
        position: relative;
        width: 6rem;
        /* padding: 0 2.8rem 0 .5rem; */
        text-align: center;
        cursor: pointer;
        background-color: #EDAB03;
        border-radius: 15px;
        padding: 2px 30px 2px 30px;
        margin-right: 41px;
    }

    .selected-option div::after {
        position: absolute;
        content: "";
        right: .8rem;
        top: 50%;
        transform: translateY(-50%) rotate(45deg);
        width: .8rem;
        height: .8rem;
        border-right: .12rem solid var(--primary);
        border-bottom: .12rem solid var(--primary);
        transition: .2s;
    }

    .selected-option div.active::after {
        transform: translateY(-50%) rotate(225deg);
    }

    .select-box .options {
        position: absolute;
        top: 4rem;
        width: 100%;
        background-color: #fff;
        border-radius: .5rem;
        display: none;
        z-index: 5;
    }

    .select-box .options.active {
        display: block;
    }

    .select-box .options::before {
        position: absolute;
        content: "";
        left: 1rem;
        top: -1.2rem;
        width: 0;
        height: 0;
        border: .6rem solid transparent;
        border-bottom-color: var(--primary);
    }

    input.search-box {
        background-color: var(--primary);
        color: #fff;
        border-radius: .5rem .5rem 0 0;
        padding: 1.4rem 1rem;
    }

    .select-box ol {
        list-style: none;
        max-height: 13rem;
        overflow: overlay;
        z-index: 1;
    }

    .select-box ol::-webkit-scrollbar {
        width: 0.6rem;
    }

    .select-box ol::-webkit-scrollbar-thumb {
        width: 0.4rem;
        height: 3rem;
        background-color: #ccc;
        border-radius: .4rem;
    }

    .select-box ol li {
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        cursor: pointer;
    }

    .select-box ol li.hide {
        display: none;
    }

    .select-box ol li:not(:last-child) {
        border-bottom: .1rem solid #eee;
    }

    .select-box ol li:hover {
        background-color: lightcyan;
    }

    .select-box ol li .country-name {
        margin-left: .4rem;
    }

    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    /* -------------------------------------------------------------------------------------------------- */
    .breakPoint {
        width: inherit;
        height: 50px;
        --bg: radial-gradient(#000 5%, #0000 6%);
        --size: 3rem;
        /* Add your background pattern here */
        /* background-color: lightblue; */
        background-image: radial-gradient(#000 5%, #0000 6%),
            radial-gradient(#000 5%, #0000 6%);
        background-position: 0 0, calc(var(--size) / 2) calc(var(--size) / 2);
        background-size: var(--size) var(--size);
        animation: moveBackground 10s linear infinite;
    }

    @keyframes moveBackground {
        from {
            background-position: 0 0, calc(var(--size) / 2) calc(var(--size) / 2);
        }

        to {
            background-position: 100px 100px, calc(var(--size) / 2 + 100px) calc(var(--size) / 2 + 100px);
        }
    }

    @media screen and (min-width: 420px) and (max-width:839px) {

        .first-map,
        .second-map {
            display: none;
        }
    }

    @media screen and (min-width: 840px) and (max-width: 1023px) {

        .first-map,
        .third-map {
            display: none;
        }
    }

    @media screen and (min-width: 1024px) {

        .third-map,
        .second-map {
            display: none;
        }
    }



    /* ----------button-------- */
    .animated-button {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        padding: 16px 36px;
        border: 4px solid;
        border-color: transparent;
        font-size: 16px;
        background-color: inherit;
        border-radius: 100px;
        font-weight: 600;
        color: #EDAB03;
        box-shadow: 0 0 0 2px #EDAB03;
        cursor: pointer;
        overflow: hidden;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }





    .CallButtonSend {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: transparent;
    }

    .animated-button .circle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        background-color: #EDAB03;
        border-radius: 50%;
        opacity: 0;
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .animated-button .text {

        z-index: 1;

        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .animated-button:hover {
        box-shadow: 0 0 0 12px transparent;
        color: #212121;
        border-radius: 12px;
    }




    .animated-button:active {
        scale: 0.95;
        box-shadow: 0 0 0 4px #EDAB03;
    }

    .animated-button:hover .circle {
        width: 220px;
        height: 220px;
        opacity: 1;
    }
</style>

<body>

    <div class="page">
        <div class="mainFeeling">
            <div class="callMeContainer" id="buttonCallMe">
                <div class="fixed-element">
                    <i style="--clr:#EDAB03"></i>
                    <i style="--clr:#EDAB03"></i>
                    <a href="#"><img class="phoneCallImg" src="img/icons8-phonecall-64.png" alt="phonecall"></a>
                </div>

            </div>
            <div class="mainHeader">
                <h1>Правила користування Co-Working Space</h1>
            </div>
            <div class="breakPoint">


            </div>
            <div class="generalProvosions">
                <p class="allHeaders">Загальні положення</p>
                <p class="allDescriptions"><em>Коворкінг є простором самостійної робочої діяльності фізичних осіб, не
                        пов’язаних трудовими
                        відносинами з Суборендодавцем. Усі користувачі Коворкінгу зобов’язані ознайомитись з даними
                        Правилами до початку своєї роботи;
                        Правила регулюють права і обов’язки всіх осіб, які перебувають в коворкінгу і обов’язкові для
                        дотримання ними;
                        Всі фізичні особи, перебуваючи в коворкінгу, вважаються ознайомленими та погоджуються з
                        правилами
                        коворкінгу;</em></p>
            </div>
            <div class="breakPoint">

            </div>
            <div class="schedualContainer">
                <p class="allHeaders">Режим роботи. Правила відвідування</p>
                <p class="allDescriptions">Коворкінг працює для клієнтів, гостей та відвідувачів з 8.00 до 19.00 з
                    понеділка
                    по п’ятницю;
                    При відвідуванні коворкінгу Клієнт зобов’язаний надати Адміністратору свою електронну адресу та
                    номер
                    телефону.
                    Гість (а також відвідувач і третя особа) проходить в Коворкінг з дозволу Адміністратора і
                    зобов’язаний
                    на першу вимогу Адміністратора покинути Коворкінг;
                    Перебування Гостя на території коворкінгу дозволено в спеціально відведених зонах (meeting room;
                    lounge
                    zone) протягом 1 години є безкоштовним. Подальше находження Гостя на території коворкінгу (понад
                    зазначений час) оплачується відповідно до цін, встановлених на перебування в зоні open space, якщо
                    інше
                    не погоджене з Адміністратором.
                    Клієнт несе повну відповідальність за своїх гостей та за їх дії, як за свої власні;
                    Після закінчення строку дії чи дострокового розірвання Договору, Резидент зобов’язаний покинути
                    Коворкінг і винести все своє майно на першу вимогу Адміністратора;
                    Суборендодавець має право відмовити в доступі в Коворкінг і / або в наданні послуг, якщо особа
                    порушує
                    дані Правила. У разі порушення будь-якою особою, що перебуває в коворкінгу і / або будівлі, Правил,
                    така
                    особа зобов’язана на першу вимогу Адміністратора покинути Коворкінг і будівлю;
                    Проведення на території коворкінгу фото/ відео- зйомки, аудіозапису допускається виключно з дозволу
                    Адміністратора;
                    На території коворкінгу потрібно дотримуватися тиші аби не заважати оточуючим. Користувачі
                    зобов’язані
                    забезпечувати чистоту і порядок на своїй орендованій території, не смітити в коворкінгу та в
                    будівлі;
                    Після закінчення роботи в коворкінгу, прибрати за собою робоче місце;
                    У випадку, якщо потрібна участь прибиральниці для забезпечення чистоти в конкретних місцях внаслідок
                    діяльності користувача (пролиті напої, розкидана їжа на підлогу, на стіл тощо), користувач повинен
                    повідомити про це Адміністратора;
                    Користувачі коворкінгу повинні дотримуватися правил пожежної безпеки, санітарних норм, дбайливо
                    ставитися до майна, що знаходиться в коворкінгу і в будівлі, а в разі псування такого майна –
                    відшкодувати завдані збитки;
                    Користувачі коворкінгу мають право користуватися мітинг-румами, розташованими у зоні коворкінгу, за
                    попереднім бронюванням.
                    Вимоги Адміністратора та інших осіб, що діють від імені Суборендодавця, по дотриманню Правил,
                    чинного
                    законодавства є обов’язковими до виконання на території коворкінгу. Особи, які не виконують такі
                    вимоги,
                    зобов’язані покинути коворкінг разом зі своїми речами на першу вимогу Адміністратора.</p>

            </div>
            <div class="breakPoint">

            </div>
            <div class="rulesForUsingKhitchenAndRestRoom">
                <p class="allHeaders">Правила користування приміщенням (зонами) вковоркінгу
                    Зона самообслуговування (кухня) та вбиральня:</p>
                <p class="allDescriptions">Зони самообслуговування призначені для індивідуального використання за
                    призначенням;
                    У зоні самообслуговування забороняється здійснення будь-якої діяльності, крім приготування чаїв та
                    напоїв, приймання їжі;
                    У зоні самообслуговування Користувачам дозволяється використовувати наявний посуд, кавомашину,
                    кулер,
                    холодильник, мікрохвильову піч, солодощі, чай і цукор;
                    У туалетній кімнаті забороняється здійснення будь-якої діяльності, крім використання туалетної
                    кімнати
                    за прямим призначенням;
                    У туалетній кімнаті необхідно дотримуватися чистоти, засоби особистої гігієни необхідно викидати в
                    урну.
                </p>

            </div>
            <div class="breakPoint">

            </div>
            <div class="thingsYouAreNotAllowedToDo">
                <p class="allHeaders">Обмеження встановлені в коворкінгу
                    В коворкінгу і будівлі забороняється:</p>
                <p class="allDescriptions">Палити (в тому числі з використанням парогенераторна і електронних сигарет);
                    Перебувати в стані алкогольного або наркотичного сп’яніння;
                    Вживати алкогольні напої, наркотичні, інші заборонені речовини;
                    Створювати перешкоди і незручності іншим особам, в тому числі шуміти, нецензурно висловлюватися і
                    здійснювати будь-які дії образливого характеру по відношенню до інших осіб;
                    Перебувати з тваринами;
                    Перебувати неповнолітнім дітям без законного представника, який зобов’язаний слідкувати за
                    дотриманням
                    цих Правил дітьми;
                    Заносити велосипеди, самокати, скутери та інші засоби пересування;
                    Пересуватися на роликах, скейтах та інших засобах пересування;
                    Категорично забороняється перебувати в приміщенні, якщо особа має ознаки ГРВІ, грипу чи інших
                    захворювань, які передаються повітряно-крапельним шляхом(сумісна безпека – це безпека і уважність
                    кожного з нас);
                    Перебувати в брудному одязі, взутті, чи мати подразнюючий специфічний запах;
                    Приносити з собою легкозаймисті, вибухові, небезпечні речовини;
                    Заносити в будівлю і / або в коворкінг великогабаритні речі з габаритами, що перевищують два метри
                    за
                    сумою розмірів (довжини, глибини (ширини), висоти);
                    Залишати без нагляду особисті речі;
                    Складати особисті речі та / або залишати їх на зберігання без узгодження з Адміністратором;
                    На території коворкінгу забороняється перебувати стороннім особам;
                    Проводити наради, збори, зустрічі, конференції поза переговорних, якщо вони заважають оточуючим;
                    Дивитися фільми або відеоролики, слухати аудіо матеріали без використання навушників;
                    Розмовляти по телефону використовуючи гучний зв’язок.</p>

            </div>
            <div class="breakPoint">

            </div>
        </div>
        <!-- PopUpFormCallMe -->
        <div class="backgroundDiv"></div>
        <div class="PopUpFormCallMe">
            <div class="popUp-container">
                <img src="img/click-close.png" alt="closeButton" class="close">
                <div class="popUpFormContainer">
                    <form action="" method="post">
                        <div class="inputYourName">
                            <input type="text" name="user_name" id="user_name" placeholder="Введіть своє ім'я" required>
                        </div>
                        <div class="select-box">
                            <div class="selected-option">
                                <div>
                                    <span class="iconify" data-icon="flag:gb-4x3"></span>
                                    <strong>+44</strong>
                                </div>
                                <input type="tel" name="user_phone" id="user_phone" placeholder="Номер телефону"
                                    required>
                            </div>
                            <div class="options">
                                <input type="text" class="search-box" placeholder="Введіть назву країни">
                                <ol>
                                    <!-- Options will be populated here -->
                                </ol>
                            </div>
                        </div>
                        <div class="CallButtonSend">
                            <button class="animated-button submit" id="submit" type="submit" name="submit">
                                <span class="text">Зателефонувати</span>
                                <span class="circle"></span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <!-- --------------- -->

        <footer class="footer" id="footer">
            <iframe class="first-map hidden"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2568.151682714611!2d23.570430324956458!3d49.93349506760684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473b3d663fcc44a3%3A0x4d8c19463c4a1b02!2z0J3QvtCy0L7Rj9Cy0L7RgNGW0LLRgdGM0LosINCb0YzQstGW0LLRgdGM0LrQsCDQvtCx0LvQsNGB0YLRjA!5e0!3m2!1suk!2sua!4v1704888688993!5m2!1suk!2sua"
                width="1024" height="380" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <iframe class="second-map hidden"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2568.151682714611!2d23.570430324956458!3d49.93349506760684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473b3d663fcc44a3%3A0x4d8c19463c4a1b02!2z0J3QvtCy0L7Rj9Cy0L7RgNGW0LLRgdGM0LosINCb0YzQstGW0LLRgdGM0LrQsCDQvtCx0LvQsNGB0YLRjA!5e0!3m2!1suk!2sua!4v1704888688993!5m2!1suk!2sua"
                width="840" height="380" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <iframe class="third-map hidden"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2568.151682714611!2d23.570430324956458!3d49.93349506760684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473b3d663fcc44a3%3A0x4d8c19463c4a1b02!2z0J3QvtCy0L7Rj9Cy0L7RgNGW0LLRgdGM0LosINCb0YzQstGW0LLRgdGM0LrQsCDQvtCx0LvQsNGB0YLRjA!5e0!3m2!1suk!2sua!4v1704888688993!5m2!1suk!2sua"
                width="420" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <div class="footer-navigation-and-contacts hidden">
                <div class="fooooter">
                    <div class="footer-navigation-container">
                        <ul class="footer-navigation-list">
                            <li><a class="footer-navigation-item" href="main.php#aboutUsSection">Про нас</a></li>
                            <li><a class="footer-navigation-item" href="rooms.php">Приміщення</a>
                            </li>
                            <li><a class="footer-navigation-item" href="advantages.php">Переваги</a>
                            </li>
                            <li><a class="footer-navigation-item" href="main.php#gallery">Галерея</a>
                            </li>
                            <li><a class="footer-navigation-item" href="rules.php">Правила</a>
                            </li>
                            <li><a class="footer-navigation-item" href="main.php#footer">Контакти</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-contacts-and-social-media">
                        <div id="contacts" class="footer-contacts">
                            <p class="footer-contacts-item">Адреса: вулиця Романа Шухевича, Новояворівськ,
                                Львівська
                                область</p>
                            <p class="footer-contacts-item">E-mail: <a
                                    href="mailto:marta.masiukk@gmail.com">marta.mas@gmail.com</a></p>
                            <p class="footer-contacts-item">Телефон: <a href="tel:+3888888888888">+38 067 676 67
                                    67</a></p>
                        </div>
                        <div class="footer-social-media-container">
                            <a class="social-media-items" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="social-media-items" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="social-media-items" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="social-media-items" href="#"><i class="fab fa-viber"></i></a>
                            <a class="social-media-items" href="#"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="footer-hr">
                <div class="footer-creator">
                    <h6 class="creator-h6">created &amp; developed by <a href="#">Masiuk Marta</a></h6>
                </div>

            </div>
        </footer>

    </div>
    <script>

        const countries = [
            { name: "Afghanistan", code: "AF", phone: 93 },
            { name: "Aland Islands", code: "AX", phone: 358 },
            { name: "Albania", code: "AL", phone: 355 },
            { name: "Algeria", code: "DZ", phone: 213 },
            { name: "American Samoa", code: "AS", phone: 1684 },
            { name: "Andorra", code: "AD", phone: 376 },
            { name: "Angola", code: "AO", phone: 244 },
            { name: "Anguilla", code: "AI", phone: 1264 },
            { name: "Antarctica", code: "AQ", phone: 672 },
            { name: "Antigua and Barbuda", code: "AG", phone: 1268 },
            { name: "Argentina", code: "AR", phone: 54 },
            { name: "Armenia", code: "AM", phone: 374 },
            { name: "Aruba", code: "AW", phone: 297 },
            { name: "Australia", code: "AU", phone: 61 },
            { name: "Austria", code: "AT", phone: 43 },
            { name: "Azerbaijan", code: "AZ", phone: 994 },
            { name: "Bahamas", code: "BS", phone: 1242 },
            { name: "Bahrain", code: "BH", phone: 973 },
            { name: "Bangladesh", code: "BD", phone: 880 },
            { name: "Barbados", code: "BB", phone: 1246 },
            { name: "Belarus", code: "BY", phone: 375 },
            { name: "Belgium", code: "BE", phone: 32 },
            { name: "Belize", code: "BZ", phone: 501 },
            { name: "Benin", code: "BJ", phone: 229 },
            { name: "Bermuda", code: "BM", phone: 1441 },
            { name: "Bhutan", code: "BT", phone: 975 },
            { name: "Bolivia", code: "BO", phone: 591 },
            { name: "Bonaire, Sint Eustatius and Saba", code: "BQ", phone: 599 },
            { name: "Bosnia and Herzegovina", code: "BA", phone: 387 },
            { name: "Botswana", code: "BW", phone: 267 },
            { name: "Bouvet Island", code: "BV", phone: 55 },
            { name: "Brazil", code: "BR", phone: 55 },
            { name: "British Indian Ocean Territory", code: "IO", phone: 246 },
            { name: "Brunei Darussalam", code: "BN", phone: 673 },
            { name: "Bulgaria", code: "BG", phone: 359 },
            { name: "Burkina Faso", code: "BF", phone: 226 },
            { name: "Burundi", code: "BI", phone: 257 },
            { name: "Cambodia", code: "KH", phone: 855 },
            { name: "Cameroon", code: "CM", phone: 237 },
            { name: "Canada", code: "CA", phone: 1 },
            { name: "Cape Verde", code: "CV", phone: 238 },
            { name: "Cayman Islands", code: "KY", phone: 1345 },
            { name: "Central African Republic", code: "CF", phone: 236 },
            { name: "Chad", code: "TD", phone: 235 },
            { name: "Chile", code: "CL", phone: 56 },
            { name: "China", code: "CN", phone: 86 },
            { name: "Christmas Island", code: "CX", phone: 61 },
            { name: "Cocos (Keeling) Islands", code: "CC", phone: 672 },
            { name: "Colombia", code: "CO", phone: 57 },
            { name: "Comoros", code: "KM", phone: 269 },
            { name: "Congo", code: "CG", phone: 242 },
            { name: "Congo, Democratic Republic of the Congo", code: "CD", phone: 242 },
            { name: "Cook Islands", code: "CK", phone: 682 },
            { name: "Costa Rica", code: "CR", phone: 506 },
            { name: "Cote D'Ivoire", code: "CI", phone: 225 },
            { name: "Croatia", code: "HR", phone: 385 },
            { name: "Cuba", code: "CU", phone: 53 },
            { name: "Curacao", code: "CW", phone: 599 },
            { name: "Cyprus", code: "CY", phone: 357 },
            { name: "Czech Republic", code: "CZ", phone: 420 },
            { name: "Denmark", code: "DK", phone: 45 },
            { name: "Djibouti", code: "DJ", phone: 253 },
            { name: "Dominica", code: "DM", phone: 1767 },
            { name: "Dominican Republic", code: "DO", phone: 1809 },
            { name: "Ecuador", code: "EC", phone: 593 },
            { name: "Egypt", code: "EG", phone: 20 },
            { name: "El Salvador", code: "SV", phone: 503 },
            { name: "Equatorial Guinea", code: "GQ", phone: 240 },
            { name: "Eritrea", code: "ER", phone: 291 },
            { name: "Estonia", code: "EE", phone: 372 },
            { name: "Ethiopia", code: "ET", phone: 251 },
            { name: "Falkland Islands (Malvinas)", code: "FK", phone: 500 },
            { name: "Faroe Islands", code: "FO", phone: 298 },
            { name: "Fiji", code: "FJ", phone: 679 },
            { name: "Finland", code: "FI", phone: 358 },
            { name: "France", code: "FR", phone: 33 },
            { name: "French Guiana", code: "GF", phone: 594 },
            { name: "French Polynesia", code: "PF", phone: 689 },
            { name: "French Southern Territories", code: "TF", phone: 262 },
            { name: "Gabon", code: "GA", phone: 241 },
            { name: "Gambia", code: "GM", phone: 220 },
            { name: "Georgia", code: "GE", phone: 995 },
            { name: "Germany", code: "DE", phone: 49 },
            { name: "Ghana", code: "GH", phone: 233 },
            { name: "Gibraltar", code: "GI", phone: 350 },
            { name: "Greece", code: "GR", phone: 30 },
            { name: "Greenland", code: "GL", phone: 299 },
            { name: "Grenada", code: "GD", phone: 1473 },
            { name: "Guadeloupe", code: "GP", phone: 590 },
            { name: "Guam", code: "GU", phone: 1671 },
            { name: "Guatemala", code: "GT", phone: 502 },
            { name: "Guernsey", code: "GG", phone: 44 },
            { name: "Guinea", code: "GN", phone: 224 },
            { name: "Guinea-Bissau", code: "GW", phone: 245 },
            { name: "Guyana", code: "GY", phone: 592 },
            { name: "Haiti", code: "HT", phone: 509 },
            { name: "Heard Island and McDonald Islands", code: "HM", phone: 0 },
            { name: "Holy See (Vatican City State)", code: "VA", phone: 39 },
            { name: "Honduras", code: "HN", phone: 504 },
            { name: "Hong Kong", code: "HK", phone: 852 },
            { name: "Hungary", code: "HU", phone: 36 },
            { name: "Iceland", code: "IS", phone: 354 },
            { name: "India", code: "IN", phone: 91 },
            { name: "Indonesia", code: "ID", phone: 62 },
            { name: "Iran, Islamic Republic of", code: "IR", phone: 98 },
            { name: "Iraq", code: "IQ", phone: 964 },
            { name: "Ireland", code: "IE", phone: 353 },
            { name: "Isle of Man", code: "IM", phone: 44 },
            { name: "Israel", code: "IL", phone: 972 },
            { name: "Italy", code: "IT", phone: 39 },
            { name: "Jamaica", code: "JM", phone: 1876 },
            { name: "Japan", code: "JP", phone: 81 },
            { name: "Jersey", code: "JE", phone: 44 },
            { name: "Jordan", code: "JO", phone: 962 },
            { name: "Kazakhstan", code: "KZ", phone: 7 },
            { name: "Kenya", code: "KE", phone: 254 },
            { name: "Kiribati", code: "KI", phone: 686 },
            { name: "Korea, Democratic People's Republic of", code: "KP", phone: 850 },
            { name: "Korea, Republic of", code: "KR", phone: 82 },
            { name: "Kosovo", code: "XK", phone: 383 },
            { name: "Kuwait", code: "KW", phone: 965 },
            { name: "Kyrgyzstan", code: "KG", phone: 996 },
            { name: "Lao People's Democratic Republic", code: "LA", phone: 856 },
            { name: "Latvia", code: "LV", phone: 371 },
            { name: "Lebanon", code: "LB", phone: 961 },
            { name: "Lesotho", code: "LS", phone: 266 },
            { name: "Liberia", code: "LR", phone: 231 },
            { name: "Libyan Arab Jamahiriya", code: "LY", phone: 218 },
            { name: "Liechtenstein", code: "LI", phone: 423 },
            { name: "Lithuania", code: "LT", phone: 370 },
            { name: "Luxembourg", code: "LU", phone: 352 },
            { name: "Macao", code: "MO", phone: 853 },
            { name: "Macedonia, the Former Yugoslav Republic of", code: "MK", phone: 389 },
            { name: "Madagascar", code: "MG", phone: 261 },
            { name: "Malawi", code: "MW", phone: 265 },
            { name: "Malaysia", code: "MY", phone: 60 },
            { name: "Maldives", code: "MV", phone: 960 },
            { name: "Mali", code: "ML", phone: 223 },
            { name: "Malta", code: "MT", phone: 356 },
            { name: "Marshall Islands", code: "MH", phone: 692 },
            { name: "Martinique", code: "MQ", phone: 596 },
            { name: "Mauritania", code: "MR", phone: 222 },
            { name: "Mauritius", code: "MU", phone: 230 },
            { name: "Mayotte", code: "YT", phone: 262 },
            { name: "Mexico", code: "MX", phone: 52 },
            { name: "Micronesia, Federated States of", code: "FM", phone: 691 },
            { name: "Moldova, Republic of", code: "MD", phone: 373 },
            { name: "Monaco", code: "MC", phone: 377 },
            { name: "Mongolia", code: "MN", phone: 976 },
            { name: "Montenegro", code: "ME", phone: 382 },
            { name: "Montserrat", code: "MS", phone: 1664 },
            { name: "Morocco", code: "MA", phone: 212 },
            { name: "Mozambique", code: "MZ", phone: 258 },
            { name: "Myanmar", code: "MM", phone: 95 },
            { name: "Namibia", code: "NA", phone: 264 },
            { name: "Nauru", code: "NR", phone: 674 },
            { name: "Nepal", code: "NP", phone: 977 },
            { name: "Netherlands", code: "NL", phone: 31 },
            { name: "Netherlands Antilles", code: "AN", phone: 599 },
            { name: "New Caledonia", code: "NC", phone: 687 },
            { name: "New Zealand", code: "NZ", phone: 64 },
            { name: "Nicaragua", code: "NI", phone: 505 },
            { name: "Niger", code: "NE", phone: 227 },
            { name: "Nigeria", code: "NG", phone: 234 },
            { name: "Niue", code: "NU", phone: 683 },
            { name: "Norfolk Island", code: "NF", phone: 672 },
            { name: "Northern Mariana Islands", code: "MP", phone: 1670 },
            { name: "Norway", code: "NO", phone: 47 },
            { name: "Oman", code: "OM", phone: 968 },
            { name: "Pakistan", code: "PK", phone: 92 },
            { name: "Palau", code: "PW", phone: 680 },
            { name: "Palestinian Territory, Occupied", code: "PS", phone: 970 },
            { name: "Panama", code: "PA", phone: 507 },
            { name: "Papua New Guinea", code: "PG", phone: 675 },
            { name: "Paraguay", code: "PY", phone: 595 },
            { name: "Peru", code: "PE", phone: 51 },
            { name: "Philippines", code: "PH", phone: 63 },
            { name: "Pitcairn", code: "PN", phone: 64 },
            { name: "Poland", code: "PL", phone: 48 },
            { name: "Portugal", code: "PT", phone: 351 },
            { name: "Puerto Rico", code: "PR", phone: 1787 },
            { name: "Qatar", code: "QA", phone: 974 },
            { name: "Reunion", code: "RE", phone: 262 },
            { name: "Romania", code: "RO", phone: 40 },
            { name: "Rwanda", code: "RW", phone: 250 },
            { name: "Saint Barthelemy", code: "BL", phone: 590 },
            { name: "Saint Helena", code: "SH", phone: 290 },
            { name: "Saint Kitts and Nevis", code: "KN", phone: 1869 },
            { name: "Saint Lucia", code: "LC", phone: 1758 },
            { name: "Saint Martin", code: "MF", phone: 590 },
            { name: "Saint Pierre and Miquelon", code: "PM", phone: 508 },
            { name: "Saint Vincent and the Grenadines", code: "VC", phone: 1784 },
            { name: "Samoa", code: "WS", phone: 684 },
            { name: "San Marino", code: "SM", phone: 378 },
            { name: "Sao Tome and Principe", code: "ST", phone: 239 },
            { name: "Saudi Arabia", code: "SA", phone: 966 },
            { name: "Senegal", code: "SN", phone: 221 },
            { name: "Serbia", code: "RS", phone: 381 },
            { name: "Serbia and Montenegro", code: "CS", phone: 381 },
            { name: "Seychelles", code: "SC", phone: 248 },
            { name: "Sierra Leone", code: "SL", phone: 232 },
            { name: "Singapore", code: "SG", phone: 65 },
            { name: "St Martin", code: "SX", phone: 721 },
            { name: "Slovakia", code: "SK", phone: 421 },
            { name: "Slovenia", code: "SI", phone: 386 },
            { name: "Solomon Islands", code: "SB", phone: 677 },
            { name: "Somalia", code: "SO", phone: 252 },
            { name: "South Africa", code: "ZA", phone: 27 },
            { name: "South Georgia and the South Sandwich Islands", code: "GS", phone: 500 },
            { name: "South Sudan", code: "SS", phone: 211 },
            { name: "Spain", code: "ES", phone: 34 },
            { name: "Sri Lanka", code: "LK", phone: 94 },
            { name: "Sudan", code: "SD", phone: 249 },
            { name: "Suriname", code: "SR", phone: 597 },
            { name: "Svalbard and Jan Mayen", code: "SJ", phone: 47 },
            { name: "Swaziland", code: "SZ", phone: 268 },
            { name: "Sweden", code: "SE", phone: 46 },
            { name: "Switzerland", code: "CH", phone: 41 },
            { name: "Syrian Arab Republic", code: "SY", phone: 963 },
            { name: "Taiwan, Province of China", code: "TW", phone: 886 },
            { name: "Tajikistan", code: "TJ", phone: 992 },
            { name: "Tanzania, United Republic of", code: "TZ", phone: 255 },
            { name: "Thailand", code: "TH", phone: 66 },
            { name: "Timor-Leste", code: "TL", phone: 670 },
            { name: "Togo", code: "TG", phone: 228 },
            { name: "Tokelau", code: "TK", phone: 690 },
            { name: "Tonga", code: "TO", phone: 676 },
            { name: "Trinidad and Tobago", code: "TT", phone: 1868 },
            { name: "Tunisia", code: "TN", phone: 216 },
            { name: "Turkey", code: "TR", phone: 90 },
            { name: "Turkmenistan", code: "TM", phone: 7370 },
            { name: "Turks and Caicos Islands", code: "TC", phone: 1649 },
            { name: "Tuvalu", code: "TV", phone: 688 },
            { name: "Uganda", code: "UG", phone: 256 },
            { name: "Ukraine", code: "UA", phone: 380 },
            { name: "United Arab Emirates", code: "AE", phone: 971 },
            { name: "United Kingdom", code: "GB", phone: 44 },
            { name: "United States", code: "US", phone: 1 },
            { name: "United States Minor Outlying Islands", code: "UM", phone: 1 },
            { name: "Uruguay", code: "UY", phone: 598 },
            { name: "Uzbekistan", code: "UZ", phone: 998 },
            { name: "Vanuatu", code: "VU", phone: 678 },
            { name: "Venezuela", code: "VE", phone: 58 },
            { name: "Viet Nam", code: "VN", phone: 84 },
            { name: "Virgin Islands, British", code: "VG", phone: 1284 },
            { name: "Virgin Islands, U.s.", code: "VI", phone: 1340 },
            { name: "Wallis and Futuna", code: "WF", phone: 681 },
            { name: "Western Sahara", code: "EH", phone: 212 },
            { name: "Yemen", code: "YE", phone: 967 },
            { name: "Zambia", code: "ZM", phone: 260 },
            { name: "Zimbabwe", code: "ZW", phone: 263 }
        ],

            select_box = document.querySelector('.options'),
            search_box = document.querySelector('.search-box'),
            input_box = document.querySelector('input[type="tel"]'),
            selected_option = document.querySelector('.selected-option div');

        let options = null;

        for (country of countries) {
            const option = `
    <li class="option">
        <div>
            <span class="iconify" data-icon="flag:${country.code.toLowerCase()}-4x3"></span>
            <span class="country-name">${country.name}</span>
        </div>
        <strong>+${country.phone}</strong>
    </li> `;

            select_box.querySelector('ol').insertAdjacentHTML('beforeend', option);
            options = document.querySelectorAll('.option');
        }

        function selectOption() {
            console.log(this);
            const icon = this.querySelector('.iconify').cloneNode(true),
                phone_code = this.querySelector('strong').cloneNode(true);

            selected_option.innerHTML = '';
            selected_option.append(icon, phone_code);

            input_box.value = phone_code.innerText;

            select_box.classList.remove('active');
            selected_option.classList.remove('active');

            search_box.value = '';
            select_box.querySelectorAll('.hide').forEach(el => el.classList.remove('hide'));
        }

        function searchCountry() {
            let search_query = search_box.value.toLowerCase();
            for (option of options) {
                let is_matched = option.querySelector('.country-name').innerText.toLowerCase().includes(search_query);
                option.classList.toggle('hide', !is_matched)
            }
        }


        selected_option.addEventListener('click', () => {
            select_box.classList.toggle('active');
            selected_option.classList.toggle('active');
        })

        options.forEach(option => option.addEventListener('click', selectOption));
        search_box.addEventListener('input', searchCountry);


        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        // ---------------------------------------------------
        document.getElementById("buttonCallMe").addEventListener("click", function () {
            document.querySelector(".popUp-container").style.display = "flex";
            document.querySelector(".PopUpFormCallMe").style.display = "flex";
            document.querySelector(".backgroundDiv").style.display = "flex";
            console.log("натиснуто");
        });

        document.querySelector(".close").addEventListener("click", function () {
            document.querySelector(".popUp-container").style.display = "none";
            document.querySelector(".PopUpFormCallMe").style.display = "none";
            document.querySelector(".backgroundDiv").style.display = "none";
        });


    </script>
</body>


</html>