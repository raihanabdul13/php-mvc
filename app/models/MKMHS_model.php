<?php

class MKMHS_model
{
    private $table = 'krs';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMKMHS()
    {
        $this->db->query('SELECT k.*, m.id as mhs, m.nama, m.nrp,m.jurusan,mk.id as mk, mk.kode_mk, mk.nama_mk, mk.sks FROM krs as k JOIN mahasiswa as m ON k.id_mhs = m.id JOIN matakuliah as mk ON k.id_mk = mk.id');
        return $this->db->resultSet();
    }

    public function getMKMHSById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMKMHS($data)
    {
        $query = "INSERT INTO krs
                    VALUES
                  (null, :id_mhs, :id_mk, :nilai)";

        $this->db->query($query);
        $this->db->bind('id_mhs', $data['id_mhs']);
        $this->db->bind('id_mk', $data['id_mk']);
        $this->db->bind('nilai', $data['nilai']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMKMHS($id)
    {
        $query = "DELETE FROM krs WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMKMHS($data)
    {
        $query = "UPDATE krs SET
                    id_mhs = :id_mhs,
                    id_mk = :id_mk,
                    nilai = :nilai
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id_mhs', $data['id_mhs']);
        $this->db->bind('id_mk', $data['id_mk']);
        $this->db->bind('nilai', $data['nilai']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMKMHS()
    {
        $keyword = $_POST['keyword'];
        $query = 
                "SELECT k.*, m.id as mhs, m.nama, m.nrp,m.jurusan,mk.id as mk, mk.kode_mk, mk.nama_mk, mk.sks 
                FROM krs as k JOIN mahasiswa as m ON k.id_mhs = m.id JOIN matakuliah as mk ON k.id_mk = mk.id 
                WHERE mk.nama_mk LIKE :keyword OR 
                    m.nrp LIKE :keyword OR
                    m.nama LIKE :keyword OR
                    mk.kode_MK LIKE :keyword OR
                    k.nilai LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
