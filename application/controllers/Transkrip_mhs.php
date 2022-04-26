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

        // $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        // $data['list'] = $this->M_Transkrip_mhs->krs_get($id_mahasiswa);
        // $data['sks'] = $data['list']['sks'] == NULL ?: 0;

        // $data['sksn'] = $data['list']['sksn'];
        // $data['ipk'] = number_format($data['list']['sksn'] / $data['list']['sks'], 2);
        $data['transkrip'] = $this->M_Transkrip_mhs->index();
        $data['krs'] = $this->db->get('detail_krs')->row_array();
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

        $id_mahasiswa = $this->session->userdata('id_mahasiswa');
        $data['list'] = $this->M_Transkrip_mhs->krs_get($id_mahasiswa);
        $data['krs_beban'] = $this->M_Transkrip_mhs->krs_beban($id_mahasiswa);
        $data['sks'] = $data['list']['sks'];
        $sks = $data['list']['sks'];
        $nama = $data['list']['nama'];
        $nim = $data['list']['nim'];
        $prodi = $data['list']['program_studi'];
        // $data['nilai'] = $data['list']['nilai'];
        $sksn = $data['list']['sksn'];
        $ipk = number_format($data['list']['sksn'] / $data['krs_beban']['sks'], 2);
        $jenjang = $data['list']['program_studi'] < 4 ? 'Sarjana / S1' : 'Dokter Umum';
        $x = array(
            'id_mahasiswa' => $id_mahasiswa,
            'status' => '0',
            'ttd_nama' => $data['ttd_nama'],
            'ttd_nip' => $data['ttd_nip'],
            'nama' => $nama,
            'nim' => $nim,
            'prodi' => $prodi,
            'jenjang' => $jenjang,
            // 'selesai_pada' => date('Y-m-d', strtotime($selesai_pada)),
            'sks' => $sks,
            'sksn' => $sksn,
            'ipk' => $ipk,
        );
        $this->M_Transkrip_mhs->tambah('transkrip', $x);
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('transkrip_mhs');
        // var_dump($x);
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