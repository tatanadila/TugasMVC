<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
            <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
                    Tambah Data Guru
                </button>


                <h3 class="mt-4">Data Guru</h3>
                <ul class="list-group">
                <?php foreach ($data['guru'] as $guru) : ?>
                        <li class="list-group-item list-group-item d-flex justify-content-between align-items-center">
                        <?= $guru['nama']; ?>
                        <div class="fload-end">
                                <a href="<?= BASE_URL; ?>/guru/detail/<?= $guru['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
                                <button type="button" onclick="ubah_data(this)" data-id='ubah_<?= $guru['id']; ?>' class="btn btn-success btn-sm">Ubah</button>
                                <a href="<?= BASE_URL; ?>/guru/hapus/<?= $guru['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </div>
                        </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Modal -->
 <div class="modal fade" id="formModal" tabindex="-1" role="dialog" arialabelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="<?= BASE_URL; ?>/guru/tambah" method="post">
        <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
        <option value="laki-laki">Laki - laki</option>
        <option value="perempuan">Perempuan</option>
        </select>
        </div>
        <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat">
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" datadismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
        </div>
    </div>
 </div>
 <?php foreach ($data['guru'] as $i) : ?>
    <div class="ubah" id="ubah_<?= $i['id']; ?>">
    <div class="content-ubah">
        <span class="close" style="float: right; font-size : 15;" onclick="cl_ubah(this)" data-id-cl="ubah_<?= $i['id']; ?>"> &times </span>
        <h4 class="mb-3">Ubah Data Guru</h4>
        <form action="<?= BASE_URL; ?>/guru/getubah" method="POST">
        <input type="hidden" name="id"  id="id" value="<?= $i['id']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $i['nama']; ?>">
        </div>
        <div class="mb-3">
            <label for ="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <?php
                    if($i['jenis_kelamin'] == 'Laki - Laki'){
                        echo '<option value ="Laki - Laki" selected>Laki - Laki</option><option value="Perempuan">Perempuan</option>';
                    } else if($i['jenis_kelamin'] == 'Perempuan'){
                        echo '<option values="Laki - Laki">Laki - Laki</option><option values="Perempuan" selected>Perempuan</option>';
                    } else {
                        echo '<option value="Laki - Laki">Laki - Laki</option><option value="Perempuan"</option>';
                    }
                ?>
            </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $i['alamat']; ?>">
            </div>
            <div class="mb-3">
                <button type="submit" class=" btn btn-primary btn-sm">Ubah Data</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="cl_ubah(this)" data-id-cl="ubah_<?= $i['id']; ?>">Close</button>
            </div>
        </form>
    </div>
</div>
<?php endforeach; ?>
</div>
<style>
    .close_ubah:hover,
    .close_ubah:focus {
        color: 8000;
        text-decoration: none;
        cursor: pointer;
    }
    .content-ubah{
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
        border-radius: 7px;
    }
    .ubah{
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }
    .close:hover,
    .close:focus{
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>

 <script>
    function ubah_data(obj) {
        document.getElementById(obj.getAttribute('data-id')).style.display = 'block'
    }
    function cl_ubah(obj) {
        document.getElementById(obj.getAttribute('data-id-cl')).style.display = 'none'
    }
</script>