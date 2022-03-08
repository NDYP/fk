<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dosen extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('dosen') //urut berdasarkan id
            // ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            // ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            // ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            // ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            // ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->order_by('dosen.id_dosen', 'desc')
            // ->group_by('fat.no')
            // ->group_by('fat_brand.nama_brand')
            // ->group_by('mitra_pembangunan.nama')
            // ->group_by('cluster.nama_cluster')
            // ->group_by('fdt.id_fdt')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_dosen)
    {
        $query = $this->db->select('')
            ->from('dosen') //urut berdasarkan id
            // ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            // ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            // ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            // ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            // ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->where('id_dosen', $id_dosen)
            ->order_by('dosen.id_dosen', 'desc')
            // ->group_by('fat.no')
            // ->group_by('fat_brand.nama_brand')
            // ->group_by('mitra_pembangunan.nama')
            // ->group_by('cluster.nama_cluster')
            // ->group_by('fdt.id_fdt')
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
        $this->db->where('id_dosen', $no);
        $this->db->delete('dosen');
    }
}