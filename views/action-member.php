
<?php include('member_db.php');
$connect = new member_db();

$id_m = 0;
$nama ="";
$alamat ="";
$notelp ="";

$action = $_GET['aksi'];
if($action == "save") {
    $connect->insert_data($_POST['nama_member'], $_POST['alamat'], $_POST['notelp']);
    header('location: member.php?msg=sukses');
}
elseif($action == "edit") {
    $nama= $_POST['nama_member'];
    $alamat= $_POST['alamat'];
    $notelp= $_POST['notelp'];
    $id = $_GET['id'];
    echo $nama;
    echo $alamat;
    echo $notelp;
    echo $id;
    $connect->update_data($nama, $alamat, $notelp, $id);
    header('location: member.php?msg=updated');
}
elseif($action == "del") {
    $id_m = $_GET['id'];
    $connect->delete_data($id_m);
    header('location: member.php');
}

?>