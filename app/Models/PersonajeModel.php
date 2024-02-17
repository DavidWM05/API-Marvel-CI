<?php namespace App\Models;

use CodeIgniter\Model;

class PersonajeModel extends Model
{
    protected $table            = 'personaje';
    protected $primarykey       = 'id';

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['nombre','miniatura'];

    protected $useTimestamps    = false;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $validationRules      = [
        'nombre' => 'required|min_length[1]|is_unique[personaje.nombre]'
    ];
    protected $validationMessages   = [
        'nombre' => [
            'is_unique' => 'El personaje ya existe en la base de datos'
        ]
    ];
    protected $skipValidation       = false;
}