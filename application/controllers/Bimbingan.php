<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbingan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Bimbingan');
        $this->load->model('M_Dosen');
        $this->load->model('M_Prodi');
    }
    public function index()
    {
        $data['title'] = 'Mahasiswa';
        $data['title2'] = 'Index Bimbingan';
        $data['dosen'] = $this->M_Dosen->index();
        $data['mahasiswa'] = $this->M_Bimbingan->index();
        // print_r($data['mahasiswa']);
        $this->load->view('template/header', $data);
        $this->load->view('bimbingan/konten', $data);
        $this->load->view('template/footer', $data);
    }
    public function detail($id_mahasiswa)
    {
        $data['title'] = 'Mahasiswa';
        $data['title2'] = 'Detail Data';
        $data['dosen'] = $this->M_Dosen->index();
        $data['prodi'] = $this->M_Prodi->index();
        $data['mahasiswa'] = $this->M_Bimbingan->get($id_mahasiswa);

        $this->load->view('template/header', $data);
        $this->load->view('bimbingan/detail', $data);
        $this->load->view('template/footer', $data);
    }
}