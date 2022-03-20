<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Krs extends CI_Model
{

    public function get($id_tahun_ajaran)
    {
        $query = $this->db->select('tahun_ajaran.id_tahun_ajaran,krs.id_krs, krs.id_mahasiswa,krs.id_registrasi, krs.semester as smt,
        mahasiswa.nama,mahasiswa.nim, mahasiswa.alamat, prodi.program_studi, ds.nama as kaprodi, ds.nip as nip_kaprodi, dosen.nama as dosen_pa, dosen.nip,tahun_ajaran.tahun_akademik,
        tahun_ajaran.semester, krs.ips, krs.ipk,krs.sks_kumultatif, krs.sks_yad,krs.status')
            ->from('krs') //urut berdasarkan id
            ->join('mahasiswa', 'krs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            ->join('dosen ds', 'prodi.kaprodi=ds.id_dosen', 'left')
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('registrasi', 'krs.id_registrasi=registrasi.id_registrasi', 'left')
            ->join('tahun_ajaran', 'registrasi.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->where('registrasi.id_tahun_ajaran', $id_tahun_ajaran)
            ->order_by('krs.id_krs', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
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
    public function krs_get($id_mahasiswa)
    {
        $query = $this->db->select('d.id_detail_krs, m.*,
        ds.nama as nama_ketua, ds.nip as nip_ketua, ds1.nama, ds1.nip')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('koordinator_modul k', 'k.id_modul=m.id_modul', 'left')
            ->join('dosen ds', 'k.id_dosen=ds.id_dosen', 'left')
            ->join('dosen ds1', 'k.id_dosen2=ds1.id_dosen', 'left')
            ->where('d.id_mahasiswa', $id_mahasiswa)
            ->where('d.id_nilai', 0)
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