<?php
if (!isset($file_access)) die("Direct File Access Denied");
$source = 'payment';

?>
<div class="content">



    <div class="row">
        <div class="container-fluid">
            <div class="col-lg-12">


                <div class="card card-success">
                    <div class="card-header border-0">
                        <h3 class="card-title">Все платежи</h3>

                    </div>
                    <div class="card-body">
                        <table id='example1' class="table table-striped table-bordered table-hover table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Маршрут</th>
                                    <th>Дата</th>
                                    <th>Первый класс</th>
                                    <th>Обычные места</th>
                                    <th>Оставшиеся места</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pay = $conn->query("SELECT *, schedule.id as id, schedule.date as date, schedule.time as time FROM schedule INNER JOIN payment ON schedule.id = payment.schedule_id");
                                $sn = 0;

                                while ($val = $pay->fetch_assoc()) {
                                    $id = $val['id'];
                                    $array = getTotalBookByType($id);
                                    // echo (($array['first'] - $array['first_booked'])), " Мест доступно в первом классе" . "<hr/>" . ($array['second'] - $array['second_booked']) . " Мест доступно в обычном классе";
                                    $sn++;
                                    echo "<tr>
                                      <td>" . getRoutePath($val['route_id']) . "</td>
                                      <td>" . $val['date'] . " - " . formatTime($val['time']) . "</td>
                                      <td>$ " . sum($val['id'], 'first') . "</td>
                                      <td>$ " . sum($val['id'], 'second') . "</td>
                                      <td>" . (($array['first'] - $array['first_booked'])), " Мест доступно в первом классе" . "<hr/>" . ($array['second'] - $array['second_booked']) . " Мест доступно в обычном классе" . "</td>
                                      </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->

            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.col -->
</div>
<!-- /.row -->

</div>