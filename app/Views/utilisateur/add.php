<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-md-4">
<?php if(isset($messages)):?>
   
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <?php 
                foreach ($messages as $key => $value) {
                   echo $value."<br>";
                }
            ?>

        </div>
<?php endif;?>
<?php if(isset($message)):?>
    
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
        </svg>
            <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <?php echo $message;?>

        </div>
      
<?php endif;?>

<form action="/user" method="post" >
<div class="mb-3 ">
    <div class="col-sm-15">
      <input type="text" class="form-control"  name="nom" placeholder="votre nom">
    </div>
</div>
<div class="mb-3 c">
    <div class="col-sm-15">
      <input type="text" class="form-control" name="prenom" placeholder="entrer le prenom">
    </div>
</div>
<div class="mb-3">
    <div class="col-sm-15">
      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="xyz@gmail.com">
    </div>
</div>
  <div class="mb-3">
    <div class="col-sm-18">
      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="password">
    </div>
  </div>
  <div class="mb-3">
      <input type="submit" class="btn btn-success" name="valider" value="Ajouter">
 </div>   
</form>
</div>
<div class="col-md-7">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    <?php 
      foreach ($users as  $user) {
        echo "<tr><th scope='row'>".$user['nom']."</th>";
        echo "<td>".$user['prenom']."</td>";
        echo "<td>".$user['email']."</td>";
        $v = $user['nom']."/".$user['id'];
        echo "<td><a href='/usersup/".$v."' type='button' class='btn btn-light'><span class='bi bi-trash red-color'></span></a></td></tr>";

      }
    ?>

  </tbody>
</table>
<?= $pager->makeLinks(intval($page), $perPage, $total, 'custom_view');?> 
</div>
      <div class="col-md-1">
      <a href="/facture" type="button" class="btn btn-success"><span class="bi bi-printer"></span>Imprimer</a>
      </div>
</div>

 <?= $this->endSection(); ?>
