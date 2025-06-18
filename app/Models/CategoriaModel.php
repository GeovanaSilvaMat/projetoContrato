<?php namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model {
    protected $table  = 'categoria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomecategoria'];
    protected $returnType = 'object'; //Define como deve ser retornado quando feito uma busca, pode ser array
}