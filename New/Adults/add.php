

<div class="row">
          <div class="col-lg-12">
                  <h3 class="page-header"><i class="fa fa-laptop"></i>Ajout de fichiers</h3>
                  <ol class="breadcrumb">
                          <li><i class="fa fa-home"></i><a href="accueil_adultes.php">Accueil</a></li>
                          <li><i class="fa fa-laptop"></i>Ajout de fichiers</li>						  	
                  </ol>
          </div>
  </div>

<link rel="stylesheet" type="text/css" href="./dropzone/dropzone.css" />
<script type="text/javascript" src="./dropzone/dropzone.js"></script>

<!-- Change /upload-target to your upload address -->
<form id="myDropzone" method='post' class="dropzone" action="upload-target.php" enctype='multipart/form-data'>
    
    <!-- If the dropzone is not supported-->
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
    
</form>

<input type="submit" id="add" value="Envoyer"/>