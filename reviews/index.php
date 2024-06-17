<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Відгуки</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
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

    .card {
        background-color: #111;
        color: #e9ecef;
        margin: 10px 0 10px 0;
    }

    /* ----------button-------- */
    .animated-button {
        width: 200px;
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
    .row .text-center{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .card-footer{
        border-top: 1px solid grey;
    }

    /* ---------------------------- */
    /* 
    button {
        padding: 1.3em 3em;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.7s ease 0s;
        cursor: pointer;
        outline: none;
    } */

    /* button:hover {
        background-color: #EDAB03;
        box-shadow: 0px 15px 20px #EDAB03;
        color: #fff;
        transform: translateY(-7px);
    }

    button:active {
        transform: translateY(-1px);
    } */
    .progress{
        border-radius: 1.25rem;
    }

    .progress-label-left {
        float: left;
        margin-left: 0.5em;
        line-height: 1em;
    }

    .progress-label-right {
        float: right;
        margin-left: 0.3em;
        line-height: 1em;
    }

    .star-light {
        color: #433a25;
    }

    .review {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {

        /* Зміни стилів для пристроїв з шириною екрану до 768px */
        .page {
            width: 100%;
            background-color: greenyellow;
            font-size: 10px;

        }

        .card {
            width: 500px;
            height: 200px;
            font-size: 10px;
        }

        /* Додаткові зміни стилів для інших елементів */
    }

    @media (max-width: 576px) {

        /* Зміни стилів для пристроїв з шириною екрану до 576px */
        .page {
            width: 100%;
            background-color: violet;

        }


        /* Додаткові зміни стилів для інших елементів */
    }

    
</style>

<body>
    <div class="page">
        <div class="container">
            <h1 class="mt-5 mb-5">Відгуки клієнтів</h1>
            <div class="card">
                <!-- <div class="card-header">P</div> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <h1 class="text-warning mt-4 mb-4">
                                <b><span id="average_rating">0.0</span> / 5</b>
                            </h1>
                            <div class="mb-3">
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                            </div>
                            <h3><span id="total_review">0</span> відгуків</h3>
                        </div>
                        <div class="col-sm-4">
                            <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                    aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>
                            </p>
                        </div>
                        <div class="col-sm-4 text-center" class="button-in-center">
                            <h3 class="mt-4 mb-3">Напишіть свій відгук</h3>
                            <!-- <button type="button" name="add_review" id="add_review" class="btn">Написати</button> -->
                            <button class="animated-button" type="button" name="add_review" id="add_review" class="btn">
                                <span class="text">Написати</span>
                                <span class="circle"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5" id="review_content"></div>
        </div>



        <div id="review_modal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" class="login-box">
                    <div class="modal-header">
                        <h5 class="modal-title">Написати відгук</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center mt-2 mb-4">
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                        </h4>
                        <div class="form-group">
                            <input type="text" name="user_name" id="user_name" class="form-control"
                                placeholder="Напишіть своє ім'я" />
                        </div>
                        <div class="form-group">
                            <input type="tel" name="number" id="number" class="form-control"
                                placeholder="Вкажіть ваш номер телефону" />
                        </div>
                        <div class="form-group">
                            <textarea name="user_review" id="user_review" class="form-control"
                                placeholder="Напишіть що у вас на думці"></textarea>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="button" class="btn" id="save_review">Надіслати</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <script>
        $(document).ready(function () {
            loadReviews(); // Завантаження відгуків при завантаженні сторінки
        });

        function loadReviews() {
            $.ajax({
                url: "phpScript.php", // URL вашого PHP-скрипту
                method: "POST",
                data: { action: 'load_data' }, // Додаткові дані, які передаються на сервер
                dataType: "JSON",
                success: function (data) {
                    // Отримання відгуків і вставка їх на сторінку
                    var reviewsHtml = "";
                    data.review_data.forEach(function (review) {
                        reviewsHtml += "<div class='review'>";
                        reviewsHtml += "<p><strong>" + review.user_name + "</strong> - " + review.rating + " stars</p>";
                        reviewsHtml += "<p>" + review.user_review + "</p>";
                        reviewsHtml += "<p>" + review.datetime + "</p>";
                        reviewsHtml += "</div>";
                    });
                    $("#reviews").html(reviewsHtml);
                }
            });
        }
        $(document).ready(function () {
            var rating_data = 0;

            $('#add_review').click(function () {

                $('#review_modal').modal('show');

            });

        });
        $(document).on('mouseenter', '.submit_star', function () {

            var rating = $(this).data('rating');

            reset_background();

            for (var count = 1; count <= rating; count++) {

                $('#submit_star_' + count).addClass('text-warning');

            }

        });
        function reset_background() {
            for (var count = 1; count <= 5; count++) {

                $('#submit_star_' + count).addClass('star-light');

                $('#submit_star_' + count).removeClass('text-warning');

            }
        }
        $(document).on('mouseleave', '.submit_star', function () {

            reset_background();

            for (var count = 1; count <= rating_data; count++) {

                $('#submit_star_' + count).removeClass('star-light');

                $('#submit_star_' + count).addClass('text-warning');
            }

        });
        $(document).on('click', '.submit_star', function () {

            rating_data = $(this).data('rating');

        });
        $('#save_review').click(function () {
            var user_name = $('#user_name').val();
            var user_review = $('#user_review').val();
            var user_number = $('#number').val(); // Отримання значення номеру телефону
            if (user_name == '' || user_review == '' || user_number == '') {
                alert("Будь-ласка заповніть усі поля ");
                return false;
            } else {
                $.ajax({
                    url: "submit_rating.php",
                    method: "POST",
                    data: {
                        rating_data: rating_data,
                        user_name: user_name,
                        user_review: user_review,
                        number: user_number // Додавання поля з номером телефону
                    },
                    success: function (data) {
                        $('#review_modal').modal('hide');
                        load_rating_data();
                        alert(data);
                    }
                });
            }
        });


        load_rating_data();
        function load_rating_data() {
            $.ajax({
                url: "submit_rating.php",
                method: "POST",
                data: { action: 'load_data' },
                dataType: "JSON",
                success: function (data) {
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);

                    var count_star = 0;

                    $('.main_star').each(function () {
                        count_star++;
                        if (Math.ceil(data.average_rating) >= count_star) {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });
                    

                    $('#total_five_star_review').text(data.five_star_review);

                    $('#total_four_star_review').text(data.four_star_review);

                    $('#total_three_star_review').text(data.three_star_review);

                    $('#total_two_star_review').text(data.two_star_review);

                    $('#total_one_star_review').text(data.one_star_review);

                    $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                    $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                    $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                    $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                    $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                    if (data.review_data.length > 0) {
                        var html = '';

                        for (var count = 0; count < data.review_data.length; count++) {


                            html += '<div class="card">';

                            html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

                            html += '<div class="card-body">';

                            for (var star = 1; star <= 5; star++) {
                                var class_name = '';

                                if (data.review_data[count].rating >= star) {
                                    class_name = 'text-warning';
                                }
                                else {
                                    class_name = 'star-light';
                                }

                                html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                            }
                            // var reviewDate = new Date(data.review_data[count].datetime);
                            // var formattedDate = reviewDate.getDate() + '.' + (reviewDate.getMonth() + 1) + '.' + reviewDate.getFullYear() + ' ' + reviewDate.getHours() + ':' + reviewDate.getMinutes();


                            html += '<br />';

                            html += data.review_data[count].user_review;

                            html += '</div>';

                            // html += '<div class="card-footer text-right">' + data.review_data[count].datetime + '</div>';

                            html += '</div>';

                            html += '</div>';

                            html += '</div>';
                        }

                        $('#review_content').html(html);
                    }
                }
            })
        }

    </script>
</body>

</html>