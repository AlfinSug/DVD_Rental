
<?php include('pegawai_db.php');
$connect = new pegawai_db();

$id_p = 0;
$nama_pgw ="";
$pass ="";

$action = $_GET['aksi'];
if($action == "save") {
    $connect->insert_data($_POST['nama_pgw'], $_POST['password_pgw']);
    header('location: pegawai.php?msg=sukses');
}
elseif($action == "edit") {
    $nama_pgw= $_POST['nama_pgw'];
    $pass= $_POST['password_pgw'];
    $id = $_GET['id'];
    echo $nama_pgw;
    echo $pass;
    echo $id;
    $connect->update_data($nama_pgw, $pass, $id);
    header('location: pegawai.php?msg=updated');
}
elseif($action == "del") {
    $id_p = $_GET['id'];
    $connect->delete_data($id_p);
    header('location: pegawai.php');
}

?>