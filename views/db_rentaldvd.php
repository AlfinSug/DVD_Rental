<?php
class db_rentaldvd {
    var $host = "127.0.0.1:3307";
    var $uname = "root";
    var $pass = "alfin3307";
    var $db = "rentaldvd_db";
    var $koneksi = "";
    
    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        if(mysqli_connect_errno()) {
            echo "Database Not Connected =>" . mysqli_connect_error();
        }
    }

    function tampil_data(){
        $conn = mysqli_query($this->koneksi, "select * from cd");
        while($fetch = mysqli_fetch_array($conn)) {
            $out[] = $fetch;
        }
        return $out;
    }

    function insert_data($judul, $genre) {
        mysqli_query($this->koneksi, "insert into cd values('','$judul','$genre')");
    }

    function pickID($id_film) {
        $sql_pick = mysqli_query($this->koneksi, "select * from cd where kode_film='$id_film'");
        return $sql_pick->fetch_array();
    }

    function update_data($judul, $genre, $id_film) {
        $sql_update = "update cd set judul_film='$judul', genre='$genre' where kode_film='$id_film'";
        $exec = mysqli_query($this->koneksi, $sql_update);
    }

    function delete_data($id_film) {
        $sql_delete = mysqli_query($this->koneksi, "delete from cd where kode_film='$id_film'");
    }
}
?>