<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Krs_mhs');
        $this->load->model('M_Registrasi');
        $this->load->model('M_Tahun_ajaran');
        $this->load->model('M_Konsultasi');
    }
    public function index()
    {
        $data['title'] = 'Konsultasi KRS';
        $data['title2'] = 'Index Data';
        $data['krs'] = $this->M_Konsultasi->index();
        $this->load->view('template/header', $data);
        $this->load->view('konsultasi/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['krs']);
    }

    function lihat($id_krs)
    {
        $data['title'] = 'Konsultasi';
        $data['title2'] = 'Detail KRS';

        $data['detail_krs'] = $this->M_Konsultasi->get($id_krs);
        $krs = $data['detail_krs']['smt'];
        $data['sks_yad'] = $this->M_Krs_mhs->sks_yad();
        $id_mahasiswa = $data['detail_krs']['id_mahasiswa'];
        $data['sks_yad_edit'] = $this->M_Krs_mhs->sks_yad_edit($krs);
        $data['krs'] = $this->M_Konsultasi->krs_list_edit($krs, $id_mahasiswa);
        // $data['dosen_pa'] = $this->db->get_where('dosen', array('id_dosen' => $this->session->userdata('dosen_pa')))->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('konsultasi/edit', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['krs']);
    }
    function terima($id_krs)
    {
        $data['title'] = 'Konsultasi';
        $data['title2'] = 'Detail KRS';

        $data = array(
            'status' => 'Diterima',
        );
        $this->M_Krs_mhs->update('krs', $data, array('id_krs' => $id_krs));
        redirect('konsultasi');
    }
    function revisi($id_krs)
    {
        $data['title'] = 'Konsultasi';
        $data['title2'] = 'Detail KRS';

        $data = array(
            'status' => 'Revisi',
        );
        $this->M_Krs_mhs->update('krs', $data, array('id_krs' => $id_krs));
        redirect('konsultasi');
    }
}