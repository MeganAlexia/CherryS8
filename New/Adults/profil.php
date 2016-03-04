<div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profil</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.php?page=accueil">Accueil</a></li>
                <li><i class="fa fa-user-md"></i>Profil</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <!-- profile-widget -->
        <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
                  <div class="panel-body">
                    <div class="col-lg-2 col-sm-2">
                      <h4><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></h4>               
                      <h6><?php echo $_SESSION['type']; ?></h6>
                    </div>
                    <div class="col-lg-4 col-sm-4 follow-info">
                        <p><?php //echo($_SESSION['description']) ?></p>
                        <p>@pseudo<?php //echo($_SESSION['pseudo']) ?></p>
                        <h6>
                            <span><i class="icon_pin_alt"></i>Ville, Département <?php // echo $_SESSION['ville']?>   <?php //echo $_SESSION['departement']?></span>
                        </h6>
                    </div>
                  </div>
            </div>
      </div>
   </div>

      <!-- page start-->
      <div class="row">
         <div class="col-lg-12">
            <section class="panel">
                  <header class="panel-heading tab-bg-info">
                      <ul class="nav nav-tabs">
                          <li class="active">
                              <a data-toggle="tab" href="#profil">
                                  <i class="icon-user"></i>
                                  Profil
                              </a>
                          </li>
                          <li class="">
                              <a data-toggle="tab" href="#modification">
                                  <i class="icon-envelope"></i>
                                  Modifier le profil
                              </a>
                          </li>
                      </ul>
                  </header>

                  <div class="panel-body">
                      <div class="tab-content">                                    
                          <div id="profil" class="tab-pane">
                            <section class="panel">
                              <div class="panel-body bio-graph-info">
                                  <h1>Profil de l'utilisateur</h1>
                                  <div class="row">
                                      <div class="bio-row">
                                          <p><span>Pseudo </span>: Megan<?php //echo $_SESSION['pseudo'] ?> </p>
                                      </div>                                          
                                      <div class="bio-row">
                                          <p><span>Prénom </span>: Megan<?php //echo $_SESSION['prenom'] ?> </p>
                                      </div>
                                      <div class="bio-row">
                                          <p><span>Nom </span>: Arneau<?php //echo $_SESSION['nom'] ?></p>
                                      </div>                                              
                                      <div class="bio-row">
                                          <p><span>Ville </span>: Talence<?php //echo $_SESSION['ville'] ?></p>
                                      </div>
                                      <div class="bio-row">
                                          <p><span>Département </span>: Gironde<?php  //echo $_SESSION['departement'] ?></p>
                                        </div>
                                  </div>
                              </div>
                            </section>
                            </div>
                          <!-- edit-profile -->
                          <div id="modification" class="tab-pane">
                            <section class="panel">                                          
                                  <div class="panel-body bio-graph-info">
                                      <h1> Informations du profil</h1>
                                      <form id="formID" class="form-horizontal" method="POST" 
                                      action="index.php?page=modification_result">
                                          <div class="form-group">
                                              <label class="col-lg-2 control-label">Ville</label>
                                              <div class="col-lg-6">
                                                  <input type="text" id="ville" name="ville"
                                                  class="form-control validate[required,custom[onlyLetterSp],minSize[2],maxSize[100]], text-input" 
                                                  ">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-lg-2 control-label">Département</label>
                                              <div class="col-lg-6">
                                                  <input type="text" class="form-control validate[required,maxSize[3]]" 
                                                  id="departement" name = "departement" 
                                                   ">
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <label class="col-lg-2 control-label">Email</label>
                                                  <div class="col-lg-6">
                                                    <input type="text" name="email" id="email"
                                                    class="form-control validate[required,custom[email]] text-input" 
                                                     ">
                                                  </div>
                                             </div>   

                                          <div class="form-group">
                                              <div class="col-lg-offset-2 col-lg-10">
                                                  <button type="submit" class="btn btn-primary">Sauver</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </section>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>


