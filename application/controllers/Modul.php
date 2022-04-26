<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Modul');
        $this->load->model('M_Prodi');
    }
    public function index()
    {
        $data['title'] = 'Modul Mata Kuliah';
        $data['title2'] = 'Index Data';
        $data['modul'] = $this->M_Modul->index();
        $this->load->view('template/header', $data);
        $this->load->view('modul/konten', $data);
        $this->load->view('template/footer', $data);
    }
    function tambah($program_studi)
    {
        $this->form_validation->set_rules('kode', 'kode', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',

        ]);
        $this->form_validation->set_rules('mata_kuliah', 'mata_kuliah', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sks', 'sks', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('kurikulum', 'kurikulum', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);

        // ]);
        $this->form_validation->set_rules('prodi', 'prodi', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            if ($program_studi == 'profesi-dokter') {
                $data['title'] = 'Profesi Dokter';
            } else {
                $data['title'] = 'Pendidikan Dokter';
            }
            $data['title2'] = 'Add Modul';
            $data['prodi'] = $this->M_Prodi->index();
            $data['modul'] = $this->M_Modul->index();
            $data['program_studi'] = $program_studi;
            $this->load->view('template/header', $data);
            if ($program_studi == 'profesi-dokter') {
                $this->load->view('modul/add_profesi', $data);
            } else {
                $this->load->view('modul/add_pendidikan', $data);
            }

            $this->load->view('template/footer', $data);
        } else {
            $kode = $this->input->post('kode');
            $mata_kuliah = $this->input->post('mata_kuliah');
            $sks = $this->input->post('sks');
            $semester = $this->input->post('semester');
            $tahun = $this->input->post('tahun');
            $durasi = $this->input->post('durasi');
            $prodi = $this->input->post('prodi');
            $kurikulum = $this->input->post('kurikulum');


            $data = array(
                'kode' => $kode,
                'mata_kuliah' => $mata_kuliah,
                'sks' => $sks,
                'semester' => (!empty($semester)) ? $semester : NULL,
                'tahun' => (!empty($tahun)) ? $tahun : NULL,
                'durasi' => (!empty($durasi)) ? $durasi : NULL,
                'prodi' => (!empty($prodi)) ? $prodi : NULL,
                'kurikulum' => $kurikulum,

            );
            // var_dump($data);
            $this->M_Modul->tambah('modul', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            $this->session->set_flashdata('balik', $prodi);

            redirect(base_url() . "modul/lihat/" . $prodi);
        }
    }


    function lihat($id_prodi)
    {
        // if ($this->session->flashdata('balik')) {
        //     $id_prodi = $this->session->flashdata('data_name');
        // }
        $modul = $this->M_Modul->get($id_prodi)->row_array();
        $data['title'] = $modul['program_studi'];
        $x = $modul['program_studi'];
        $data['prodi'] = url_title(convert_accented_characters($x), 'dash', TRUE);
        $data['title2'] = 'Index Mata Kuliah';
        $data['modul'] = $this->M_Modul->get($id_prodi)->result_array();
        $this->load->view('template/header', $data);
        if ($modul['program_studi'] == 'Profesi Dokter') {
            $this->load->view('modul/detail_profesi', $data);
        } else {
            $this->load->view('modul/detail', $data);
        }

        $this->load->view('template/footer', $data);
    }
    public function edit($id_modul)
    {
        $this->form_validation->set_rules('kode', 'kode', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',

        ]);
        $this->form_validation->set_rules('mata_kuliah', 'mata_kuliah', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sks', 'sks', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('prodi', 'prodi', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('kurikulum', 'kurikulum', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $modul = $this->M_Modul->detail($id_modul);
            $data['title'] = $modul['mata_kuliah'];
            $data['title2'] = 'Edit Data';
            $data['modul'] = $this->M_Modul->detail($id_modul);
            $data['prodi'] = $this->M_Prodi->index();
            $this->load->view('template/header', $data);
            $this->load->view('modul/edit', $data);
            $this->load->view('template/footer', $data);
            // print_r($data['modul']['prodi']);
            // print_r($data['prodi']);
        } else {
            $id_modul = $this->input->post('id_modul');
            $kode = $this->input->post('kode');
            $mata_kuliah = $this->input->post('mata_kuliah');
            $sks = $this->input->post('sks');
            $semester = $this->input->post('semester');
            $tahun = $this->input->post('tahun');
            $durasi = $this->input->post('durasi');
            $prodi = $this->input->post('prodi');
            $kurikulum = $this->input->post('kurikulum');


            $data = array(
                'kode' => $kode,
                'mata_kuliah' => $mata_kuliah,
                'sks' => $sks,
                'semester' => (!empty($semester)) ? $semester : NULL,
                'tahun' => (!empty($tahun)) ? $tahun : NULL,
                'durasi' => (!empty($durasi)) ? $durasi : NULL,
                'prodi' => $prodi,
                'kurikulum' => $kurikulum,

            );
            // var_dump($data);
            $this->M_Modul->update('modul', $data, array('id_modul' => $id_modul));
            $this->session->set_flashdata('flash', 'diubah');

            redirect(base_url() . "modul/lihat/" . $prodi);
        }
    }
    public function hapus($id_modul)
    {
        $data = $this->M_Modul->get($id_modul);
        if ($data) {
            $this->M_Modul->hapus($id_modul);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('prodi/index', 'refresh');
        }
    }
}