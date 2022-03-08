<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Dosen');
        $this->load->model('M_Dosen');
    }
    public function index()
    {
        $data['title'] = 'Dosen';
        $data['title2'] = 'Index Data';
        $data['dosen'] = $this->M_Dosen->index();
        $this->load->view('template/header', $data);
        $this->load->view('dosen/konten', $data);
        $this->load->view('template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('nip', 'nip', 'required|trim|is_unique[dosen.nip]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'NIP telah terdaftar'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dosen';
            $data['title2'] = 'Add Data';
            $data['dosen'] = $this->M_Dosen->index();

            $this->load->view('template/header', $data);
            $this->load->view('dosen/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/dosen/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('nip');
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/dosen/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $file = $gbr['file_name'];
                    $nip = $this->input->post('nip');
                    $nama = $this->input->post('nama');
                    $email = $this->input->post('email');
                    $kontak = $this->input->post('kontak');

                    $data = array(
                        'foto' => $file,
                        'email' => $email,
                        'kontak' => $kontak,
                        'nip' => $nip,
                        'nama' => $nama,
                    );
                    $this->M_Dosen->tambah('dosen', $data);
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    redirect('dosen/index', 'refresh');
                    // var_dump($data);
                } else {
                    $this->session->set_flashdata('info', 'Gagal tambah data');
                    redirect('dosen/index', 'refresh');
                }
            } else {
                $nip = $this->input->post('nip');
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $kontak = $this->input->post('kontak');

                $data = array(
                    'email' => $email,
                    'kontak' => $kontak,
                    'nip' => $nip,
                    'nama' => $nama,
                );
                $this->M_Dosen->tambah('dosen', $data);
                $this->session->set_flashdata('success', 'Berhasil tambah data');
                redirect('dosen/index', 'refresh');
            }
        }
    }

    function get($id_dosen)
    {
        $data['fat'] = $this->M_Dosen->get($id_dosen);
        $url = $data['fat']['id_fat'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('fat/edit/' . $id_dosen . '/'  . $url_slug));
    }
    public function edit($id_dosen)
    {

        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Dosen';
            $data['title2'] = 'Add Data';
            $data['dosen'] = $this->M_Dosen->get($id_dosen);

            $this->load->view('template/header', $data);
            $this->load->view('dosen/edit', $data);
            $this->load->view('template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/dosen/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('nip');
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/dosen/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $file = $gbr['file_name'];
                    $nip = $this->input->post('nip');
                    $nama = $this->input->post('nama');
                    $email = $this->input->post('email');
                    $kontak = $this->input->post('kontak');
                    $id_dosen = $this->input->post('id_dosen');

                    $data = array(
                        'foto' => $file,
                        'email' => $email,
                        'kontak' => $kontak,
                        'nip' => $nip,
                        'nama' => $nama,
                    );
                    $this->M_Dosen->update('dosen', $data, array('id_dosen' => $id_dosen));
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    redirect('dosen/index', 'refresh');
                    // var_dump($data);
                } else {
                    $this->session->set_flashdata('info', 'Gagal tambah data');
                    redirect('dosen/index', 'refresh');
                }
            } else {
                $nip = $this->input->post('nip');
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $kontak = $this->input->post('kontak');
                $id_dosen = $this->input->post('id_dosen');
                $data = array(
                    'email' => $email,
                    'kontak' => $kontak,
                    'nip' => $nip,
                    'nama' => $nama,
                    // 'id_dosen' => $id_dosen,
                );
                $this->M_Dosen->update('dosen', $data, array('id_dosen' => $id_dosen));
                $this->session->set_flashdata('flash', 'ditambah');
                redirect('dosen/index', 'refresh');
                // var_dump($data);
            }
        }
    }
    public function detail($id_dosen)
    {
        $data['title'] = 'FAT';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['fat'] = $this->M_Dosen->get($id_dosen);
        $id_dosen = $data['fat']['id_dosen'];
        $data['pelanggan'] = $this->M_Dosen->pelanggan($id_dosen);
        $this->load->view('template/header1', $data);
        $this->load->view('fat/detail', $data);
        $this->load->view('template/footer2', $data);
    }

    public function hapus($id_dosen)
    {
        $data = $this->M_Dosen->get($id_dosen);
        if ($data) {
            $file = './assets/foto/dosen/' . $data['foto'];
            $this->M_Dosen->hapus($id_dosen);
            if (is_readable($file) && unlink($file)) {
                $this->session->set_flashdata('flash', 'dihapus');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('flash', 'dihapus');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('fat/index', 'refresh');
        }
    }
}