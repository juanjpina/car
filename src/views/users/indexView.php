<?php get_header('home', 'index'); ?>
<!-- <style>
    .card-box {
        width: 200px;
        height: 250px;
        position: relative;
        perspective: 1000px;
        margin-right: 2em;
    }

    .card-box:hover .card {
        transform: rotateY(180deg);
    }

    .card {
        transform-style: preserve-3d;
        transition: all 1s linear;
    }

    .front {
        position: absolute;
        backface-visibility: hidden;
    }

    .front.back {
        transform: rotateY(180deg);
    }

    .container {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding-top: 1.2em;
    }

    .wraper {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    p {
        text-align: center;
    }

    .containerMain {
        margin-top: 10em;
    }
</style> -->
<div class="wraper">
    <div class="containerMain">
        <div class="container">
            <div class="card-box">
                <div class="card">
                    <div class="front">
                        <img src="/proyectocar/car/src/assets/images/index_alert.png" width="200px" height="250px" alt="">
                    </div>
                    <div class="front back">
                        <img src="https://placeimg.com/200/250/animals" width="200" height="250px">
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="card">

                    <div class="front">
                        <img src="https://placeimg.com/200/250/tech" width="200" height="250px">
                    </div>

                    <div class="front back">
                        <img src="/proyectocar/car/src/assets/images/statistics_index.png" width="200px" height="250px" alt="">
                    </div>

                </div>
            </div>
            <div class="card-box">
                <div class="card">
                    <div class="front">
                        <img src="/proyectocar/car/src/assets/images/history_index.png" width="200px" height="250px" alt="">
                    </div>
                    <div class="front back">
                        <img src="https://placeimg.com/200/250/animals" width="200" height="250px">
                    </div>
                </div>

            </div>

        </div>

        <div class="container">
            <div class="card-box">
                <div class="card">
                    <div class="front">
                        <img src="https://placeimg.com/200/250/tech" width="200" height="250px">
                    </div>
                    <div class="front back">
                        <img src="/proyectocar/car/src/assets/images/invoice_index.png" width="200px" height="250px" alt="">
                    </div>
                </div>
            </div>

            <div class="card-box">
                <div class="card">
                    <div class="front">
                        <img src="/proyectocar/car/src/assets/images/index_car.png" width="200px" height="250px" alt="">
                    </div>
                    <div class="front back">
                        <img src="https://placeimg.com/200/250/tech" width="200" height="250px">
                    </div>
                </div>
            </div>

            <div class="card-box">
                <div class="card">
                    <div class="front">
                        <img src="https://placeimg.com/200/250/tech" width="200" height="250px">
                    </div>
                    <div class="front back">
                        <img src="https://placeimg.com/200/250/animals" width="200" height="250px">
                    </div>
                </div>
            </div>
        </div>

    </div>




</div>














<?php get_footer('index'); ?>