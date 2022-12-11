<?php
session_start();
require_once '../conn.php';
$file = "admin";

?>
<?php
$cur_page = 'signup';
include 'includes/inc-header.php';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!isset($email, $password)) {
?>
<script>
alert("Убедитесь что верно заполнили форму.");
</script>
<?php
    } else {

        //Check for login
        $password = md5($password);
        $check = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $check->bind_param("ss", $email, $password);
        if (!$check->execute()) die("Form Filled With Error");
        $res = $check->get_result();
        $no_rows = $res->num_rows;
        if ($no_rows ==  1) {
            $row = $res->fetch_assoc();
            $id = $row['id'];
            session_regenerate_id(true);
            $_SESSION['category'] = "super";
            $_SESSION['admin'] = $id;

        ?>
<script>
alert("Доступ разрешен!");
window.location = "admin.php";
</script>
<?php

        } else { ?>
<script>
alert("Доступ запрещен");
</script>
<?php
        }
    }
}
?>
<div class="signup-page">
    <div class="form">
        <h2>Вход в систему от имени администратора</h2>
        <br>
        <form class="login-form" method="post" role="form" id="signup-form" autocomplete="off">
            <!-- json response will be here -->
            <div id="errorDiv"></div>
            <!-- json response will be here -->

            <div class="col-md-12">
                <div class="form-group">
                    <label>Email Адрес</label>
                    <input type="text" required name="email">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" id="password">
                    <span class="help-block" id="error"></span>
                </div>
            </div>



            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" id="btn-signup">
                        Вход
                    </button>
                </div>
            </div>
            <p class="message">
                <a href="#">.</a><br>
            </p>
        </form>
    </div>
</div>
</div>
<script src="assets/js/jquery-1.12.4-jquery.min.js"></script>

</body>

</html>