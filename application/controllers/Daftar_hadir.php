<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_hadir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Nilai_akhir');
    }
    public function index()
    {
        $data['title'] = 'Daftar hadir';
        $data['title2'] = 'Semester ini';
        $data['tahun_ajaran'] = $this->M_Nilai_akhir->index();
        $this->load->view('template/header', $data);
        $this->load->view('daftar_hadir/konten', $data);
        $this->load->view('template/footer', $data);
    }
    function lihat($id_tahun_ajaran)
    {
        $data['title'] = 'Daftar Hadir';

        //list modul yang di koordinator
        $data['modul'] = $this->M_Nilai_akhir->get($id_tahun_ajaran)->result_array();

        //ambil id mobil pass ke cetak
        $data['get_id_modul'] = $this->M_Nilai_akhir->get($id_tahun_ajaran)->row_array();
        $data['id_modul'] = $data['get_id_modul']['id_modul'];

        //tiyle
        $data['th'] = $this->db->get_where('tahun_ajaran', array('id_tahun_ajaran' => $id_tahun_ajaran))->row_array();
        $data['title2'] = $data['th']['tahun_akademik'];

        $this->load->view('template/header', $data);
        $this->load->view('daftar_hadir/modul', $data);
        $this->load->view('template/footer', $data);
    }
    function cetak($id_modul)
    {
        $data['title'] = 'Modul yang dikoordinator';
        //list mhs yg ambil modul
        $data['mahasiswa'] = $this->M_Nilai_akhir->mahasiswa($id_modul)->result_array();

        //detail modul + pengampu
        $data['detail_modul'] = $this->M_Nilai_akhir->mahasiswa($id_modul)->row_array();

        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'landscape');
        $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->render();
        // $this->pdf->filename = $filename . '.pdf';
        $this->pdf->load_view('daftar_hadir/cetak', $data);
    }
}