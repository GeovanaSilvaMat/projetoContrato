<?php namespace App\Models;

use CodeIgniter\Model;

class RepresentanteModel extends Model {
    protected $table  = 'representante';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome','nacionalidade','cpf', 'logradouro','cidade','estado','email'];//Define os campos da tabela no banco de dados.
    protected $returnType = 'object'; //Define como deve ser retornado quando feito uma busca.
}