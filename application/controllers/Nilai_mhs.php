<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_mhs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Nilai_mhs');
    }
    public function index()
    {
        $data['title'] = 'Nilai Akhir';
        $data['title2'] = 'Index Semester';
        $data['tahun_ajaran'] = $this->M_Nilai_mhs->index();
        $this->load->view('template/header', $data);
        $this->load->view('nilai_mhs/konten', $data);
        $this->load->view('template/footer', $data);
    }
    function lihat($id_tahun_ajaran)
    {
        $data['title'] = 'Nilai per modul';

        //list modul yang di koordinator
        $data['modul'] = $this->M_Nilai_mhs->get($id_tahun_ajaran)->result_array();

        //tiyle
        $data['th'] = $this->db->get_where('tahun_ajaran', array('id_tahun_ajaran' => $id_tahun_ajaran))->row_array();
        $data['title2'] = $data['th']['tahun_akademik'];

        $this->load->view('template/header', $data);
        $this->load->view('nilai_mhs/modul', $data);
        $this->load->view('template/footer', $data);
    }
    function detail($id_modul)
    {
        $data['title'] = 'Modul yang dikoordinator';
        $data['mahasiswa'] = $this->M_Nilai_mhs->mahasiswa($id_modul)->result_array();

        // title
        $data['modul'] = $this->db->get_where('modul', array('id_modul' => $id_modul))->row_array();
        $data['title2'] = $data['modul']['mata_kuliah'];

        //nilai
        $data['nilai'] = $this->db->get('nilai')->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('nilai_mhs/mhs', $data);
        $this->load->view('template/footer', $data);
    }
    function input()
    {
        $this->form_validation->set_rules('id_nilai[]', 'id_nilai[]', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $id_modul = $this->input->post('id_modul');
            // redirect(base_url() . "nilai_mhs/detail/" . $id_modul);
            $this->detail($id_modul);
        } else {
            // $id_detail_krs = $this->input->post('id_detail_krs');
            // $id_modul = $this->input->post('id_modul');
            // $id_nilai = $this->input->post('id_nilai');
            // $penginput = $this->session->userdata('nama');

            // $data = array(
            //     'id_nilai' => $id_nilai,
            //     'penginput' => $penginput,
            // );
            $post = $this->input->post();
            $id_modul = $this->input->post('id_modul');
            $penginput = $this->session->userdata('nama');
            $data = array();
            $id_detail_krs = $this->input->post('id_detail_krs');
            foreach ($post['id_detail_krs'] as $key => $val) {
                $data[] = array(
                    "id_detail_krs"  => $post['id_detail_krs'][$key],
                    "id_nilai"  => $post['id_nilai'][$key],
                    "penginput"  => $penginput
                );
            }
            // var_dump($data);
            $data['mahasiswa'] = $this->db->update_batch('detail_krs', $data, "id_detail_krs");
            $this->session->set_flashdata('flash', 'diubah');
            redirect(base_url() . "nilai_mhs/detail/" . $id_modul);
            $this->detail($id_modul);
        }
    }
    function cetak($id_modul)
    {
        $data['title'] = 'Modul yang dikoordinator';
        //list mhs yg ambil modul
        $data['mahasiswa'] = $this->M_Nilai_mhs->mahasiswa($id_modul)->result_array();

        //detail modul + pengampu
        $data['detail_modul'] = $this->M_Nilai_mhs->mahasiswa($id_modul)->row_array();

        $this->load->library('Pdf');
        $this->pdf->setPaper('legal', 'landscape');
        $this->pdf->set_option('isRemoteEnabled', true);
        // $this->pdf->render();
        // $this->pdf->filename = $filename . '.pdf';
        $this->pdf->load_view('nilai_mhs/cetak', $data);
    }
}