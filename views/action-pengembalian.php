
<?php include('pengembalian_db.php');
$connect = new pengembalian_db();

$id_p = 0;
$id_pgw = "";
$id_sewa = "";
$tgl_pengembalian = "";

$action = $_GET['aksi'];
if ($action == "save") {
    $connect->insert_data($_POST['id_pgw'], $_POST['id_sewa'], $_POST['tgl_pengembalian']);
    header('location: pengembalian.php?msg=sukses');
} elseif ($action == "edit") {
    $id_pgw = $_POST['id_pgw'];
    $id_sewa = $_POST['id_sewa'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $id = $_GET['id'];
    echo $id_pgw;
    echo $id_sewa;
    echo $tgl_pengembalian;
    echo $id;
    $connect->update_data($id_pgw, $id_sewa, $tgl_pengembalian, $id);
    header('location: pengembalian.php?msg=updated');
} elseif ($action == "del") {
    $id_p = $_GET['id'];
    $connect->delete_data($id_p);
    header('location: pengembalian.php');
}

?>