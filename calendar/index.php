<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FullCalendar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
</head>
<?php
include('connection.php');
if(isset($_REQUEST['title']))
{
    $title = $_REQUEST['title'];
    $start_date = $_REQUEST['start_date'];
    $end_date = $_REQUEST['end_date'];

    $insert_query = mysqli_query($connection, "insert into dt_event set title='$title', start_date='$start_date', end_date='$end_date'");
    
    if($insert_query){
        header('location:view-calendar.php');

    }
    else{
        $msg = "Подія не створена";
    }
}
?>
<body>
<h2>JavaScript FullCalendar</h2>
    <div class="container">
    <div class="table-responsive">
            <h3>Create Event</h3>
            <div class="box">
                <form method="post">
                    <div class="form-group">
                        <label for="title">Enter title of the event</label>
                        <input type="text" name="title" id="title" required data-parsley-type="title" data-parsley-trigger="keyup" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date"> Start Date</label>
                        <input type="datetime-local" name="start_date" id="start_date" required data-parsley-type="date" data-parsley-trigger="keyup" class="form-control">
                    </div>
                    <div>
                        <label for="date"> End Date</label>
                        <input type="datetime-local" name="end_date" id="end_date" required data-parsley-type="date" data-parsley-trigger="keyup" class="form-control">

                    </div>
                    <div class="form-group">
                        <input type="submit" name="save-event" id="save-event" value="save-event" class="btn btn-success">

                    </div>
                    <p class="error"> <?php if(!empty($msg)){echo $msg;}?> </p>
                </form>

            </div>

        </div>
        <div id="calendar"></div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#calendar').fullCalendar({
            selectable:true,
            selectHelper:true,
            select:function()
            header:{
                left:'month, agendaWeek, agendaDay, list',
                center:'title',
                right:'prev, today, next'
            },
            footer:{
                left:'month, agendaWeek, agendaDay, list',
                center:'title',
                right:'prev, today, next'

            },
            businessHours: {
                dow: [1, 2, 3, 4, 5, 6, 7],
                start: '08:00', // 8am
                end: '21:00' // 9pm
            }

        });
    });
</script>
</html> -->
