<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Login');
    }
    function index()
    {

        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Page';
            $this->load->view('login', $data);
        } else {
            $this->cek();
        }
    }
    function cek()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $dosen = $this->M_Login->dosen($username);
        $mhs = $this->M_Login->mhs($username);
        $admin = $this->M_Login->admin($username);
        if ($data = $admin->row_array()) {
            if (($password == $data['password'])) {
                $all = [
                    'id_admin' => $data['id_admin'],
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'email' => $data['email'],
                    'nama' => $data['nama'],
                    'foto' => $data['foto'],
                ];
                $this->session->set_userdata($all);
                redirect('mahasiswa/index', 'refresh');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('login/index');
            }
        } elseif ($data = $dosen->row_array()) {
            if (($password == $data['nip'])) {
                $all = [
                    'id_dosen' => $data['id_dosen'],
                    'nip' => $data['nip'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'kontak' => $data['kontak'],
                    'foto' => $data['foto'],
                ];
                $this->session->set_userdata($all);
                redirect('mahasiswa/index', 'refresh');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('login/index');
            }
        } elseif ($data = $mhs->row_array()) {
            if (($password == $data['nim'])) {
                $all = [
                    'id_mahasiswa' => $data['id_mahasiswa'],
                    'nip' => $data['nim'],
                    'nama' => $data['nama'],
                    'tempat_lahir' => $data['tempat_lahir'],
                    'tanggal_lahir' => $data['tanggal_lahir'],
                    'jenis_kelamin' => $data['jenis_kelamin'],
                    'email' => $data['email'],
                    'nik' => $data['nik'],
                    'alamat' => $data['alamat'],
                    'nama_ayah' => $data['nama_ayah'],
                    'nama_ibu' => $data['nama_ibu'],
                    'kontak_ortu' => $data['kontak_ortu'],
                    'alamat_ortu' => $data['alamat_ortu'],
                    'kontak' => $data['kontak'],
                    'jalur_masuk' => $data['jalur_masuk'],
                    'tahun_masuk' => $data['tahun_masuk'],
                    'ukt' => $data['ukt'],
                    'dosen_pa' => $data['dosen_pa'],
                    'prodi' => $data['prodi'],
                    'foto' => $data['foto'],
                ];
                $this->session->set_userdata($all);
                redirect('mahasiswa/index', 'refresh');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('login/index');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar</div>');
            redirect('login/index');
        }
    }
}