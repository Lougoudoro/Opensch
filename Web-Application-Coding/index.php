<?php 
include 'utilities/QueryBuilder.php';
$obj = new QueryBuilder();
if (isset($_POST['submit']))
{
    
    extract($_POST);
    $cookies=array();

    $values = array($login_username,$login_password);
    $columns = array('USERNAME','PASSWORD');
    $table='user';
    $sessions=array('ID_USER','USERNAME');
    $return = array('DROITS');
    if (isset($login_remember) AND !empty($login_remember ))
    {
        $cookies=array('USERNAME'=>$login_username,'PASSWORD'=>$login_password);
    }
    $connecter= $obj->Connexion($table, $columns, $values,$return,$cookies,$sessions);
  

    if (count($connecter)>0) {
        echo "connecter avec susses";
    }else{
        
        $message="connection failed! Password or Username incorect ";
       $getmsg=SetMessage($message, 'alert');
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/library/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/library/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto my-5">
                <div class="card">
                    <div class="card-header py-3 bg-gradient-primary">
                        <h3 class="text-uppercase text-center text-light">sign in</h3>
                        <p class="text-center text-light small">Hello there, Sign in and start managing your Admin Interface</p>
                    </div>
                    <div class="mt-2 col-12 text-center "><?php if (isset($getmsg)) {echo $getmsg;} ?></div>
                    <div class="card-body p-lg-4">

                        <form method="post" action="index.php">

                            <div class="input-group py-3">
                                <input class="form-control" type="text" name="login_username" id="login_username" placeholder="Username" required>
                                <div class="input-group-append">
                                    <span class=" input-group-text fas fa-user-alt bg-light text-bluesky"></span>
                                </div>
                            </div>

                            <div class="input-group py-5">
                                <input class="form-control" type="password" name="login_password" id="login_password" placeholder="Password" required>
                                <div class="input-group-append">
                                    <span class=" input-group-text fas fa-lock bg-light text-bluesky"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="login_remember">
                                        <input type="checkbox" name="login_remember" id="login_remember"> Remember me
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="text-bluesky" href="forgot_password.php">Forgot Password?</a>
                                </div>

                                <div class="col-lg-12 py-5 text-center">
                                    <input  name="submit" class="btn btn-outline-primary w-75 rounded-pill" type="submit" value="Login">
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>