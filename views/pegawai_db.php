<?php
class pegawai_db {
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
        $conn = mysqli_query($this->koneksi, "select * from pegawai");
        while($fetch = mysqli_fetch_array($conn)) {
            $out[] = $fetch;
        }
        return $out;
    }

    function insert_data($nama_pgw, $pass) {
        mysqli_query($this->koneksi, "insert into pegawai values('','$nama_pgw','$pass')");
    }

    function pickID($id_p) {
        $sql_pick = mysqli_query($this->koneksi, "select * from pegawai where id_pgw='$id_p'");
        return $sql_pick->fetch_array();
    }

    function update_data($nama_pgw, $pass, $id_p) {
        $sql_update = "update pegawai set nama_pgw='$nama_pgw', password_pgw='$pass' where id_pgw='$id_p'";
        $exec = mysqli_query($this->koneksi, $sql_update);
    }

    function delete_data($id_p) {
        $sql_delete = mysqli_query($this->koneksi, "delete from pegawai where id_pgw='$id_p'");
    }
}
?>