<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi_mhs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Koordinator_modul');
        $this->load->model('M_Registrasi_mhs');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'Registrasi';
        $data['title2'] = 'Index Data';
        $data['registrasi'] = $this->M_Registrasi_mhs->index();
        $this->load->view('template/header', $data);
        $this->load->view('registrasi_mhs/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['registrasi']);
    }
    function tambah()
    {
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_tahun_ajaran', 'id_tahun_ajaran', 'required|trim|is_unique[registrasi.id_tahun_ajaran]', [
            'required' =>
            'Tidak Boleh Kosong!',
            'is_unique' => 'Registrasi sudah ada'

        ]);
        if (empty($_FILES['slip']['name'])) {
            $this->form_validation->set_rules('slip', 'slip', 'required|trim', [
                'required' =>
                'Tidak Boleh Kosong!'
            ]);
        }
        if (empty($_FILES['regis_univ']['name'])) {
            $this->form_validation->set_rules('regis_univ', 'regis_univ', 'required|trim', [
                'required' =>
                'Tidak Boleh Kosong!'
            ]);
        }
        $this->form_validation->set_rules('va', 'va', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Registrasi Mahasiswa';
            $data['title2'] = 'Add Data';
            $data['tahun_ajaran'] = $this->db->get_where('tahun_ajaran', array('status' => '1'))->result_array();
            $this->load->view('template/header', $data);
            $this->load->view('registrasi_mhs/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            if (!empty($_FILES['slip']['name'])) {
                $config['upload_path']          = './assets/berkas/mahasiswa/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 1000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('slip');
                $gbr = $this->upload->data();
                $slip = $gbr['file_name'];
            }
            if (!empty($_FILES['regis_univ']['name'])) {
                $config['upload_path']          = './assets/berkas/mahasiswa/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 1000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('regis_univ');
                $gbr = $this->upload->data();
                $regis_univ = $gbr['file_name'];
            }
            $id_mahasiswa = $this->input->post('id_mahasiswa');
            $id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
            $x = $this->input->post('id_tahun_ajaran');
            $va = $this->input->post('va');

            $data = array(
                'id_mahasiswa' => $id_mahasiswa,
                'id_tahun_ajaran' => $id_tahun_ajaran,
                'slip' => $slip,
                'id_tahun_ajaran' => $x,
                'regis_univ' => $regis_univ,
                'va' => $va,
                'status' => 'Pengajuan',
            );
            // var_dump($data);
            $this->M_Registrasi_mhs->tambah('registrasi', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('registrasi_mhs');
        }
    }

    public function revisi($id_registrasi)
    {
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_tahun_ajaran', 'id_tahun_ajaran', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        if (empty($_FILES['slip']['name'])) {
            $this->form_validation->set_rules('slip', 'slip', 'required|trim', [
                'required' =>
                'Tidak Boleh Kosong!'
            ]);
        }
        if (empty($_FILES['regis_univ']['name'])) {
            $this->form_validation->set_rules('regis_univ', 'regis_univ', 'required|trim', [
                'required' =>
                'Tidak Boleh Kosong!'
            ]);
        }
        $this->form_validation->set_rules('va', 'va', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Registrasi Mahasiswa';
            $data['title2'] = 'Revisi';
            $data['tahun_ajaran'] = $this->db->get_where('tahun_ajaran', array('status' => '1'))->result_array();
            $data['registrasi'] = $this->M_Registrasi_mhs->get($id_registrasi);
            $this->load->view('template/header', $data);
            $this->load->view('registrasi_mhs/edit', $data);
            $this->load->view('template/footer', $data);
        } else {
            if (!empty($_FILES['slip']['name'])) {
                $config['upload_path']          = './assets/berkas/mahasiswa/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 1000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('slip');
                $gbr = $this->upload->data();
                $slip = $gbr['file_name'];
            }
            if (!empty($_FILES['regis_univ']['name'])) {
                $config['upload_path']          = './assets/berkas/mahasiswa/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 1000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('regis_univ');
                $gbr = $this->upload->data();
                $regis_univ = $gbr['file_name'];
            }
            $id_mahasiswa = $this->input->post('id_mahasiswa');
            $id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
            $x = $this->input->post('id_tahun_ajaran');
            $va = $this->input->post('va');
            $id_registrasi = $this->input->post('id_registrasi');

            $data = array(
                'id_mahasiswa' => $id_mahasiswa,
                'id_tahun_ajaran' => $id_tahun_ajaran,
                'slip' => $slip,
                'id_tahun_ajaran' => $x,
                'regis_univ' => $regis_univ,
                'va' => $va,
                'status' => 'Pengajuan',
            );
            $this->M_Registrasi_mhs->update('registrasi', $data, array('id_registrasi' => $id_registrasi));
            $this->session->set_flashdata('flash', 'diubah');
            redirect('registrasi_mhs');
        }
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
}