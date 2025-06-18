<?php namespace App\Models;

use CodeIgniter\Model;

class RepresentanteContratoModel extends Model {
    protected $table  = 'representante_has_contrato';
    protected $primaryKey = ['representante_id','contrato_id'];//Define os campos da tabela no banco de dados.
    protected $returnType = 'object'; //Define como deve ser retornado quando feito uma busca.
}