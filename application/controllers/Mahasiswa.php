<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Mahasiswa');
        $this->load->model('M_Dosen');
        $this->load->model('M_Prodi');
    }
    public function index()
    {
        $data['title'] = 'Mahasiswa';
        $data['title2'] = 'Index Data';
        $data['dosen'] = $this->M_Dosen->index();
        $data['mahasiswa'] = $this->M_Mahasiswa->index();
        // print_r($data['mahasiswa']);
        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/konten', $data);
        $this->load->view('template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('nim', 'nim', 'required|trim|is_unique[mahasiswa.nim]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'nim telah terdaftar'
        ]);
        if (empty($_FILES['ktp']['name'])) {
            $this->form_validation->set_rules('ktp', 'ktp', 'required|trim', [
                'required' =>
                'Tidak Boleh Kosong!'
            ]);
        }
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'foto', 'required|trim', [
                'required' =>
                'Tidak Boleh Kosong!'
            ]);
        }
        $this->form_validation->set_rules('agama', 'agama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('prodi', 'prodi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('dosen_pa', 'dose_pa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('asal_sekolah', 'asal_sekolah', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tahun_lulus', 'tahun_lulus', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan_ayah', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan_ibu', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if (empty($_FILES['ijazah_sma']['name'])) {
            $this->form_validation->set_rules('ijazah_sma', 'ijazah_sma', 'required|trim', [
                'required' =>
                'Tidak Boleh Kosong!'
            ]);
        }
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Mahasiswa';
            $data['title2'] = 'Add Data';
            $data['dosen'] = $this->M_Dosen->index();
            $data['prodi'] = $this->M_Prodi->index();

            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/add', $data);
            $this->load->view('template/footer', $data);
        } else {

            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path']          = './assets/foto/mahasiswa/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 10000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('foto');
                $gbr = $this->upload->data();
                $foto = $gbr['file_name'];
            }
            if (!empty($_FILES['ktp']['name'])) {
                $config['upload_path']          = './assets/berkas/mahasiswa/ktp/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 10000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('ktp');
                $gbr = $this->upload->data();
                $ktp = $gbr['file_name'];
            }
            if (!empty($_FILES['ijazah_sma']['name'])) {
                $config['upload_path']          = './assets/berkas/mahasiswa/ijazah/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 10000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('ijazah_sma');
                $gbr = $this->upload->data();
                $ijazah_sma = $gbr['file_name'];
            }

            $nim = $this->input->post('nim');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $kontak = $this->input->post('kontak');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');
            $agama = $this->input->post('agama');
            $asal_sekolah = $this->input->post('asal_sekolah');
            $tahun_lulus = $this->input->post('tahun_lulus');

            $nama_ayah = $this->input->post('nama_ayah');
            $nama_ibu = $this->input->post('nama_ibu');
            $kontak_ortu = $this->input->post('kontak_ortu');
            $alamat_ortu = $this->input->post('alamat_ortu');

            $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
            $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
            $alamat_kantor_ayah = $this->input->post('alamat_kantor_ayah');
            $alamat_kantor_ibu = $this->input->post('alamat_kantor_ibu');
            $penghasilan_ayah = $this->input->post('penghasilan_ayah');
            $penghasilan_ibu = $this->input->post('penghasilan_ibu');



            $jalur_masuk = $this->input->post('jalur_masuk');
            $tahun_masuk = $this->input->post('tahun_masuk');
            $ukt = $this->input->post('ukt');
            $dosen_pa = $this->input->post('dosen_pa');
            $prodi = $this->input->post('prodi');

            $data = array(
                'foto' => $foto,
                'ktp' => $ktp,
                'ijazah_sma' => $ijazah_sma,
                'email' => $email,
                'kontak' => $kontak,
                'nim' => $nim,
                'nama' => $nama,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => date('Y-m-d', strtotime($tanggal_lahir)),
                'jenis_kelamin' => $jenis_kelamin,
                'nik' => $nik,
                'alamat' => $alamat,
                'agama' => $agama,
                'asal_sekolah' => $asal_sekolah,
                'tahun_lulus' => $tahun_lulus,
                'jalur_masuk' => $jalur_masuk,
                'tahun_masuk' => $tahun_masuk,
                'ukt' => $ukt,
                'dosen_pa' => $dosen_pa,
                'prodi' => $prodi,
                'nama_ayah' => $nama_ayah,
                'nama_ibu' => $nama_ibu,
                'kontak_ortu' => $kontak_ortu,
                'alamat_ortu' => $alamat_ortu,
                'pekerjaan_ayah' => $pekerjaan_ayah,
                'pekerjaan_ibu' => $pekerjaan_ibu,
                'alamat_kantor_ayah' => $alamat_kantor_ayah,
                'alamat_kantor_ibu' => $alamat_kantor_ibu,
                'penghasilan_ayah' => $penghasilan_ayah,
                'penghasilan_ibu' => $penghasilan_ibu,
            );
            // var_dump($data);
            $this->M_Mahasiswa->tambah('mahasiswa', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('mahasiswa/index', 'refresh');
            // // var_dump($data);


        }
    }

    function get($id_mahasiswa)
    {
        $data['fat'] = $this->M_Mahasiswa->get($id_mahasiswa);
        $url = $data['fat']['id_fat'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('fat/edit/' . $id_mahasiswa . '/'  . $url_slug));
    }
    public function edit($id_mahasiswa)
    {

        $this->form_validation->set_rules('nim', 'nim', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('dosen_pa', 'dose_pa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('prodi', 'prodi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Mahasiswa';
            $data['title2'] = 'Edit Data';
            $data['dosen'] = $this->M_Dosen->index();
            $data['prodi'] = $this->M_Prodi->index();
            $data['mahasiswa'] = $this->M_Mahasiswa->get($id_mahasiswa);

            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/edit', $data);
            $this->load->view('template/footer', $data);
        } else {
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path']          = './assets/foto/mahasiswa/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 10000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('foto');
                $gbr = $this->upload->data();
                $foto = $gbr['file_name'];
            }
            if (!empty($_FILES['ktp']['name'])) {
                $config['upload_path']          = './assets/berkas/mahasiswa/ktp/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 10000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('ktp');
                $gbr = $this->upload->data();
                $ktp = $gbr['file_name'];
            }
            if (!empty($_FILES['ijazah_sma']['name'])) {
                $config['upload_path']          = './assets/berkas/mahasiswa/ijazah/';
                $config['allowed_types']        = 'pdf|jpg|png';
                $config['max_size']             = 10000;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $this->upload->do_upload('ijazah_sma');
                $gbr = $this->upload->data();
                $ijazah_sma = $gbr['file_name'];
            }

            $nim = $this->input->post('nim');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $kontak = $this->input->post('kontak');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');
            $agama = $this->input->post('agama');
            $asal_sekolah = $this->input->post('asal_sekolah');
            $tahun_lulus = $this->input->post('tahun_lulus');

            $nama_ayah = $this->input->post('nama_ayah');
            $nama_ibu = $this->input->post('nama_ibu');
            $kontak_ortu = $this->input->post('kontak_ortu');
            $alamat_ortu = $this->input->post('alamat_ortu');

            $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
            $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
            $alamat_kantor_ayah = $this->input->post('alamat_kantor_ayah');
            $alamat_kantor_ibu = $this->input->post('alamat_kantor_ibu');
            $penghasilan_ayah = $this->input->post('penghasilan_ayah');
            $penghasilan_ibu = $this->input->post('penghasilan_ibu');



            $jalur_masuk = $this->input->post('jalur_masuk');
            $tahun_masuk = $this->input->post('tahun_masuk');
            $ukt = $this->input->post('ukt');
            $dosen_pa = $this->input->post('dosen_pa');
            $prodi = $this->input->post('prodi');
            $id_mahasiswa = $this->input->post('id_mahasiswa');

            $data = array(
                'foto' => (empty($foto)) ? $this->input->post('foto') : $foto,
                'ktp' => (empty($ktp)) ? $this->input->post('ktp') : $ktp,
                'ijazah_sma' => (empty($ijazah_sma)) ? $this->input->post('ijazah_sma') : $ijazah_sma,
                'email' => $email,
                'kontak' => $kontak,
                'nim' => $nim,
                'nama' => $nama,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => date('Y-m-d', strtotime($tanggal_lahir)),
                'jenis_kelamin' => $jenis_kelamin,
                'nik' => $nik,
                'alamat' => $alamat,
                'agama' => $agama,
                'asal_sekolah' => $asal_sekolah,
                'tahun_lulus' => $tahun_lulus,
                'jalur_masuk' => $jalur_masuk,
                'tahun_masuk' => $tahun_masuk,
                'ukt' => $ukt,
                'dosen_pa' => $dosen_pa,
                'prodi' => $prodi,
                'nama_ayah' => $nama_ayah,
                'nama_ibu' => $nama_ibu,
                'kontak_ortu' => $kontak_ortu,
                'alamat_ortu' => $alamat_ortu,
                'pekerjaan_ayah' => $pekerjaan_ayah,
                'pekerjaan_ibu' => $pekerjaan_ibu,
                'alamat_kantor_ayah' => $alamat_kantor_ayah,
                'alamat_kantor_ibu' => $alamat_kantor_ibu,
                'penghasilan_ayah' => $penghasilan_ayah,
                'penghasilan_ibu' => $penghasilan_ibu,
            );
            // var_dump($data);
            $this->M_Mahasiswa->update('mahasiswa', $data, array('id_mahasiswa' => $id_mahasiswa));
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('mahasiswa/index', 'refresh');
        }
    }
    public function detail($id_mahasiswa)
    {
        $data['title'] = 'Mahasiswa';
        $data['title2'] = 'Detail Data';
        $data['dosen'] = $this->M_Dosen->index();
        $data['prodi'] = $this->M_Prodi->index();
        $data['mahasiswa'] = $this->M_Mahasiswa->get($id_mahasiswa);

        $this->load->view('template/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('template/footer', $data);
    }

    public function hapus($id_mahasiswa)
    {
        $data = $this->M_Mahasiswa->get($id_mahasiswa);

        if ($data) {
            $file = './assets/foto/mahasiswa/' . $data['foto'];
            $this->M_Mahasiswa->hapus($id_mahasiswa);
            if (is_readable($file) && unlink($file)) {
                $this->session->set_flashdata('flash', 'dihapus');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('flash', 'dihapus');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('fat/index', 'refresh');
        }
    }
    function ktp($id_mahasiswa)
    {
        $data = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id_mahasiswa])->row_array();
        if ($data['ktp'] == NULL) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            force_download('assets/berkas/mahasiswa/ktp/' . $data['ktp'], NULL);
        }
    }
    function ijazah($id_mahasiswa)
    {
        $data = $this->db->get_where('mahasiswa', ['id_mahasiswa' => $id_mahasiswa])->row_array();
        if ($data['ijazah_sma'] == NULL) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            force_download('assets/berkas/mahasiswa/ijazah/' . $data['ijazah_sma'], NULL);
        }
    }
}