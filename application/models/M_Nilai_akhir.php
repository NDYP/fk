<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Nilai_akhir extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('')
            ->from('tahun_ajaran') //urut berdasarkan id
            ->order_by('tahun_ajaran.id_tahun_ajaran', 'desc')
            ->where('status', '1')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_tahun_ajaran)
    {
        $query = $this->db->select('koordinator_modul.id_koordinator_modul,koordinator_modul.id_tahun_ajaran
        ,modul.kode,modul.id_modul, modul.mata_kuliah,modul.sks, koordinator_modul.id_dosen2,
        modul.sks,modul.semester, modul.semester as smt, prodi.id_prodi,
        modul.tahun,modul.durasi, prodi.program_studi, a.nama, a.nip,  b.nama as nama_sekretaris, b.nip as nip_sekretaris,
        tahun_ajaran.tahun_akademik, tahun_ajaran.semester')
            ->from('koordinator_modul') //urut berdasarkan id
            ->join('modul', 'modul.id_modul=koordinator_modul.id_modul', 'left')
            ->join('tahun_ajaran', 'koordinator_modul.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->join('prodi', 'modul.prodi=prodi.id_prodi', 'left')
            ->join('dosen', 'prodi.kaprodi=dosen.id_dosen', 'left')
            ->join('dosen a', 'koordinator_modul.id_dosen=a.id_dosen', 'left')
            ->join('dosen b', 'koordinator_modul.id_dosen2=b.id_dosen', 'left')
            ->where('koordinator_modul.id_tahun_ajaran', $id_tahun_ajaran)
            ->where('koordinator_modul.id_dosen', $this->session->userdata('id_dosen'))
            ->order_by('koordinator_modul.id_koordinator_modul', 'desc')
            ->get();
        return $query;
    }
    public function mahasiswa($id_modul)
    {
        $query = $this->db->select('mahasiswa.nama,mahasiswa.nim, detail_krs.semester
        ,modul.id_modul, detail_krs.id_detail_krs, nilai.*,
        a.nama as nama_ketua, a.nip as nip_ketua,  b.nama as nama_sekretaris, b.nip as nip_sekretaris, modul.mata_kuliah,
        modul.kode, modul.sks, prodi.program_studi, tahun_ajaran.tahun_akademik, tahun_ajaran.semester')
            ->from('detail_krs') //urut berdasarkan id
            ->join('modul', 'detail_krs.id_modul=modul.id_modul', 'left')

            ->join('prodi', 'modul.prodi=prodi.id_prodi', 'left')
            ->join('koordinator_modul', 'modul.id_modul=koordinator_modul.id_modul', 'left')
            ->join('dosen a', 'koordinator_modul.id_dosen=a.id_dosen', 'left')
            ->join('dosen b', 'koordinator_modul.id_dosen2=b.id_dosen', 'left')
            ->join('tahun_ajaran', 'koordinator_modul.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->join('nilai', 'detail_krs.id_nilai=nilai.id_nilai', 'left')
            ->join('mahasiswa', 'detail_krs.id_mahasiswa=mahasiswa.id_mahasiswa', 'left')
            ->where('detail_krs.id_modul', $id_modul)
            ->order_by('detail_krs.id_detail_krs', 'as')
            ->get();
        return $query;
    }

    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
}