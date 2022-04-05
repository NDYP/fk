<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat_fakultas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pejabat_fakultas');
        $this->load->model('M_Dosen');
    }
    public function index()
    {
        $data['title'] = 'Pejabat Fakultas';
        $data['title2'] = 'Index Data';
        $data['pejabat_fakultas'] = $this->M_Pejabat_fakultas->index();
        $this->load->view('template/header', $data);
        $this->load->view('pejabat_fakultas/konten', $data);
        $this->load->view('template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('id_dosen', 'id_dosen', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim|is_unique[dekanat.jabatan]', [
            'required' =>
            'Tidak Boleh Kosong!',
            'is_unique' => 'Nama yang sama telah terdaftar'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pejabat Fakultas';
            $data['title2'] = 'Add Data';
            $data['dosen'] = $this->M_Dosen->index();
            $data['jabatan'] = $this->M_Pejabat_fakultas->jabatan();

            $this->load->view('template/header', $data);
            $this->load->view('pejabat_fakultas/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            $id_dosen = $this->input->post('id_dosen');
            $jabatan = $this->input->post('jabatan');


            $data = array(
                'id_dosen' => $id_dosen,
                'jabatan' => $jabatan,

            );
            // var_dump($data);
            $this->M_Pejabat_fakultas->tambah('dekanat', $data);
            $this->session->set_flashdata('flash', 'ditambah');

            redirect('pejabat_fakultas/index', 'refresh');
        }
    }

    function get($id_dekanat)
    {
        $data['fat'] = $this->M_Pejabat_fakultas->get($id_dekanat);
        $url = $data['fat']['id_fat'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('fat/edit/' . $id_dekanat . '/'  . $url_slug));
    }
    public function edit($id_dekanat)
    {
        $this->form_validation->set_rules('id_dosen', 'id_dosen', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pejabat Fakultas';
            $data['title2'] = 'Edit Data';
            $data['pejabat_fakultas'] = $this->M_Pejabat_fakultas->get($id_dekanat);
            $data['dosen'] = $this->M_Dosen->index();
            $data['jabatan'] = $this->M_Pejabat_fakultas->jabatan();

            $this->load->view('template/header', $data);
            $this->load->view('pejabat_fakultas/edit', $data);
            $this->load->view('template/footer', $data);
        } else {
            $id_dosen = $this->input->post('id_dosen');
            $jabatan = $this->input->post('jabatan');
            $id_dekanat = $this->input->post('id_dekanat');


            $data = array(
                'id_dosen' => $id_dosen,
                'jabatan' => $jabatan,

            );
            // var_dump($data);
            $this->M_Pejabat_fakultas->update('dekanat', $data, array('id_dekanat' => $id_dekanat));
            $this->session->set_flashdata('flash', 'diubah');
            redirect('pejabat_fakultas/index', 'refresh');
        }
    }
    public function detail($id_dekanat)
    {
        $data['title'] = 'FAT';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['fat'] = $this->M_Pejabat_fakultas->get($id_dekanat);
        $id_dekanat = $data['fat']['id_dekanat'];
        $data['pelanggan'] = $this->M_Pejabat_fakultas->pelanggan($id_dekanat);
        $this->load->view('template/header1', $data);
        $this->load->view('fat/detail', $data);
        $this->load->view('template/footer2', $data);
    }

    public function hapus($id_dekanat)
    {
        $data = $this->M_Pejabat_fakultas->get($id_dekanat);
        if ($data) {
            $this->M_Pejabat_fakultas->hapus($id_dekanat);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('fat/index', 'refresh');
        }
    }
}