<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Prodi');
        $this->load->model('M_Dosen');
    }
    public function index()
    {
        $data['title'] = 'Prodi';
        $data['title2'] = 'Index Data';
        $data['prodi'] = $this->M_Prodi->index();
        $this->load->view('template/header', $data);
        $this->load->view('prodi/konten', $data);
        $this->load->view('template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('program_studi', 'program_studi', 'required|trim|is_unique[prodi.program_studi]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Nama yang sama telah terdaftar'
        ]);
        $this->form_validation->set_rules('kaprodi', 'kaprodi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Prodi';
            $data['title2'] = 'Add Data';
            $data['dosen'] = $this->M_Dosen->index();

            $this->load->view('template/header', $data);
            $this->load->view('prodi/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            $program_studi = $this->input->post('program_studi');
            $kaprodi = $this->input->post('kaprodi');


            $data = array(
                'program_studi' => $program_studi,
                'kaprodi' => $kaprodi,

            );
            //var_dump($data);
            $this->M_Prodi->tambah('prodi', $data);
            $this->session->set_flashdata('flash', 'ditambah');

            redirect('prodi/index', 'refresh');
        }
    }

    function get($id_prodi)
    {
        $data['fat'] = $this->M_Prodi->get($id_prodi);
        $url = $data['fat']['id_fat'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('fat/edit/' . $id_prodi . '/'  . $url_slug));
    }
    public function edit($id_prodi)
    {
        $this->form_validation->set_rules('program_studi', 'program_studi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('kaprodi', 'kaprodi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Prodi';
            $data['title2'] = 'Edit Data';
            $data['prodi'] = $this->M_Prodi->get($id_prodi);
            $data['dosen'] = $this->M_Dosen->index();
            $this->load->view('template/header', $data);
            $this->load->view('prodi/edit', $data);
            $this->load->view('template/footer', $data);
        } else {
            $program_studi = $this->input->post('program_studi');
            $kaprodi = $this->input->post('kaprodi');
            $id_prodi = $this->input->post('id_prodi');


            $data = array(
                'program_studi' => $program_studi,
                'kaprodi' => $kaprodi,

            );
            // var_dump($data);
            $this->M_Prodi->update('prodi', $data, array('id_prodi' => $id_prodi));
            $this->session->set_flashdata('flash', 'diubah');
            redirect('prodi/index', 'refresh');
        }
    }
    public function detail($id_prodi)
    {
        $data['title'] = 'FAT';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['fat'] = $this->M_Prodi->get($id_prodi);
        $id_prodi = $data['fat']['id_prodi'];
        $data['pelanggan'] = $this->M_Prodi->pelanggan($id_prodi);
        $this->load->view('template/header1', $data);
        $this->load->view('fat/detail', $data);
        $this->load->view('template/footer2', $data);
    }

    public function hapus($id_prodi)
    {
        $data = $this->M_Prodi->get($id_prodi);
        if ($data) {
            $this->M_Prodi->hapus($id_prodi);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('fat/index', 'refresh');
        }
    }
}