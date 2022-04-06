<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Surat_aktif_mhs extends CI_Model
{

    public function index()
    {
        $query = $this->db->select('s.id_surat_aktif, s.id_mahasiswa, s.semester as smt, s.status,
        t.tahun_akademik,t.semester, m.nama, m.nim, m.foto')
            ->from('surat_aktif s') //urut berdasarkan id
            ->join('registrasi r', 's.id_mahasiswa=r.id_mahasiswa', 'left')
            ->join('mahasiswa m', 'r.id_mahasiswa=m.id_mahasiswa', 'left')
            ->join('tahun_ajaran t', 'r.id_tahun_ajaran=t.id_tahun_ajaran', 'left')
            ->where('r.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->order_by('r.id_registrasi', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function index2()
    {
        $query = $this->db->select('s.id_surat_aktif, s.id_mahasiswa, s.semester as smt, s.status,
        t.tahun_akademik,t.semester, m.nama, m.nim, m.foto, s.catatan_revisi')
            ->from('surat_aktif s') //urut berdasarkan id
            ->join('registrasi r', 's.id_mahasiswa=r.id_mahasiswa', 'left')
            ->join('mahasiswa m', 'r.id_mahasiswa=m.id_mahasiswa', 'left')
            ->join('tahun_ajaran t', 'r.id_tahun_ajaran=t.id_tahun_ajaran', 'left')
            ->order_by('r.id_registrasi', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_surat_aktif)
    {
        $query = $this->db->select('s.id_surat_aktif, s.id_mahasiswa, s.semester as smt, s.status,
        t.tahun_akademik,t.semester, m.nama, m.nim, m.foto, prodi.program_studi, m.tahun_masuk, m.prodi, s.ttd_nama,
        s.ttd_nip')
            ->from('surat_aktif s') //urut berdasarkan id
            ->join('registrasi r', 's.id_mahasiswa=r.id_mahasiswa', 'left')
            ->join('mahasiswa m', 'r.id_mahasiswa=m.id_mahasiswa', 'left')
            ->join('prodi', 'm.prodi=prodi.id_prodi', 'left')
            ->join('tahun_ajaran t', 'r.id_tahun_ajaran=t.id_tahun_ajaran', 'left')
            ->where('s.id_surat_aktif', $id_surat_aktif)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function semester()
    {
        $query = $this->db->select('COUNT(krs.id_krs) as semester')
            ->from('krs') //urut berdasarkan id
            ->where('krs.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->order_by('krs.id_krs', 'desc')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function tambah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
}