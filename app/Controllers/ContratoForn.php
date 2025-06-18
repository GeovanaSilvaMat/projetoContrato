<?php

namespace App\Controllers;

use App\Models\ContratanteModel;

class ContratoForn extends BaseController
{
    /**
     * Exibe a página inicial para buscar o CNPJ do contratante.
     */
    public function index()
    {
        helper('form');
        return view('contratoMain'); // Tela de busca inicial
    }

    /**
     * Recebe o POST do formulário de busca, verifica o CNPJ e redireciona para a página de detalhes.
     */
    public function verificar()
    {
        $rules = ['cnpj' => 'required'];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'O campo CNPJ é obrigatório.');
        }

        $cnpj = $this->request->getPost('cnpj');
        $model = new ContratanteModel();
        $contratante = $model->findByCnpj($cnpj);

        if ($contratante) {
            // SUCESSO: Redireciona para a nova rota de detalhes
            return redirect()->to('/contrato/detalhes/' . $contratante['id']);
        } else {
            // ERRO: Volta para a tela de busca com uma mensagem
            return redirect()->back()->withInput()->with('error', 'CNPJ do Contratante não encontrado.');
        }
    }

    /**
     * Exibe a página de detalhes do contratante e seu representante.
     *
     * @param int $id O ID do contratante vindo da URL.
     */
    public function detalhes($id = null)
    {
        $contratanteModel = new ContratanteModel();

        // Busca os dados completos do contratante e seu representante usando o JOIN
        $data['contratante'] = $contratanteModel->getDadosCompletos($id);

        // Se o ID não corresponder a nenhum registro, exibe a página de erro 404
        if (empty($data['contratante'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Carrega a nova view de detalhes, passando os dados encontrados
        return view('contratoDetalhes', $data);
    }
}