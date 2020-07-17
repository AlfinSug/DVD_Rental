
<?php include('db_rentaldvd.php');
$connect = new db_rentaldvd();

$id_film = 0;
$judul ="";
$genre ="";

$action = $_GET['aksi'];
if($action == "save") {
    $connect->insert_data($_POST['judul_film'], $_POST['genre']);
    header('location: film.php?msg=sukses');
}
elseif($action == "edit") {
    $judul= $_POST['judul_film'];
    $genre= $_POST['genre'];
    $id = $_GET['id'];
    echo $judul;
    echo $genre;
    echo $id;
    $connect->update_data($judul, $genre, $id);
    header('location: film.php?msg=updated');
}
elseif($action == "del") {
    $id_film = $_GET['id'];
    $connect->delete_data($id_film);
    header('location: film.php');
}

?>