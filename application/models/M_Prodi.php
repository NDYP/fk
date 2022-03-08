<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Prodi extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('prodi.program_studi, prodi.id_prodi, dosen.nama, dosen.nip')
            ->from('prodi') //urut berdasarkan id
            ->join('dosen', 'prodi.kaprodi=dosen.id_dosen', 'left')
            // ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            // ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            // ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            // ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->order_by('prodi.id_prodi', 'desc')
            // ->group_by('fat.no')
            // ->group_by('fat_brand.nama_brand')
            // ->group_by('mitra_pembangunan.nama')
            // ->group_by('cluster.nama_cluster')
            // ->group_by('fdt.id_fdt')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function get($id_prodi)
    {
        $query = $this->db->select('*')
            ->from('prodi') //urut berdasarkan id
            ->where('prodi.id_prodi', $id_prodi)
            ->order_by('prodi.id_prodi', 'desc')
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
    public function hapus($no)
    {
        $this->db->where('id_prodi', $no);
        $this->db->delete('prodi');
    }
}