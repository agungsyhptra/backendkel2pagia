<?php 
include "../env.php";

$res = [
  "status" => 200,
  "msg" => "",
  "body" => "",
];

$Tipe_brg = $_GET['Tipe_brg'];

$d = mysqli_query($conn, "SELECT gambar_brg FROM input_produk WHERE Tipe_brg='$Tipe_brg'");
$ary = mysqli_fetch_array($d);
$gambar_brg = $ary ['gambar_brg'];

unlink("gambar/".$gambar_brg);

$q = mysqli_query($conn, "DELETE FROM input_produk WHERE Tipe_brg='$Tipe_brg'");

if ($q){
  $res['status'] = 200;
  $res['msg'] = "Data berhasil dihapus";
  $res['body'] = "";
} else {
  $res['status'] = 404;
  $res['msg'] = "Data tidak ditemukan";
  $res['body'] = "";
}

echo json_encode($res);

?>