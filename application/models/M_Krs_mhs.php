<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Krs_mhs extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('krs.id_krs, krs.status, krs.id_mahasiswa,krs.id_registrasi, krs.semester as smt,
        mahasiswa.nama,mahasiswa.nim, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        tahun_ajaran.semester')
            ->from('krs') //urut berdasarkan id
            ->join('mahasiswa', 'krs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('registrasi', 'krs.id_registrasi=registrasi.id_registrasi', 'left')
            ->join('tahun_ajaran', 'registrasi.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->where('krs.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->order_by('krs.id_krs', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_krs)
    {
        $query = $this->db->select('tahun_ajaran.id_tahun_ajaran,krs.id_krs, krs.id_mahasiswa,krs.id_registrasi, krs.semester as smt,
        mahasiswa.nama,mahasiswa.nim, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        tahun_ajaran.semester, krs.ips, krs.ipk,krs.sks_kumultatif, krs.sks_yad ')
            ->from('krs') //urut berdasarkan id
            ->join('mahasiswa', 'krs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('registrasi', 'krs.id_registrasi=registrasi.id_registrasi', 'left')
            ->join('tahun_ajaran', 'registrasi.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->where('krs.id_krs', $id_krs)
            ->order_by('krs.id_krs', 'desc')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function semester()
    {
        $query = $this->db->select('count(id_khs) as semester, khs.ips, khs.ipk, mahasiswa.*,dosen.nama as dosen_pa, dosen.nip,')
            ->from('khs') //urut berdasarkan id
            ->join('krs', 'krs.id_krs=khs.id_krs')
            ->join('mahasiswa', 'krs.id_mahasiswa=mahasiswa.id_mahasiswa')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen')
            ->where('krs.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->order_by('khs.id_khs', 'desc')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function registrasi()
    {
        $query = $this->db->select('MAX(r.id_registrasi) as id_registrasi,r.id_mahasiswa, r.id_tahun_ajaran, r.slip, r.regis_univ, r.va, r.status,
        m.nim, m.nama, t.tahun_akademik, t.semester, t.status as status_semester')
            ->from('registrasi r') //urut berdasarkan id
            ->join('mahasiswa m', 'r.id_mahasiswa=m.id_mahasiswa', 'left')
            ->join('tahun_ajaran t', 'r.id_tahun_ajaran=t.id_tahun_ajaran', 'left')
            ->where('m.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->where('r.status', 'Diterima')
            ->order_by('r.id_registrasi', 'desc')
            ->get()
            ->row_array();
        return $query;
    }
    public function sks_kumul()
    {
        $query = $this->db->select('SUM(m.sks) as sks')
            ->from('krs k') //urut berdasarkan id
            ->join('detail_krs d', 'k.semester=d.semester', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->where('n.keterangan', 'L')
            ->where('k.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->get()
            ->row_array();
        return $query;
    }
    public function sks_yad()
    {
        $query = $this->db->select('SUM(m.sks) as sks')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul')
            ->where('d.semester', 0)
            ->where('d.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->get()
            ->row_array();
        return $query;
    }
    public function sks_yad_edit($krs)
    {
        $query = $this->db->select('SUM(m.sks) as sks')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul')
            // ->where('d.semester', $krs)
            ->where('d.semester', 0)
            ->where('d.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->get()
            ->row_array();
        return $query;
    }
    public function krs_list()
    {
        $query = $this->db->select('d.id_detail_krs, m.*')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul')
            ->where('d.semester', 0)
            ->where('d.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->get()
            ->result_array();
        return $query;
    }
    public function krs_list_edit($krs)
    {
        $query = $this->db->select('d.id_detail_krs, m.*')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul')
            ->where('d.semester', $krs)
            ->where('d.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->or_where('d.semester', 0)
            ->where('d.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->get()
            ->result_array();
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
    public function hapus($id_detail_krs)
    {
        $this->db->where('id_detail_krs', $id_detail_krs);
        $this->db->delete('detail_krs');
    }
}