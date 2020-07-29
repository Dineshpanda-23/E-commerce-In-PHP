<?php require 'nav.php'; ?>
<?php

if (isset($_SESSION['id'])) {
    header("location: index.php");
}
$con = mysqli_connect("localhost", "root", "", "ecommerce") or die(mysqli_error($con));
if (isset($con, $_POST['email'])) {
    $user_login = mysqli_escape_string($con, $_POST['email']);
    $user_login = mb_convert_case($user_login, MB_CASE_LOWER, "UTF-8");
    $password_login = mysqli_escape_string($con, $_POST['pass']);
    $password_login_md5 = md5($password_login);

    $login_query = "SELECT userEmail FROM user WHERE userEmail='$user_login' ";
    $login_submit = mysqli_query($con, $login_query) or die(mysqli_error($con));
    $login_submit = mysqli_num_rows($login_submit);
    if ($login_submit == 0) {
        echo '<script>alert("Not Any User Find")</script>';
    } else {

        $forget_Query = "UPDATE user SET userPassword = '$password_login_md5' WHERE userEmail='$user_login';";
        $done = mysqli_query($con, $forget_Query) or die(mysqli_error($con));
        header("location: index.php");
    }
}
?>
<div class="container " style="margin-top: 40px;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <h2 style="padding: 10px;">Forget Password</h2>
            <form method="POST" action="forget.php">
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                        <input type="email" id="defaultForm-email" class="form-control validate" name="email" require>
                    </div>
                    <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                        <input type="password" id="defaultForm-pass" class="form-control validate" name="pass" require>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary buttonbuy">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>