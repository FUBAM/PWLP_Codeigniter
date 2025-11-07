<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel; // Pastikan ini adalah namespace model Anda

class KaryawanController extends BaseController
{
    // 1. Buat properti untuk menampung model
    protected $karyawanModel;

    // 2. Instantiate model di constructor
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }

    // Menampilkan semua data
    public function index()
    {
        // 3. Ubah 'latest()' ke 'orderBy()'
        // 4. Kirim data dan pager ke view
        $data = [
            'karyawan' => $this->karyawanModel->orderBy('created_at', 'DESC')->paginate(5, 'grup_karyawan'),
            'pager'    => $this->karyawanModel->pager,
        ];

        // 5. Gunakan 'karyawan/index' (slash) bukan 'karyawan.index' (titik)
        return view('karyawan/index', $data);
    }

    // Menampilkan form tambah data
    public function create()
    {
        // 6. Kirim helper validasi ke view (untuk menampilkan error)
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('karyawan/create', $data);
    }

    // Menyimpan data baru
    public function store()
    {
        // 7. Aturan validasi CI4
        $rules = [
            'nama'      => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat'    => 'required',
            'no_hp'     => 'required',
        ];

        // 8. Cek validasi secara manual
        if (! $this->validate($rules)) {
            // 9. Kembalikan ke form jika gagal, bawa data input & error
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // 10. Ambil data dengan getPost() dan simpan
        // 'save()' CI4 = 'create()' Laravel (Mass Assignment)
        $this->karyawanModel->save([
            'nama'      => $this->request->getPost('nama'),
            'tmp_lahir' => $this->request->getPost('tmp_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'alamat'    => $this->request->getPost('alamat'),
            'no_hp'     => $this->request->getPost('no_hp'),
        ]);

        // 11. Redirect ke path (bukan nama route)
        return redirect()->to('/karyawan')->with('success', 'Karyawan Success Ditambahkan');
    }

    // Menampilkan detail data
    public function show($id)
    {
        $data = [
            'karyawan' => $this->karyawanModel->find($id),
        ];

        // Cek jika data tidak ada
        if (empty($data['karyawan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Karyawan tidak ditemukan.');
        }

        return view('karyawan/detail', $data);
    }

    // Menampilkan form edit data
    public function edit($id)
    {
        $data = [
            'karyawan'   => $this->karyawanModel->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('karyawan/edit', $data);
    }

    // Menyimpan data yang di-update
    public function update($id)
    {
        // 12. Validasi sama seperti store
        $rules = [
            'nama'      => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat'    => 'required',
            'no_hp'     => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // 13. 'save()' juga bisa untuk update jika ada 'id'
        $this->karyawanModel->save([
            'id'        => $id, // Penting: sertakan ID untuk update
            'nama'      => $this->request->getPost('nama'),
            'tmp_lahir' => $this->request->getPost('tmp_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'alamat'    => $this->request->getPost('alamat'),
            'no_hp'     => $this->request->getPost('no_hp'),
        ]);

        return redirect()->to('/karyawan')->with('success', 'Karyawan Success Diupdate');
    }

    // Menghapus data
    public function destroy($id)
    {
        // 14. 'delete()' CI4 lebih simpel
        $this->karyawanModel->delete($id);
        
        return redirect()->to('/karyawan')->with('success', 'Karyawan Berhasil Dihapus');
    }
}