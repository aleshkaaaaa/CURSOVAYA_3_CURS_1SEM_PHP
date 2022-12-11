<?php
if (!isset($file_access)) die("Direct File Access Denied");
?>

<div class="content">
    <div class="container-fluid">
        <?php
        if (!isset($_POST['submit'])) {
        ?>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header alert-success">
                        <h5 class="m-0">Советы по использованию сайта</h5>
                    </div>
                    <div class="card-body">
                        Использайте навигацию с правой стороны страницы.
                        <br />Вы можете увидеть список расписаний, нажав «Новое бронирование». Система отобразит список
                        доступных расписаний для вас, которые вы можете просматривать и делать заказы. <br>Перед вашим 
                        бронированием система сохранит данные и предложит оплатить билеты<br>После успешной оплаты система
                        генерирует для вас билет, который вы должны принести на вокзал.<br>Вы можете просматривать вашу истроию бронирования
                        нажав «Мои билеты».
                    </div>
                </div>
            </div><?php
                    } else {
                        $class = $_POST['class'];
                        $number = $_POST['number'];
                        $schedule_id = $_POST['id'];
                        if ($number < 1) die("Invalid Number");
                        ?>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header alert-success">
                            <h5 class="m-0">Бронирование</h5>
                        </div>
                        <div class="card-body">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> <?php echo ucwords($class), " Class" ?>:</h5>
                                Вы бронируете 
                                <?php echo $number, " билет", $number > 1 ? 's' : '', ' по маршруту ', getRouteFromSchedule($schedule_id); ?>
                                <br />

                                <?php

                                    $fee = ($_SESSION['amount'] = getFee($schedule_id, $class));
                                    echo $number, " x $", $fee, " = $", ($fee * $number), "<hr/>";
                                    $fee = $fee * $number;
                                    $amount = intval($fee);
                                    $vat = ceil($fee * 0.01);
                                    echo "Налог = $$vat<br/><br/><hr/>";
                                    echo "Итоговая стоимость = $", $total = $amount + $vat;
                                    $fee =  intval($total) . "00";
                                    $_SESSION['amount'] =  $total;
                                    $_SESSION['original'] =  $fee;
                                    $_SESSION['schedule'] =  $schedule_id;
                                    $_SESSION['no'] =  $number;
                                    $_SESSION['class'] =  $class;
                                    ?>
                            </div>
                            <a href="pay.php"><button
                                    onclick="return confirm('You will be directed to make your payment.\nPayment finalizes your booking!')"
                                    class="btn btn-primary">Заплатить за билет</button></a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>