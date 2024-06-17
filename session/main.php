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
    <title>Co-Working Space</title>
</head>
<style>
    .login-for-administrator {
        color: white;
    }



    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* special */
    ul {
        display: flex;
        margin: 0;
        list-style-type: none;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .nav-list-link {
        position: relative;
        transition: all .25s ease;
    }

    .nav-list-link::after {
        content: "";
        background-color: #fbfbfb;
        height: 2px;
        width: 100%;
        position: absolute;
        bottom: -8px;
        left: 0;
        transform: scaleX(0);
        transition: all .25s ease;
    }

    .nav-list-link:hover {
        color: #fbfbfb;
    }

    .nav-list-link:hover::after {
        transform: scaleX(1);
    }

    .navContainer ul li {
        color: #EDAB03;
        text-transform: uppercase;

    }

    body {
        display: flex;
        justify-content: center;
        background-color: whitesmoke;
    }

    .header {
        width: inherit;
        background-image: url(img/main.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50%;

    }

    nav {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        background-color: black;
        width: inherit;

    }

    .logoContainer {
        display: flex;
        align-items: center;
    }

    .navContainer {
        display: flex;
        align-items: center;
    }

    .navContainer ul {
        display: flex;
        flex-direction: row;

    }

    .navContainer ul li {
        list-style-type: none;
        text-transform: uppercase;
    }

    .navContainer ul li a {
        text-decoration: none;
        /* color: #EDAB03; */

    }

    .buttonRegisterContainer {
        display: flex;
        align-items: center;
    }

    .read-more-btn {
        color: #EDAB03;
        cursor: pointer;
    }

    .read-more-text {
        display: none;
    }

    .read-more-text--show {
        display: inline;
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

    /* ---------------------------- */

    .smallDescriptionAndButton {
        display: flex;

    }

    .main-description {
        display: flex;
        flex-direction: column;
        align-items: end;
    }

    .description {
        text-align: end;
        color: white;
    }

    .smallDescriptionAndButton {
        display: flex;

    }

    .main-description {
        display: flex;
        flex-direction: column;
        align-items: end;
    }

    .description {
        text-align: end;
        color: white;
    }

    .photoAboutUs {
        width: 30%;
        background-image: url(img/img-about-us-section.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: 50%;
    }

    .breakPoint {
        width: inherit;
        height: 50px;
        background-color: white;
    }

    @keyframes moveBackground {
        from {
            background-position: 0 0, calc(var(--size) / 2) calc(var(--size) / 2);
        }

        to {
            background-position: 100px 100px, calc(var(--size) / 2 + 100px) calc(var(--size) / 2 + 100px);
        }
    }

    .aboutUsSection {
        width: inherit;
        display: flex;
        flex-direction: row;
    }

    .creatorPhoto {
        display: flex;
        justify-content: center;
        filter: drop-shadow(1px 1px 20px #EDAB03);
    }

    .informationAboutCreator {
        display: flex;
        flex-direction: column;
    }

    .hidden {
        opacity: 0;
        transition: all 0.5s;
        /* filter: blur(5px); */
        transform: translateX(-15%);
    }

    .hidden-2 {
        opacity: 0;
        transition: all 0.5s;
        /* filter: blur(5px); */
        transform: translateX(15%);
    }

    .show {
        opacity: 1;
        /* filter: blur(0); */
        transform: translateX(0);
    }


    /* -------------------------------------------------------- */
    @media screen and (min-width:420px) and (max-width:839px) {
        .page {
            width: 420px;
            background-color: white;
            z-index: 2;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        }

        .header {
            height: 300px;
        }

        /* nav {
    height: 50px;
} */
        nav li {
            display: none;
        }

        .logoContainer img {
            height: 5px;
            width: 10px;
        }


        /* ----------button-------- */
        button {
            border-radius: 2rem;
            width: 70px;
            height: 12px;
            font-size: 6px;
        }

        /* ---------------------- */
        .main-description {
            margin-top: 135px;
        }

        .description {
            font-size: 12.5px;
            margin-right: 50px;
        }

        .order-button {
            margin-right: 15px;

        }

        .main-description {
            margin-top: 130px;
        }

        .description {
            font-size: 12.5px;
            margin-right: 50px;
        }

        .order-button {
            margin-right: 50px;
        }


        .descriptionAboutUs {
            width: 70%;
            height: 600px;
        }



        .informationAboutCompane {
            margin: 9px;
        }

        .informationAboutCompane p {
            font-size: 7px;
            text-align: center;
        }

        .informationAboutCreator .information p {
            font-size: 7px;
            text-align: justify;
        }

        .informationAboutCreator {
            display: flex;
            margin: 8px;
        }

        .creatorPhoto img {
            width: 100px;
            height: 150px;
            border-radius: 7.5px;
        }

        .information {
            padding: 2rem;
            border-radius: 2px;
            line-height: 1rem;

        }


        .smallContainer {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;


        }

        .smallContainer div p {
            text-transform: uppercase;
            font-size: 7px;
        }

        .imagineSection {
            display: grid;
            justify-content: center;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;

        }

        .imagineSection img {
            width: 200px;
            height: 150px;
        }


        /* -------------------------------------------------------------- */
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









    @media screen and (min-width:840px) and (max-width:1023px) {
        .page {
            width: 840px;
            background-color: white;
            z-index: 2;
        }

        .header {
            height: 450px;
        }

        nav {
            height: 50px;
        }

        .logoContainer img {
            height: 25px;
            width: 50px;
        }

        .navContainer ul li {
            margin-right: 15px;
            font-size: 8px;

        }

        /* ----------button-------- */
        button {
            border-radius: 2rem;
            width: 130px;
            height: 24px;
            font-size: 12px;
        }

        /* ---------------------- */
        .main-description {
            margin-top: 135px;
        }

        .description {
            font-size: 25px;
            margin-right: 100px;
        }

        .order-button {
            margin-right: 30px;

        }

        .main-description {
            margin-top: 260px;
        }

        .description {
            font-size: 25px;
            margin-right: 100px;
        }

        .order-button {
            margin-right: 100px;

        }

        .hiddenMenu {
            display: none;
        }

        /* ---------------------------------------------------------- */


        .descriptionAboutUs {
            width: 70%;
            height: 900px;
        }

        .informationAboutCompane {
            margin: 17px;
        }

        .informationAboutCompane p {
            font-size: 15px;
            text-align: center;
        }

        .informationAboutCreator .information p {
            font-size: 15px;
            text-align: justify;
        }

        .informationAboutCreator {
            display: flex;
            margin: 13px;
        }


        .creatorPhoto img {
            width: 150px;
            height: 230px;
            border-radius: 7.5px;
        }

        .information {
            padding: 2rem;
            border-radius: 2px;
            line-height: 1.4rem;

        }

        /* ---------------------------------------------------- */
        .smallContainer div p {
            font-size: 15px;
            text-transform: uppercase;
        }

        .smallContainer {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }

        .imagineSection {
            display: grid;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .imagineSection img {
            width: 400px;
            height: 300px;
        }

        /* ---------------------------------------------------- */
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


    }
























    @media screen and (min-width:1024px) {
        .page {
            width: 1024px;
            background-color: white;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            z-index: 2;
        }

        .header {
            height: 500px;

        }

        nav {
            height: 100px;
        }

        .logoContainer img {
            height: 50px;
            width: 100px;

        }

        .navContainer ul li {
            margin-right: 10px;
            font-size: 16px;

        }

        /* ----------button */
        button {
            border-radius: 4rem;
            width: 150.04px;
            height: 42.66px;
        }

        /* ---------------------- */
        .smallDescriptionAndButton {
            display: flex;

        }

        .main-description {
            display: flex;
            flex-direction: column;
            align-items: end;
            margin-top: 270px;
        }

        .description {
            font-size: 25px;
            text-align: end;
            color: white;
            margin-right: 130px;
        }

        .main-description .order-button {
            margin-right: 130px;
        }

        /* .order-button {
        margin-right: 130px;

    } */

        .hiddenMenu {
            display: none;
        }


        /* ------------------------------------------------------------- */


        .descriptionAboutUs {
            width: 70%;
            height: 1000px;
        }

        .informationAboutCompane {
            margin: 25px;
        }

        .informationAboutCompane p {
            font-size: 20px;
            text-align: center;
        }

        .informationAboutCreator .information p {
            font-size: 20px;
            text-align: justify;
        }

        .informationAboutCreator {
            display: flex;
            margin: 25px;
        }



        .creatorPhoto img {
            width: 200px;
            height: 300px;
            border-radius: 15px;
        }

        .information {
            padding: 2rem;
            border-radius: 2px;
            line-height: 1.4rem;

        }

        /* ------------------------------------------------------------------------ */
        .smallContainer {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;


        }

        .smallContainer div p {
            text-transform: uppercase;
            font-size: 20px;
        }


        /* ----------------------------------------------------- */


        .imagineSection {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 500px;
            /* background-color: aquamarine; */
        }

        #slider {
            margin: 0 auto;
            width: 700px;
            max-width: 100%;
            text-align: center;
        }

        #slider input[type=radio] {
            display: none;
        }

        #slider label {
            cursor: pointer;
            text-decoration: none;
        }

        #slides {
            padding: 10px;
            /* border: 3px solid #ccc; */
            /* background: #fff; */
            position: relative;
            z-index: 1;
        }

        #overflow {
            width: 100%;
            overflow: hidden;
        }

        #slide1:checked~#slides .inner {
            margin-left: 0;
        }

        #slide2:checked~#slides .inner {
            margin-left: -100%;
        }

        #slide3:checked~#slides .inner {
            margin-left: -200%;
        }

        #slide4:checked~#slides .inner {
            margin-left: -300%;
        }

        #slides .inner {
            transition: margin-left 800ms cubic-bezier(0.770, 0.000, 0.175, 1.000);
            width: 400%;
            line-height: 0;
            height: 450px;
        }

        #slides .slide {
            width: 25%;
            float: left;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            color: #fff;
        }

        .slide-content img {
            width: 700px;
            height: 500px;
        }

        /* #slides .slide_1 {
        background: #00171F;
    }

    #slides .slide_2 {
        background: #003459;
    }

    #slides .slide_3 {
        background: #007EA7;
    } */

        #slides .slide_4 {
            background: #EDAB03;
        }

        #controls {
            margin: -180px 0 0 0;
            width: 100%;
            height: 50px;
            z-index: 3;
            position: relative;
        }

        #controls label {
            transition: opacity 0.2s ease-out;
            display: none;
            width: 50px;
            height: 50px;
            opacity: .4;
        }

        #controls label:hover {
            opacity: 1;
        }

        #slide1:checked~#controls label:nth-child(2),
        #slide2:checked~#controls label:nth-child(3),
        #slide3:checked~#controls label:nth-child(4),
        #slide4:checked~#controls label:nth-child(1) {
            background: url(https://image.flaticon.com/icons/svg/130/130884.svg) no-repeat;
            float: right;
            margin: 0 -50px 0 0;
            display: block;
        }

        #slide1:checked~#controls label:nth-last-child(2),
        #slide2:checked~#controls label:nth-last-child(3),
        #slide3:checked~#controls label:nth-last-child(4),
        #slide4:checked~#controls label:nth-last-child(1) {
            background: url(https://image.flaticon.com/icons/svg/130/130882.svg) no-repeat;
            float: left;
            margin: 0 0 0 -50px;
            display: block;
        }

        #bullets {
            margin: 150px 0 0;
            text-align: center;
        }

        #bullets label {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 100%;
            background: #EDAB03;
            margin: 0 10px;
        }

        #slide1:checked~#bullets label:nth-child(1),
        #slide2:checked~#bullets label:nth-child(2),
        #slide3:checked~#bullets label:nth-child(3),
        #slide4:checked~#bullets label:nth-child(4) {
            background: #444;
        }

        @media screen and (max-width: 900px) {

            #slide1:checked~#controls label:nth-child(2),
            #slide2:checked~#controls label:nth-child(3),
            #slide3:checked~#controls label:nth-child(4),
            #slide4:checked~#controls label:nth-child(1),
            #slide1:checked~#controls label:nth-last-child(2),
            #slide2:checked~#controls label:nth-last-child(3),
            #slide3:checked~#controls label:nth-last-child(4),
            #slide4:checked~#controls label:nth-last-child(1) {
                margin: 0;
            }

            #slides {
                max-width: calc(100% - 140px);
                margin: 0 auto;
            }
        }




        /* .imagineSection{
        padding: 2rem;
    }
    .slider-wrapper{
        position: relative;
        max-width: 48rem;
        margin: 0 auto;


    }
    .slider{
        display: flex;
        aspect-ratio: 16/9;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
    }
    .slider div{
        flex: 1 0 100%;
        object-fit: cover;
        scroll-snap-align: start;

        
        width: 500px;
        height: 300px;
        background-color: aqua;
        border: 2px dotted black;
    }
    .slider-nav{
        display: flex;
        column-gap: 1rem;
        position: absolute;
        bottom: 1.25rem;
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
    } */



        /* ----------------------------------------------------- */
        .reviews {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button-review {
            --primary-color: #EDAB03;
            --secondary-color: #fff;
            --hover-color: #111;
            --arrow-width: 10px;
            --arrow-stroke: 2px;
            box-sizing: border-box;
            border: 0;
            border-radius: 20px;
            color: var(--secondary-color);
            padding: 1em 1.8em;
            background: var(--primary-color);
            display: flex;
            /* transition: 0.2s background; */
            align-items: center;
            gap: 0.6em;
            font-weight: bold;
        }

        .button-review .arrow-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button-review .arrow {
            margin-top: 1px;
            width: var(--arrow-width);
            background: var(--primary-color);
            height: var(--arrow-stroke);
            position: relative;
            transition: 0.2s;
        }

        .button-review .arrow::before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            border: solid var(--secondary-color);
            border-width: 0 var(--arrow-stroke) var(--arrow-stroke) 0;
            display: inline-block;
            top: -3px;
            right: 3px;
            transition: 0.2s;
            padding: 3px;
            transform: rotate(-45deg);
        }

        .button-review:hover {
            background-color: var(--hover-color);
        }

        .button-review:hover .arrow {
            background: var(--secondary-color);
        }

        .button-review:hover .arrow:before {
            right: 0;
        }


        /* ---------------------------------------------------- */
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
    }

    /* ------------------------------------------------------------------- */
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
    <div class="break-point"></div>
    <div class="page">
        <header class="header">
            <nav>
                <div class="logoContainer hidden">
                    <a href="main.php"><img src="img/logoCWSpace.png" alt="imagLogo"></a>

                </div>
                <div class="navContainer hidden">
                    <ul>
                        <li><a href="#aboutUsSection" class="nav-list-link">Про нас</a></li>
                        <li><a href="rooms.php" class="nav-list-link">Приміщення</a></li>
                        <li><a href="advantages.php" class="nav-list-link">Переваги</a></li>
                        <li><a href="#gallery" class="nav-list-link">Галерея</a></li>
                        <li><a href="rules.php" class="nav-list-link">Правила</a></li>
                        <li><a href="#footer" class="nav-list-link">Контакти</a></li>
                    </ul>

                </div>
                <div class="buttonRegisterContainer hidden-2">
                    <div class="order-button">
                        <button class="animated-button" type="button" onclick="gotoLink(this)"
                            value="logout.php">
                            <span class="text">Вийти</span>
                            <span class="circle"></span>
                        </button>

                    </div>
                </div>
                <div class="hiddenMenu">

                </div>
            </nav>
            <div class="main-description hidden-2">
                <div class="deskr">
                    <p class="description">Co-Working Space <br>твій простір для креативу тасамореалізації</p>
                </div>
                <div class="order-button">
                    <button class="animated-button" type="button" onclick="gotoLink(this)"
                        value="http://localhost/coworkingspace/session/calendar.php">
                        <span class="text">Забронювати</span>
                        <span class="circle"></span>
                    </button>
                </div>
            </div>
        </header>
        <div class="breakPoint">

        </div>
        <section class="aboutUsSection hidden" id="aboutUsSection">
            <div class="descriptionAboutUs">

                <div class="informationAboutCompane">
                    <p>Зручна організація робочого простору, можливість <br>
                        працювати як індивідуально так і цілою командою. <br>
                        Гарантуємо комфортне робоче місце, привітну атмосферу<br>
                        та весело проведений час у ігровій зоні. <br>
                    </p>
                </div>
                <div class="creatorPhoto">
                    <span class="span-mother">
                        <span><img src="img/creator.png" alt="creatorPhoto"></span>
                        <!-- <span><img src="img/creator.png" alt="creatorPhoto"></span>
                        <span><img src="img/creator.png" alt="creatorPhoto"></span> -->
                    </span>
                </div>

                <div class="informationAboutCreator">

                    <div class="information">
                        <p>Олександр Мельник народився у 1979 році в мальовничому місті Новояворівськ.
                            Здебільшого своєї дитячості він провів, вивчаючи світ та розвиваючись в креативному
                            середовищі, що визначило його подальший шлях.
                            Вже змалку Олександр виявив неабиякий інтерес до інновацій та технологій, які
                            об'єднували людей. Його цікавість до роботи у спільному просторі виникла внаслідок
                            власного досвіду, коли він самостійно розвивав свої ідеї та проекти.
                            Після завершення вищої освіти у сфері бізнесу та менеджменту, Олександр вирішив, що
                            бажає створити сприятливе середовище для місцевих підприємців та творчих
                            особистостей. Його власний досвід показав, наскільки важливо мати доступ до
                            спільного простору, де можна об'єднати індивідуальний талант та здійснювати
                            ефективну співпрацю.
                            <span class="read-more-text">
                                Таким чином, він вирішив заснувати Co-working Space у своєму рідному місті.
                                Олександр вірить, що спільнота та обмін ідеями є ключовими компонентами успіху, і
                                він хоче створити місце, де кожен може знаходити натхнення та підтримку від
                                однодумців.
                                Його мрія – надати робоче середовище, де творчі індивіди можуть зростати та
                                розвиватися разом, сприяючи інноваціям та розвитку бізнес-спільноти у
                                Новояворівську.
                            </span>
                        </p>
                        <span class="read-more-btn">Читати більше...</span>

                    </div>


                </div>

            </div>

            <div class="photoAboutUs">
                <!-- <img src="img/img-about-us-section.jpg" alt="img-about-us-section"> -->

            </div>
        </section>
        <div class="breakPoint">

        </div>
        <section class="smallContainer hidden">
            <div>
                <p>кількість кімнат - 8</p>

            </div>
            <div>
                <p>переговорних - 7</p>

            </div>
            <div>
                <p>кількість місць - 28</p>
            </div>


            <div class="order-button hidden-2">
                <button class="animated-button" type="button" onclick="gotoLink(this)"
                    value="http://localhost/coworkingspace/session/calendar.php">
                    <span class="text">Забронювати</span>
                    <span class="circle"></span>
                </button>
            </div>


        </section>
        <div class="breakPoint">

        </div>
        <section class="imagineSection hidden" id="gallery">
            <div id="slider">
                <input type="radio" name="slider" id="slide1" checked>
                <input type="radio" name="slider" id="slide2">
                <input type="radio" name="slider" id="slide3">
                <input type="radio" name="slider" id="slide4">
                <div id="slides">
                    <div id="overflow">
                        <div class="inner">
                            <div class="slide slide_1">
                                <div class="slide-content">
                                    <img src="img/gallery-2.jpg" alt="img1">
                                </div>
                            </div>
                            <div class="slide slide_2">
                                <div class="slide-content">
                                    <!-- <h2>Slide 2</h2> -->
                                    <img src="img/gallery-3.jpg" alt="img3">
                                </div>
                            </div>
                            <div class="slide slide_3">
                                <div class="slide-content">
                                    <!-- <h2>Slide 3</h2> -->
                                    <img src="img/gallery-4.jpg" alt="img4">
                                </div>
                            </div>
                            <div class="slide slide_4">
                                <div class="slide-content">
                                    <button class="button-review">
                                        <a
                                            href="rooms.php">Більше</a>
                                        <div class="arrow-wrapper">
                                            <div class="arrow"></div>

                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="controls">
                    <label for="slide1"></label>
                    <label for="slide2"></label>
                    <label for="slide3"></label>
                    <label for="slide4"></label>
                </div>
                <div id="bullets">
                    <label for="slide1"></label>
                    <label for="slide2"></label>
                    <label for="slide3"></label>
                    <label for="slide4"></label>
                </div>
            </div>





        </section>
        <div class="breakPoint">

        </div>
        <section class="reviews hidden-2">
            <button class="button-review">
                <a href="http://localhost/CoWorkingSpace/reviews/">Написати відгук</a>
                <div class="arrow-wrapper">
                    <div class="arrow"></div>

                </div>
            </button>

        </section>


        <div class="breakPoint">

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
                            <li><a class="footer-navigation-item"
                                    href="file:///I:/xampp/htdocs/CoWorkingSpace/mainFolder/mainPage/index.html#aboutUsSection">Про
                                    нас</a></li>
                            <li><a class="footer-navigation-item"
                                    href="file:///I:/xampp/htdocs/CoWorkingSpace/mainFolder/roomPage/index.html">Приміщення</a>
                            </li>
                            <li><a class="footer-navigation-item"
                                    href="file:///I:/xampp/htdocs/CoWorkingSpace/mainFolder/advantagesPage/index.html">Переваги</a>
                            </li>

                            <li><a class="footer-navigation-item"
                                    href="file:///I:/xampp/htdocs/CoWorkingSpace/mainFolder/mainPage/index.html#gallery">Галерея</a>
                            </li>
                            <li><a class="footer-navigation-item"
                                    href="http://localhost/CoWorkingSpace/mainFolder/rulesPage/rules.php">Правила</a>
                            </li>
                            <li><a class="footer-navigation-item"
                                    href="file:///I:/xampp/htdocs/CoWorkingSpace/mainFolder/mainPage/index.html#footer">Контакти</a>
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
        const hiddenElements = document.querySelectorAll('.hidden, .hidden-2');
        hiddenElements.forEach((el) => observer.observe(el));






        const parentContainer = document.querySelector('.informationAboutCreator');

        parentContainer.addEventListener('click', event => {
            const current = event.target;

            const isReadMoreBtn = current.classList.contains('read-more-btn');

            if (!isReadMoreBtn) return;

            const currentText = current.parentNode.querySelector('.read-more-text');
            currentText.classList.toggle('read-more-text--show');

            current.textContent = currentText.classList.contains('read-more-text--show') ?
                "Читати менше..." : "Читати більше...";
        });


        $(document).ready(function () {
            $('input[type="checkbox"]').change(function () {
                if (this.checked) {
                    $(this).next('form').css('display', 'block');
                } else {
                    $(this).next('form').css('display', 'none');
                }
            });
        });


        $(document).ready(function () {
            $('#rate-1').change(function () {
                if ($(this).is(':checked')) {
                    $('form header').prepend('<span>I do not like it</span>');
                }
            });
        });

        const btn = document.querySelector('button');
        const text = document.querySelector(".text");
        const widget = document.querySelector(".star-widget");
        const editBtn = document.querySelector(".edit");

        btn.addEventListener('click', (event) => {
            event.preventDefault();
            widget.style.display = "none";
            text.style.display = "block";
        });

        editBtn.addEventListener('click', (event) => {
            event.preventDefault();
            widget.style.display = "block";
            text.style.display = "none";
        });



        function gotoLink(link) {
            console.log(link.value);
            location.href = link.value;
            // window.open(link.value); // закоментовано або видалено
        }

        // document.addEventListener('DOMContentLoaded', () => {
        //     const buttonCallMe = document.getElementById('buttonCallMe');
        //     const poppup = document.getElementById('poppup');
        //     const closeBtn = document.getElementById('closeBtn');

        //     showPopupBtn.addEventListener('click', () => {
        //         popup.classList.add('showPoppup');
        //     });

        //     closePopupBtn.addEventListener('click', () => {
        //         popup.classList.remove('showPoppup');
        //     });

        //     // Optional: Close the popup when clicking outside of it
        //     window.addEventListener('click', (event) => {
        //         if (event.target === popup) {
        //             popup.classList.remove('showPoppup');
        //         }
        //     });
        // });







    </script>
</body>

</html>