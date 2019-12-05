

<?php
require 'db.php';
$alert = '';
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

if (isset ($_POST['nama'])  && isset($_POST['alamat']) ) {
  
  $sql = 'INSERT INTO crudSimple (nama, alamat) VALUES(:nama, :alamat)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nama' => $nama, ':alamat' => $alamat])) {
    header("Location: index.php");
    
  } else{
    $alert = "Tidak dapat menyimpan atau data belum lengkap!";
  }
}
?>  

<?php require 'header.php'; ?>    

<div class="container ">
    
<!-- Form Input -->
<h1>Simple CRUD PHP</h1>
<br>
    <hr>
<br>

      <?php if(!empty($alert)): ?>
        <div class="alert alert-danger">
          <?= $alert; ?>
        </div>
      <?php endif; ?>

<form method="post">
  <div class="form-group row">
    <label for="nama" class="col-sm-3 col-form-label nama">Nama</label>

    <div class="col-sm-9">
      <input type="text" class="form-control" id="nama" placeholder="You'r Name" name="nama" required>
    </div>
  </div>

  <div class="form-group row">
    <label for="alamat" class="col-sm-3 col-form-label alamat">alamat</label>
    <div class="col-sm-9">

      <input type="text" class="form-control" id="alamat" placeholder="You'r Address" name="alamat" required >
    </div>
  </div>

  <!-- button -->
  <div class="form-group row">
    <div class="col-sm-1">
      <button type="submit" name="btn_simpan" id="btn_simpan" class="btn btn-dark"> Create </button>
    </div>

    <div class="col-sm-1">
    <a class="btn btn-dark float-left ml-4" href="index.php"> Cancel </a>
    </div>
  </div>
</form>
<!-- end button -->

<?php require 'footer.php'; ?>



