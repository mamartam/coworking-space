<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: loginForAdmin.php');
    exit;
}

$workspace_limits = [
    'personal-workspace' => 64,
    'Skyperoom' => 3,
    'meeting-room' => 4,
    'event-room' => 1,
];
?>

<?php

include('connection.php');

if (isset($_REQUEST['title'])) {
    $id = isset($_REQUEST['eventId']) ? $_REQUEST['eventId'] : null;
    $title = $_REQUEST['title'];
    $start_date = $_REQUEST['start_date'];
    $end_date = $_REQUEST['end_date'];
    $workspace_type = isset($_REQUEST['workspace_type']) ? $_REQUEST['workspace_type'] : "Default Workspace Type";
    $username = $_REQUEST['username'];
    $userphone = $_REQUEST['userphone'];

    // Extract date part from start_date
    $date = date('Y-m-d', strtotime($start_date));

    // Check the number of existing bookings for the selected workspace type on the specified date
    $count_query = mysqli_query($connection, "SELECT COUNT(*) AS count FROM dt_event WHERE workspace_type='$workspace_type' AND DATE(start_date)='$date'");
    $count_result = mysqli_fetch_assoc($count_query);
    $existing_count = $count_result['count'];

    if ($existing_count < $workspace_limits[$workspace_type]) {
        if ($id) {
            // Update existing event
            $update_query = mysqli_query($connection, "UPDATE dt_event SET title='$title', start_date='$start_date', end_date='$end_date', workspace_type='$workspace_type', username='$username', userphone='$userphone' WHERE id='$id'");
            if ($update_query) {
                $msg = "Подія оновлена";
            } else {
                $msg = "Подія не оновлена: " . mysqli_error($connection);
            }
        } else {
            // Insert new event
            $insert_query = mysqli_query($connection, "INSERT INTO dt_event (title, start_date, end_date, workspace_type, username, userphone) VALUES ('$title', '$start_date', '$end_date', '$workspace_type', '$username', '$userphone')");
            if ($insert_query) {
                $msg = "Подія створена";
                // header('location:just-in-case.php');
            } else {
                $msg = "Подія не створена: " . mysqli_error($connection);
            }
        }
    } else {
        $msg = "Вільних місць з обраним типом даних на сьогодні немає.";
        
    }

    header('Location: update.php?msg=' . urlencode($msg));
    exit;
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календар</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


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
}

.fc-day {
    cursor: pointer;
}

.fc-unthemed td.fc-today {
    background-color: #EDAB03;
}

/* ####################################################### */
.popup {
    height: 500px;
    width: 600px;
    background-color: black;
    padding: 20px;
    border-radius: 10px;
    position: relative;
    display: none;
    flex-direction: column;
    justify-content: center;
}

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

.PopUpForm .form-group input {
    border-bottom: 1px solid #EDAB03;
    border-top: none;
    border-right: none;
    border-left: none;
    width: 100%;
    margin: 5px;
    color: grey;
    font-family: inherit;
    background-color: transparent;
}
.form-group{
    margin-bottom: 30px;
}

.caption-div {
    display: flex;
    justify-content: center;
    align-items: center;

}
.header-for-form{
    display: flex;
    justify-content: center;
    align-items: center;
}

.popup .p1 {
    text-transform: uppercase;
    font-size: 20px;
    text-align: center;
    color: #EDAB03;

}
.popup .p2 {
    text-transform: uppercase;
    font-size: 20px;
    text-align: center;
    color: #EDAB03;

}

.popup .fc-buttonp2 {
    display: none;
    font-size: 15px;
    text-align: center;
    color: #EDAB03;

}

.user-box {
    position: relative;
}

.user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #EDAB03;
    outline: none;
    background: transparent;
}

.user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 10px;
    font-size: 15px;
    color: grey;
    pointer-events: none;
    transition: .5s;
    font-weight: 500;
}

.user-box input:focus~label,
.user-box input:valid~label {
    top: -20px;
    left: 0;
    color: #bdb8b8;
    font-size: 12px;
}


input[type="datetime-local"] {
    height: 40px;
    top: 50%;
    left: 50%;
    background-image: url(img/calendar-icon.png);
    background-size: 30px;
    background-repeat: no-repeat;
    background-color: #EDAB03;
    background-position: 90%;
    padding: 18px;

}

input[type="datetime-local"]::-webkit-calendar-picker-indicator {
    opacity: 0;
}


.container {
  display: flex;
  /* justify-content: center; */
  align-items: center;
}

.radio-tile-group {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.radio-tile-group .input-container {
    position: relative;
    height: 70px;
    width: 100px;
    margin: 0.5rem;
}

.radio-tile-group .input-container .radio-button {
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    margin: 0;
    cursor: pointer;
}

.radio-tile-group .input-container .radio-tile {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    border: 2px solid #EDAB03;
    border-radius: 5px;
    padding: 1rem;
    transition: transform 300ms ease;
}


.radio-tile-group .input-container .radio-tile-label {
    text-align: center;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: grey;
}

.radio-tile-group .input-container .radio-button:checked+.radio-tile {
    background-color: #EDAB03;
    border: 2px solid #EDAB03;
    color: white;
    transform: scale(1.1, 1.1);
}



.radio-tile-group .input-container .radio-button:checked+.radio-tile .radio-tile-label {
    color: white;
    background-color: #EDAB03;
}

/* ######################################### */








/* ########################################## */

.closeBtn {
    width: 50px;
    height: 50px;
    position: absolute;
    top: -15px;
    right: -15px;
    border-radius: 50%;
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


/* ####################################################### */
/* ####################################################### */
/* ####################################################### */
/* ####################################################### */


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
    padding: 20px;
    border-radius: 4px;
    position: relative;
    display: none;
    flex-direction: column;
    justify-content: center;
    flex-direction: row;

}

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

/* ########################################### */
/* ########################################### */
/* ########################################### */

.save-event {
    display: none;
}

.update-even {
    display: none;
}

/* ########################################### */


.logout-popup {
    width: 100px;
    height: 100px;
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
.form-group-buttons{
    display: flex;
    justify-content: center;
    align-items: center;
}




</style>


<!-- ####################################################################################################################### -->
<body>
    <div class="page">
        <h2>Co-Working Space</h2>
        <div class="logout-popup">

            <a href="logoutForAdmin.php"><img src="img/icons8-logout-50.png" alt="logout"></a>

        </div>
        <div id="calendar"></div>
        <div class="PopUpForm">
            <form action="" class="popup" method="POST">
                <input type="hidden" name="eventId" id="eventId"
                    value="<?php echo isset($event['id']) ? $event['id'] : ''; ?>">

                <img src="img/click-close.png" alt="closeButton" class="closeBtn">

                <div class="header-for-form">
                    <p class="p1">Створіть подію</p>
                    <p class="p2">Редагуйте подію</p>

                </div>

                <div class="form-group">
                    <input type="text" name="title" id="title" required class="form-control"
                        placeholder="Назва вашого івент">
                </div>
                <div class="form-group form-group-date">
                    <input type="datetime-local" name="start_date" id="start_date" required class="form-control"
                        placeholder="З">
                    <input type="datetime-local" name="end_date" id="end_date" required class="form-control"
                        placeholder="До">
                </div>




                <div class="container">
                    
                    <div class="radio-tile-group">

                        <label for="workspace_type"></label>
                        

                        <div class="input-container">
                            <input type="radio" id="personal-workspace" name="workspace_type" value="personal-workspace" type="radio" name="radio" class="radio-button"/>
                            <div class="radio-tile">
                                <label for="personal-workspace" class="radio-tile-label">Персональне робоче місце</label>
                            </div>
                        </div>

                        <div class="input-container">
                            <input type="radio" id="Skyperoom" name="workspace_type" value="Skyperoom" type="radio" name="radio" class="radio-button"/>
                            <div class="radio-tile">
                                <label for="Skyperoom" class="radio-tile-label">Skyperoom</label>
                            </div>
                        </div>

                        <div class="input-container">
                            <input type="radio" id="meeting-room" name="workspace_type" value="meeting-room" type="radio" name="radio" class="radio-button"/>
                            <div class="radio-tile">
                                <label for="meeting-room" class="radio-tile-label">Кімната для переговорів</label>
                            </div>
                        </div>
                        <div class="input-container">
                            <input type="radio" id="event-room" name="workspace_type" value="event-room" type="radio" name="radio" class="radio-button"/>
                            <div class="radio-tile">
                                <label for="event-room" class="radio-tile-label">Івент зал</label>
                            </div>
                        </div>
                    </div>

                </div>









                <div class="form-group form-group-userinformation">
                    <input type="text" name="username" id="username" required class="form-control"
                        placeholder="Ваше ім'я" autocomplete="on">
                    <input type="tel" name="userphone" id="userphone" required class="form-control"
                        placeholder="Ваш номер телефону">
                </div>

                <div class="form-group form-group-buttons save-event">
                    <button class="animated-button" type="submit" name="save-event" id="save-event" class="btn btn-success save-event"><span class="text">Зберегти</span>
                        <span class="circle"></span></button>
                </div>
                
                <div class="form-group form-group-buttons update-event">
                   
                    <button class="animated-button" type="submit" name="update-event" id="update-event" class="btn btn-success update-event"><span class="text">Зберегти зміни</span>
                        <span class="circle"></span></button>
                </div>

                <p class="error">
                    <?php if (!empty($msg)) {
                    echo $msg;} ?>
                </p>
            </form>
        </div>

        <!-- ################################################################################# -->
        <!-- ################################################################################# -->
        <!-- ################################################################################# -->
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
        <!-- ###################################################################### -->
        <!-- ###################################################################### -->
        <!-- ###################################################################### -->
        <!-- ###################################################################### -->




</body>
<?php
include ('connection.php');
$fetch_event = mysqli_query($connection, "select * from dt_event");
?>
<script>
    
    $(document).ready(function () {
    var msg = "<?php echo isset($_GET['msg']) ? $_GET['msg'] : ''; ?>";
    if (msg) {
        alert(msg);
    }
    var input = document.getElementById("start_date");

    input.addEventListener("input", function (event) {
        var selectedDateTime = new Date(event.target.value);
        var minDateTime = new Date(selectedDateTime);
        minDateTime.setHours(9, 0, 0, 0); // Minimum time is set to 09:00

        var maxDateTime = new Date(selectedDateTime);
        maxDateTime.setHours(17, 0, 0, 0); // Maximum time is set to 17:00

        if (selectedDateTime < minDateTime || selectedDateTime > maxDateTime) {
            alert("Будь ласка, оберіть інший час. Створити подію можна лише з 09:00 до 05:00.");
            event.target.value = selectedDateTime.toISOString().split("T")[0] + "T09:00"; // Revert to 09:00
        }
    });

    var input2 = document.getElementById("end_date");

    input2.addEventListener("input", function (event) {
        var selectedDateTime = new Date(event.target.value);
        var minDateTime = new Date(selectedDateTime);
        minDateTime.setHours(9, 0, 0, 0); // Minimum time is set to 09:00

        var maxDateTime = new Date(selectedDateTime);
        maxDateTime.setHours(17, 0, 0, 0); // Maximum time is set to 17:00

        if (selectedDateTime < minDateTime || selectedDateTime > maxDateTime) {
            alert("Будь ласка, оберіть інший час. Створити подію можна лише з 09:00 до 05:00.");
            event.target.value = selectedDateTime.toISOString().split("T")[0] + "T09:00"; // Revert to 09:00
        }
    });

    $('#calendar').fullCalendar({
        header: {
            left: 'month,agendaWeek,agendaDay,list',
            center: 'title',
            right: 'prev,today,next'
        },
        dayNamesShort: ['Нд', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        buttonText: {
            today: 'Сьогодні',
            month: 'Місяць',
            agendaWeek: 'Тиждень',
            agendaDay: 'День',
            list: 'Список'
        },
        viewRender: function (view, element) {
            // Change day names
            var dayHeaders = $('.fc-row.fc-widget-header .fc-day-header');
            var dayNamesUkrainian = {
                'Sunday': 'Неділя',
                'Monday': 'Понеділок',
                'Tuesday': 'Вівторок',
                'Wednesday': 'Середа',
                'Thursday': 'Четвер',
                'Friday': 'П\'ятниця',
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
            var monthName = view.title.split(' ')[0];
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
            header.text(monthNamesUkrainian[monthName]);
        },
        events: [
            <?php
            while ($result = mysqli_fetch_array($fetch_event)) {
                $start_date = date('Y-m-d\TH:i', strtotime($result['start_date']));
                $end_date = date('Y-m-d\TH:i', strtotime($result['end_date'])); ?>
                {
                    id: '<?php echo $result['id']; ?>',
                    title: '<?php echo $result['title']; ?>',
                    start: '<?php echo $start_date; ?>',
                    end: '<?php echo $end_date; ?>',
                    workspace_type: '<?php echo $result['workspace_type']; ?>',
                    username: '<?php echo $result['username']; ?>',
                    userphone: '<?php echo $result['userphone']; ?>',
                    color: 'yellow',
                    textColor: 'black'
                },
            <?php } ?>
        ],

        editable: true,
        dayClick: function (date, jsEvent, view) {
            var currentDate = moment().startOf('day'); // Поточна дата без часу
            var selectedDate = moment(date).startOf('day'); // Обрана дата без часу

            if (selectedDate.isSameOrAfter(currentDate) && date.day() !== 0) {
                $(".popup").css("display", "flex");
                $(".PopUpForm").css("display", "flex");
                $(".update-event").css("display", "none");
                $(".save-event").css("display", "flex");
                $(".p2").css("display", "none");
                $(".p1").css("display", "flex");


                var selectedDate = date.format();
                var defaultTime = moment("09:00", "HH:mm").format("HH:mm"); // Задаємо розміщений час за замовчуванням, наприклад, 09:00 ранку.
                $("#start_date").val(selectedDate.split("T")[0] + "T" + defaultTime);
                $("#end_date").val(selectedDate.split("T")[0] + "T" + defaultTime);
            } else {
                alert("Не можливо створити подію. Оберіть інший день!");
            }
        },

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
                        $('#calendar').fullCalendar('refetchEvents');
                    }
                });
            });
            $(".edit-options").click(function () {
                $('#eventId').val(event.id);
                $('#title').val(event.title);
                $('#start_date').val(event.start.format('YYYY-MM-DD HH:mm'));
                $('#end_date').val(event.end.format('YYYY-MM-DD HH:mm'));
                $('input[name="workspace_type"][value="' + event.workspace_type + '"]').prop('checked', true);
                $('#username').val(event.username);
                $('#userphone').val(event.userphone);

                // Show the update form
                $(".popup").css("display", "flex");
                $(".PopUpForm").css("display", "flex");
                $(".save-event").hide();
                $(".update-event").show();
                $(".p1").hide();
                $(".p2").show();
            });
        },
    });

    function resetForm() {
        $('#eventId').val('');
        $('#title').val('');
        $('#start_date').val('');
        $('#end_date').val('');
        $('input[name="workspace_type"]').prop('checked', false);
        $('#username').val('');
        $('#userphone').val('');
    }

    $(".closeBtn").click(function () {
        resetForm();
        $(".popup").css("display", "none");
        $(".PopUpForm").css("display", "none");
        $(".p2").css("display", "none");
    });

    $(".options-font").click(function () {
        $(".options").css("display", "none");
        $(".options-font").css("display", "none");
    });
});

</script>



</html>