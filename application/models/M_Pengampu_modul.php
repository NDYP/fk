<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengampu_modul extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('a.id_pengampu_modul, a.id_modul, a.id_dosen, a.id_tahun_ajaran,
        b.kode,b.mata_kuliah, d.nama,d.nip, e.program_studi, c.tahun_akademik, c.semester')
            ->from('pengampu_modul a') //urut berdasarkan id
            ->join('tahun_ajaran c', 'a.id_tahun_ajaran=c.id_tahun_ajaran', 'left')
            ->join('modul b', 'b.id_modul=a.id_modul', 'left')
            ->join('dosen d', 'a.id_dosen=d.id_dosen', 'left')
            ->join('prodi e', 'b.prodi=e.id_prodi', 'left')
            ->order_by('a.id_tahun_ajaran', 'desc')
            ->group_by('c.tahun_akademik', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function detail($id_tahun_ajaran)
    {
        $query = $this->db->select('a.id_pengampu_modul, a.id_modul, a.id_dosen, a.id_tahun_ajaran,
        b.kode,b.mata_kuliah, d.nama,d.nip, e.program_studi, c.tahun_akademik, c.semester, e.program_studi')
            ->from('pengampu_modul a') //urut berdasarkan id
            ->join('tahun_ajaran c', 'a.id_tahun_ajaran=c.id_tahun_ajaran', 'left')
            ->join('modul b', 'b.id_modul=a.id_modul', 'left')
            ->join('dosen d', 'a.id_dosen=d.id_dosen', 'left')
            ->join('prodi e', 'b.prodi=e.id_prodi', 'left')
            ->where('a.id_tahun_ajaran', $id_tahun_ajaran)
            ->order_by('a.id_tahun_ajaran', 'desc')
            ->get();
        return $query;
    }
    public function get($id_pengampu_modul)
    {
        $query = $this->db->select('a.id_pengampu_modul, a.id_modul, a.id_dosen, a.id_tahun_ajaran,
        b.kode,b.mata_kuliah, d.nama,d.nip, e.program_studi, c.tahun_akademik, c.semester, e.program_studi')
            ->from('pengampu_modul a') //urut berdasarkan id
            ->join('tahun_ajaran c', 'a.id_tahun_ajaran=c.id_tahun_ajaran', 'left')
            ->join('modul b', 'b.id_modul=a.id_modul', 'left')
            ->join('dosen d', 'a.id_dosen=d.id_dosen', 'left')
            ->join('prodi e', 'b.prodi=e.id_prodi', 'left')
            ->where('a.id_pengampu_modul', $id_pengampu_modul)
            ->order_by('a.id_pengampu_modul', 'desc')
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
        $this->db->where('id_pengampu_modul', $no);
        $this->db->delete('pengampu_modul');
    }
}