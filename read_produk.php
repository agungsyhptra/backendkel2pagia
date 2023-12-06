<?php

$res = [
    "status" => 200,
    "msg" => "",
    "body" => [
        "data" => []
    ]
];


$tipe = $_GET['tipe'];

// koneksi
$conn = mysqli_connect("localhost", "root", "", "viggo");
if (!$conn) {
    $res['status'] = 500;
    $res['msg'] = "Server ada gangguan";
} else {

    // query read
    $query = mysqli_query($conn, "SELECT * FROM barang_tb WHERE tipe = '$tipe'");

    if (mysqli_num_rows($query) > 0) {
        $res['status'] = 200;
        $res['msg'] = "Data produk ditemukan";
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }
        $res['body']['data'] = $data;
    } else {
        $res['status'] = 404;
        $res['msg'] = "Data produk tidak ditemukan";
    }
}


echo json_encode($res);

?>

