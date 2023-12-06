<?php

$res = [
    "status" => 200,
    "msg" => "",
    "body" => [
        "data" => [
            "merk" => "",
            "tipe" => "",
            "nama_laptop" => "",
            "spesifikasi_singkat" => "",
            "gambar" => "",
            "harga" => "",
            "spesifikasi_lengkap" => "",
        ]
    ]
];


$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$nama_laptop = $_POST['nama_laptop'];
$spesifikasi_singkat = $_POST['spesifikasi_singkat'];
$gambar = $_POST['gambar'];
$harga = $_POST['harga'];
$spesifikasi_lengkap = $_POST['spesifikasi_lengkap'];

// koneksi
$conn = mysqli_connect("localhost", "root", "", "viggo");
if (!$conn) {
    $res['status'] = 500;
    $res['msg'] = "Server ada gangguan";
} else {

    // insert database;
    $query = mysqli_query($conn, "INSERT INTO barang_tb (merk, tipe, nama_laptop, spesifikasi_singkat, gambar, harga, spesifikasi_lengkap) VALUES ('$merk', '$tipe', '$nama_laptop', '$spesifikasi_singkat', '$gambar', '$harga', '$spesifikasi_lengkap')");

    if ($query) {
        $res['status'] = 200;
        $res['msg'] = "Data produk atas nama " . $nama_laptop . " berhasil di input";
        $res['body']['data']['merk'] = $merk;
        $res['body']['data']['tipe'] = $tipe;
        $res['body']['data']['nama_laptop'] = $nama_laptop;
        $res['body']['data']['spesifikasi_singkat'] = $spesifikasi_singkat;
        $res['body']['data']['gambar'] = $gambar;
        $res['body']['data']['harga'] = $harga;
        $res['body']['data']['spesifikasi_lengkap'] = $spesifikasi_lengkap;
    } else {
        $res['status'] = 401;
        $res['msg'] = "Data tidak valid";
    }
}


echo json_encode($res);

?>
