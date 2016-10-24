<div class="row centered">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <br /><br /><br /><br /><br />
            <h1 class="text-center login-title">Meditore</h1>
            <div class="account-wall">
                <form class="form-signin" method="POST">
                <input type="text" class="form-control" name='u' placeholder="Username" required autofocus><br />
                <input type="password" class="form-control" name='p' placeholder="Password" required><br />
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button><br />
                    </form>
            

<?php
if (isset($_POST['u']) && isset($_POST['p'])) {
    if ($_POST['u'] == $username && $_POST['p'] == $password) {
        $_SESSION['login'] = true;
        header("Location: index");
        die();
    }
    else {
        error("Wrong username/password");
    }
}
?>
            </div>
        </div>
    </div>
    <br /><br /><br /><br /><br />