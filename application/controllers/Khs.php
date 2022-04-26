<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Khs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Krs');
        $this->load->model('M_Khs');
        $this->load->model('M_Krs_mhs');
        $this->load->model('M_Registrasi');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'KHS/Semester';
        $data['title2'] = 'Index Data';
        $data['krs'] = $this->M_Tahun_ajaran->index();
        $this->load->view('template/header', $data);
        $this->load->view('khs/konten', $data);
        $this->load->view('template/footer', $data);
    }

    function lihat($id_tahun_ajaran)
    {
        $data['title'] = 'KHS';
        $data['title2'] = 'Validasi';

        $data['krs'] = $this->M_Krs->get($id_tahun_ajaran);

        $this->load->view('template/header', $data);
        $this->load->view('khs/mhs', $data);
        $this->load->view('template/footer', $data);
    }
    function validasi($id_krs)
    {
        //ambil data mhs buat header khs
        $data['krs'] = $this->M_Khs->get($id_krs);
        $id_mahasiswa = $data['krs']['id_mahasiswa'];
        $semester = $data['krs']['smt'];
        $id_tahun_ajaran = $data['krs']['id_tahun_ajaran'];

        $data['list'] = $this->M_Khs->krs_get($id_mahasiswa, $semester);
        $data['sks_semester_lulus'] = $this->M_Khs->sks_semester_lulus($id_mahasiswa, $semester);
        $data['ips'] = $this->M_Khs->ips($id_mahasiswa, $semester);
        $data['sks_beban'] = $this->M_Khs->sks_beban($id_mahasiswa, $semester);
        $data['sks_kumultatif_lulus'] = $this->M_Khs->sks_kumultatif_lulus($id_mahasiswa, $semester);
        $data['sks_kumultatif_beban'] = $this->M_Khs->sks_kumultatif_beban($id_mahasiswa, $semester);

        $data['ttd'] = $this->M_Khs->ttd();
        $ttd_nama = $data['ttd']['nama'];
        $ttd_nip = $data['ttd']['nip'];

        // $this->load->library('Pdf');
        // $this->pdf->setPaper('legal', 'potrait');
        // $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->load_view('khs/cetak', $data);

        $data = array(
            'id_krs' => $id_krs,
            'ips' => number_format($data['ips']['sksn'] / $data['sks_beban']['sks'], 2),
            'sks_semester_beban' => $data['krs']['sks_yad'],
            'sks_semester_lulus' => $data['sks_semester_lulus']['sks_lulus'],
            // 'sks_semester_lulus' => $data['sks_kumultatif_lulus']['sks_lulus'],
            'sksn_semester' =>  $data['ips']['sksn'],

            'id_mahasiswa' => $id_mahasiswa,
            'semester' => $semester,
            'id_tahun_ajaran' => $id_tahun_ajaran,
            'ttd_nama' => $ttd_nama,
            'ttd_nip' => $ttd_nip,

            'ipk' => number_format($data['sks_kumultatif_lulus']['sksn'] / $data['sks_kumultatif_beban']['sks_lulus'], 2),
            'sks_kumultatif_beban' =>  $data['sks_kumultatif_beban']['sks_lulus'],
            'sks_kumultatif_lulus' =>  $data['sks_kumultatif_lulus']['sks_lulus'],
            'sksn_kumultatif' =>  $data['sks_kumultatif_lulus']['sksn'],
        );
        $this->M_Krs->tambah('khs', $data);
        $this->session->set_flashdata(
            'flash',
            'ditambah'
        );
        // var_dump($data['ipk']);
        // redirect(base_url() . "khs/lihat/" . $id_tahun_ajaran);
        redirect($_SERVER['HTTP_REFERER']);
    }

    function cetak($id_krs)
    {
        $data['khs'] = $this->M_Khs->get_khs($id_krs);
        $id_mahasiswa = $data['khs']['id_mahasiswa'];
        $semester = $data['khs']['semester'];

        $data['list'] = $this->M_Khs->krs_get($id_mahasiswa, $semester);
        $data['khs_list'] = $this->M_Khs->list_khs($id_krs, $semester);

        //list khs sebelumnya
        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->load_view('khs/khs', $data);
    }
}