<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transkrip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Transkrip');
        $this->load->model('M_Khs');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'Transkrip';
        $data['title2'] = 'Index Data';


        $data['transkrip'] = $this->M_Transkrip->index();
        $this->load->view('template/header', $data);
        $this->load->view('transkrip/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['list']);
    }
    function terima($id_transkrip)
    {
        $data = array(
            'status' => '2',
        );
        $this->M_Transkrip->update('transkrip', $data, array('id_transkrip' => $id_transkrip));
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('transkrip');
    }
    function tolak($id_transkrip)
    {
        $data = array(
            'status' => '1',
        );
        $this->M_Transkrip->update('transkrip', $data, array('id_transkrip' => $id_transkrip));
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('transkrip');
    }
    function cetak($id_transkrip)
    {
        $data['transkrip'] = $this->M_Transkrip->get($id_transkrip);
        $data['list'] = $this->M_Transkrip->krs_list($id_transkrip);
        $data['list_sum'] = $this->M_Transkrip->krs_list_sum($id_transkrip);


        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->load_view('transkrip/cetak', $data);
        // var_dump($data['transkrip']);
        var_dump($data['list']);
    }
}