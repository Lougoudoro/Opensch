<?php
// ------------------TRAITEMENT DU FORMULAIRE DE REINITAILISATION DU MOT DE PASSE
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restore Password</title>
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
                        <h3 class="text-uppercase text-center text-light">Restore Password</h3>
                        <p class="text-center text-light small">Hello there, you are about to restore your password</p>
                    </div>
                    <div class="card-body p-lg-5">
                        <form method="post" action="index.php">
                            <div class="input-group py-3">
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                                <div class="input-group-append">
                                    <span class=" input-group-text fas fa-lock bg-light text-bluesky"></span>
                                </div>
                            </div>

                            <div class="input-group py-5">
                                <input class="form-control" type="password" name="password_confirm" id="password_confirm" placeholder="Confirm Password" required>
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
                                    <a class="text-bluesky" href="index.php">Sign In</a>
                                </div>

                                <div class="col-lg-12 py-5 text-center">
                                    <button class="btn btn-outline-primary w-75 rounded-pill" type="submit">Restore Password</button>
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