<?= $this->extend('karyawan/layout') ?> <?= $this->section('content') ?> <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Karyawan
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nama:</b> <?= esc($karyawan->nama_karyawan) ?></li>
                    <li class="list-group-item"><b>Alamat:</b> <?= esc($karyawan->alamat_karyawan) ?></li>
                    <li class="list-group-item"><b>No. HP:</b> <?= esc($karyawan->telepon_karyawan) ?></li>
                    <li class="list-group-item"><b>Email:</b> <?= esc($karyawan->email_karyawan) ?></li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="<?= site_url('karyawan') ?>">Kembali</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?> ````