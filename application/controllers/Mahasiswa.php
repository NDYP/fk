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
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        // $this->form_validation->set_rules('email', 'email', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        $this->form_validation->set_rules('dosen_pa', 'dose_pa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('prodi', 'prodi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        // $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        // $this->form_validation->set_rules('jalur_masuk', 'jenis_kelamin', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('tahun_masuk', 'jenis_kelamin', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('ukt', 'jenis_kelamin', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Mahasiswa';
            $data['title2'] = 'Add Data';
            $data['dosen'] = $this->M_Dosen->index();
            $data['prodi'] = $this->M_Prodi->index();

            $this->load->view('template/header', $data);
            $this->load->view('mahasiswa/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            $config['upload_path'] = './assets/foto/mahasiswa/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('nim');
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/mahasiswa/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $file = $gbr['file_name'];
                    $nim = $this->input->post('nim');
                    $nik = $this->input->post('nik');
                    $nama = $this->input->post('nama');
                    $email = $this->input->post('email');
                    $kontak = $this->input->post('kontak');
                    $tempat_lahir = $this->input->post('tempat_lahir');
                    $tanggal_lahir = $this->input->post('tanggal_lahir');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $alamat = $this->input->post('alamat');

                    $nama_ayah = $this->input->post('nama_ayah');
                    $nama_ibu = $this->input->post('nama_ibu');
                    $kontak_ortu = $this->input->post('kontak_ortu');
                    $alamat_ortu = $this->input->post('alamat_ortu');


                    $jalur_masuk = $this->input->post('jalur_masuk');
                    $tahun_masuk = $this->input->post('tahun_masuk');
                    $ukt = $this->input->post('ukt');
                    $dosen_pa = $this->input->post('dosen_pa');
                    $prodi = $this->input->post('prodi');

                    $data = array(
                        'foto' => $file,
                        'email' => $email,
                        'kontak' => $kontak,
                        'nim' => $nim,
                        'nama' => $nama,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => date('Y-m-d', strtotime($tanggal_lahir)),
                        'jenis_kelamin' => $jenis_kelamin,
                        'nik' => $nik,
                        'alamat' => $alamat,
                        'jalur_masuk' => $jalur_masuk,
                        'tahun_masuk' => $tahun_masuk,
                        'ukt' => $ukt,
                        'dosen_pa' => $dosen_pa,
                        'prodi' => $prodi,
                        'nama_ayah' => $nama_ayah,
                        'nama_ibu' => $nama_ibu,
                        'kontak_ortu' => $kontak_ortu,
                        'alamat_ortu' => $alamat_ortu,
                    );
                    // print_r($data);
                    $this->M_Mahasiswa->tambah('mahasiswa', $data);
                    $this->session->set_flashdata('flash', 'ditambah');
                    redirect('mahasiswa/index', 'refresh');
                    // // var_dump($data);
                } else {
                    $this->session->set_flashdata('flash', 'ditambah');
                    redirect('mahasiswa/index', 'refresh');
                }
            } else {
                $nim = $this->input->post('nim');
                $nik = $this->input->post('nik');
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $kontak = $this->input->post('kontak');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $tanggal_lahir = $this->input->post('tanggal_lahir');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $alamat = $this->input->post('alamat');

                $nama_ayah = $this->input->post('nama_ayah');
                $nama_ibu = $this->input->post('nama_ibu');
                $kontak_ortu = $this->input->post('kontak_ortu');
                $alamat_ortu = $this->input->post('alamat_ortu');


                $jalur_masuk = $this->input->post('jalur_masuk');
                $tahun_masuk = $this->input->post('tahun_masuk');
                $ukt = $this->input->post('ukt');
                $dosen_pa = $this->input->post('dosen_pa');
                $prodi = $this->input->post('prodi');

                $data = array(
                    'email' => $email,
                    'kontak' => $kontak,
                    'nim' => $nim,
                    'nama' => $nama,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' =>
                    date('Y-m-d', strtotime($tanggal_lahir)),
                    'jenis_kelamin' => $jenis_kelamin,
                    'nik' => $nik,
                    'alamat' => $alamat,
                    'jalur_masuk' => $jalur_masuk,
                    'tahun_masuk' => $tahun_masuk,
                    'ukt' => $ukt,
                    'dosen_pa' => $dosen_pa,
                    'prodi' => $prodi,
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'kontak_ortu' => $kontak_ortu,
                    'alamat_ortu' => $alamat_ortu,
                );
                // print_r($data);
                $this->M_Mahasiswa->tambah('mahasiswa', $data);
                $this->session->set_flashdata('flash', 'ditambah');
                redirect('mahasiswa/index', 'refresh');
            }
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
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jalur_masuk', 'jenis_kelamin', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tahun_masuk', 'jenis_kelamin', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('ukt', 'jenis_kelamin', 'required|trim', [
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
            $config['upload_path'] = './assets/foto/mahasiswa/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('nim');
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/mahasiswa/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 1024;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $file = $gbr['file_name'];
                    $nim = $this->input->post('nim');
                    $nik = $this->input->post('nik');
                    $nama = $this->input->post('nama');
                    $email = $this->input->post('email');
                    $kontak = $this->input->post('kontak');
                    $tempat_lahir = $this->input->post('tempat_lahir');
                    $tanggal_lahir = $this->input->post('tanggal_lahir');
                    $jenis_kelamin = $this->input->post('jenis_kelamin');
                    $alamat = $this->input->post('alamat');

                    $nama_ayah = $this->input->post('nama_ayah');
                    $nama_ibu = $this->input->post('nama_ibu');
                    $kontak_ortu = $this->input->post('kontak_ortu');
                    $alamat_ortu = $this->input->post('alamat_ortu');


                    $jalur_masuk = $this->input->post('jalur_masuk');
                    $tahun_masuk = $this->input->post('tahun_masuk');
                    $ukt = $this->input->post('ukt');
                    $dosen_pa = $this->input->post('dosen_pa');
                    $prodi = $this->input->post('prodi');

                    $id_mahasiswa = $this->input->post('id_mahasiswa');

                    $data = array(
                        'foto' => $file,
                        'email' => $email,
                        'kontak' => $kontak,
                        'nim' => $nim,
                        'nama' => $nama,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' =>
                        date('Y-m-d', strtotime($tanggal_lahir)),
                        'jenis_kelamin' => $jenis_kelamin,
                        'nik' => $nik,
                        'alamat' => $alamat,
                        'jalur_masuk' => $jalur_masuk,
                        'tahun_masuk' => $tahun_masuk,
                        'ukt' => $ukt,
                        'dosen_pa' => $dosen_pa,
                        'prodi' => $prodi,
                        'nama_ayah' => $nama_ayah,
                        'nama_ibu' => $nama_ibu,
                        'kontak_ortu' => $kontak_ortu,
                        'alamat_ortu' => $alamat_ortu,
                    );
                    // print_r($data);
                    $this->M_Mahasiswa->update('mahasiswa', $data, array('id_mahasiswa' => $id_mahasiswa));
                    $this->session->set_flashdata('flash', 'diupdate');
                    redirect('mahasiswa/index', 'refresh');
                    // // var_dump($data);
                } else {
                    $this->session->set_flashdata('flash', 'diupdate');
                    redirect('mahasiswa/index', 'refresh');
                }
            } else {
                $nim = $this->input->post('nim');
                $nik = $this->input->post('nik');
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $kontak = $this->input->post('kontak');
                $tempat_lahir = $this->input->post('tempat_lahir');
                $tanggal_lahir = $this->input->post('tanggal_lahir');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $alamat = $this->input->post('alamat');

                $nama_ayah = $this->input->post('nama_ayah');
                $nama_ibu = $this->input->post('nama_ibu');
                $kontak_ortu = $this->input->post('kontak_ortu');
                $alamat_ortu = $this->input->post('alamat_ortu');


                $jalur_masuk = $this->input->post('jalur_masuk');
                $tahun_masuk = $this->input->post('tahun_masuk');
                $ukt = $this->input->post('ukt');
                $dosen_pa = $this->input->post('dosen_pa');
                $prodi = $this->input->post('prodi');

                $id_mahasiswa = $this->input->post('id_mahasiswa');


                $data = array(
                    'email' => $email,
                    'kontak' => $kontak,
                    'nim' => $nim,
                    'nama' => $nama,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' =>
                    date('Y-m-d', strtotime($tanggal_lahir)),
                    'jenis_kelamin' => $jenis_kelamin,
                    'nik' => $nik,
                    'alamat' => $alamat,
                    'jalur_masuk' => $jalur_masuk,
                    'tahun_masuk' => $tahun_masuk,
                    'ukt' => $ukt,
                    'dosen_pa' => $dosen_pa,
                    'prodi' => $prodi,
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'kontak_ortu' => $kontak_ortu,
                    'alamat_ortu' => $alamat_ortu,
                );
                // print_r($data);
                $this->M_Mahasiswa->update('mahasiswa', $data, array('id_mahasiswa' => $id_mahasiswa));

                $this->session->set_flashdata('flash', 'diupdate');
                redirect('mahasiswa/index', 'refresh');
            }
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
}