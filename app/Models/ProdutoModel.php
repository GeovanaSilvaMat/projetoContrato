<?php namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model {
    protected $table  = 'produto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'valor', 'categoria_id'];
    protected $returnType = 'object'; //Define como deve ser retornado quando feito uma busca, pode ser array
    protected $validationRules = [
        'nome' => 'required|min_lenth[3]|alpha_numeric|is_unique[produto.nome]',//campo obrigatório, tamanho mínimo, alfanúmerico e válida se é único
        'valor' => 'requerid|numeric'
    ];
    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo nome é obrigatório',
            'min_lenght' => 'O ampo do produto deve possuir 3 caracteres',
            'is_unique' => 'Já existe produto com o nome informado'

        ],
        'valor' => [
            'required' => 'O campo valor é obrigatório'
        ]
        ]; 
}