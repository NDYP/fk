<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{
    public function mhs($username)
    {
        $query = $this->db->select('*,mahasiswa.nama, mahasiswa.nim, dosen.nama as nama_dosen, mahasiswa.foto, mahasiswa.email, prodi.program_studi')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->where('mahasiswa.nim', $username)
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function dosen($username)
    {
        $query = $this->db->select('*')
            ->from('dosen') //urut berdasarkan id
            ->where('dosen.nip', $username)
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function admin($username)
    {
        $query = $this->db->select('*')
            ->from('admin') //urut berdasarkan id
            ->where('admin.username', $username)
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
}