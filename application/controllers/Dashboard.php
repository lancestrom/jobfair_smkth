<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Dashboard extends CI_Controller
{


    public function index()
    {
        $this->Model_keamanan->getKeamanan();
        $isi['perusahaan'] = $this->Model_perusahaan->countPerusahaan();
        $isi['pelamar'] = $this->Model_perusahaan->countPelamar();
        $isi['content'] = 'tampilan_home';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function perusahaan()
    {
        $this->Model_keamanan->getKeamanan();
        $isi['perusahaan'] = $this->Model_perusahaan->dataPerusahaan();

        $isi['content'] = 'perusahaan/tampilan_perusahaan';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function upload_perusahaan()
    {
        $this->Model_keamanan->getKeamanan();
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/';
            $config['allowed_types']    = 'xlsx|xls';
            $config['file_name']        = 'doc' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                $file   = $this->upload->data();

                $reader = ReaderEntityFactory::createXLSXReader();
                $reader->open('temp_doc/' . $file['file_name']);

                $save = array();
                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;
                    foreach ($sheet->getRowIterator() as $row) {
                        if ($numRow > 1) {
                            $cells = $row->getCells();
                            $data = array(
                                'id_perusahaan'   => isset($cells[0]) ? trim((string)$cells[0]->getValue()) : null,
                                'kode_perusahaan' => isset($cells[1]) ? trim((string)$cells[1]->getValue()) : null,
                                'nama_perushaan'  => isset($cells[2]) ? trim((string)$cells[2]->getValue()) : null,
                            );
                            $save[] = $data;
                        }
                        $numRow++;
                    }
                }

                // persist only when we have rows
                if (count($save) > 0) {
                    $this->Model_perusahaan->simpanPerusahaan($save);
                }

                // close reader and remove temp file
                $reader->close();
                $tmpPath = 'temp_doc/' . $file['file_name'];
                if (is_file($tmpPath)) {
                    @unlink($tmpPath);
                }

                // Success message for kelas upload
                $this->session->set_flashdata('pesan', '<div class="row"><div class="col-md mt-2"><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Kelas Berhasil Ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div></div>');
                redirect('Dashboard/perusahaan');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Upload error: ' . strip_tags($this->upload->display_errors()) . '</div>');
                redirect('Dashboard/perusahaan');
            }
        }
    }

    public function pelamar_perusahaan()
    {
        $this->Model_keamanan->getKeamanan();
        $isi['pelamar'] = $this->Model_perusahaan->dataPelamar();
        $isi['content'] = 'perusahaan/tampilan_pelaamar_perusahaan';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function upload_pelamar_perusahaan()
    {
        $this->Model_keamanan->getKeamanan();
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']      = './temp_doc/';
            $config['allowed_types']    = 'xlsx|xls';
            $config['file_name']        = 'doc' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('excel')) {
                $file   = $this->upload->data();

                $reader = ReaderEntityFactory::createXLSXReader();
                $reader->open('temp_doc/' . $file['file_name']);

                $save = array();
                foreach ($reader->getSheetIterator() as $sheet) {
                    $numRow = 1;
                    foreach ($sheet->getRowIterator() as $row) {
                        if ($numRow > 1) {
                            $cells = $row->getCells();
                            $data = array(
                                'id_pelamar_perusahaan' => isset($cells[0]) ? trim((string)$cells[0]->getValue()) : null,
                                'nama_pelamar'          => isset($cells[1]) ? trim((string)$cells[1]->getValue()) : null,
                                'jenis_kelamin'         => isset($cells[2]) ? trim((string)$cells[2]->getValue()) : null,
                                'kelas'                 => isset($cells[3]) ? trim((string)$cells[3]->getValue()) : null,
                                'tahun_lulus'           => isset($cells[4]) ? trim((string)$cells[4]->getValue()) : null,
                                'nomor_telpon'          => isset($cells[5]) ? trim((string)$cells[5]->getValue()) : null,
                                'asal_sekolah'          => isset($cells[6]) ? trim((string)$cells[6]->getValue()) : null,
                                'nama_perusahaan'       => isset($cells[7]) ? trim((string)$cells[7]->getValue()) : null,
                            );
                            $save[] = $data;
                        }
                        $numRow++;
                    }
                }

                // persist only when we have rows
                if (count($save) > 0) {
                    $this->Model_perusahaan->simpanPelamar($save);
                }

                // close reader and cleanup
                $reader->close();
                $tmpPath = 'temp_doc/' . $file['file_name'];
                if (is_file($tmpPath)) {
                    @unlink($tmpPath);
                }

                // Success message for kelas upload
                $this->session->set_flashdata('pesan', '<div class="row"><div class="col-md mt-2"><div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data Kelas Berhasil Ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div></div>');
                redirect('Dashboard/pelamar_perusahaan');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Upload error: ' . strip_tags($this->upload->display_errors()) . '</div>');
                redirect('Dashboard/perusahaan');
            }
        }
    }

    public function absen_pelamar()
    {
        $this->Model_keamanan->getKeamanan();
        $isi['pelamar'] = $this->Model_perusahaan->dataAbsen();
        $isi['content'] = 'perusahaan/tampilan_absen_pelamar';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_all_pelamar()
    {
        $this->db->empty_table('pelamar_perusahaan');
        redirect('Dashboard/pelamar_perusahaan');
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
