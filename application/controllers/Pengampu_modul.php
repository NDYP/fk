<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengampu_modul extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pengampu_modul');
        $this->load->model('M_Prodi');
        $this->load->model('M_Dosen');
        $this->load->model('M_Modul');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'Pengampu Modul';
        $data['title2'] = 'Index Data';
        $data['pengampu_modul'] = $this->M_Tahun_ajaran->index();
        $this->load->view('template/header', $data);
        $this->load->view('pengampu_modul/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['pengampu_modul']);
    }
    function tambah($id_tahun_ajaran)
    {

        $this->form_validation->set_rules('id_dosen', 'id_dosen', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_modul', 'id_modul', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_tahun_ajaran', 'id_tahun_ajaran', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengampu Modul';
            $data['title2'] = 'Add Data';
            $data['dosen'] = $this->M_Dosen->index();
            $data['modul'] = $this->db->get('modul')->result_array();
            $data['pengampu_modul'] = $this->M_Pengampu_modul->index();
            $data['tahun_ajaran'] = $this->M_Tahun_ajaran->index();
            $data['id_tahun_ajaran'] = $id_tahun_ajaran;
            $this->load->view('template/header', $data);
            $this->load->view('pengampu_modul/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            $id_modul = $this->input->post('id_modul');
            $id_dosen = $this->input->post('id_dosen');
            $x = $this->input->post('id_tahun_ajaran');

            $data = array(
                'id_modul' => $id_modul,
                'id_dosen' => $id_dosen,
                'id_tahun_ajaran' => $x,
            );
            $x = $id_tahun_ajaran;
            // var_dump($data);
            $this->M_Pengampu_modul->tambah('pengampu_modul', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            $this->session->set_flashdata('balik', $x);

            redirect(base_url() . "pengampu_modul/lihat/" . $x);
        }
    }
    function lihat($id_tahun_ajaran)
    {

        $pengampu_modul = $this->db->get_where('tahun_ajaran', array('id_tahun_ajaran' => $id_tahun_ajaran))->row_array();
        $data['title'] = $pengampu_modul['tahun_akademik'];
        $data['title2'] = $pengampu_modul['semester'];
        $data['title2'] = $pengampu_modul['semester'];
        $data['id_tahun_ajaran'] = $pengampu_modul['id_tahun_ajaran'];
        $data['pengampu'] = $this->M_Pengampu_modul->detail($id_tahun_ajaran)->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('pengampu_modul/prodi', $data);
        $this->load->view('template/footer', $data);
        // print_r($data['prodi']);
    }
    public function edit($id_pengampu_modul)
    {
        $this->form_validation->set_rules('id_dosen', 'id_dosen', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_modul', 'id_modul', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_tahun_ajaran', 'id_tahun_ajaran', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $pengampu_modul = $this->M_Pengampu_modul->get($id_pengampu_modul)->row_array();
            $data['title'] = $pengampu_modul['tahun_akademik'];
            $data['title2'] = $pengampu_modul['semester'];

            $data['pengampu_modul'] = $this->M_Pengampu_modul->get($id_pengampu_modul)->row_array();
            $data['prodi'] = $this->M_Pengampu_modul->index();
            $data['dosen'] = $this->M_Dosen->index();
            $data['modul'] = $this->db->get('modul')->result_array();
            $data['tahun_ajaran'] = $this->M_Tahun_ajaran->index();
            $this->load->view('template/header', $data);
            $this->load->view('pengampu_modul/edit', $data);
            $this->load->view('template/footer', $data);
            // var_dump($data['pengampu_modul']);
        } else {
            $id_pengampu_modul = $this->input->post('id_pengampu_modul');
            $id_modul = $this->input->post('id_modul');
            $id_dosen = $this->input->post('id_dosen');
            $x = $this->input->post('id_tahun_ajaran');

            $data = array(
                'id_pengampu_modul' => $id_pengampu_modul,
                'id_modul' => $id_modul,
                'id_dosen' => $id_dosen,
                'id_tahun_ajaran' => $x,
            );
            // var_dump($data);
            $this->M_Pengampu_modul->update('pengampu_modul', $data, array('id_pengampu_modul' => $id_pengampu_modul));
            $this->session->set_flashdata('flash', 'diubah');
            redirect(base_url() . "pengampu_modul/lihat/" . $x);
        }
    }
    public function hapus($id_pengampu_modul)
    {
        $data = $this->M_Pengampu_modul->get($id_pengampu_modul);
        if ($data) {
            $this->M_Pengampu_modul->hapus($id_pengampu_modul);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('prodi/index', 'refresh');
        }
    }
}