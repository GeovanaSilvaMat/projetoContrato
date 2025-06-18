<?php namespace App\Models;

use CodeIgniter\Model;

class ContratoModel extends Model {
    protected $table  = 'contrato';
    protected $primaryKey = 'id';
    protected $allowedFields = ['titulo','data','faturamento_id','contratada_id'];//Define os campos da tabela no banco de dados.
    protected $returnType = 'object'; //Define como deve ser retornado quando feito uma busca.
}