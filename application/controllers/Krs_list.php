<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Krs_list extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Krs_mhs');
        $this->load->model('M_Krs_mhs');
        $this->load->model('M_Modul');
        $this->load->model('M_Tahun_ajaran');
    }
    function tambah()
    {
        $this->form_validation->set_rules('id_modul', 'id_modul', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pilih Modul KRS';
            $data['title2'] = 'Add Data';
            $data['modul'] = $this->db->get_where(
                'modul',
                array('prodi' => $this->session->userdata('prodi'))
            )->result_array();
            $this->load->view('template/header', $data);
            if ($this->session->userdata('prodi') == 4) {
                $this->load->view('krs_list/add_profesi', $data);
            } elseif ($this->session->userdata('prodi') == 3) {
                $this->load->view('krs_list/add_pendidikan', $data);
            }
            $this->load->view('template/footer', $data);
        } else {
            $id_modul = $this->input->post('id_modul');
            $id_mahasiswa = $this->session->userdata('id_mahasiswa');
            $data = array(
                'id_modul' => $id_modul,
                'id_mahasiswa' => $id_mahasiswa,
            );
            // var_dump($data);
            $this->M_Modul->tambah('detail_krs', $data);
            $this->session->set_flashdata('flash', 'ditambah, silahkan tekan tombol simpan untuk validasi modul');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function hapus($id_detail_krs)
    {
        $data = $this->db->get_where(
            'detail_krs',
            array('id_detail_krs' => $id_detail_krs)
        )->row_array();
        if ($data) {
            $this->M_Krs_mhs->hapus($id_detail_krs);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect('krs_mhs/tambah');
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('krs_mhs/tambah');
        }
    }
}