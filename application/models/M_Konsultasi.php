<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Konsultasi extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('krs.id_krs, krs.ipk,krs.ips, krs.status, krs.id_mahasiswa,krs.id_registrasi, krs.semester as smt,
        mahasiswa.nama, mahasiswa.nim, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        tahun_ajaran.semester, krs.catatan_revisi')
            ->from('krs') //urut berdasarkan id
            ->join('mahasiswa', 'krs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('registrasi', 'krs.id_registrasi=registrasi.id_registrasi', 'left')
            ->join('tahun_ajaran', 'registrasi.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->where('mahasiswa.dosen_pa', $this->session->userdata('id_dosen'))
            ->where('krs.status', 'Pengajuan')
            ->or_where('krs.status', 'Revisi')
            ->where('mahasiswa.dosen_pa', $this->session->userdata('id_dosen'))
            ->order_by('krs.id_krs', 'asc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_krs)
    {
        $query = $this->db->select('krs.id_krs,krs.ipk,krs.ips,krs.sks_kumultatif,krs.sks_yad, krs.status, krs.id_mahasiswa,krs.id_registrasi, krs.semester as smt,
        mahasiswa.nama, mahasiswa.nim, mahasiswa.prodi,mahasiswa.foto,mahasiswa.id_mahasiswa, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        tahun_ajaran.semester')
            ->from('krs') //urut berdasarkan id
            ->join('mahasiswa', 'krs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('registrasi', 'krs.id_registrasi=registrasi.id_registrasi', 'left')
            ->join('tahun_ajaran', 'registrasi.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->where('krs.id_krs', $id_krs)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function krs_list_edit($krs, $id_mahasiswa)
    {
        $query = $this->db->select('d.id_detail_krs, m.*')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul')
            ->where('d.semester', $krs)
            ->where('d.id_mahasiswa', $id_mahasiswa)
            ->or_where('d.semester', 0)
            ->where('d.id_mahasiswa', $id_mahasiswa)
            ->get()
            ->result_array();
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
}