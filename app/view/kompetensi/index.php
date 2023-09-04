<div class="container mt-4">
    <h2 class="text-danger text-center">Kompetensi Keahlian SMK Negeri 2 Trenggalek</h2>
    <p style="border-bottom: 1px solid green;" class="mt-4"></p>
    <?php Flasher::flash(); ?>
    <button type="button" class="btn btn-success btn-sm" onclick="add()">Tambah +</button>

    <!-- add -->
    <div class="add" id="add">
        <div class="content-add">
            <span class="close" onclick="cl()">&times;</span>
            <h4 class="mb-3">Tambah Kompetensi Keahlian</h4>
            <form action="<?= BASE_URL; ?>/kompetensi/tambah" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-sm">Tambah Data</button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="cl()">Close</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end add -->
    <!-- add -->
    <?php foreach ($data['kompetensi'] as $i) : ?>
        <div class="ubah" id="ubah_<?= $i['id']; ?>">
            <div class="content-ubah">
                <span class="close" onclick="clu(this)" data-clu="ubah_<?= $i['id']; ?>">&times;</span>
                <h4 class="mb-3">Tambah Kompetensi Keahlian</h4>
                <form action="<?= BASE_URL; ?>/kompetensi/ubah" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= $i['id']; ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $i['nama']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="3" class="form-control"><?= $i['keterangan']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Ubah Data</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="clu(this)" data-clu="ubah_<?= $i['id']; ?>">Close</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end add -->

    <div class="mt-3">
        <?php foreach ($data['kompetensi'] as $i) : ?>
            <div style="border-bottom: 1px solid green;" class="mt-2">
                <h4 class="text-danger"><?= $i['nama']; ?></h4>
                <p class="text-secondary"><?= $i['keterangan']; ?></p>
                <button onclick="ubah(this)" data-ub="ubah_<?= $i['id']; ?>" type="button" class="btn btn-success btn-sm mb-3" style="width: 70px;;">Ubah</button>
                <a href="<?= BASE_URL ?>/kompetensi/hapus/<?= $i['id']; ?>" class="btn btn-danger btn-sm mb-3" style="width: 70px;">Hapus</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div style="margin-bottom: 80px;"></div>
<script>
    function ubah(obj){
        document.getElementById(obj.getAttribute('data-ub')).style.display = 'block'
    }
    function clu(obj){
        document.getElementById(obj.getAttribute('data-clu')).style.display = 'none'
    }
    function cl(){
        document.getElementById('add').style.display = 'none'
    }
    function add(){
        document.getElementById('add').style.display = 'block'
    }
</script>
<style>
    .close-ubah:hover,
    .close-ubah:focus {
        color: #000;
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
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    .content-add{
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
        border-radius: 7px;
    }
    .add{
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
</style>