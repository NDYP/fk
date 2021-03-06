<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Krs_mhs extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('krs.id_krs, krs.status, krs.id_mahasiswa,krs.id_registrasi, krs.semester as smt,
        mahasiswa.nama,mahasiswa.nim, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        tahun_ajaran.semester, krs.catatan_revisi')
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
    public function krs()
    {
        $query = $this->db->select('*')
            ->from('modul') //urut berdasarkan id
            ->where('prodi', $this->session->userdata('prodi'))
            ->group_by('kurikulum')
            ->order_by('modul.id_modul', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_krs)
    {
        $query = $this->db->select('tahun_ajaran.id_tahun_ajaran,krs.id_krs, krs.id_mahasiswa,krs.id_registrasi, krs.semester as smt,
        mahasiswa.nama,mahasiswa.nim,mahasiswa.prodi, mahasiswa.alamat, prodi.program_studi, ds.nama as kaprodi, ds.nip as nip_kaprodi, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        tahun_ajaran.semester, krs.ips, krs.ipk,krs.sks_kumultatif, krs.sks_yad')
            ->from('krs') //urut berdasarkan id
            ->join('mahasiswa', 'krs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->join('dosen ds', 'prodi.kaprodi=ds.id_dosen', 'left')
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
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->where('d.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->join('detail_krs de', 'd.id_modul = de.id_modul AND (d.id_nilai > de.id_nilai OR (d.id_nilai = de.id_nilai AND
            d.id_detail_krs > de.id_detail_krs))', 'left')
            ->where('de.id_nilai =', NULL)
            // ->where('d.semester', $semester)
            ->where('n.keterangan', 'L')
            ->get()
            ->row_array();
        return $query;
        // $query = $this->db->select('SUM(m.sks) as sks')
        //     ->from('krs k') //urut berdasarkan id
        //     ->join('detail_krs d', 'k.semester=d.semester', 'left')
        //     ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
        //     ->join('modul m', 'd.id_modul=m.id_modul', 'left')
        //     // ->where('n.keterangan', 'L')
        //     ->where('k.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
        //     ->get()
        //     ->row_array();
        // return $query;
    }
    public function sks_yad()
    {
        $query = $this->db->select('SUM(m.sks) as sks')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            // ->where('d.semester', $krs)
            ->where('d.id_nilai', 0)
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
            ->where('d.semester', $krs)
            // ->where('d.semester', 0)
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
            // ->where('d.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            // ->where('d.id_nilai', 0)
            // ->where('d.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->get()
            ->result_array();
        return $query;
    }
    public function krs_get($krs)
    {
        $query = $this->db->select('d.id_detail_krs, m.*,
        ds.nama as nama_ketua, ds.nip as nip_ketua, ds1.nama, ds1.nip')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('koordinator_modul k', 'k.id_modul=m.id_modul', 'left')
            ->join('dosen ds', 'k.id_dosen=ds.id_dosen', 'left')
            ->join('dosen ds1', 'k.id_dosen2=ds1.id_dosen', 'left')
            ->where('d.semester', $krs)
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