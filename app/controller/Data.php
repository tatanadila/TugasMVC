<?php

class Data extends Controller {
    public function guru() {
        $data['judul'] = "Home";
        $data['halaman'] = $this->model('Guru_model')->getGuru();
        $this->view('templates/header', $data);
        $this->view('data/guru', $data);
        $this->view('templates/footer');
    }

    public function siswa() {
        $data['judul'] = "Home";
        $data['halaman'] = $this->model('Siswa_model')->getSiswa();
        $this->view('templates/header', $data);
        $this->view('data/siswa', $data);
        $this->view('templates/footer');
    }
}