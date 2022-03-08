<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mahasiswa extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*,mahasiswa.nama, mahasiswa.nim, dosen.nama as nama_dosen, mahasiswa.foto, mahasiswa.email')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            // ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            // ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            // ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            // ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->order_by('mahasiswa.id_mahasiswa', 'desc')
            // ->group_by('fat.no')
            // ->group_by('fat_brand.nama_brand')
            // ->group_by('mitra_pembangunan.nama')
            // ->group_by('cluster.nama_cluster')
            // ->group_by('fdt.id_fdt')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($id_mahasiswa)
    {
        $query = $this->db->select('*, dosen.nama as nama_dosen, mahasiswa.foto, mahasiswa.prodi, prodi.program_studi')
            ->from('mahasiswa') //urut berdasarkan id
            ->join('dosen', 'mahasiswa.dosen_pa=dosen.id_dosen', 'left')
            ->join('prodi', 'mahasiswa.prodi=prodi.id_prodi', 'left')
            // ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            // ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            // ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            // ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->where('id_mahasiswa', $id_mahasiswa)
            ->order_by('mahasiswa.id_mahasiswa', 'desc')
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
        $this->db->where('id_mahasiswa', $no);
        $this->db->delete('mahasiswa');
    }
}