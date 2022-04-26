<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Akun extends CI_Model
{
    public function mahasiswa()
    {
        $query = $this->db->select('dosen.nama as nama_dosen,dosen.nip as nip_dosen,mahasiswa.nama, mahasiswa.nim,
        dosen.nama as nama_dosen, mahasiswa.foto, mahasiswa.email, mahasiswa.id_mahasiswa,mahasiswa.kontak_ortu,
        mahasiswa.nama_ibu,mahasiswa.alamat_ortu,mahasiswa.prodi,mahasiswa.dosen_pa, mahasiswa.asal_sekolah,
        mahasiswa.tahun_lulus,
        mahasiswa.ktp, mahasiswa.ijazah_sma,mahasiswa.agama,mahasiswa.pekerjaan_ayah, mahasiswa.pekerjaan_ibu,
        mahasiswa.alamat_kantor_ayah,mahasiswa.alamat_kantor_ibu, mahasiswa.penghasilan_ayah, mahasiswa.penghasilan_ibu,
        mahasiswa.alamat,mahasiswa.nama_ayah,mahasiswa.kontak_ortu,prodi.program_studi,mahasiswa.ukt,mahasiswa.jalur_masuk,
        mahasiswa.tahun_masuk,mahasiswa.kontak, mahasiswa.nik, mahasiswa.tanggal_lahir, mahasiswa.tempat_lahir, mahasiswa.jenis_kelamin')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->where('id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->order_by('mahasiswa.id_mahasiswa', 'desc')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function dosen()
    {
        $query = $this->db->select('')
            ->from('dosen') //urut berdasarkan id
            ->where('id_dosen', $this->session->userdata('id_dosen'))
            ->order_by('dosen.id_dosen', 'desc')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function admin()
    {
        $query = $this->db->select('')
            ->from('admin') //urut berdasarkan id
            ->where('id_admin', $this->session->userdata('id_admin'))
            ->order_by('admin.id_admin', 'desc')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
}