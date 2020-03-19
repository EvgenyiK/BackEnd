<?php
require_once 'Account.php';
require_once 'header.php';

$user = new Account($db);
if (isset($_POST['btnLogin'])){
    $user->login($_POST['username'],md5($_POST['password']));
}
?>
<form action="login.php" method="post">
    <div class="container">
        <h4>Admin Login</h4>
        <div class="col-md-4">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username"class="form-control" placeholder="username...">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password"class="form-control" placeholder="password...">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="btnLogin">Login</button>
            </div>
        </div>
    </div>
</form>
