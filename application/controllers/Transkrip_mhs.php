<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transkrip_mhs extends CI_Controller
{
    function index()
    {
        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->render();
        // $this->pdf->filename = $filename . '.pdf';
        $this->pdf->load_view('transkrip_mhs/cetak');
        // var_dump($data['sks_yad']);
    }
}