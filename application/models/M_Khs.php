<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Khs extends CI_Model
{
    public function get($id_krs)
    {
        $query = $this->db->select('tahun_ajaran.id_tahun_ajaran,krs.id_krs, krs.id_mahasiswa,krs.id_registrasi, krs.semester as smt,
        mahasiswa.nama,mahasiswa.nim,mahasiswa.prodi, mahasiswa.alamat, prodi.program_studi, ds.nama as kaprodi, ds.nip as nip_kaprodi, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        tahun_ajaran.semester, krs.ips, krs.ipk,krs.sks_kumultatif, krs.sks_yad,krs.status,
        krs.sks_yad, krs.sks_kumultatif')
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

    public function semester($id_mahasiswa)
    {
        $query = $this->db->select('count(id_khs) as semester')
            ->from('khs') //urut berdasarkan id
            ->join('krs', 'krs.id_krs=khs.id_krs', 'left')
            ->join('mahasiswa', 'krs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->where('krs.id_mahasiswa', $id_mahasiswa)
            ->order_by('khs.id_khs', 'desc')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function krs_get($id_mahasiswa, $semester)
    {
        $query = $this->db->select('d.id_detail_krs, m.*, n.*')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->join('detail_krs de', 'd.id_modul = de.id_modul AND (d.id_nilai > de.id_nilai OR (d.id_nilai = de.id_nilai AND
            d.id_detail_krs > de.id_detail_krs))', 'left')
            ->where('de.id_nilai =', NULL)
            ->where('d.id_mahasiswa', $id_mahasiswa)
            ->where('d.semester', $semester)
            ->where('d.id_nilai !=', 0)
            ->get()
            ->result_array();
        return $query;
    }
    public function sks_semester_lulus($id_mahasiswa, $semester)
    {
        $query = $this->db->select('SUM(m.sks) as sks_lulus')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->join('detail_krs de', 'd.id_modul = de.id_modul AND (d.id_nilai > de.id_nilai OR (d.id_nilai = de.id_nilai AND
            d.id_detail_krs > de.id_detail_krs))', 'left')
            ->where('de.id_nilai =', NULL)
            ->where('d.id_mahasiswa', $id_mahasiswa)
            ->where('d.semester', $semester)
            ->where('n.keterangan', 'L')
            ->get()
            ->row_array();
        return $query;
    }
    public function ips($id_mahasiswa, $semester)
    {
        $query = $this->db->select('SUM(m.sks) as sks, SUM(m.sks * n.angka) as sksn')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->join('detail_krs de', 'd.id_modul = de.id_modul AND (d.id_nilai > de.id_nilai OR (d.id_nilai = de.id_nilai AND
            d.id_detail_krs > de.id_detail_krs))', 'left')
            ->where('de.id_nilai =', NULL)
            ->where('d.id_mahasiswa', $id_mahasiswa)
            ->where('d.semester', $semester)
            ->get()
            ->row_array();
        return $query;
    }
    public function sks_kumultatif_lulus($id_mahasiswa, $semester)
    {
        $query = $this->db->select('SUM(m.sks) as sks_lulus,SUM(m.sks * n.angka) as sksn')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->where('d.id_mahasiswa', $id_mahasiswa)
            ->join('detail_krs de', 'd.id_modul = de.id_modul AND (d.id_nilai > de.id_nilai OR (d.id_nilai = de.id_nilai AND
            d.id_detail_krs > de.id_detail_krs))', 'left')
            ->where('de.id_nilai =', NULL)
            // ->where('d.semester', $semester)
            ->where('n.keterangan', 'L')
            ->get()
            ->row_array();
        return $query;
    }
    public function sks_kumultatif_beban($id_mahasiswa, $semester)
    {
        $query = $this->db->select('SUM(m.sks) as sks_lulus, SUM(m.sks * n.angka) as sksn')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->join('detail_krs de', 'd.id_modul = de.id_modul AND (d.id_nilai > de.id_nilai OR (d.id_nilai = de.id_nilai AND
            d.id_detail_krs > de.id_detail_krs))', 'left')
            ->where('de.id_nilai =', NULL)
            ->where('d.id_mahasiswa', $id_mahasiswa)
            // ->where('d.semester', $semester)
            ->get()
            ->row_array();
        return $query;
    }
    public function get_khs($id_krs)
    {
        $query = $this->db->select('tahun_ajaran.id_tahun_ajaran,khs.id_krs, khs.id_mahasiswa,khs.semester,
        mahasiswa.nama,mahasiswa.nim,mahasiswa.prodi, mahasiswa.alamat, prodi.program_studi, ds.nama as kaprodi, ds.nip as nip_kaprodi, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        khs.ips, khs.ipk,khs.sks_semester_beban, khs.sks_semester_lulus,khs.sks_kumultatif_beban,
        khs.sks_kumultatif_lulus, khs.sksn_semester, khs.sksn_kumultatif, khs.id_tahun_ajaran,
        dekanat_jabatan.jabatan, dosen.nama as ttd_nama, dosen.nip as ttd_nip')
            ->from('khs') //urut berdasarkan id
            ->join('mahasiswa', 'khs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->join('dosen ds', 'prodi.kaprodi=ds.id_dosen', 'left')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('dekanat', 'dosen.id_dosen=dosen.id_dosen', 'left')
            ->join('dekanat_jabatan', 'dekanat.jabatan=dekanat_jabatan.id_jabatan', 'left')
            ->join('tahun_ajaran', 'khs.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->where('khs.id_krs', $id_krs)
            ->order_by('khs.id_khs', 'desc')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function list_khs($id_krs, $semester)
    {
        $query = $this->db->select('tahun_ajaran.id_tahun_ajaran,khs.id_krs, khs.id_mahasiswa,khs.semester,
        mahasiswa.nama,mahasiswa.nim,mahasiswa.prodi, mahasiswa.alamat, prodi.program_studi, ds.nama as kaprodi, ds.nip as nip_kaprodi, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        khs.ips, khs.ipk,khs.sks_semester_beban, khs.sks_semester_lulus,khs.sks_kumultatif_beban,
        khs.sks_kumultatif_lulus, khs.sksn_semester, khs.sksn_kumultatif, khs.id_tahun_ajaran')
            ->from('khs') //urut berdasarkan id
            ->join('mahasiswa', 'khs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->join('dosen ds', 'prodi.kaprodi=ds.id_dosen', 'left')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('tahun_ajaran', 'khs.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->where('khs.id_krs', $id_krs)
            ->where('khs.semester !=', $semester)
            ->order_by('khs.id_khs', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function ttd()
    {
        $query = $this->db->select('dekanat_jabatan.jabatan, dosen.nama, dosen.nip')
            ->from('dekanat') //urut berdasarkan id
            ->join('dosen', 'dekanat.id_dosen=dosen.id_dosen', 'left')
            ->join('dekanat_jabatan', 'dekanat.jabatan=dekanat_jabatan.id_jabatan', 'left')
            ->where('dekanat_jabatan.id_jabatan', '2')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }


    public function detail($id_krs)
    {
        $query = $this->db->select('tahun_ajaran.id_tahun_ajaran,krs.id_krs, krs.id_mahasiswa,krs.id_registrasi, krs.semester as smt,
        mahasiswa.nama,mahasiswa.nim, mahasiswa.alamat, prodi.program_studi, ds.nama as kaprodi, ds.nip as nip_kaprodi, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
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