<?php 

class MKMHS extends Controller {
    public function index()
    {
        $data['judul'] = 'Mata Kuliah Mahasiswa';
        $data['mkmhs'] = $this->model('MKMHS_model')->getAllMKMHS();
        $data['matakuliah'] = $this->model('MataKuliah_model')->getAllMataKuliah();
        $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mkmhs/index', $data);
        $this->view('templates/footer');
    }
    public function tambah(){
        if( $this->model('MKMHS_model')->tambahDataMKMHS($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mkmhs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mkmhs');
            exit;
        }
    }
    public function hapus($id)
    {
        if( $this->model('MKMHS_model')->hapusDataMKMHS($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mkmhs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mkmhs');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('MKMHS_model')->getMKMHSById($_POST['id']));
    }

    public function ubah()
    {
        if( $this->model('MKMHS_model')->ubahDataMKMHS($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mkmhs');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/mkmhs');
            exit;
        } 
    }
    public function cari()
    {
        $data['judul'] = 'Daftar Mata Kuliah Mahasiswa';
        $data['mkmhs'] = $this->model('MKMHS_model')->cariDataMKMHS();
        $this->view('templates/header', $data);
        $this->view('mkmhs/index', $data);
        $this->view('templates/footer');
    }

}