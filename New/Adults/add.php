

<div class="row">
          <div class="col-lg-12">
                  <h3 class="page-header"><i class="fa fa-laptop"></i>Ajout de fichiers</h3>
                  <ol class="breadcrumb">
                          <li><i class="fa fa-home"></i><a href="accueil_adultes.php">Accueil</a></li>
                          <li><i class="fa fa-laptop"></i>Ajout de fichiers</li>						  	
                  </ol>
          </div>
  </div>

<script src="./dropzone/dropzone.js"></script>
<link rel="stylesheet" href="./dropzone/dropzone.css">

<!-- Change /upload-target to your upload address -->
<form id="formDropzoneID" action="accueil_adultes.php?page=upload-target" class="dropzone">
    
    <!-- If the dropzone is not supported-->
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
    
</form>
<input type="submit" value="Envoyer" form="formDropzoneID"/>