<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Чому ми? Переваги нашого робочого простору</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: whitesmoke;
        /* background-color: #000; */
        /* background-color: aquamarine; */
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    /* General styles */
    /* ------------------------------------------------------------- */
    /* ------------------------------------------------------------- */
    .first-section-header-why {
        overflow: hidden;
        background-image: url(img/main-photo-advantages.jpg);
        background-size: cover;
    }

    .accordion-menu .title {
        text-transform: uppercase;
        text-align: center;
    }

    .first-section-header-why .scroll {
        width: 100%;
        display: flex;
    }

    .first-section-header-why .scroll div {
        color: #000;
        background-color: #fff;
        white-space: nowrap;
        text-transform: uppercase;
        animation: animate 40s linear infinite;
    }

    .first-section-header-why .scroll div:nth-child(2) {
        animation: animate2 30s linear infinite;
        animation-delay: 0s;
    }

    .first-section-header-why .scroll div span {
        color: #fff;
        -webkit-text-stroke: 2px #EDAB03;
    }

    @keyframes animate {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .advantages-items {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .decoration-div {
        background-color: #EDAB03;
        position: absolute;
        z-index: 0;

    }

    .items-container {
        display: flex;
        justify-content: center;
    }

    .internet-container,
    .event-room,
    .infrastructure,
    .parcing-space,
    .separate-work-place,
    .chating-room,
    .moder-kitchen,
    .value-for-money {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        border: 1px solid black;
        z-index: 1;
    }

    .second-section-with-desccription {
        display: flex;
        flex-direction: row;
        padding: 20px;


    }

    .second-section-with-desccription .first {
        display: flex;
        flex-direction: column;
    }

    .second-section-with-desccription .second {
        height: inherit;
        background-image: url(img/addition-advantage-photo.jpg);
        background-size: cover;
    }

    .comfort,
    .reception {

        display: flex;
        justify-content: end;
    }

    .security div,
    .comfort div,
    .kitchen div,
    .reception div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border: 1px solid black;


    }

    .additiond-p {

        font-weight: bold;

    }

    .accordion {
        margin: 60px auto;
        width: inherit;

    }

    .accordion li {
        list-style: none;
        width: 100%;
        margin: 20px;
        padding: 10px;
        border-radius: 8px;
        background-color: #EDAB03;
        box-shadow: 6px 6px 10px -1px rgba(0, 0, 0, 0.15),
            -6px -6px 10px -1px rgba(255, 255, 255, 0.7);
    }

    .accordion li label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    label::before {
        content: '+';

    }

    input[type="radio"] {
        display: none;
    }

    .accordion .content {
        color: #555;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s, padding 0.5s;

    }

    .accordion input[type="radio"]:checked+label::before {
        content: '-';
    }

    .hidden {
        opacity: 0;
        transform: translateX(-100%);
        transition: all 1s;
    }

    .show {
        opacity: 1;
        transform: translateX(0);
    }

    .items-container:nth-child(3) {
        transition-delay: 200ms;
    }

    .items-container:nth-child(4) {
        transition-delay: 400ms;
    }

    .items-container:nth-child(5) {
        transition-delay: 600s;
    }

    .items-container:nth-child(6) {
        transition-delay: 800ms;
    }

    .items-container:nth-child(7) {
        transition-delay: 900ms;
    }

    .items-container:nth-child(8) {
        transition-delay: 1000ms;
    }

    .items-container:nth-child(9) {
        transition-delay: 1200ms;
    }

    .items-container:nth-child(10) {
        transition-delay: 1400ms;
    }

    /* General Style-end */
    /* ------------------------------------------------------------- */
    /* ------------------------------------------------------------- */
    /* ------------------------------------------------------------- */
    /* ------------------------------------------------------------- */



    @media screen and (min-width:420px) and (max-width:839px) {
        .page {
            width: 420px;
            height: 500px;
            background-color: white;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }

        .first-section-header-why {
            width: 100%;
            height: 25vh;
        }

        .first-section-header-why .scroll div {
            font-size: 2em;
            font-weight: 500;
        }

        .first-section-header-why .scroll.text1 {
            transform: rotate(30deg) translateY(150px) translateX(-150px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text2 {
            transform: rotate(-25deg) translateY(-80px) translateX(-150px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text3 {
            transform: rotate(25deg) translateY(250px) translateX(-150px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text4 {
            transform: rotate(-2deg) translateY(-100px) translateX(-150px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text5 {
            transform: rotate(-30deg) translateY(100px) translateX(-100px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .advantages-items {
            width: 420px;
            margin-top: 35px;
        }

        .decoration-div {
            width: 420px;
            height: 50px;
            border-radius: 10px;
        }

        .items-container {
            width: 420px;
        }

        .internet-container,
        .event-room,
        .infrastructure,
        .parcing-space,
        .separate-work-place,
        .chating-room,
        .moder-kitchen,
        .value-for-money {
            height: 70px;
            width: 70px;
            margin: 3px;
            border-radius: 7px;
            z-index: 1;
        }

        .internet-container img,
        .event-room img,
        .infrastructure img,
        .parcing-space img,
        .separate-work-place img,
        .chating-room img,
        .moder-kitchen img,
        .value-for-money img {
            height: 30px;
            width: 30px;
        }

        .second-section-with-desccription {
            width: 100%;
            margin: 20px 0 20px 0;
        }

        .second-section-with-desccription .first {
            width: 60%;
            margin-right: 5px;
        }

        .second-section-with-desccription .second {
            width: 40%;
            margin-left: 7px;
        }

        .second-section-with-desccription .second {
            width: 40%;
            margin-left: 3px;
        }

        .security,
        .comfort,
        .kitchen,
        .reception {
            width: 100%;
            height: 150px;
            font-size: 10px;
            margin: 5px;
        }

        .security div,
        .comfort div,
        .kitchen div,
        .reception div {
            width: 150px;
            height: 150px;
            padding: 25px;
            border-radius: 5px;


        }

        .additiond-p {
            font-size: 10px;
            margin-bottom: 5px;
        }

        .accordion {
            margin: 25px auto;
        }

        .accordion li {
            width: 100%;
            margin: 10px;
            padding: 3px;
            border-radius: 2px;
        }


        .accordion li label {
            padding: 5px;
            font-size: 10px;
            font-weight: 300;
        }

        label::before {
            content: '+';
            margin-right: 5px;
            font-size: 10px;
            font-weight: 300;

        }

        .accordion .content {

            padding: 0 5px;
            line-height: 15px;

        }

        .accordion input[type="radio"]:checked+label+.content {
            max-height: 250px;
            padding: 5px 5px 20px;
        }

        .accordion-menu .title {
            font-size: 15px;
        }

        .accordion .content p {
            font-size: 10px;
        }


    }

    @media screen and (min-width:840px) and (max-width:1023px) {
        .page {
            width: 840px;
            height: 500px;
        }

        .first-section-header-why {
            width: 100%;
            height: 30vh;
        }

        .first-section-header-why .scroll div {
            font-size: 2em;
            font-weight: 600;
        }

        .first-section-header-why .scroll.text1 {
            transform: rotate(30deg) translateY(150px) translateX(-150px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text2 {
            transform: rotate(-25deg) translateY(-80px) translateX(-150px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text3 {
            transform: rotate(25deg) translateY(250px) translateX(-150px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text4 {
            transform: rotate(-2deg) translateY(-100px) translateX(-150px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text5 {
            transform: rotate(-30deg) translateY(100px) translateX(-100px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .advantages-items {
            width: 840px;
            margin-top: 40px;
        }

        .decoration-div {
            width: 800px;
            height: 70px;
            border-radius: 13px;
        }

        .items-container {
            width: 800px;
        }

        .internet-container,
        .event-room,
        .infrastructure,
        .parcing-space,
        .separate-work-place,
        .chating-room,
        .moder-kitchen,
        .value-for-money {
            height: 100px;
            width: 100px;
            margin: 3px;
            border-radius: 10px;
            z-index: 1;
        }

        .second-section-with-desccription {
            width: 100%;
            margin: 20px 0 20px 0;
        }

        .second-section-with-desccription .first {
            width: 60%;
        }

        .second-section-with-desccription .second {
            width: 40%;
            margin-left: 4px;
        }

        .second-section-with-desccription .second {
            width: 40%;
            margin-left: 5px;
        }

        .security,
        .comfort,
        .kitchen,
        .reception {
            width: 100%;
            height: 250px;
        }

        .security div,
        .comfort div,
        .kitchen div,
        .reception div {
            width: 250px;
            height: 250px;
            padding: 30px;
            border-radius: 10px;

        }

        .additiond-p {
            font-size: 25px;
            margin-bottom: 10px;
        }

        .accordion {
            margin: 50px auto;
        }

        .accordion li {
            width: 100%;
            margin: 17px;
            padding: 7px;
            border-radius: 5px;
        }


        .accordion li label {
            padding: 7px;
            font-size: 15px;
            font-weight: 400;
        }

        label::before {
            content: '+';
            margin-right: 7px;
            font-size: 20px;
            font-weight: 500;

        }

        .accordion .content {

            padding: 0 7px;
            line-height: 20px;

        }

        .accordion input[type="radio"]:checked+label+.content {
            max-height: 300px;
            padding: 7px 7px 27px;
        }

        .accordion-menu .title {
            font-size: 25px;
        }

        .accordion .content p {
            font-size: 20px;
        }

    }

    @media screen and (min-width:1024px) {
        .page {
            width: 1024px;
            background-color: white;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }

        /* ----------------------------------------- */
        /* ----------------------------------------- */
        /* ----------------------------------------- */
        .first-section-header-why {
            width: 100%;
            height: 40vh;
        }

        .first-section-header-why .scroll div {
            font-size: 3em;
            font-weight: 900;
        }

        .first-section-header-why .scroll.text1 {
            transform: rotate(30deg) translateY(200px) translateX(-200px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text2 {
            transform: rotate(-25deg) translateY(-120px) translateX(-200px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text3 {
            transform: rotate(25deg) translateY(300px) translateX(-200px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text4 {
            transform: rotate(-2deg) translateY(-150px) translateX(-200px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .first-section-header-why .scroll.text5 {
            transform: rotate(-20deg) translateY(50px) translateX(-50px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .advantages-items {
            width: 1024px;
            margin-top: 50px;
        }

        .decoration-div {
            width: 1000px;
            height: 90px;
            border-radius: 15px;
        }

        .items-container {
            width: 1000px;
        }

        .internet-container,
        .event-room,
        .infrastructure,
        .parcing-space,
        .separate-work-place,
        .chating-room,
        .moder-kitchen,
        .value-for-money {
            height: 150px;
            width: 150px;
            margin: 5px;
            border-radius: 15px;
            z-index: 1;
        }

        .second-section-with-desccription {
            width: 100%;
            margin: 25px 0 25px 0;
        }

        .second-section-with-desccription .first {
            width: 60%;
        }

        .second-section-with-desccription .second {
            width: 40%;
            margin-left: 5px;
        }

        .security,
        .comfort,
        .kitchen,
        .reception {
            width: 100%;
            height: 300px;
        }

        .security div,
        .comfort div,
        .kitchen div,
        .reception div {
            width: 300px;
            height: 300px;
            padding: 35px;
            border-radius: 15px;
            background-color: whitesmoke;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

        }

        .additiond-p {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .accordion {
            margin: 60px auto;
        }

        .accordion li {
            width: 90%;
            margin: 20px;
            padding: 10px;
            border-radius: 8px;
        }


        .accordion li label {
            padding: 10px;
            font-size: 18px;
            font-weight: 500;
        }

        label::before {
            content: '+';
            margin-right: 10px;
            font-size: 18px;
            font-weight: 600;

        }

        .accordion .content {

            padding: 0 10px;
            line-height: 26px;

        }

        .accordion input[type="radio"]:checked+label+.content {
            max-height: 400px;
            padding: 10px 10px 20px;
        }

        .accordion-menu .title {
            font-size: 35px;
        }

        .accordion .content p {
            font-size: 18px;
        }
    }

    /* ########################################################## */
    /* ########################################################## */
    /* ########################################################## */
    /* ########################################################## */

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
</style>

<body>
    <div class="page">
        <section class="first-section-header-why ">
            <div class="scroll text1">

                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
            </div>
            <div class="scroll text2">

                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
            </div>
            <div class="scroll text3">

                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
            </div>
            <div class="scroll text4">

                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
            </div>
            <div class="scroll text5">

                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
                <div>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                    Чому варто обрати <span>Co-working Space???</span> Чому варто обрати <span>Co-working
                        Space???</span>
                </div>
            </div>

        </section>
        <section class="advantages-items">
            <div class="items-container">
                <div class="decoration-div"></div>

                <div class="internet-container hidden">
                    <img src="img/icons8-wi-fi-48.png" alt="wi-fi">
                </div>
                <div class="event-room hidden">
                    <img src="img/icons8-buildings-50.png" alt="buildings">
                </div>
                <div class="infrastructure hidden">
                    <img src="img/icons8-discussion-64.png" alt="discussion">
                </div>
                <div class="parcing-space hidden">
                    <img src="img/icons8-parking-64.png" alt="parking">
                </div>
                <div class="separate-work-place hidden">
                    <img src="img/icons8-workplace-50.png" alt="workplace">
                </div>
                <div class="chating-room hidden">
                    <img src="img/icons8-group-of-people-50.png" alt="group-of-people">
                </div>
                <div class="moder-kitchen hidden">
                    <img src="img/icons8-kitchen-62.png" alt="kitchen">
                </div>
                <div class="value-for-money hidden">
                    <img src="img/icons8-wallet-64.png" alt="wallet">
                </div>
            </div>

        </section>
        <section class="second-section-with-desccription hidden">
            <div class="first">
                <div class="security hidden">
                    <div>
                        <p class="additiond-p">Безпека</p>
                        <p>Саме з UStart Ви будете завжди у безпеці</p>
                        <ul>
                            <li>охорона 24/7</li>
                            <li>відеоспостереження</li>
                            <li>доступ до коворкінгу з 8:00 до 20:00 за допомогою картки</li>
                        </ul>

                    </div>

                </div>
                <div class="comfort hidden">
                    <div>
                        <p class="additiond-p">Комфорт</p>
                        <p>Комфорт на роботі - це надзвичайно важливо, тому:</p>

                        <ul>
                            <li>просторі зручні столи</li>
                            <li>ергономічні офісні крісла</li>
                            <li>високошвидкісний Інтернет</li>
                            <li>вентиляція та кондиціонування</li>

                        </ul>
                    </div>

                </div>
                <div class="kitchen hidden">
                    <div>
                        <p class="additiond-p">Кухня</p>
                        <p>Доступ до користування кухнею</p>
                        <ul>
                            <li>кава</li>
                            <li>чай</li>
                            <li>снеки</li>
                            <li>можливість користуватись кухонною технікою</li>
                        </ul>

                    </div>

                </div>
                <div class="reception hidden">
                    <div>
                        <p class="additiond-p">Рецепція та послуги</p>
                        <p>Усе необхідне для ефективної роботи</p>
                        <ul>
                            <li>друк</li>
                            <li>сканування</li>
                            <li>офісний інвентар</li>
                            <li>ваша кореспонденція на нашій рецепції</li>
                        </ul>

                    </div>

                </div>

            </div>
            <div class="second">

            </div>

        </section>
        <section class="accordion-menu">
            <p class="title">Найпоширеніші запитання</p>
            <ul class="accordion">
                <li class="hidden">
                    <input type="radio" name="accordion" id="first" checked>
                    <label for="first">Що входить до вартості оренди робочого місця?</label>
                    <div class="content">
                        <p>До вартості оренди входить повне облуговування роботи нашого офісного простору, зокрема:

                            Wi-Fi (швидкісний інтернет);
                            Meeting Rooms (безоплатно);
                            Lounge (можливісь зустрічі із відвідувачами);
                            Кухня, напої, снеки;
                            МФУ (роздрук, сканування);
                            Паркінг (гостьовий парікінг на 300 паркомісць);
                            Клінінг (доступних зон приміщення);
                            Безпека (централізована охорона та відеоспостереження).</p>
                    </div>
                </li>
                <li class="hidden">
                    <input type="radio" name="accordion" id="second">
                    <label for="second">Чи зможе працювати ваш офіс автономно?</label>
                    <div class="content">
                        <p>Так, ми маємо власний промисловий дизельний генератор 22 кВт потужності, розрахований на 250
                            кв.м. нашого простору.

                            Потужність нашого генератора дозволяє працювати одночасно усьому нашому обладнанню - світлу,
                            розеткам, кавомашині, електробатареям тощо.

                            Крім того, для встановлення генератора ми придбали окреме місце поруч із бізнес-центром.
                            Генератор підключений до нашої мережі внизу через електрощитову. Відтак, усе світло, розетки
                            та обладнання працюють у штатному режимі. Не потрібно використовувати жодних окремих
                            переносок.

                            При цьому, на 10му поверсі взагалі не чути звуку роботи генератора.</p>
                    </div>
                </li>
                <li class="hidden">
                    <input type="radio" name="accordion" id="third">
                    <label for="third">Для кого?</label>
                    <div class="content">
                        <p>Наш робочий простір підійде для всіх. Починаючи від студентів і до компаній.</p>
                    </div>
                </li>
            </ul>


        </section>

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
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                console.log(entry)
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
                else {
                    entry.target.classList.remove('show');
                }
            });
        });
        const hiddenElements = document.querySelectorAll('.hidden');
        hiddenElements.forEach((el) => observer.observe(el));
    </script>
</body>

</html>