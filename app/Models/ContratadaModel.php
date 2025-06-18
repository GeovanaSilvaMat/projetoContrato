<?php namespace App\Models;

use CodeIgniter\Model;

class ContratadaModel extends Model {
    protected $table  = 'contratada';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cnpj','razaosocial','logradouro','cidade','estado','email','representante_id'];//Define os campos da tabela no banco de dados.
    protected $returnType = 'object'; //Define como deve ser retornado quando feito uma busca.
}