<?php namespace App\Models;

use CodeIgniter\Model;

class FaturamentoModel extends Model {
    protected $table  = 'faturamento';
    protected $primaryKey = 'id';
    protected $allowedFields = ['prazo','vencimento'];//Define os campos da tabela no banco de dados.
    protected $returnType = 'object'; //Define como deve ser retornado quando feito uma busca.
}