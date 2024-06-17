<?php
include ('connection.php');

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];

    // Prepare and bind
    $stmt = $connection->prepare("INSERT INTO call_to_user (user_name, user_phone) VALUES (?, ?)");
    $stmt->bind_param("ss", $user_name, $user_phone);

    if ($stmt->execute()) {
        $msg = "Подія створена";
        header('location:rules.php');
        exit;
    } else {
        $msg = "Подія не створена: " . $stmt->error;
    }

    $stmt->close();
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
                            <label for="user_name"></label>
                            <input type="text" name="user_name" id="user_name" placeholder="Введіть своє ім'я" required>
                        </div>
                        <div class="select-box">
                            <div class="selected-option">
                                <div>
                                    <span class="iconify" data-icon="flag:gb-4x3"></span>
                                    <strong>+44</strong>
                                </div>
                                <label for="user_phone"></label>
                                <input type="tel" name="user_phone" id="user_phone" placeholder="Номер телефону"
                                    required>
                            </div>
                            <div class="options">
                                <input type="text" class="search-box" placeholder="Введіть назву країни">
                                <ol>
                                    <!-- Options will be populated here -->
                                </ol>
                            </div>
                            <input type="hidden" name="country_code" id="country_code">
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
                                    href="Efile:///I:/xampp/htdocs/CoWorkingSpace/mainFolder/rulesPage/index.html">Правила</a>
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

    <script src="script.js">
    </script>

</body>


</html>