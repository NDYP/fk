<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transkrip_mhs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Transkrip_mhs');
        $this->load->model('M_Khs');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'Transkrip';
        $data['title2'] = 'Index Data';

        $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        $data['list'] = $this->M_Transkrip_mhs->krs_get($id_mahasiswa);
        $data['sks'] = $data['list']['sks'];
        // $data['nilai'] = $data['list']['nilai'];
        $data['sksn'] = $data['list']['sksn'];
        $data['ipk'] = number_format($data['list']['sksn'] / $data['list']['sks'], 2);
        $data['transkrip'] = $this->M_Transkrip_mhs->index();
        // var_dump($data['sksn']);
        // var_dump($data['sks']);
        $this->load->view('template/header', $data);
        $this->load->view('transkrip_mhs/konten', $data);
        $this->load->view('template/footer', $data);

        // var_dump($data['sksn']);
    }
    function tambah()
    {

        $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        $data['ttd'] = $this->M_Khs->ttd();
        $data['ttd_nama'] = $data['ttd']['nama'];
        $data['ttd_nip'] = $data['ttd']['nip'];

        $nama = $this->input->post('nama');
        $prodi = $this->input->post('prodi');
        $nim = $this->input->post('nim');
        $jenjang = $this->input->post('jenjang');
        $selesai_pada = $this->input->post('selesai_pada');

        $sks = $this->input->post('sks');
        $sksn = $this->input->post('sksn');
        $ipk = $this->input->post('ipk');

        $data = array(
            'id_mahasiswa' => $id_mahasiswa,
            'status' => '0',
            'ttd_nama' => $data['ttd_nama'],
            'ttd_nip' => $data['ttd_nip'],
            'nama' => $nama,
            'nim' => $nim,
            'prodi' => $prodi,
            'jenjang' => $jenjang,
            'selesai_pada' => date('Y-m-d', strtotime($selesai_pada)),
            'sks' => $sks,
            'sksn' => $sksn,
            'ipk' => $ipk,
        );
        $this->M_Transkrip_mhs->tambah('transkrip', $data);
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('transkrip_mhs');
        // var_dump($data['sksn']);
    }
    function cetak($id_transkrip)
    {
        $data['transkrip'] = $this->M_Transkrip_mhs->get($id_transkrip);
        $data['list'] = $this->M_Transkrip_mhs->krs_list($id_transkrip);
        $data['list_sum'] = $this->M_Transkrip_mhs->krs_list_sum($id_transkrip);


        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->load_view('transkrip_mhs/cetak', $data);
        // var_dump($data['transkrip']);
        var_dump($data['list']);
    }
}