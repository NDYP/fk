<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'Tahun Ajaran';
        $data['title2'] = 'Index Data';
        $data['tahun_ajaran'] = $this->M_Tahun_ajaran->index();
        $this->load->view('template/header', $data);
        $this->load->view('tahun_ajaran/konten', $data);
        $this->load->view('template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('tahun_akademik', 'tahun_akademik', 'required|trim|is_unique[tahun_ajaran.tahun_akademik]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Tahun akademik telah terdaftar'
        ]);

        // $this->form_validation->set_rules('tahun_akademik', 'tahun_akademik', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('semester', 'semester', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tahun Ajaran';
            $data['title2'] = 'Add Data';
            $data['tahun_ajaran'] = $this->M_Tahun_ajaran->index();

            $this->load->view('template/header', $data);
            $this->load->view('tahun_ajaran/add', $data);
            $this->load->view('template/footer', $data);
        } else {

            $tahun_akademik = $this->input->post('tahun_akademik');
            $semester = $this->input->post('semester');
            $status = $this->input->post('status');

            $data = array(
                'semester' => $semester,
                'status' => $status,
                'tahun_akademik' => $tahun_akademik,
                'tahun_akademik' => $tahun_akademik,
            );
            $this->M_Tahun_ajaran->tambah('tahun_ajaran', $data);
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('tahun_ajaran/index', 'refresh');
        }
    }

    function get($id_dosen)
    {
        $data['fat'] = $this->M_Tahun_ajaran->get($id_dosen);
        $url = $data['fat']['id_fat'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('fat/edit/' . $id_dosen . '/'  . $url_slug));
    }
    public function edit($id_tahun_ajaran)
    {

        $this->form_validation->set_rules('tahun_akademik', 'tahun_akademik', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tahun Ajaran';
            $data['title2'] = 'Add Data';
            $data['tahun_ajaran'] = $this->M_Tahun_ajaran->get($id_tahun_ajaran);

            $this->load->view('template/header', $data);
            $this->load->view('tahun_ajaran/edit', $data);
            $this->load->view('template/footer', $data);
        } else {
            $id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
            $tahun_akademik = $this->input->post('tahun_akademik');
            $semester = $this->input->post('semester');
            $status = $this->input->post('status');
            $data = array(
                'semester' => $semester,
                'status' => $status,
                'id_tahun_ajaran' => $id_tahun_ajaran,
                'tahun_akademik' => $tahun_akademik,
            );
            $this->M_Tahun_ajaran->update('tahun_ajaran', $data, array('id_tahun_ajaran' => $id_tahun_ajaran));
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('tahun_ajaran/index', 'refresh');
        }
    }


    public function hapus($id_tahun_ajaran)
    {
        $data = $this->M_Tahun_ajaran->get($id_tahun_ajaran);
        if ($data) {
            $this->M_Tahun_ajaran->hapus($id_tahun_ajaran);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('fat/index', 'refresh');
        }
    }
}