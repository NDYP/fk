<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Akun');
        $this->load->model('M_Akun');
        $this->load->model('M_Prodi');
        $this->load->model('M_Akun');
    }
    public function index()
    {
        $data['title'] = 'Akun';
        $data['title2'] = 'Bioata';
        if ($this->session->userdata('id_mahasiswa')) :
            $data['akun'] = $this->M_Akun->mahasiswa();
        elseif ($this->session->userdata('id_dosen')) :
            $data['akun'] = $this->M_Akun->dosen();
        elseif ($this->session->userdata('id_admin')) :
            $data['akun'] = $this->M_Akun->admin();
        endif;
        // print_r($data['mahasiswa']);
        $this->load->view('template/header', $data);
        if ($this->session->userdata('id_mahasiswa')) :
            $this->load->view('akun/konten', $data);
        elseif ($this->session->userdata('id_dosen')) :
            $this->load->view('akun/konten_dosen', $data);
        elseif ($this->session->userdata('id_admin')) :
            $this->load->view('akun/konten_admin', $data);
        endif;
        $this->load->view('template/footer', $data);
    }

    public function edit($id_mahasiswa)
    {
        if ($this->session->userdata('id_mahasiswa')) :
            $this->form_validation->set_rules('id_mahasiswa', 'id_mahasiswa', 'required|trim', [
                'required' => 'Tidak Boleh Kosong!'
            ]);

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Mahasiswa';
                $data['title2'] = 'Edit Data';
                $data['prodi'] = $this->M_Prodi->index();
                $data['akun'] = $this->M_Akun->mahasiswa($id_mahasiswa);

                $this->load->view('template/header', $data);
                $this->load->view('akun/edit', $data);
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
                $this->M_Akun->update('mahasiswa', $data, array('id_mahasiswa' => $id_mahasiswa));
                $this->session->set_flashdata('flash', 'diupdate');
                redirect('akun/index', 'refresh');
            }
        elseif ($this->session->userdata('id_dosen')) :
            $this->form_validation->set_rules('id_dosen', 'id_dosen', 'required|trim', [
                'required' => 'Tidak Boleh Kosong!'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Akun';
                $data['title2'] = 'Biodata';
                $data['akun'] = $this->M_Akun->dosen();

                $this->load->view('template/header', $data);
                $this->load->view('akun/edit_dosen', $data);
                $this->load->view('template/footer', $data);
            } else {
                $config['upload_path'] = './assets/foto/dosen/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['file_name'] = $this->input->post('nip');
                $this->upload->initialize($config);
                if (!empty($_FILES['foto']['name'])) {
                    if ($this->upload->do_upload('foto')) {
                        $gbr = $this->upload->data();
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/foto/dosen/' . $gbr['file_name'];
                        $config['maintain_ratio'] = FALSE;
                        $config['overwrite'] = TRUE;
                        $config['max_size']  = 10024;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $file = $gbr['file_name'];
                        $nip = $this->input->post('nip');
                        $nama = $this->input->post('nama');
                        $email = $this->input->post('email');
                        $kontak = $this->input->post('kontak');
                        $id_dosen = $this->input->post('id_dosen');

                        $data = array(
                            'foto' => $file,
                            'email' => $email,
                            'kontak' => $kontak,
                            'nip' => $nip,
                            'nama' => $nama,
                        );
                        $this->M_Akun->update('dosen', $data, array('id_dosen' => $id_dosen));
                        $this->session->set_flashdata('success', 'Berhasil tambah data');
                        redirect('akun/index', 'refresh');
                        // var_dump($data);
                    } else {
                        $this->session->set_flashdata('info', 'Gagal tambah data');
                        redirect('akun/index', 'refresh');
                    }
                } else {
                    $nip = $this->input->post('nip');
                    $nama = $this->input->post('nama');
                    $email = $this->input->post('email');
                    $kontak = $this->input->post('kontak');
                    $id_dosen = $this->input->post('id_dosen');
                    $data = array(
                        'email' => $email,
                        'kontak' => $kontak,
                        'nip' => $nip,
                        'nama' => $nama,
                        // 'id_dosen' => $id_dosen,
                    );
                    $this->M_Akun->update('dosen', $data, array('id_dosen' => $id_dosen));
                    $this->session->set_flashdata('flash', 'ditambah');
                    redirect('akun/index', 'refresh');
                    // var_dump($data);
                }
            }
        elseif ($this->session->userdata('id_admin')) :
            $this->form_validation->set_rules('id_admin', 'id_admin', 'required|trim', [
                'required' => 'Tidak Boleh Kosong!'
            ]);
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Akun';
                $data['title2'] = 'Biodata';
                $data['akun'] = $this->M_Akun->admin();

                $this->load->view('template/header', $data);
                $this->load->view('akun/edit_admin', $data);
                $this->load->view('template/footer', $data);
            } else {
                $config['upload_path'] = './assets/foto/admin/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
                $config['file_name'] = $this->input->post('id_admin');
                $this->upload->initialize($config);
                if (!empty($_FILES['foto']['name'])) {
                    if ($this->upload->do_upload('foto')) {
                        $gbr = $this->upload->data();
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/foto/admin/' . $gbr['file_name'];
                        $config['maintain_ratio'] = FALSE;
                        $config['overwrite'] = TRUE;
                        $config['max_size']  = 10024;
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $file = $gbr['file_name'];
                        $username = $this->input->post('username');
                        $nama = $this->input->post('nama');
                        $email = $this->input->post('email');
                        $password = $this->input->post('password');
                        $id_admin = $this->input->post('id_admin');

                        $data = array(
                            'foto' => $file,
                            'email' => $email,
                            'password' => $password,
                            'username' => $username,
                            'nama' => $nama,
                        );
                        $this->M_Akun->update('admin', $data, array('id_admin' => $id_admin));
                        $this->session->set_flashdata('success', 'Berhasil tambah data');
                        redirect('akun/index', 'refresh');
                        // var_dump($data);
                    } else {
                        $this->session->set_flashdata('info', 'Gagal tambah data');
                        redirect('akun/index', 'refresh');
                    }
                } else {
                    $username = $this->input->post('username');
                    $nama = $this->input->post('nama');
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $id_admin = $this->input->post('id_admin');

                    $data = array(
                        'email' => $email,
                        'password' => $password,
                        'username' => $username,
                        'nama' => $nama,
                    );
                    $this->M_Akun->update('admin', $data, array('id_admin' => $id_admin));
                    $this->session->set_flashdata('flash', 'ditambah');
                    redirect('akun/index', 'refresh');
                    // var_dump($data);
                }
            }
        endif;
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