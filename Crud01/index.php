
<?php

require 'db.php';
$sql = 'SELECT * FROM crudSimple ';


if( isset($_POST['ASC']) ) {
    $sql = "SELECT * FROM crudSimple
    ORDER BY nama ASC ";   
} elseif( isset($_POST['DESC']) ) {
    $sql = "SELECT * FROM crudSimple
    ORDER BY nama DESC ";      
} else {
    $sql = 'SELECT * FROM crudSimple ORDER BY id ASC';
}


if( isset($_POST["cari"]) ) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM crudSimple
    WHERE
  nama LIKE '%$keyword%' OR
  alamat LIKE '%$keyword%'";
    
}




$statement = $connection->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);


?>

<?php require 'header.php'; ?>


<div class="container ">
<div class="tabelOutput">
   
    <form method="post" action="#" class="form-inline float-md-right ">
        
        <input class="form-control mr-sm-2 " type="text" name="keyword" placeholder="Search" aria-label="Search" autocomplete="off" autofocus>

        <button class="btn btn-dark my-3 my-sm-1 " type="submit" name="cari">Search</button>
    </form>

    <form action="delete.php" method="post" id="form-delete">

    <table id="mytable" class="table  mr-2">

        <button type="submit" name="delete" value="delete" id="btn-delete" class="btn btn-dark float-left " > Delete </button>
        
        <a class="btn btn-dark float-left ml-3" href="tambah.php"> Add Data </a>

        <thead class="thead-dark table-bordered text-center ">
             
        <tr>
            <th scope="col" width="5%"> <input type="checkbox" id="checkAll" class="checkAll"></th>
            <th scope="col" width="5%">ID</th>
            <th scope="col" width="30%">Nama</th>
            <th scope="col" width="40%">Alamat</th>
            <th scope="col" width="20%" >Aksi</th>
        </tr>
    </thead>

    <tbody>

    <?php
    foreach($result as $row):

    ?>

        <tr>

        <td> <input type="checkbox" class="checkItem" id="checkItem" value="<?= $row->id; ?>" name="id[]"></td>

        <td><?= $row->id; ?></td>
        <td><?= $row->nama; ?></td>
        <td><?= $row->alamat; ?></td>

        <td class="float-right">
        <a href="edit.php?id=<?= $row->id ?>" class="btn btn-light">Edit</a>
        </td>

        </tr>
    <?php
        endforeach;
    ?>

    </tbody>
    </table>
</div>
<!-- End Table -->

</div>

</form>

<?php require 'footer.php'; ?>