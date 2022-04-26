<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('');
        $this->load->model('');
        $this->load->model('M_Beranda');
    }
    public function index()
    {
        $th = $this->db->get_where('tahun_ajaran', array('status' => '1'))->row_array();
        $th = $th['id_tahun_ajaran'];

        $data['prodi_aktif'] = $this->M_Beranda->prodi_aktif($th);
        $data['prodi_nonaktif'] = $this->M_Beranda->prodi_nonaktif($th);
        $data['prodi_ipk'] = $this->M_Beranda->prodi_ipk($th);
        $data['prodi_masa_studi'] = $this->M_Beranda->prodi_masa_studi();

        $data['title'] = 'Beranda';
        $data['title2'] = 'Index';
        $this->load->view('template/header', $data);
        $this->load->view('beranda/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['prodi_masa_studi']);
    }
    public function cetak_aktif($id_prodi)
    {
        $data['tahun_ajaran'] = $this->db->get_where('tahun_ajaran', array('status' => '1'))->row_array();
        $th =  $data['tahun_ajaran']['id_tahun_ajaran'];
        $data['prodi'] = $this->db->get_where('prodi', array('id_prodi' => $id_prodi))->row_array();

        $data['aktif'] = $this->M_Beranda->aktif($th, $id_prodi);
        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->render();
        // $this->pdf->filename = $filename . '.pdf';
        $this->pdf->load_view('beranda/aktif', $data);
    }
    public function cetak_nonaktif($id_prodi)
    {
        $data['tahun_ajaran'] = $this->db->get_where('tahun_ajaran', array('status' => '1'))->row_array();
        $th =  $data['tahun_ajaran']['id_tahun_ajaran'];
        $data['prodi'] = $this->db->get_where('prodi', array('id_prodi' => $id_prodi))->row_array();

        $data['nonaktif'] = $this->M_Beranda->nonaktif($th, $id_prodi);
        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->render();
        // $this->pdf->filename = $filename . '.pdf';
        $this->pdf->load_view('beranda/nonaktif', $data);
    }
    public function cetak_ipk($id_prodi)
    {
        $data['tahun_ajaran'] = $this->db->get_where('tahun_ajaran', array('status' => '1'))->row_array();
        $th =  $data['tahun_ajaran']['id_tahun_ajaran'];
        $data['prodi'] = $this->db->get_where('prodi', array('id_prodi' => $id_prodi))->row_array();
        $data['list_ipk'] = $this->M_Beranda->list_ipk($th, $id_prodi);
        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->render();
        // $this->pdf->filename = $filename . '.pdf';
        $this->pdf->load_view('beranda/ipk', $data);
    }
    public function cetak_masa_studi($id_prodi)
    {
        $data['list_masa_studi'] = $this->M_Beranda->list_masa_studi($id_prodi);
        $data['prodi'] = $this->db->get_where('prodi', array('id_prodi' => $id_prodi))->row_array();

        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->render();
        // $this->pdf->filename = $filename . '.pdf';
        $this->pdf->load_view('beranda/masa_studi', $data);
    }
}