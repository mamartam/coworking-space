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

    <title>Приміщення</title>
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
        /* background-color: black; */
    }

    .page {
        background-color: white;
        /* background-color: white; */
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        width: 1024px;
        z-index: 2;

    }

    @keyframes moveBackground {
        from {
            background-position: 0 0, calc(var(--size) / 2) calc(var(--size) / 2);
        }

        to {
            background-position: 100px 100px, calc(var(--size) / 2 + 100px) calc(var(--size) / 2 + 100px);
        }
    }


    .hidden {
        opacity: 0;
        transition: all 0.5s;
        /* filter: blur(5px); */
        transform: translateX(-100%);
    }

    .hidden-2 {
        opacity: 0;
        transition: all 0.5s;
        /* filter: blur(5px); */
        transform: translateX(50%);
    }

    .show {
        opacity: 1;
        /* filter: blur(0); */
        transform: translateX(0);
    }

    ul {
        display: flex;
        margin: 0;
        list-style-type: none;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .scheme-of-working-place {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        background-color: white;



    }
    .scheme img {
        width: 700px;
        height: 400px;
        position: relative;
        z-index: 5;
    }

    .scheme-description {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .scheme-description div {
        background-color: white;
    }

    /* ################################################## */
    /* ################################################## */
    /* ################################################## */
    .second-part-fancy-options {
        display: flex;
        flex-direction: column;
        margin: 20px 0 20px 0;
    }

    .first-fancy-option,
    .second-fancy-option,
    .third-fancy-option {
        display: flex;
        flex-direction: row;
        width: 1000px;
        height: 400px;
        padding: 15px;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .fancy-container1-1 {
        /* background-color: tomato; */
        width: 600px;
        height: 400px;
    }

    .kitchen-div {
        height: 200px;
        position: absolute;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2;
    }

    .kitchen-div p,
    .skype-room-div p,
    .personal-workspace-div p,
    .event-room-div p {
        font-size: 25px;
        color: #fff;
        /* -webkit-text-stroke: 2px #EDAB03; */


    }

    .skype-room-div,
    .personal-workspace-div,
    .event-room-div,
    .personal-workspace-div {
        z-index: 2;
        cursor: pointer;

    }

    .skype-room-div {
        height: 400px;
        position: absolute;
        width: 400px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .personal-workspace-div {
        height: 400px;
        position: absolute;
        width: 400px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .event-room-div {
        height: 200px;
        position: absolute;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;

    }


    .fancy-container1-2 {
        /* background-color: violet; */
        width: 200px;
        height: 400px;

    }

    .fancy-container1-3,
    .fancy-container2-1 {
        /* background-color: rgb(100, 26, 100); */
        width: 200px;
        height: 400px;
        display: flex;

        justify-content: center;
        align-items: end;


    }

    .kitchen-blured,
    .fancy-container3-2 {
        display: flex;
        justify-content: end;
        align-items: center;

    }

    .fancy-container1-1,
    .fancy-container3-1 {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .div1-1 {
        /* background-color: rgb(100, 26, 100); */
        background-image: url(img/room-gallery-1.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        width: 400px;
        height: 400px;
        border-radius: 50%;


    }

    .div1-2 {
        /* background-color: tomato;
     */
        background-image: url(img/room-gallery-3.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        width: 200px;
        height: 200px;
        border-radius: 50%;


    }

    .div1-3 {
        /* background-color: violet; */
        background-image: url(img/room-gallery-5.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        filter: blur(3px);
        width: 200px;
        height: 200px;
        border-radius: 50%;


    }

    /* <!-- ########################################### --> */
    .fancy-container2-1 {
        /* background-color: rgb(164, 238, 130); */
        width: 200px;
        height: 400px;

    }

    .fancy-container2-2 {
        /* background-color: rgb(112, 100, 216); */
        width: 600px;
        height: 400px;

    }

    .fancy-container2-3 {
        /* background-color: rgb(206, 177, 206); */
        width: 200px;
        height: 400px;

    }



    .div2-1 {
        /* background-color: violet; */
        background-image: url(img/room-gallery-10.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        width: 200px;
        height: 200px;
        border-radius: 50%;

    }

    .div2-2 {
        /* background-color: rgb(100, 26, 100); */
        background-image: url(img/room-gallery-9.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        filter: blur(3px);
        width: 400px;
        height: 400px;
        border-radius: 50%;

    }

    .div2-3 {
        /* background-color: violet; */
        background-image: url(img/room-gallery-8.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        width: 200px;
        height: 200px;
        border-radius: 50%;

    }

    /* ###################################### */
    .fancy-container3-1 {
        /* background-color:peru; */


        width: 600px;
        height: 400px;

    }

    .fancy-container3-2 {
        /* background-color:saddlebrown; */

        width: 200px;
        height: 400px;

    }

    .fancy-container3-3 {
        /* background-color:skyblue; */
        width: 200px;
        height: 400px;

    }

    .div3-1 {
        /* background-color: rgb(100, 26, 100); */
        background-image: url(img/personal-workplace-cover.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        filter: blur(3px);
        width: 400px;
        height: 400px;
        border-radius: 50%;

    }

    .div3-2 {
        /* background-color: rgb(32, 100, 26); */
        background-image: url(img/event-room-cover.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        filter: blur(2px);
        width: 200px;
        height: 200px;
        border-radius: 50%;

    }

    .div3-3 {
        background-image: url(img/room-gallery-6.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
        width: 200px;
        height: 200px;
        border-radius: 50%;

    }














    /* ####################################################### */

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

    /* ################################################################################################ */
    /* ################################################################################################ */
    /* ################################################################################################ */
    /* ################################################################################################ */

    .kitchenPopUpContainer,
    .SkepeRoomPopUpContainer,
    .PersonalWorkSpacePopUpContainer,
    .EventRoomPopUpContainer {
        background-color: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(3px);
        width: 100%;
        height: 100%;
        top: 0;
        right: 0;
        display: none;
        justify-content: center;
        align-items: center;
        position: fixed;
        z-index: 4;
    }

    .kitchenPopUp,
    .SkypePopUp,
    .PersonalWorkSpacePopUp,
    .EventRoomPopUp {
        display: none;
        /* background-color: rgb(155, 50, 50); */
        background-color: black;
        /* width: 700px; */
        border-radius: 10px;
        /* height: 400px; */
        box-sizing: border-box;
        position: relative;
        z-index: 3;
        padding: 40px;

    }

    .close {
        width: 50px;
        height: 50px;
        position: absolute;
        top: 1px;
        right: 1px;
        /* background-color: #eee; */
        border-radius: 50%;
        cursor: pointer;
    }

    .container {
        padding: 1rem;
    }

    .slider-wrapper {
        position: relative;
        max-width: 40rem;
        margin: 0 auto;
    }

    .slider {
        display: flex;
        aspect-ratio: 14/7;
        overflow-x: hidden;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
    }

    .slider img {
        flex: 1 0 100%;
        scroll-snap-align: start;
        object-fit: cover;
    }

    #slide-1,
    #slide-2,
    #slide-3 {
        width: 400px;
        height: 300px;
    }

    #slider-1,
    #slider-2 {
        width: 400px;
        height: 300px;
    }

    #sliderr-1,
    #sliderr-2 {
        width: 400px;
        height: 300px;
    }


    .slider-nav {
        display: flex;
        column-gap: 1rem;
        position: absolute;
        bottom: 46px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;

    }

    .slider-nav a {
        width: 0.5rem;
        height: 0.5rem;
        border-radius: 50%;
        background-color: #EDAB03;
        opacity: 0.75;
        transition: opacity ease 250ms;
    }

    .slider-nav a:hover {
        opacity: 1;
    }
</style>

<body>
    <div class="break-point"></div>
    <div class="page">

        <div class="scheme-of-working-place">
            <div class="scheme">
                <div><img class="hidden" src="img/rooms-scheme.png" alt="rooms-scheme"></div>

            </div>
            <div class="scheme-description">
                <div class="hidden-2">
                    <p>Схема розміщення робочих місць</p>
                    <p>Коворкінг ділиться на декілька зон. Перша - персональні робочі місця. Друга - Skeperoom(Meeting
                        room). Третя - кімнати для переговорів. Четерта - івент зал.
                        також є зона для відпочинку та кухня.
                    </p>
                </div>

            </div>
        </div>
        <div class="second-part-fancy-options">

            <!-- ################################################# -->
            <div class="first-fancy-option">
                <div>
                    <div class="fancy-container1-1">
                        <div class="usual-div1-1">
                            <div class="div1-1 hidden"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="fancy-container1-2">
                        <div class="usual-div1-2">
                            <div class="div1-2 hidden-2"></div>
                        </div>


                    </div>
                </div>
                <div>
                    <div class="fancy-container1-3">

                        <div class="kitchen-div">
                            <p class="hidden">Кухня</p>
                        </div>
                        <div class="kitchen-blured">
                            <div class="div1-3" class="hidden">

                            </div>

                        </div>

                    </div>
                </div>

            </div>




            <!-- ########################################### -->
            <div class="second-fancy-option">
                <div>
                    <div class="fancy-container2-1">
                        <div class="usual-div2-1">
                            <div class="div2-1 hidden"></div>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="fancy-container2-2">
                        <div class="skype-room-div">
                            <p class="hidden">Skype-room</p>
                        </div>
                        <div class="skype-room-blured">
                            <div class="div2-2 hidden"></div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="fancy-container2-3">
                        <div class="usual-div-2-3">
                            <div class="div2-3 hidden-2"></div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- ########################################### -->





            <div class="third-fancy-option">
                <div>
                    <div class="fancy-container3-1">
                        <div class="personal-workspace-div">
                            <p class="hidden">Особисте робоче місце</p>
                        </div>
                        <div class="personal-workspace-blured">
                            <div class="div3-1 hidden"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="fancy-container3-2">
                        <div class="event-room-div">
                            <p class="hidden-2">Event room</p>
                        </div>
                        <div class="event-room-blured">
                            <div class="usual-div3-2">
                                <div class="div3-2 hidden-2"></div>

                            </div>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="fancy-container3-3">
                        <div class="usual-div3-3">
                            <div class="div3-3 hidden-2"></div>
                        </div>
                    </div>
                </div>

            </div>


        </div>



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
    <div class="kitchenPopUpContainer exit">
        <div class="kitchenPopUp">

            <div class="container">
                <img src="img/click-close.png" alt="closeButton" class="close">
                <div class="slider-wrapper">
                    <div class="slider">
                        <img id="slide-1" src="img/kitchen-coffe-machine.jpg" alt="kitchen-coffe-machine">
                        <img id="slide-2" src="img/kitchen-equipment.jpg" alt="kitchen-equipment">
                        <img id="slide-3" src="img/kitchen-oven.jpg" alt="kitchen-oven">
                    </div>
                </div>
                <div class="slider-nav">
                    <a href="#slide-1"></a>
                    <a href="#slide-2"></a>
                    <a href="#slide-3"></a>
                </div>
            </div>

        </div>
    </div>
    <!-- ###################################################### -->
    <div class="SkepeRoomPopUpContainer exit">
        <div class="SkypePopUp">

            <div class="container">
                <img src="img/click-close.png" alt="closeButton" class="close">
                <div class="slider-wrapper">
                    <div class="slider">
                        <img id="slider-1" src="img/sr-1.jpg" alt="">
                        <img id="slider-2" src="img/sr-2.jpg" alt="">
                    </div>
                </div>
                <div class="slider-nav">
                    <a href="#slider-1"></a>
                    <a href="#slider-2"></a>
                </div>
            </div>

        </div>
    </div>
    <!-- ###################################################### -->
    <div class="PersonalWorkSpacePopUpContainer exit">
        <div class="PersonalWorkSpacePopUp">

            <div class="container">
                <img src="img/click-close.png" alt="closeButton" class="close">
                <div class="slider-wrapper">
                    <div class="slider">
                        <img id="sliderr-1" src="img/wp-1.jpg" alt="">
                        <img id="sliderr-2" src="img/wp-2.jpg" alt="">
                    </div>
                </div>
                <div class="slider-nav">
                    <a href="#sliderr-1"></a>
                    <a href="#sliderr-2"></a>
                </div>
            </div>

        </div>
    </div>
    <!-- ###################################################### -->
    <div class="EventRoomPopUpContainer exit">
        <div class="EventRoomPopUp">

            <div class="container">
                <img src="img/click-close.png" alt="closeButton" class="close">
                <div class="slider-wrapper">
                    <div class="slider">
                        <img id="sliderrr-1" src="img/er-1.jpg" alt="">
                    </div>
                </div>
                <div class="slider-nav">
                    <a href="#sliderrr-1"></a>
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
    <script>
        $(document).ready(function () {
            $(".fancy-container1-3").click(function () {
                $(".kitchenPopUpContainer").css("display", "flex");
                $(".kitchenPopUp").css("display", "flex");
            });
            $(".fancy-container2-2").click(function () {
                $(".SkepeRoomPopUpContainer").css("display", "flex");
                $(".SkypePopUp").css("display", "flex");
            });
            $(".fancy-container3-1").click(function () {
                $(".PersonalWorkSpacePopUpContainer").css("display", "flex");
                $(".PersonalWorkSpacePopUp").css("display", "flex");
            });
            $(".fancy-container3-2").click(function () {
                $(".EventRoomPopUpContainer").css("display", "flex");
                $(".EventRoomPopUp").css("display", "flex");
            });

            $(".close").click(function () {
                $(".kitchenPopUpContainer").css("display", "none");
                $(".kitchenPopUp").css("display", "none");
            });
            $(".close").click(function () {
                $(".SkepeRoomPopUpContainer").css("display", "none");
                $(".SkypePopUp").css("display", "none");
            });
            $(".close").click(function () {
                $(".PersonalWorkSpacePopUpContainer").css("display", "none");
                $(".PersonalWorkSpacePopUp").css("display", "none");
            });
            $(".close").click(function () {
                $(".EventRoomPopUpContainer").css("display", "none");
                $(".EventRoomPopUp").css("display", "none");
            });
        });

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
        const hiddenElements = document.querySelectorAll('.hidden, .hidden-2');
        hiddenElements.forEach((el) => observer.observe(el));
    </script>

</body>

</html>