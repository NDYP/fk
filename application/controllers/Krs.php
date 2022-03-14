<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Krs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Krs');
        $this->load->model('M_Krs_mhs');
        $this->load->model('M_Registrasi');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'KRS/Semester';
        $data['title2'] = 'Index Data';
        $data['krs'] = $this->M_Tahun_ajaran->index();
        $this->load->view('template/header', $data);
        $this->load->view('krs/konten', $data);
        $this->load->view('template/footer', $data);
    }

    function lihat($id_tahun_ajaran)
    {
        $data['title'] = 'KRS';
        $data['title2'] = 'Edit/Lihat Data';

        $data['krs'] = $this->M_Krs->get($id_tahun_ajaran);

        $this->load->view('template/header', $data);
        $this->load->view('krs/detail', $data);
        $this->load->view('template/footer', $data);
    }
    function cetak($id_krs)
    {
        $data['detail_krs'] = $this->M_Krs_mhs->get($id_krs);
        $id_mahasiswa = $data['detail_krs']['id_mahasiswa'];
        $data['krs'] = $this->M_Krs->krs_get($id_mahasiswa);
        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->load_view('krs_mhs/cetak', $data);
    }
}