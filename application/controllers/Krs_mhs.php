<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Krs_mhs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Krs_mhs');
        $this->load->model('M_Registrasi');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'KRS/Semester';
        $data['title2'] = 'Index Data';
        $data['krs'] = $this->M_Krs_mhs->index();
        $this->load->view('template/header', $data);
        $this->load->view('krs_mhs/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['registrasi']);
    }
    function tambah()
    {
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_registrasi', 'id_registrasi', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('semester', 'semester', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'KRS';
            $data['title2'] = 'Add Data';
            $data['semester'] = $this->M_Krs_mhs->semester();
            $data['registrasi'] = $this->M_Krs_mhs->registrasi();
            $data['sks_kumul'] = $this->M_Krs_mhs->sks_kumul();
            $data['sks_yad'] = $this->M_Krs_mhs->sks_yad();
            $data['krs'] = $this->M_Krs_mhs->krs_list();
            $data['dosen_pa'] = $this->db->get_where('dosen', array('id_dosen' => $this->session->userdata('dosen_pa')))->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('krs_mhs/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            $id_mahasiswa = $this->input->post('id_mahasiswa');
            $id_registrasi = $this->input->post('id_registrasi');
            $semester = $this->input->post('semester');
            $data = array(
                'id_mahasiswa' => $id_mahasiswa,
                'id_registrasi' => $id_registrasi,
                'semester' => $semester,
            );
            // var_dump($data);
            $this->M_Koordinator_modul->tambah('krs', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('krs_mhs');
        }
    }
}