<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Krs_mhs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Krs_mhs');
        $this->load->model('M_Registrasi');
        $this->load->model('M_Tahun_ajaran');
    }
    public function index()
    {
        $data['title'] = 'KRS/Semester';
        $data['title2'] = 'Index Data';
        $data['krs'] = $this->M_Krs_mhs->index();
        $this->load->view('template/header', $data);
        $this->load->view('krs_mhs/konten', $data);
        $this->load->view('template/footer', $data);
        // var_dump($data['registrasi']);
    }
    function tambah()
    {
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_registrasi', 'id_registrasi', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('semester', 'semester', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('ips', 'ips', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('ipk', 'ipk', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sks_kumultatif', 'sks_kumultatif', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sks_yad', 'sks_yad', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'KRS';
            $data['title2'] = 'Add Data';
            $data['semester'] = $this->M_Krs_mhs->semester();
            $data['registrasi'] = $this->M_Krs_mhs->registrasi();
            $data['sks_kumul'] = $this->M_Krs_mhs->sks_kumul();
            $data['sks_yad'] = $this->M_Krs_mhs->sks_yad();
            $data['krs'] = $this->M_Krs_mhs->krs_list();
            $data['dosen_pa'] = $this->db->get_where('dosen', array('id_dosen' => $this->session->userdata('dosen_pa')))->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('krs_mhs/add', $data);
            $this->load->view('template/footer', $data);
            // var_dump($data['krs']);
        } else {
            $id_mahasiswa = $this->input->post('id_mahasiswa');
            $id_registrasi = $this->input->post('id_registrasi');
            $semester = $this->input->post('semester');
            $ips = $this->input->post('ips');
            $ipk = $this->input->post('ipk');
            $sks_kumultatif = $this->input->post('sks_kumultatif');
            $sks_yad = $this->input->post('sks_yad');
            $data = array(
                'id_mahasiswa' => $id_mahasiswa,
                'id_registrasi' => $id_registrasi,
                'semester' => $semester,
                'ips' => $ips,
                'ipk' => $ipk,
                'sks_kumultatif' => $sks_kumultatif,
                'sks_yad' => $sks_yad,
                'status' => 'Pengajuan',
            );
            $this->M_Krs_mhs->tambah('krs', $data);

            $id_detail_krs = $this->input->post('id_detail_krs');
            $semester = $this->input->post('x');
            $result = array();
            foreach ($id_detail_krs as $key
                => $val) {
                $result[] = array(
                    "id_detail_krs" => $id_detail_krs[$key],
                    "semester" => $semester[$key],
                );
            }
            var_dump($result);
            $this->db->update_batch('detail_krs', $result, 'id_detail_krs');
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('krs_mhs');
        }
    }
    function lihat($id_krs)
    {
        $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_registrasi', 'id_registrasi', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('semester', 'semester', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('ips', 'ips', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('ipk', 'ipk', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sks_kumultatif', 'sks_kumultatif', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sks_yad', 'sks_yad', 'required|trim', [
            'required' =>
            'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'KRS';
            $data['title2'] = 'Edit/Lihat Data';
            $data['semester'] = $this->M_Krs_mhs->semester();
            $data['registrasi'] = $this->M_Krs_mhs->registrasi();
            $data['sks_kumul'] = $this->M_Krs_mhs->sks_kumul();


            $data['detail_krs'] = $this->M_Krs_mhs->get($id_krs);
            $krs = $data['detail_krs']['smt'];
            $data['sks_yad'] = $this->M_Krs_mhs->sks_yad();
            $data['sks_yad_edit'] = $this->M_Krs_mhs->sks_yad_edit($krs);
            $data['krs'] = $this->M_Krs_mhs->krs_list_edit($krs);
            // $data['dosen_pa'] = $this->db->get_where('dosen', array('id_dosen' => $this->session->userdata('dosen_pa')))->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('krs_mhs/edit', $data);
            $this->load->view('template/footer', $data);
            // var_dump($data['krs']);
        } else {
            $id_mahasiswa = $this->input->post('id_mahasiswa');
            $id_krs = $this->input->post('id_krs');
            $id_registrasi = $this->input->post('id_registrasi');
            $semester = $this->input->post('semester');
            $ips = $this->input->post('ips');
            $ipk = $this->input->post('ipk');
            $sks_kumultatif = $this->input->post('sks_kumultatif');
            $sks_yad = $this->input->post('sks_yad');

            $data = array(
                'id_mahasiswa' => $id_mahasiswa,
                'id_registrasi' => $id_registrasi,
                'semester' => $semester,
                'ips' => $ips,
                'ipk' => $ipk,
                'sks_kumultatif' => $sks_kumultatif,
                'sks_yad' => $sks_yad,
                'status' => 'Pengajuan',
            );
            $this->M_Krs_mhs->update('krs', $data, array('id_krs' => $id_krs));

            $id_detail_krs = $this->input->post('id_detail_krs');
            $semester = $this->input->post('x');
            $x = 'x';
            $result = array();
            foreach ($id_detail_krs as $key
                => $val) {
                $result[] = array(
                    "id_detail_krs" => $id_detail_krs[$key],
                    "semester" => $semester[$key],
                );
            }
            var_dump($result);
            $this->db->update_batch('detail_krs', $result, 'id_detail_krs');
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('krs_mhs');
        }
    }
}