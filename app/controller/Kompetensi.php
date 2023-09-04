<?php
class Kompetensi extends Controller
{
    public function index()
    {
        $data['judul'] = "kompetensi_keahlian";
        $data['kompetensi'] = $this->model("Kompetensi_model")->getAll();
        $this->view('templates/header', $data);
        $this->view('kompetensi/index', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        if ($this->model('Kompetensi_model')->tambahData($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/kompetensi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/kompetensi');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->model('Kompetensi_model')->hapusData($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/kompetensi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/kompetensi');
            exit;
        }
    }
    public function ubah($id)
    {
        if ($this->model('Kompetensi_model')->ubahData($id) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . '/kompetensi');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASE_URL . '/kompetensi');
            exit;
        }
    }
}