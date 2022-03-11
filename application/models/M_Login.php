<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{
    public function mhs($username)
    {
        $query = $this->db->select('*')
            ->from('mahasiswa') //urut berdasarkan id

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