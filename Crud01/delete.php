<?php
require 'db.php';
// $id = $_GET['id'];
// foreach($id){
// $sql = 'DELETE FROM crudSimple WHERE id=:id';
// $statement = $connection->prepare($sql);
// if ($statement->execute([':id' => $id])) {
//   header("Location:index.php");
// }

// }

$id = $_POST['id']; // Ambil data NIS yang dikirim oleh index.php melalui form submit
$query = "DELETE FROM crudSimple WHERE id IN(".implode(",", $id).")"; // Buat variabel $query untuk menampung query delete

$sql = $connection->prepare($query);
$sql->execute(); // Eksekusi/Jalankan query dari variabel $query

header("location: index.php"); // Redirect ke halaman index.php
?>
