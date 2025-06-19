<?php namespace App\Models;

use CodeIgniter\Model;

class ContratanteModel extends Model {
    protected $table  = 'contratante';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cnpj','razaosocial','logradouro','cidade','estado','email','contrato_id','faturamento_id','representante_id'];//Define os campos da tabela no banco de dados.
    protected $returnType = 'object'; //Define como deve ser retornado quando feito uma busca.

    /**
     * Busca um cliente pelo seu CNPJ.
     *
     * @param string $cnpj O CNPJ do cliente a ser buscado.
     * @return array|object|null Retorna os dados do cliente ou null se não encontrar.
     */
    public function findByCnpj($cnpj): ?object
    {
        $sanitizedCnpj = preg_replace('/[^0-9]/', '', $cnpj);
        return $this->where('cnpj', $sanitizedCnpj)->first();
    }

    /**
     * Busca os dados completos do contratante e seu representante.
     * Esta é a query chave para preencher o formulário.
     */
    public function getDadosCompletos(int $id): ?object
    {
        // Usamos o Query Builder para criar um JOIN
        return $this->select('
                contratante.*,
                r.nome as representante_nome,
                r.logradouro as representante_logradouro,
                r.cidade as representante_cidade,
                r.estado as representante_estado,
                r.email as representante_email
            ')
            ->join('representante as r', 'r.id = contratante.representante_id', 'left') // LEFT JOIN para não falhar se não houver representante
            ->where('contratante.id', $id)
            ->first();
    }
}
