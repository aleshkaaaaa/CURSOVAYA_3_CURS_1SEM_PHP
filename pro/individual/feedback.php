<?php
if (!isset($file_access)) die("Direct File Access Denied");
?>
<?php


?>
<!-- Content Header (Page header) -->
<!-- <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Feedback</h1>
            </div>

        </div>
    </div>
</section> -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Информация:</h5>
                    Мы рады услышать отзывы от вас!
                    Ответ администрации в течении суток
                </div>



                <div class="card">
                    <div class="card-header alert-success">
                        <h5 class="card-title"><b>Список ваших отзывов</b></h5>
                        <div class='float-right'>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                                Оставить отзыв
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id='example1'>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ваш отзыв</th>
                                    <th>Ответ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 0;
                                $query = getFeedbacks();
                                while ($row = $query->fetch_assoc()) {
                                    $sn++;
                                    echo "<tr>
                                    <td>$sn</td>
                                    <td>" . $row['message'] . "</td>
                                    <td>" . ($row['response'] == NULL ? '-- No Response Yet --' : $row['response']) . "</td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>


                    </div>

                    <br />
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" align="center">
            <div class="modal-header">
                <h4 class="modal-title">Оставьте свой отзыв! </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                Напишите что вам понравилось или чем вы огорчились : <textarea name="message" required minlength="10" id="" cols="30"
                                    rows="10" class="form-control"></textarea>
                            </div>

                        </div>


                        <hr>
                        <input type="submit" name="sendFeedback" class="btn btn-success" value="Отправить"></p>
                </form>


            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php

if (isset($_POST['sendFeedback'])) {
    $msg = $_POST['message'];
    $send = sendFeedback($msg);
    echo $send;
    if ($send) {
        echo "<script>alert('Отзыв отправлен! Мы свяжемся с вами!');window.location='individual.php'</script>";
    } else {
        echo "<script>alert('Невозможно отправить отзыв! Попробуйте еще раз!');window.location='individual.php'</script>";
    }
}

?>