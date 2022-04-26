<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Koordinator_modul');
        $this->load->model('M_Registrasi');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'Registrasi';
        $data['title2'] = 'Index Data';
        $data['registrasi'] = $this->M_Tahun_ajaran->index();
        $this->load->view('template/header', $data);
        $this->load->view('registrasi_admin/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['registrasi']);
    }
    function lihat($id_tahun_ajaran)
    {

        $registrasi = $this->db->get_where('tahun_ajaran', array('id_tahun_ajaran' => $id_tahun_ajaran))->row_array();
        $data['title'] = $registrasi['tahun_akademik'];
        $data['title2'] = $registrasi['semester'];
        $data['title2'] = $registrasi['semester'];
        $data['id_tahun_ajaran'] = $registrasi['id_tahun_ajaran'];
        $data['registrasi'] = $this->M_Registrasi->detail($id_tahun_ajaran);
        $this->load->view('template/header', $data);
        $this->load->view('registrasi_admin/detail', $data);
        $this->load->view('template/footer', $data);
        // print_r($data['prodi']);
    }
    function slip($id_registrasi)
    {
        $data = $this->db->get_where('registrasi', ['id_registrasi' => $id_registrasi])->row_array();
        force_download('assets/berkas/mahasiswa/' . $data['slip'], NULL);
    }
    function bukti($id_registrasi)
    {
        $data = $this->db->get_where('registrasi', ['id_registrasi' => $id_registrasi])->row_array();
        force_download('assets/berkas/mahasiswa/' . $data['regis_univ'], NULL);
    }
    function terima($id_registrasi)
    {
        $data = [
            'status' => 'Diterima'
        ];
        $regis = $this->db->get_where('registrasi', ['id_registrasi' => $id_registrasi])->row_array();
        $this->db->update('registrasi', $data, ['id_registrasi' => $id_registrasi]);
        $this->session->set_flashdata('flash', 'diterima');

        redirect(base_url() . "registrasi/lihat/" . $regis['id_tahun_ajaran']);
    }
    function tolak($id_registrasi)
    {
        $catatan_revisi = $this->input->post('catatan_revisi');
        $data = [
            'status' => 'Ditolak',
            'catatan_revisi' => $catatan_revisi
        ];
        $regis = $this->db->get_where('registrasi', ['id_registrasi' => $id_registrasi])->row_array();
        $this->db->update('registrasi', $data, ['id_registrasi' => $id_registrasi]);
        $this->session->set_flashdata('flash', 'ditolak');

        redirect(base_url() . "registrasi/lihat/" . $regis['id_tahun_ajaran']);
    }
}