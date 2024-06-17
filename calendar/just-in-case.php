<?php
include ('connection.php');
if (isset($_REQUEST['title'])) {
    $title = $_REQUEST['title'];
    $start_date = $_REQUEST['start_date'];
    $end_date = $_REQUEST['end_date'];
    $workspace_type = $_REQUEST['workspace_type']; // отримання типу робочого місця
    $username = $_REQUEST['username']; // отримання імені користувача
    $userphone = $_REQUEST['userphone']; // отримання номера телефону

    $insert_query = mysqli_query($connection, "INSERT INTO dt_event SET title='$title', start_date='$start_date', end_date='$end_date', workspace_type='$workspace_type',  username='$username', userphone='$userphone'");

    if ($insert_query) {
        header('location:just-in-case.php');

    } else {
        $msg = "Подія не створена";
    }
}


// $result = mysqli_query($connection, "SELECT * FROM dt_event ORDER BY id");
// while ($row = mysqli_fetch_array($result)) {
//     printf(
//         "<p><a href='update.php?id=%s' class='event-link'>%s - %s</a></p><hr>",
//         htmlspecialchars_decode($row["id"]),
//         htmlspecialchars_decode($row["title"]),
//         htmlspecialchars_decode($row["username"])
//     );
// }

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бронювання </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</head>
<style>
    .logout-popup {
        width: 100px;
        height: 100px;
        /* background-color: green; */
        position: fixed;
        z-index: 2;
        right: 50px;
        bottom: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        border: 1px solid black;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .page {
        width: 1024px;
    }

    h2 {
        text-transform: uppercase;
        text-align: center;
    }

    .fc-center {
        font-size: 25px;
        font-weight: bold;
    }

    .fc-axis.fc-time.fc-widget-content:before {
        content: attr(data-time);
        /* Display the formatted time */
    }

    .fc-day {
        cursor: pointer;
    }

    .fc-unthemed td.fc-today {
        background-color: #EDAB03;
    }

    .popup {
        height: 500px;
        width: 600px;
        background-color: black;
        padding: 20px;
        border-radius: 4px;
        position: relative;
        display: none;
        flex-direction: column;
        justify-content: center;
    }

    /* ------------------- */
    .options-font {
        background-color: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(3px);
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        right: 0;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 4;

    }

    .options {
        /* height: 200px;
        width: 200px; */
        /* background-color: white; */
        padding: 20px;
        border-radius: 4px;
        position: relative;
        display: none;
        flex-direction: column;
        justify-content: center;
        flex-direction: row;

    }

    /* ------------------- */




    .PopUpForm {
        background-color: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(3px);
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        right: 0;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 4;
    }

    .PopUpForm button:active {
        scale: 0.95;
    }

    .PopUpForm label {
        margin-bottom: 5px;
        color: #717171;
        font-weight: 600;
        font-size: 12px;
    }

    .PopUpForm .form-group input {
        width: 100%;
        padding: 12px 16px;
        margin: 5px;
        border-radius: 8px;
        color: #fff;
        font-family: inherit;
        /* background-color: transparent; */
        background-color: dimgray;
        border: 1px solid #414141;
    }

    .popup p {
        font-size: 15px;
        text-align: center;
        color: #EDAB03;

    }

    .close {
        cursor: pointer;
    }

    .form-control {
        width: 200px
    }

    .form-group-date,
    .form-group-userinformation {
        display: flex;
        flex-direction: row;
    }








    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }


    /* ----------------------------------------------- */
    /* ----------------------------------------------- */


    .fc-button,
    .btn-success {
        font-size: 18px;
        display: inline-block;
        outline: 0;
        border: 0;
        cursor: pointer;
        will-change: box-shadow, transform;
        background: radial-gradient(100% 100% at 100% 0%, #EDAB03 0%, #EDAB03 100%);
        box-shadow: 0px 0.01em 0.01em rgb(45 35 66 / 40%), 0px 0.3em 0.7em -0.01em rgb(45 35 66 / 30%), inset 0px -0.01em 0px rgb(58 65 111 / 50%);
        padding: 0 2em;
        border-radius: 0.3em;
        color: #fff;
        height: 2.6em;
        text-shadow: 0 1px 0 rgb(0 0 0 / 40%);
        transition: box-shadow 0.15s ease, transform 0.15s ease;
    }

    .fc-button:hover,
    .btn-success:hover {
        box-shadow: 0px 0.1em 0.2em rgb(45 35 66 / 40%), 0px 0.4em 0.7em -0.1em rgb(45 35 66 / 30%), inset 0px -0.1em 0px #EDAB03;
        transform: translateY(-0.3em);
    }

    .fc-button:active,
    .btn-success:active {
        box-shadow: inset 0px 0.1em 0.6em #EDAB03;
        transform: translateY(0em);
    }

    /* ----------------------------------------------- */
    /* ----------------------------------------------- */
    .close {
        width: 50px;
        height: 50px;
        position: absolute;
        top: -15px;
        right: -15px;
        background-color: #eee;
        border-radius: 50%;
        cursor: pointer;
        opacity: 1;
    }

    .close:hover {
        opacity: 1;

    }



    /* ---------------------------------------- */
    /* ---------------------------------------- */
    /* ---------------------------------------- */
    /* ---------------------------------------- */
    /* ---------------------------------------- */
    /* ---------------------------------------- */
    .Btn-options {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 150px;
        height: 40px;
        border: none;
        padding: 0px 20px;
        background-color: black;
        color: white;
        font-weight: 500;
        cursor: pointer;
        border-radius: 10px;
        box-shadow: 5px 5px 0px black;
        transition-duration: .3s;
        margin: 7px;
    }

    .svg {
        width: 13px;
        position: absolute;
        right: 0;
        margin-right: 20px;
        fill: white;
        transition-duration: .3s;
    }

    .Btn-options:hover {
        color: transparent;
    }

    .Btn-options:hover svg {
        right: 43%;
        margin: 0;
        padding: 0;
        border: none;
        transition-duration: .3s;
    }

    .Btn-options:active {
        transform: translate(3px, 3px);
        transition-duration: .3s;
        box-shadow: 2px 2px 0px black;
    }

    /* ---------------------------------------- */
    /* ---------------------------------------- */
    /* ---------------------------------------- */
    /* ---------------------------------------- */
    /* ---------------------------------------- */
    /* ---------------------------------------- */
</style>

<body>
    <div class="page">
        <h2>Co-Working Space</h2>
        <div class="logout-popup">

            <a href="logoutForAdmin.php"><img src="img/icons8-logout-50.png" alt="logout"></a>

        </div>
        <div id="calendar"></div>
        <div class="PopUpForm ">
            <form action="" class="popup">
                <img src="img/icons8-cancel-64.png" alt="closeButton" class="close">

                <p>Створіть подію</p>
                <div class="form-group">
                    <input type="text" name="title" id="title" required data-parsley-type="title"
                        data-parsley-trigger="keyup" class="form-control" placeholder="Назва вашого івент">
                </div>
                <div class="form-group form-group-date">
                    <input type="datetime-local" name="start_date" id="start_date" required data-parsley-type="date"
                        data-parsley-trigger="keyup" class="form-control" placeholder="З">
                    <input type="datetime-local" name="end_date" id="end_date" required data-parsley-type="date"
                        data-parsley-trigger="keyup" class="form-control" placeholder="До">
                </div>
                <div>
                    <label for="workspace_type">Оберіть тип робочого місця</label>
                    <div>
                        <input type="radio" id="personal-workspace" name="workspace_type" value="personal-workspace"
                            checked />
                        <label for="personal-workspace">Персональне робоче місце</label>
                    </div>

                    <div>
                        <input type="radio" id="Skyperoom" name="workspace_type" value="Skyperoom" />
                        <label for="Skyperoom">Skyperoom</label>
                    </div>

                    <div>
                        <input type="radio" id="meeting-room" name="workspace_type" value="meeting-room" />
                        <label for="meeting-room">Кімната для переговорів</label>
                    </div>
                    <div>
                        <input type="radio" id="event-room" name="workspace_type" value="event-room" />
                        <label for="event-room">Івент зал</label>
                    </div>


                </div>
                <div class="form-group form-group-userinformation">
                    <input type="text" name="username" id="username" required data-parsley-type="text"
                        data-parsley-trigger="keyup" class="form-control" placeholder="Ваше ім'я" autocomplete="on">
                    <input type="tel" name="userphone" id="userphone" required data-parsley-type="tel"
                        data-parsley-trigger="keyup" class="form-control" placeholder="Ваш номер телефону">

                </div>

                <div class="form-group">
                    <button type="submit" name="save-event" id="save-event" value="save-event"
                        class="btn btn-success save-button">Зберегти</button>

                </div>

                <p class="error"> <?php if (!empty($msg)) {
                    echo $msg;
                } ?> </p>
            </form>
        </div>



        <!-- ########################################################################################################## -->



        <div class="options-font">
            <div class="options">
                <!-- <img src="img/icons8-cancel-64.png" alt="closeButton" class="close"> -->
                <button class="Btn-options edit-options">Редагувати
                    <svg class="svg" viewBox="0 0 512 512">
                        <path
                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z">
                        </path>
                    </svg>
                </button>
                <button class="Btn-options delete-options ">Видалити
                    <svg class="svg" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                        <title></title>
                        <path d="M112,112l20,320c.95,18.49,14.4,32,32,32H348c17.67,0,30.87-13.51,32-32l20-320"
                            style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px">
                        </path>
                        <line style="stroke:#fff;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px" x1="80"
                            x2="432" y1="112" y2="112"></line>
                        <path d="M192,112V72h0a23.93,23.93,0,0,1,24-24h80a23.93,23.93,0,0,1,24,24h0v40"
                            style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px">
                        </path>
                        <line style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"
                            x1="256" x2="256" y1="176" y2="400"></line>
                        <line style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"
                            x1="184" x2="192" y1="176" y2="400"></line>
                        <line style="fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"
                            x1="328" x2="320" y1="176" y2="400"></line>
                    </svg>
                </button>

            </div>

        </div>

    </div>
</body>
<?php
include ('connection.php');
$fetch_event = mysqli_query($connection, "select * from dt_event");
?>

<script>
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            header: {
                left: 'month, agendaWeek, agendaDay, list',
                center: 'title',
                right: 'prev, today, next'
            },
            dayNamesShort: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
            buttonText: {
                today: 'Сьогодні', // Custom text for the "today" button
                month: 'Місяць', // Custom text for the "month" button
                agendaWeek: 'Тиждень', // Custom text for the "week" button
                agendaDay: 'День', // Custom text for the "day" button
                list: 'Список' // Custom text for the "list" button
            },
            viewRender: function (view, element) {
                // Change day names
                var dayHeaders = $('.fc-row.fc-widget-header .fc-day-header'); // Selecting day headers
                var dayNamesUkrainian = {
                    'Sunday': 'Неділя',
                    'Monday': 'Понеділок',
                    'Tuesday': 'Вівторок',
                    'Wednesday': 'Середа',
                    'Thursday': 'Четвер',
                    'Friday': 'П\'ятниця', // Corrected the escaping of single quote
                    'Saturday': 'Субота'
                };

                dayHeaders.each(function (index, element) {
                    var englishDayName = $(element).text().trim();
                    var ukrainianDayName = dayNamesUkrainian[englishDayName];
                    if (ukrainianDayName) {
                        $(element).text(ukrainianDayName);
                    }
                });

                // Change month name
                var header = $('.fc-center');
                var monthName = view.title.split(' ')[0]; // Get the name of the current month
                var monthNamesUkrainian = {
                    'January': 'Січень',
                    'February': 'Лютий',
                    'March': 'Березень',
                    'April': 'Квітень',
                    'May': 'Травень',
                    'June': 'Червень',
                    'July': 'Липень',
                    'August': 'Серпень',
                    'September': 'Вересень',
                    'October': 'Жовтень',
                    'November': 'Листопад',
                    'December': 'Грудень'
                };
                header.text(monthNamesUkrainian[monthName]); // Set the Ukrainian month name
            },


            events: [
                <?php
                while ($result = mysqli_fetch_array($fetch_event)) { ?>{
                        id: '<?php echo $result['id']; ?>',
                        title: '<?php echo $result['title']; ?>',
                        start: '<?php echo $result['start_date']; ?>',
                        end: '<?php echo $result['end_date']; ?>',
                        color: 'yellow',
                        textColor: 'black'
                    },
                <?php } ?>
            ],
            editable: true,


            dayClick: function (date, jsEvent, view) {
                $(".popup").css("display", "flex");
                $(".PopUpForm").css("display", "flex");


            },

            dayClick: function (date, jsEvent, view) {

                var currentDate = new Date();
                if (date >= currentDate) {
                    $(".popup").css("display", "flex");
                    $(".PopUpForm").css("display", "flex");
                } else {
                    alert("Неможливо зробити запис.");
                }
            },

            // eventClick: function (event) {
            //     $(".options").css("display", "flex");
            //     $(".options-font").css("display", "flex");
            //     $(".Btn-options.edit-options").click(function () {
            //         var eventId = event.id; // Отримуємо унікальний ідентифікатор події
            //         window.location.href = "update.php?id=" + eventId; // Перенаправляємо користувача на сторінку з детальною інформацією за унікальним ідентифікатором події
            //     });


            // },







            eventClick: function (event) {
                $(".options").css("display", "flex");
                $(".options-font").css("display", "flex");
                $(".delete-options").click(function () {
                    var id = event.id;
                    $.ajax({
                        url: "delete.php",
                        type: "POST",
                        data: { id: id },
                        success: function () {
                            window.location.reload();
                        }
                    });
                });
                $(".Btn-options.edit-options").click(function () {
                    var eventId = event.id; // Отримуємо унікальний ідентифікатор події
                    window.location.href = "update.php?id=" + eventId; // Перенаправляємо користувача на сторінку з детальною інформацією за унікальним ідентифікатором події
                });


            },
           



        });










    });
    $(".close").click(function () {
        $(".popup").css("display", "none");
        $(".PopUpForm").css("display", "none");
    });
    $(".close").click(function () {
        $(".popupEdit").css("display", "none");
        $(".PopUpFormEdit").css("display", "none");
    });
    // $(".close").click(function () {
    //     $(".options").css("display", "none");
    //     $(".options-font").css("display", "none");

    // });
    $(".options-font").click(function () {
        $(".options").css("display", "none");
        $(".options-font").css("display", "none");

    });





</script>

</html>
<?php
