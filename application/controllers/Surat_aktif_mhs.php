<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_aktif_mhs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Surat_aktif_mhs');
        $this->load->model('M_Khs');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'Surat Aktif';
        $data['title2'] = 'Index Data';
        $data['surat_aktif'] = $this->M_Surat_aktif_mhs->index();
        $this->load->view('template/header', $data);
        $this->load->view('surat_aktif_mhs/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['registrasi']);
    }
    function tambah()
    {

        $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        $data['ttd'] = $this->M_Khs->ttd();
        $ttd_nama = $data['ttd']['nama'];
        $ttd_nip = $data['ttd']['nip'];
        $semester = $this->M_Surat_aktif_mhs->semester();
        $x = $semester['semester'];
        $data = array(
            'id_mahasiswa' => $id_mahasiswa,
            'semester' => $x,
            'status' => '0',
            'ttd_nama' => $ttd_nama,
            'ttd_nip' => $ttd_nip,
        );
        $this->M_Surat_aktif_mhs->tambah('surat_aktif', $data);
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('surat_aktif_mhs');
    }
    function cetak($id_surat_aktif)
    {
        $data['surat_aktif'] = $this->M_Surat_aktif_mhs->get($id_surat_aktif);
        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->render();
        // $this->pdf->filename = $filename . '.pdf';
        $this->pdf->load_view('surat_aktif_mhs/cetak', $data);
        // var_dump($data['sks_yad']);
    }
}