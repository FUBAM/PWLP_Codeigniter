<?= $this->extend('karyawan/layout') ?> <?= $this->section('content') ?>

<div class="container mt-5">
    <h2>Halaman Absensi Karyawan</h2>
    <p>Klik "Hadir" untuk mencatat kehadiran hari ini.</p>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Karyawan</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($karyawan as $k) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= esc($k->nama_karyawan) ?></td>
                    <td><?= esc($k->email_karyawan) ?></td>
                    <td>
                        <form action="<?= site_url('absensi/hadir') ?>" method="POST">
                            <?= csrf_field() ?>
                            
                            <input type="hidden" name="id_karyawan" value="<?= $k->id_karyawan ?>">
                            
                            <button type="submit" class="btn btn-success btn-sm">
                                Tandai Hadir
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?= $this->endSection() ?>