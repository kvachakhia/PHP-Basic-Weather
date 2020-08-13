<?php

include 'WeatherApi.php';

$currentTime = time();
$q = isset($_GET['city']) ? trim($_GET['city']) : 'Tbilisi';

$data = (new WeatherApi)->GetData($q);
if (isset($data->name)) {
    $data = (new WeatherApi)->GetData($q);
} else {
    $notfound = "Not Found";
}

?>

<!doctype html>
<html>
<head>
    <?php include 'partials/head.php' ?>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <?php include 'partials/searchbox.php' ?>
    </div>
    <div class="row">
        <div class="col">
            <?php if (isset($notfound)) : ?>
                <div class="d-flex justify-content-center notfound">
                    <h3><?php echo $notfound ?></h3>
                </div>
            <?php else: ?>
            <div class="weather-card one"
                 style="background: url('img/<?php echo $data->weather[0]->icon; ?>.jpg') no-repeat; ">
                <div class="top">
                    <div class="wrapper">
                        <h1 class="heading"><?php echo $data->weather[0]->description ?> </h1>
                        <h3 class="location"><?php echo $data->name; ?></h3>
                        <p class="temp">
                            <span class="temp-value"> <?php echo $data->main->temp_max; ?></span>
                            <span class="deg">0</span>
                            <a href="javascript:void;"><span class="temp-type">C</span></a>
                        </p>
                    </div>
                </div>
                <div class="bottom">
                    <div class="wrapper">
                        <ul class="forecast">
                            <a href="javascript:void;"><span class="lnr lnr-chevron-up go-up"></span></a>
                            <li class="active">
                                <span class="date">Humidity</span>
                                <span class="condition">
                                        <span class="temp"><?php echo $data->main->humidity; ?> %</span>
                                    </span>
                            </li>
                            <li>
                                <span class="date">Wind</span>
                                <span class="condition">
                                        <span class="temp"><?php echo $data->wind->speed; ?>  km/h</span>
                                    </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>


            </div>
        </div>

    </div>

</div>

</body>
</html>
