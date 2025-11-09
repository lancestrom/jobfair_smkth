<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CekAbsen extends CI_Controller
{


    public function index()
    {
        $this->load->view('perusahaan/tampilan_cek_absen');
    }

    public function cek_qrcode()
    {
        $id_pelamar = $this->input->get('id_pelamar');

        $isi['pelamar'] = $this->Model_perusahaan->cekPelamar($id_pelamar);
        $this->load->view('perusahaan/cek_absen_id_pelamar', $isi);
    }

    public function simpanabsen()
    {

        $id_absen = rand(100000, 999999);
        $id_pelamarid_pelamar = $this->input->post('id_pelamar_perusahaan');
        $status = 'HADIR';


        $data = array(
            'id_absen' => $id_absen,
            'id_pelamar' => $id_pelamarid_pelamar,
            'status' => $status
        );
        $this->db->insert('absen', $data);
        redirect('CekAbsen');
    }
}
