<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<form action="/utilisateur/login1" method="post" class="col g-3">
<div class="mb-3 col-md-6 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail" name="email" placeholder="xyz@gmail.com">
    </div>
  </div>
  <div class="mb-3 col-md-6 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" id="inputPassword">
    </div>
  </div>
  <div class="mb-3 col-md-6 row">
      <input type="submit" class="btn btn-success" name="valider" value="Connexion">
    
  </div>
</form>
       
    <p><strong><?php echo $message;?></strong></p>
 <?= $this->endSection(); ?>
