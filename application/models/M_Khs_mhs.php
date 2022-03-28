<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Khs_mhs extends CI_Model
{

    public function index()
    {
        $query = $this->db->select('tahun_ajaran.id_tahun_ajaran,khs.id_krs, khs.id_mahasiswa,khs.semester,
        tahun_ajaran.tahun_akademik,khs.ips, khs.ipk,khs.sks_semester_beban, khs.sks_semester_lulus,khs.sks_kumultatif_beban,
        khs.sks_kumultatif_lulus, khs.sksn_semester, khs.sksn_kumultatif, khs.id_tahun_ajaran,
        khs.id_khs')
            ->from('khs') //urut berdasarkan id

            ->join('tahun_ajaran', 'khs.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->where('khs.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->order_by('khs.id_khs', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get_khs($id_khs)
    {
        $query = $this->db->select('tahun_ajaran.id_tahun_ajaran,khs.id_krs, khs.id_mahasiswa,khs.semester,
        mahasiswa.nama,mahasiswa.nim,mahasiswa.prodi, mahasiswa.alamat, prodi.program_studi, ds.nama as kaprodi, ds.nip as nip_kaprodi, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        khs.ips, khs.ipk,khs.sks_semester_beban, khs.sks_semester_lulus,khs.sks_kumultatif_beban,
        khs.sks_kumultatif_lulus, khs.sksn_semester, khs.sksn_kumultatif, khs.id_tahun_ajaran,
        dekanat_jabatan.jabatan, dosen.nama as ttd_nama, dosen.nip as ttd_nip, khs.id_khs')
            ->from('khs') //urut berdasarkan id
            ->join('mahasiswa', 'khs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->join('dosen ds', 'prodi.kaprodi=ds.id_dosen', 'left')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('dekanat', 'dosen.id_dosen=dosen.id_dosen', 'left')
            ->join('dekanat_jabatan', 'dekanat.jabatan=dekanat_jabatan.id_jabatan', 'left')
            ->join('tahun_ajaran', 'khs.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->where('khs.id_khs', $id_khs)
            ->order_by('khs.id_khs', 'desc')
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function list_khs($semester)
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
            ->where('khs.id_mahasiswa', $this->session->userdata('id_mahasiswa'))
            ->where('khs.semester !=', $semester)
            ->order_by('khs.semester', 'asc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
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
}