<?php
    function menu_item(string $titre , string $lien, string $icone):string
    {
        $classe = "nav-link";
        if($_SERVER['SCRIPT_NAME'] === $lien)
        {
            $classe .= " active"; 
        }
        return <<<HTML
        <li class="nav-item">
            <a class="$classe" href="$lien">
                <i class="$icone"></i>
                <span>$titre</span>
            </a>
        </li>
HTML;
    }

    function menu_item_collapse(string $titre , string $lien, string $icone, array $sous_lien , array $titre_sous_lien):void
    {
        $classe = "nav-item";
        if($_SERVER['SCRIPT_NAME'] === $lien)
        {
            $classe .= " active"; 
        }

        $sous_lien_text = "";
        for ($j = 0 ; $j < count($sous_lien) ; $j++) {
            $sous_lien_text .= "<a class='collapse-item' href='$sous_lien[$j]'>$titre_sous_lien[$j]</a>" ;
        }
        //echo"$sous_lien_text";
        $lien = "<li class='nav-item'>
                    <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#$titre' aria-expanded='true' aria-controls='$titre'>
                        <i class='$icone'></i>
                        <span>$titre</span>
                    </a>
                    <div id='$titre' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>
                        <div class='bg-white py-2 collapse-inner rounded'>
                            $sous_lien_text
                        </div>
                    </div>
                </li>";

        echo $lien;
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- ------------- META LINKS ------------- -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>

        <link rel="icon" href="../../media/logo_bit.png">

        <!-- ---------- STYLESHEETS LINKS --------- -->
        <link rel="stylesheet" href="../../css/style.css">
        <!-- ---------- Bootstrap css --------- -->
        <link rel="stylesheet" href="../../library/bootstrap4/css/bootstrap.min.css">
        <!-- ---------- Font Awesome css --------- -->
        <link rel="stylesheet" href="../../library/fontawesome/css/all.min.css">
        <!-- ---------- Animate css --------- -->
        <link rel="stylesheet" href="../../library/wow/animate.css">
        <!-- ---------- DataTable css --------- -->


        <title><?= $title ?></title>
        
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar" >
                <!-- Nav Item - User Information -->
                <li class="nav-item no-arrow align-items-center justify-content-center">
                    <a class="nav-link d-block" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle mx-auto d-block" src="../../../assets/img/user_32.png" width="200px" height="200px">
                        <span>
                            <p class="mr-2 py-2 text-white text-center">
                                <?php 
                                    if(isset($_SESSION['USERNAME']))
                                        echo $_SESSION['USERNAME'];
                                    else
                                        echo'username';
                                ?>
                            </p>
                        </span>
                        <span><p class="mr-2 text-white text-center "><?= "patrick2yanogo@gmail.com"?></p></span>
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Tableau de bord -->
                
                <?= menu_item("Tableau de bord", "index.php", "fas fa-fw fa-tachometer-alt")?>

                <!-- Nav Item - Inscription -->
                <?= menu_item("Inscription", "inscription.php", "fas fa-user-plus ")?>
                <!-- Nav Item - Classe -->
                <?php menu_item_collapse('Classe' , '#' , 'fas fa-school' , ['allClasse.php' , 'classe.php'] , ['Toutes les classes' , 'Ajouter une classe']) ;
                ?>

                <!-- Nav Item - Cours -->
                <?php menu_item_collapse('Cours' , '#' , 'fas fa-book-reader' , ["#" , "#" , "#"] , ["Tous les cours" , "Ajouter une cours", 'Modifier un cours', ]) ;
                ?>
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->

            <!-- Main conteneur -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <button id="sidebarToggleTop" class="btn btn-link d-none d-md-block mr-3">
                            <i class="fa fa-bars text-black-50"></i>
                        </button>
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop1" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars text-black-50"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto">
                            <div class="input-group">
                                <input type="text" class="form-control small" placeholder="Recherche" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Alert Center -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-bell text-black-50"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow wow slideInRight" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">Notifications Center </h6>
                                    <?php
                                    $i = 0;
                                    while ($i < 5) :
                                        ?>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-warning">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">December 2, 2019</div> Spending Alert: We've noticed unusually high spending for your account.
                                            </div>
                                        </a>
                                        <?php
                                        $i++;
                                    endwhile;
                                    ?>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>
                            <!-- User Profile -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle" src="../../../assets/img/user_32.png" width="40px" height="40px">
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <a class="dropdown-item d-flex align-items-center" href="profile.php">Profile</a>
                                    <a class="dropdown-item d-flex align-items-center" href="../../../logout.php">Déconnexion</a>
                                
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- Breadcrumb -->
                    <div class="container-fluid">
                        <div class="row bg-white mx-0 mb-lg-3 pt-3">
                            <div class="col-6">
                                <h3 class="text-uppercase"><?= $title ?></h3>
                            </div>
                            <div class="col-6">
                                <nav class="breadcrumb bg-white">
                                    <span class="breadcrumb-item"><?= $title ?></span>
                                    <span class="breadcrumb-item text-bluesky"> <?= $breadcrumb ?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                
            
            