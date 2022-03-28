<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Khs_mhs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Khs_mhs');
    }
    public function index()
    {
        $data['title'] = 'KHS/Semester';
        $data['title2'] = 'Index Data';
        $data['khs'] = $this->M_Khs_mhs->index();
        $this->load->view('template/header', $data);
        $this->load->view('khs_mhs/konten', $data);
        $this->load->view('template/footer', $data);
    }
    function cetak($id_khs)
    {
        $data['khs'] = $this->M_Khs_mhs->get_khs($id_khs);
        $id_mahasiswa = $data['khs']['id_mahasiswa'];
        $semester = $data['khs']['semester'];

        $data['list'] = $this->M_Khs_mhs->krs_get($id_mahasiswa, $semester);
        $data['khs_list'] = $this->M_Khs_mhs->list_khs($semester);

        //list khs sebelumnya
        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->load_view('khs/khs', $data);
        // var_dump($data['khs']);
    }
}