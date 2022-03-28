<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_aktif extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Surat_aktif_mhs');
        $this->load->model('M_Registrasi');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'Surat Aktif';
        $data['title2'] = 'Index Data';
        $data['surat_aktif'] = $this->M_Surat_aktif_mhs->index2();
        $this->load->view('template/header', $data);
        $this->load->view('surat_aktif/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['registrasi']);
    }

    function terima($id_surat_aktif)
    {
        $data = array(
            'status' => '2',
        );
        $this->M_Surat_aktif_mhs->update('surat_aktif', $data, array('id_surat_aktif' => $id_surat_aktif));
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('surat_aktif');
    }
    function tolak($id_surat_aktif)
    {
        $data = array(
            'status' => '1',
        );
        $this->M_Surat_aktif_mhs->update('surat_aktif', $data, array('id_surat_aktif' => $id_surat_aktif));
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('surat_aktif');
    }
    function cetak($id_surat_aktif)
    {
        $data['surat_aktif'] = $this->M_Surat_aktif_mhs->get($id_surat_aktif);
        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->render();
        $this->pdf->load_view('surat_aktif_mhs/cetak', $data);
        // var_dump($data['sks_yad']);
    }
}