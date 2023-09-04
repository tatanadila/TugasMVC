<?php
class Kompetensi_model
{
    private $table = 'kompetensi_keahlian';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function tambahData($data)
    {
        $counterId = isset($_POST['country']) ? $_POST['country'] : 0;
        $qy = "INSERT INTO kompetensi_keahlian VALUES (" . $counterId . " , :nama, :keterangan)";
        $this->db->query($qy);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getAll()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultAll();
    }
    public function hapusData($id) {
        $qy = "DELETE FROM kompetensi_keahlian WHERE id = :id";
        $this->db->query($qy);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function ubahData($id) {
        $qy = "UPDATE kompetensi_keahlian SET
        nama = :nama,
        keterangan = :keterangan WHERE id = :id";
        $this->db->query($qy);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}