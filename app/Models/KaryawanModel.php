<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table            = 'karyawan';
    protected $primaryKey       = 'id_karyawan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = [
        'nama_karyawan',
        'alamat_karyawan',
        'telepon_karyawan',
        'email_karyawan'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules      = [
        'nama_karyawan'    => 'required|min_length[3]',
        'alamat_karyawan'  => 'required',
        'telepon_karyawan' => 'required',
        'email_karyawan'   => 'required|valid_email|is_unique[karyawan.email_karyawan,id_karyawan,{id_karyawan}]',
    ];
    protected $validationMessages   = [
        'email_karyawan' => [
            'is_unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain.'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}