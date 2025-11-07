<?= $this->extend('karyawan/layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 28rem;">
            <div class="card-header">
                Edit Data Karyawan
            </div>
            <div class="card-body">

                <?php if ($validation->getErrors()) : ?>
                    <div class="alert alert-danger">
                        <strong>Duh!</strong> Ada kesalahan input brok.<br><br>
                        <ul>
                            <?php foreach ($validation->getErrors() as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= site_url('karyawan/' . $karyawan->id) ?>" id="myForm">

                    <?= csrf_field() ?>

                    <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" 
                            value="<?= old('nama', esc($karyawan->nama)) ?>">
                    </div>

                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <input type="text" name="tmp_lahir" class="form-control" id="tmp_lahir" 
                            value="<?= old('tmp_lahir', esc($karyawan->tmp_lahir)) ?>">
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" 
                            value="<?= old('tgl_lahir', esc($karyawan->tgl_lahir)) ?>">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" 
                            value="<?= old('alamat', esc($karyawan->alamat)) ?>">
                    </div>

                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" 
                            value="<?= old('no_hp', esc($karyawan->no_hp)) ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-secondary" href="<?= site_url('karyawan') ?>">Batal</a>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>