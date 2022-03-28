<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Transkrip extends CI_Model
{

    public function index()
    {
        $query = $this->db->select('*, m.foto')
            ->from('transkrip t') //urut berdasarkan id
            ->join('mahasiswa m', 't.id_mahasiswa=m.id_mahasiswa', 'left')
            ->order_by('t.id_transkrip', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function krs_get($id_mahasiswa)
    {
        $query = $this->db->select('SUM(m.sks) as sks,SUM(n.angka) as nilai, SUM(m.sks * n.angka) as sksn,
        mhs.nama, mhs.nim, prodi.program_studi, mhs.prodi')
            ->from('detail_krs d') //urut berdasarkan id
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->join('mahasiswa mhs', 'd.id_mahasiswa=mhs.id_mahasiswa', 'left')
            ->join('prodi', 'mhs.prodi=prodi.id_prodi', 'left')
            ->join('detail_krs de', 'd.id_modul = de.id_modul AND (d.id_nilai > de.id_nilai OR (d.id_nilai = de.id_nilai AND
            d.id_detail_krs > de.id_detail_krs))', 'left')
            ->where('de.id_nilai =', NULL)
            ->where('d.id_mahasiswa', $id_mahasiswa)
            ->where('d.id_nilai !=', 0)
            ->get()
            ->row_array();
        return $query;
    }
    public function get($id_transkrip)
    {
        $query = $this->db->select('*')
            ->from('transkrip t') //urut berdasarkan id
            ->where('t.id_transkrip', $id_transkrip)
            ->get()
            ->row_array();
        return $query;
    }
    public function krs_list($id_transkrip)
    {
        $query = $this->db->select('m.*, n.*')
            ->from('transkrip t') //urut berdasarkan id
            ->join('mahasiswa mhs', 't.id_mahasiswa=mhs.id_mahasiswa', 'left')
            ->join('detail_krs d', 'mhs.id_mahasiswa=d.id_mahasiswa', 'left')
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->join('detail_krs de', 'd.id_modul = de.id_modul AND (d.id_nilai > de.id_nilai OR (d.id_nilai = de.id_nilai AND
            d.id_detail_krs > de.id_detail_krs))', 'left')
            ->where('de.id_nilai =', NULL)
            ->where('t.id_transkrip', $id_transkrip)
            ->where('d.id_nilai !=', 0)
            ->order_by('d.id_detail_krs', 'desc')
            ->group_by('m.kode', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function krs_list_sum($id_transkrip)
    {
        $query = $this->db->select('SUM(m.sks) as jumlah_sks, SUM(n.angka*m.sks) as jumlah_angka')
            ->from('transkrip t') //urut berdasarkan id
            ->join('mahasiswa mhs', 't.id_mahasiswa=mhs.id_mahasiswa', 'left')
            ->join('detail_krs d', 'mhs.id_mahasiswa=d.id_mahasiswa', 'left')
            ->join('modul m', 'd.id_modul=m.id_modul', 'left')
            ->join('nilai n', 'd.id_nilai=n.id_nilai', 'left')
            ->join('detail_krs de', 'd.id_modul = de.id_modul AND (d.id_nilai > de.id_nilai OR (d.id_nilai = de.id_nilai AND
            d.id_detail_krs > de.id_detail_krs))', 'left')
            ->where('de.id_nilai =', NULL)
            ->where('t.id_transkrip', $id_transkrip)
            // ->order_by('d.id_detail_krs', 'desc')
            // ->group_by('m.kode', 'desc')
            ->get()
            ->row_array();
        return $query;
    }
    public function tambah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
}