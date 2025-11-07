<?= $this->extend('karyawan/layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>Pemrograman Web Lanjut - 8 C</h2>
        </div>
        <div class="float-left my-2">
            <h2><span class="label label-default">Daftar Karyawan</span></h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="<?= site_url('karyawan/create') ?>"> Add New Record</a>
        </div>
    </div>
</div>

<?php if ($message = session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <p><?= esc($message) ?></p>
    </div>
<?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>Th-No</th>
        <th>Th-Name</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>No. HP</th>
        <th width="280px">Action</th>
    </tr>

    <?php $i = 1 + (5 * ($pager->getCurrentPage('grup_karyawan') - 1)); ?>
    
    <?php foreach ($karyawan as $user) : ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= esc($user->nama) ?></td>
            <td><?= esc($user->tmp_lahir) ?></td>
            <td><?= esc($user->tgl_lahir) ?></td>
            <td><?= esc($user->alamat) ?></td>
            <td><?= esc($user->no_hp) ?></td>
            <td>
                <form action="<?= site_url('karyawan/' . $user->id) ?>" method="POST" style="display:inline;">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    
                    <a class="btn btn-info" href="<?= site_url('karyawan/' . $user->id) ?>">Show</a>
                    <a class="btn btn-primary" href="<?= site_url('karyawan/edit/' . $user->id) ?>">Edit</a>
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>

<div class="text-center">
    <?php if ($pager) : ?>
        <?= $pager->links('grup_karyawan', 'bootstrap_pagination') ?>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>