
<?php include('sewa_db.php');
$connect = new sewa_db();

$id_s = 0;
$kode_film = "";
$lama_sewa = "";
$tgl_sewa = "";
$total_bayar = "";

$action = $_GET['aksi'];
if ($action == "save") {
    $connect->insert_data($_POST['kode_film'], $_POST['lama_sewa'], $_POST['tgl_sewa'], $_POST['total_bayar']);
    header('location: penyewaan.php?msg=sukses');
} elseif ($action == "edit") {
    $kode_film = $_POST['kode_film'];
    $lama_sewa = $_POST['lama_sewa'];
    $tgl_sewa = $_POST['tgl_sewa'];
    $total_bayar = $_POST['total_bayar'];
    $id = $_GET['id'];
    echo $kode_film;
    echo $lama_sewa;
    echo $tgl_sewa;
    echo $total_bayar;
    echo $id;
    $connect->update_data($kode_film, $lama_sewa, $tgl_sewa, $total_bayar, $id);
    header('location: penyewaan.php?msg=updated');
} elseif ($action == "del") {
    $id_s = $_GET['id'];
    $connect->delete_data($id_s);
    header('location: penyewaan.php');
}

?>