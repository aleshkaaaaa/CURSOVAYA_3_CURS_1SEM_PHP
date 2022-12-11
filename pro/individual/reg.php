<?php
if (!isset($file_access)) die("Direct File Access Denied");
?>
<?php

$me = $_SESSION['user_id'];

?>

<div class="content">



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Билеты на поезда</b></h3>
                </div>
                <div class="card-body">

                    <table id="example1" style="align-items: stretch;"
                        class="table table-hover w-100 table-bordered table-striped<?php //
                                                                                                                                    ?>">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Маршрут</th>
                                <th>Статус</th>
                                <th>Дата/Время</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $row = querySchedule('future');
                            if ($row->num_rows < 1) echo "<div class='alert alert-danger' role='alert'>
                            К сожалению, на данный момент расписания нет! Пожалуйста, зайдите через некоторое время.
                          </div>";
                            $sn = 0;
                            while ($fetch = $row->fetch_assoc()) {
                                //Check if the current date is same with Database scheduled date
                                $db_date = $fetch['date'];
                                if ($db_date == date('d-m-Y')) {
                                    //Oh yes, so what should happen?
                                    //Check for the time. If there is still about an hour left, proceed else, skip this data
                                    $db_time = $fetch['time'];
                                    $current_time = date('H:i');
                                    if ($current_time >= $db_time) {
                                        continue;
                                    }
                                }
                                $id = $fetch['id']; ?><tr>
                                <td><?php echo ++$sn; ?></td>
                                <td><?php echo $fullname =  getRoutePath($fetch['route_id']);
                                        ?></td>
                                <td><?php $array = getTotalBookByType($id);
                                        echo ($max_first = ($array['first'] - $array['first_booked'])), " Мест доступно в первом классе" . "<hr/>" . ($max_second = ($array['second'] - $array['second_booked'])) . " Мест доступно в обычном классе";
                                        ?></td>
                                <td><?php echo $fetch['date'], " / ", formatTime($fetch['time']); ?></td>

                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#book<?php echo $id ?>">
                                        Забронировать
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="book<?php echo $id ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Маршрут <?php echo $fullname;


                                                                                    ?> &#128642;</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <form action="<?php echo $_SERVER['PHP_SELF'] . "?loc=$id" ?>"
                                                method="post">
                                                <input type="hidden" class="form-control" name="id"
                                                    value="<?php echo $id ?>" required id="">

                                                <p>Количество билетов :
                                                    <input type="number" min='1' value="1"
                                                        max='<?php echo $max_first >= $max_second ? $max_first : $max_second ?>'
                                                        name="number" class="form-control" id="">
                                                </p>
                                                <p>
                                                    Класс места (обычный или первый класс) : <select name="class" required class="form-control" id="">
                                                        <option value="">-- Выберите класс --</option>
                                                        <option value="first">Первый класс ($
                                                            <?php echo ($fetch['first_fee']); ?>)</option>
                                                        <option value="second">Обычный класс ($
                                                            <?php echo ($fetch['second_fee']); ?>)</option>
                                                    </select>
                                                </p>
                                                <input type="submit" name="submit" class="btn btn-success"
                                                    value="Забронировать">

                                            </form>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <?php
                            }
                                ?>

                        </tbody>
                        
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>

    </form>

</div>