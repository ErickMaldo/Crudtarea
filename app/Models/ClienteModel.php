<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        "nombres",
        "apellidos",
        "telefono",
        "email",
        "dui",
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules = [
        "nombres" => "required",
        "apellidos" => "required",
        "telefono" => "required",
        "email" => "required",
        "dui" => "required|regex_match[[0-9]{8}[-][0-9]{1}]",
    ];
    protected $validationMessages = [
        "nombres" => [
            "required" => "Nombres requeridos"
        ],
        "apellidos" => [
            "required" => "Apellidos requeridos"
        ],
        "telefono" => [
            "required" => "Telefono requerido"
        ],
        "email" => [
            "required" => "Email requerido"
        ],
        "dui" => [
            "required" => "DUI requerido",
            "regex_match" => "Dui: 00000000-0"
        ]
    ];
    protected $skipValidation = false;
}