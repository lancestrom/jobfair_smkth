<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_perusahaan extends CI_Model
{
    public function countPerusahaan()
    {
        $sql = "SELECT COUNT(*) as jumlah_perusahaan FROM `perusahaan`;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function countPelamar()
    {
        $sql = "SELECT COUNT(*) AS jumlah_pelamar FROM `pelamar_perusahaan`;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function dataPerusahaan()
    {
        $sql = "SELECT * FROM `perusahaan`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function dataPelamar()
    {
        $sql = "SELECT * FROM `pelamar_perusahaan`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function cekPelamar($id_pelamar)
    {
        $sql = "SELECT * FROM `pelamar_perusahaan`
WHERE id_pelamar_perusahaan='$id_pelamar'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function simpanPerusahaan($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('perusahaan', $data);
        }
    }

    public function dataAbsen()
    {
        $sql = "SELECT concat(absen.id_absen,pelamar_perusahaan.id_pelamar_perusahaan) as id,
pelamar_perusahaan.nama_pelamar,pelamar_perusahaan.nomor_telpon,pelamar_perusahaan.asal_sekolah,pelamar_perusahaan.nama_perusahaan,
absen.status,absen.timestam
FROM `absen`
INNER JOIN pelamar_perusahaan
ON absen.id_pelamar=pelamar_perusahaan.id_pelamar_perusahaan;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function simpanPelamar($data = array())
    {
        $jumlah = count($data);

        if ($jumlah > 0) {
            $this->db->insert_batch('pelamar_perusahaan', $data);
        }
    }
}
