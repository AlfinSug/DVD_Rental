<?php
class sewa_db
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
        $conn = mysqli_query($this->koneksi, "select * from sewa");
        while ($fetch = mysqli_fetch_array($conn)) {
            $out[] = $fetch;
        }
        return $out;
    }

    function insert_data($kode_film, $lama_sewa, $tgl_sewa, $total_bayar)
    {
        mysqli_query($this->koneksi, "insert into sewa values('','$kode_film','$lama_sewa', '$tgl_sewa', '$total_bayar')");
    }

    function pickID($id_s)
    {
        $sql_pick = mysqli_query($this->koneksi, "select * from sewa where id_sewa='$id_s'");
        return $sql_pick->fetch_array();
    }

    function update_data($kode_film, $lama_sewa, $tgl_sewa, $total_bayar, $id_s)
    {
        $sql_update = "update sewa set kode_film='$kode_film', lama_sewa='$lama_sewa', tgl_sewa='$tgl_sewa', total_bayar='$total_bayar' where id_sewa='$id_s'";
        $exec = mysqli_query($this->koneksi, $sql_update);
    }

    function delete_data($id_s)
    {
        $sql_delete = mysqli_query($this->koneksi, "delete from sewa where id_sewa='$id_s'");
    }
}
