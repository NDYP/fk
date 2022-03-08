<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Koordinator_modul extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('koordinator_modul.id_koordinator_modul,koordinator_modul.id_tahun_ajaran
        ,modul.kode, modul.mata_kuliah,modul.sks,
        modul.sks,modul.semester, modul.semester, prodi.id_prodi,
        modul.tahun,modul.durasi, prodi.program_studi,  dosen.nama, dosen.nip,
        prodi.program_studi, prodi.id_prodi, tahun_ajaran.tahun_akademik, tahun_ajaran.semester')
            ->from('koordinator_modul') //urut berdasarkan id
            ->join('modul', 'modul.id_modul=koordinator_modul.id_modul', 'left')
            ->join('tahun_ajaran', 'koordinator_modul.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->join('prodi', 'modul.prodi=prodi.id_prodi', 'left')
            ->join('dosen', 'prodi.kaprodi=dosen.id_dosen', 'left')
            ->order_by('tahun_ajaran.id_tahun_ajaran', 'desc')
            ->group_by('tahun_ajaran.tahun_akademik', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function detail($id_tahun_ajaran)
    {
        $query = $this->db->select('koordinator_modul.id_koordinator_modul,koordinator_modul.id_tahun_ajaran
        ,modul.kode, modul.mata_kuliah,modul.sks, koordinator_modul.id_dosen2,
        modul.sks,modul.semester, modul.semester, prodi.id_prodi,
        modul.tahun,modul.durasi, prodi.program_studi, a.nama, a.nip,  b.nama as nama_sekretaris, b.nip as nip_sekretaris,
        prodi.program_studi, prodi.id_prodi, tahun_ajaran.tahun_akademik, tahun_ajaran.semester')
            ->from('koordinator_modul') //urut berdasarkan id
            ->join('modul', 'modul.id_modul=koordinator_modul.id_modul', 'left')
            ->join('tahun_ajaran', 'koordinator_modul.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->join('prodi', 'modul.prodi=prodi.id_prodi', 'left')
            ->join('dosen', 'prodi.kaprodi=dosen.id_dosen', 'left')
            ->join('dosen a', 'koordinator_modul.id_dosen=a.id_dosen', 'left')
            ->join('dosen b', 'koordinator_modul.id_dosen2=b.id_dosen', 'left')
            ->where('koordinator_modul.id_tahun_ajaran', $id_tahun_ajaran)
            ->order_by('koordinator_modul.id_koordinator_modul', 'desc')
            ->get();
        return $query;
    }
    public function get($id_koordinator_modul)
    {
        $query = $this->db->select('koordinator_modul.id_koordinator_modul,koordinator_modul.id_tahun_ajaran
        ,modul.kode, modul.mata_kuliah,modul.sks, koordinator_modul.id_dosen,koordinator_modul.id_dosen2,
        modul.sks,modul.semester, modul.semester, koordinator_modul.id_modul,
        modul.tahun,modul.durasi, prodi.program_studi,  a.nama, a.nip,  b.nama as nama_sekretaris, b.nip as nip_sekretaris,
        prodi.program_studi, prodi.id_prodi, tahun_ajaran.tahun_akademik, tahun_ajaran.semester')
            ->from('koordinator_modul') //urut berdasarkan id
            ->join('modul', 'modul.id_modul=koordinator_modul.id_modul', 'left')
            ->join('tahun_ajaran', 'koordinator_modul.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran', 'left')
            ->join('prodi', 'modul.prodi=prodi.id_prodi', 'left')
            ->join('dosen', 'prodi.kaprodi=dosen.id_dosen', 'left')
            ->join('dosen a', 'koordinator_modul.id_dosen=a.id_dosen', 'left')
            ->join('dosen b', 'koordinator_modul.id_dosen2=b.id_dosen', 'left')
            ->where('koordinator_modul.id_koordinator_modul', $id_koordinator_modul)
            ->order_by('koordinator_modul.id_koordinator_modul', 'desc')
            ->get();
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
        $this->db->where('id_koordinator_modul', $no);
        $this->db->delete('koordinator_modul');
    }
}