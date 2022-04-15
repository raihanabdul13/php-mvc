<?php

class MataKuliah_model
{
    private $table = 'matakuliah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMataKuliah()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMataKuliahById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMataKuliah($data)
    {
        $query = "INSERT INTO matakuliah
                    VALUES
                  (null, :kode_mk, :nama_mk, :sks)";

        $this->db->query($query);
        $this->db->bind('kode_mk', $data['kode_mk']);
        $this->db->bind('nama_mk', $data['nama_mk']);
        $this->db->bind('sks', $data['sks']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMataKuliah($id)
    {
        $query = "DELETE FROM matakuliah WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMatakuliah($data)
    {
        $query = "UPDATE krs SET
                    kode_mk = :kode_mk,
                    nama_mk = :nama_mk,
                    sks = :sks
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('kode_mk', $data['kode_mk']);
        $this->db->bind('nama_mk', $data['nama_mk']);
        $this->db->bind('sks', $data['sks']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMataKuliah()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM matakuliah WHERE nama_mk LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
