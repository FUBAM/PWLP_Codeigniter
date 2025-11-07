<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\KaryawanModel;
use CodeIgniter\I18n\Time;

class AbsensiController extends BaseController
{
    protected $karyawanModel;
    protected $absensiModel;

    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
        $this->absensiModel = new AbsensiModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Halaman Absensi',
            'karyawan'  => $this->karyawanModel->findAll()
        ];

        return view('absensi/index', $data);
    }

    public function tandaiHadir()
    {
        $idKaryawan = $this->request->getPost('id_karyawan');
        $tanggalHariIni = Time::now()->toDateString();
        $sudahAbsen = $this->absensiModel
            ->where('id_karyawan', $idKaryawan)
            ->where('DATE(waktu_absensi)', $tanggalHariIni)
            ->first();

        if ($sudahAbsen) {
            return redirect()->back()->with('error', 'Karyawan ini sudah ditandai hadir hari ini.');
        }
        $dataAbsensi = [
            'id_karyawan'   => $idKaryawan,
            'waktu_absensi' => Time::now(),
            'status'        => 'hadir'
        ];

        $this->absensiModel->save($dataAbsensi);
        return redirect()->back()->with('success', 'Kehadiran berhasil dicatat.');
    }
}