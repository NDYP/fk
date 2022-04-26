<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Beranda extends CI_Model
{

    public function prodi_aktif($th)
    {
        $query = $this->db->select('prodi.*, COUNT(mahasiswa.id_mahasiswa) as jumlah')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('registrasi', 'mahasiswa.id_mahasiswa=registrasi.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->where("mahasiswa.id_mahasiswa IN (select registrasi.id_mahasiswa from registrasi
            WHERE registrasi.id_tahun_ajaran = '$th')")
            ->group_by('prodi.id_prodi', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function prodi_nonaktif($th)
    {
        $query = $this->db->select('prodi.*, COUNT(mahasiswa.id_mahasiswa) as jumlah')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('registrasi', 'mahasiswa.id_mahasiswa=registrasi.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->where("mahasiswa.id_mahasiswa NOT IN (select registrasi.id_mahasiswa from registrasi
            WHERE registrasi.id_tahun_ajaran = '$th')")
            ->group_by('prodi.id_prodi', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function aktif($th, $id_prodi)
    {
        $query = $this->db->select('mahasiswa.*')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('registrasi', 'mahasiswa.id_mahasiswa=registrasi.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->where("mahasiswa.id_mahasiswa IN (select registrasi.id_mahasiswa from registrasi
            WHERE registrasi.id_tahun_ajaran = '$th')")
            ->where('mahasiswa.prodi', $id_prodi)
            ->order_by('mahasiswa.id_mahasiswa', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function nonaktif($th, $id_prodi)
    {
        $query = $this->db->select('mahasiswa.*')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('registrasi', 'mahasiswa.id_mahasiswa=registrasi.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->where("mahasiswa.id_mahasiswa NOT IN (select registrasi.id_mahasiswa from registrasi
            WHERE registrasi.id_tahun_ajaran = '$th')")
            ->where('mahasiswa.prodi', $id_prodi)
            ->order_by('mahasiswa.id_mahasiswa', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function prodi_ipk($th)
    {
        $query = $this->db->select('mahasiswa.*, prodi.*, MAX(khs.ipk) as ipk_highest , MIN(khs.ipk) as ipk_lowest')
            ->from('khs') //urut berdasarkan id
            ->join('khs de', 'khs.id_mahasiswa = de.id_mahasiswa AND
            (khs.ipk > de.ipk OR
            (khs.ipk = de.ipk AND
            khs.id_khs > de.id_khs))', 'right')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa=khs.id_mahasiswa', 'left')
            ->join('registrasi', 'mahasiswa.id_mahasiswa=registrasi.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->where('registrasi.id_tahun_ajaran', $th)
            ->group_by('prodi.program_studi', 'desc')
            ->distinct()
            // ->order_by('khs.ipk', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function list_ipk($th, $id_prodi)
    {
        $query = $this->db->select('mahasiswa.*, khs.ipk, prodi.*')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('registrasi', 'mahasiswa.id_mahasiswa=registrasi.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->join('khs', 'mahasiswa.id_mahasiswa=khs.id_mahasiswa', 'left')
            ->where("mahasiswa.id_mahasiswa IN (select khs.id_mahasiswa from khs)")
            ->where('registrasi.id_tahun_ajaran', $th)
            ->where('mahasiswa.prodi', $id_prodi)
            ->group_by('mahasiswa.id_mahasiswa', 'desc')
            ->order_by('khs.ipk', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function prodi_masa_studi()
    {

        $query = $this->db->select('COUNT(khs.id_khs) as jumlah,prodi.program_studi, prodi.id_prodi, mahasiswa.*,')
            ->from('khs') //urut berdasarkan id
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa=khs.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->order_by('mahasiswa.id_mahasiswa', 'desc')
            ->group_by('prodi.program_studi', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function list_masa_studi($id_prodi)
    {

        $query = $this->db->select('COUNT(khs.id_khs) as jumlah, mahasiswa.*,')
            ->from('khs') //urut berdasarkan id
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa=khs.id_mahasiswa', 'left')
            ->where('mahasiswa.prodi', $id_prodi)

            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->order_by('COUNT(khs.id_khs)', 'asc')
            ->group_by('mahasiswa.id_mahasiswa', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
}