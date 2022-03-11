<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Bimbingan extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('mahasiswa.*,mahasiswa.nama, mahasiswa.nim, dosen.nama as nama_dosen, mahasiswa.foto, mahasiswa.email')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->where('mahasiswa.dosen_pa', $this->session->userdata('id_dosen'))
            ->order_by('mahasiswa.id_mahasiswa', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_mahasiswa)
    {
        $query = $this->db->select('mahasiswa.*,mahasiswa.nama, mahasiswa.nim, dosen.nama as nama_dosen, mahasiswa.foto, mahasiswa.email,prodi.program_studi')
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