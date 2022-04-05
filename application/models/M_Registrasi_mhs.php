<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Registrasi_mhs extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('r.id_registrasi,r.id_mahasiswa, r.id_tahun_ajaran, r.slip, r.regis_univ, r.va, r.status,
        m.nim, m.nama, t.tahun_akademik, t.semester, t.status as status_semester, r.catatan_revisi')
            ->from('registrasi r') //urut berdasarkan id
            ->join('mahasiswa m', 'r.id_mahasiswa=m.id_mahasiswa', 'left')
            ->join('tahun_ajaran t', 'r.id_tahun_ajaran=t.id_tahun_ajaran', 'left')
            ->where('m.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->order_by('r.id_registrasi', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function detail($id_tahun_ajaran)
    {
        $query = $this->db->select('r.id_registrasi, r.slip, r.regis_univ, r.va, r.status,
        m.nim, m.nama, t.tahun_akademik, t.semester, t.status as status_semester')
            ->from('registrasi r') //urut berdasarkan id
            ->join('mahasiswa m', 'r.id_mahasiswa=m.id_mahasiswa', 'left')
            ->join('tahun_ajaran t', 'r.id_tahun_ajaran=t.id_tahun_ajaran', 'left')
            ->where('t.id_tahun_ajaran', $id_tahun_ajaran)
            ->where('m.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->order_by('r.id_registrasi', 'asc')
            ->get()
            ->result_array();
        return $query;
    }

    public function get($id_registrasi)
    {
        $query = $this->db->select('r.id_registrasi,r.id_mahasiswa, r.id_tahun_ajaran, r.slip, r.regis_univ, r.va, r.status,
        m.nim, m.nama, t.tahun_akademik, t.semester, t.status as status_semester')
            ->from('registrasi r') //urut berdasarkan id
            ->join('mahasiswa m', 'r.id_mahasiswa=m.id_mahasiswa', 'left')
            ->join('tahun_ajaran t', 'r.id_tahun_ajaran=t.id_tahun_ajaran', 'left')
            ->where('r.id_registrasi', $id_registrasi)
            ->where('m.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->get()
            ->row_array();
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
        $this->db->where('id_registrasi', $no);
        $this->db->delete('registrasi');
    }
}