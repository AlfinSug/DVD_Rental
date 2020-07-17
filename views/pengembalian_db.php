<?php
class pengembalian_db
{
    var $host = "127.0.0.1:3307";
    var $uname = "root";
    var $pass = "alfin3307";
    var $db = "rentaldvd_db";
    var $koneksi = "";

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        if (mysqli_connect_errno()) {
            echo "Database Not Connected =>" . mysqli_connect_error();
        }
    }

    function tampil_data()
    {
        $conn = mysqli_query($this->koneksi, "select * from pengembalian");
        while ($fetch = mysqli_fetch_array($conn)) {
            $out[] = $fetch;
        }
        return $out;
    }

    function insert_data($id_pgw, $id_sewa, $tgl_pengembalian)
    {
        mysqli_query($this->koneksi, "insert into pengembalian values('','$id_pgw','$id_sewa', '$tgl_pengembalian')");
    }

    function pickID($id_p)
    {
        $sql_pick = mysqli_query($this->koneksi, "select * from pengembalian where id_pengembalian='$id_p'");
        return $sql_pick->fetch_array();
    }

    function update_data($id_pgw, $id_sewa, $tgl_pengembalian, $id_p)
    {
        $sql_update = "update pengembalian set id_pgw='$id_pgw', id_sewa='$id_sewa', tgl_pengembalian='$tgl_pengembalian' where id_pengembalian='$id_p'";
        $exec = mysqli_query($this->koneksi, $sql_update);
    }

    function delete_data($id_p)
    {
        $sql_delete = mysqli_query($this->koneksi, "delete from pengembalian where id_pengembalian='$id_p'");
    }
}
