<?php
class member_db {
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
        $conn = mysqli_query($this->koneksi, "select * from member");
        while($fetch = mysqli_fetch_array($conn)) {
            $out[] = $fetch;
        }
        return $out;
    }

    function insert_data($nama, $alamat, $notelp) {
        mysqli_query($this->koneksi, "insert into member values('','$nama','$alamat', '$notelp')");
    }

    function pickID($id_m) {
        $sql_pick = mysqli_query($this->koneksi, "select * from member where id_member='$id_m'");
        return $sql_pick->fetch_array();
    }

    function update_data($nama, $alamat, $notelp, $id_m) {
        $sql_update = "update member set nama_member='$nama', alamat='$alamat', notelp='$notelp' where id_member='$id_m'";
        $exec = mysqli_query($this->koneksi, $sql_update);
    }

    function delete_data($id_m) {
        $sql_delete = mysqli_query($this->koneksi, "delete from member where id_member='$id_m'");
    }
}
?>