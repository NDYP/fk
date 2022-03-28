<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('dosen.nama as nama_dosen,dosen.nip as nip_dosen,mahasiswa.nama, mahasiswa.nim, dosen.nama as nama_dosen, mahasiswa.foto, mahasiswa.email, mahasiswa.id_mahasiswa, mahasiswa.kontak')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')

            ->order_by('mahasiswa.id_mahasiswa', 'desc')

            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_mahasiswa)
    {
        $query = $this->db->select('dosen.nama as nama_dosen,dosen.nip as nip_dosen,mahasiswa.nama, mahasiswa.nim,
        dosen.nama as nama_dosen, mahasiswa.foto, mahasiswa.email, mahasiswa.id_mahasiswa,mahasiswa.kontak_ortu,
        mahasiswa.nama_ibu,mahasiswa.alamat_ortu,mahasiswa.prodi,mahasiswa.dosen_pa,
        mahasiswa.alamat,mahasiswa.nama_ayah,mahasiswa.kontak_ortu,prodi.program_studi,mahasiswa.ukt,mahasiswa.jalur_masuk,
        mahasiswa.tahun_masuk,mahasiswa.kontak, mahasiswa.nik, mahasiswa.tanggal_lahir, mahasiswa.tempat_lahir, mahasiswa.jenis_kelamin')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')

            ->where('id_mahasiswa', $id_mahasiswa)
            ->order_by('mahasiswa.id_mahasiswa', 'desc')

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
    public function hapus($no)
    {
        $this->db->where('id_mahasiswa', $no);
        $this->db->delete('mahasiswa');
    }
}