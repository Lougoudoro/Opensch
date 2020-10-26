<?php 
    session_start();
    $title = 'Admin Dashbord';
    $breadcrumb = 'Inscription';
    include('header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#inscription" class="nav-link active" data-toggle="tab">Step 1 : Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a href="#school_fees" class="nav-link" data-toggle="tab">Step 2 : School fees</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="inscription">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-lg-12 text-left">
                                        <h3>Inscription</h3>
                                        <hr>
                                    </div>
                                    
                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_nom" class="pb-3">First Name<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <input type="text" name="inscription_nom" id="inscription_nom" class="form-control" placeholder="Enter First Name" required>
                                            <div class="input-group-append">
                                                <span class=" input-group-text fas fa-portrait  bg-light"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_prenom" class="pb-3">Last Name(s)<span class="text-danger"> * </span></label>
                                        <div class=" input-group">
                                            <input type="text" name="inscription_prenom" id="inscription_prenom" class="form-control" placeholder="Enter Last Name(s)" required>
                                            <div class="input-group-append">
                                                <span class=" input-group-text fas fa-portrait  bg-light"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_classe" class="pb-3">Classe<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="inscription_classe" id="inscription_classe">
                                                <option>Select Class</option>
                                            
                                                <optgroup label="<?= 'Computer Science' ?>">
                                                    <option><?= 'Computer Science 1' ?></option>  
                                                </optgroup>
                                            </select>                                            
                                            <div class="input-group-append">
                                                <span class=" input-group-text fas fa-id-badge  bg-light"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_email" class="pb-3">Email<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <input type="email" name="inscription_email" id="inscription_email" class="form-control" placeholder="" required>
                                            <div class="input-group-append">
                                                <span class=" input-group-text fas fa-envelope  bg-light"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_cnib" class="pb-3">CNIB<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <input type="text" name="inscription_cnib" id="inscription_cnib" class="form-control" placeholder="" required>
                                            <div class="input-group-append">
                                                <span class=" input-group-text fas fa-id-card  bg-light"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_sexe" class="pb-3">Gender<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <select class="form-control" name="inscription_sexe" id="inscription_sexe">
                                                <option>Select Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                            <div class="input-group-append">
                                                <span class=" input-group-text fas fa-venus-mars  bg-light"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_dnaiss" class="pb-3">Birthday<span class="text-danger"> * </span></label>
                                        <div class="form-group">
                                            <input type="date" name="inscription_dnaiss" id="inscription_dnaiss" class="form-control" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_tel" class="pb-3">Phone Number<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <input type="number" name="inscription_tel" id="inscription_tel" class="form-control" placeholder="00 226 00 00 00 00" required>
                                            <div class="input-group-append">
                                                <span class=" input-group-text fas fa-mobile bg-light"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_tel_urg" class="pb-3">Emergency Number<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <input type="number" name="inscription_tel_urg" id="inscription_tel_urg" class="form-control" placeholder="00 226 00 00 00 00" required>
                                            <div class="input-group-append">
                                                <span class=" input-group-text fas fa-phone-alt  bg-light"></span>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-lg-12 text-center">
                                        <button class="btn btn-primary w-75 my-3" type="submit" name="submit_student_infos" href="#school_fees" data-toggle="tab">Next</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="school_fees">
                            <form action="" method="post" >
                                <div class="row">
                                    <div class="col-lg-12 text-left">
                                        <h3>School Fees</h3>
                                        <hr>
                                    </div>
                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_matricule" class="pb-3">Matricule<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <input type="text" name="inscription_matricule" id="inscription_matricule" class="form-control" value="<?= 'bs00021' ?>" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text fas fa-portrait text-primary">
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_total" class="pb-3">Total Amount<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <input type="text" name="inscription_total" id="inscription_total" class="form-control" value="<?= '550.000'.' F CFA'?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text fas fa-money-bill text-primary"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 p-4">
                                        <label for="inscription_payment" class="pb-3">Payment Amount<span class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <input type="number" name="inscription_payment" id="inscription_payment" class="form-control" placeholder="Enter the paiement amount" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text fas fa-money-bill text-primary"></span>
                                            </div>
                                        </div>
                                    </div> 

                                    
                                    <div class="col-lg-12 text-center my-5">
                                        <button class="btn btn-primary w-75 my-3" type="submit" name="submit_student_fees">Apply</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>