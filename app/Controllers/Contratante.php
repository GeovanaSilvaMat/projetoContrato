<?php

namespace App\Controllers;
use App\Models\ContratanteModel;
use App\Models\FaturamentoModel;
use App\Models\RepresentanteModel;

class Contratante extends BaseController
{
    private $contratante;
    private $representante;
    private $faturamento;

    public function __construct(){
        $this->contratante = new ContratanteModel();
        $this->representante = new RepresentanteModel();
        $this->faturamento = new FaturamentoModel();
        helper('functions');
    }

    public function index(): string
    {
        $data['title'] = 'contratante';
        $data['contratante'] = $this->contratante
            ->select('contratante.*, representante.nome AS representante_nome, representante.email AS representante_email, faturamento.prazo AS prazo_faturamento, faturamento.vencimento AS vencimento_faturamento')
            ->join('representante', 'representante.id = contratante.representante_id')
            ->join('faturamento', 'faturamento.id = contratante.faturamento_id')
            ->findAll();

        return view('contratoMain', $data);
    }

    public function new(): string
    {
        $data['title'] = 'contratante';
        $data['op'] = 'create';
        $data['form'] = 'cadastrar';
        $data['representante'] = $this->representante->findAll();
        $data['faturamento'] = $this->faturamento->findAll();
        $data['contratante'] = (object) [
            'cnpj'=> '',
            'razaosocial'=> '',
            'logradouro'=> '',
            'cidade'=> '',
            'estado'=> '',
            'email'=> '',
            'representante_id'=> '',
            'faturamento_id'=> '',
            'id'=> ''
        ];
        return view('contratoFornecimentoForm', $data);
    }

    public function edit($id)
    {
        $data['contratante'] = $this->contratante->getDadosCompletos((int) $id);
        $data['faturamento'] = $this->faturamento->findAll();
        $data['title'] = 'contratante';
        $data['form'] = 'Alterar';
        $data['op'] = 'update';

        return view('contratoFornecimentoForm', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $dataForm = [
            'cnpj' => $this->request->getPost('cnpj'),
            'razaosocial' => $this->request->getPost('razaosocial'),
            'logradouro' => $this->request->getPost('logradouro'),
            'cidade' => $this->request->getPost('cidade'),
            'estado' => $this->request->getPost('estado'),
            'email' => $this->request->getPost('email'),
            'faturamento_id' => $this->request->getPost('faturamento_id'),
            'representante_id' => $this->request->getPost('representante_id')
        ];

        $this->contratante->update($id, $dataForm);
        $data['msg'] = msg('Alterado com Sucesso!', 'success');

        $data['title'] = 'contratante';
        $data['contratante'] = $this->contratante
            ->select('contratante.*, representante.nome AS representante_nome, representante.email AS representante_email, faturamento.prazo AS prazo_faturamento, faturamento.vencimento AS vencimento_faturamento')
            ->join('representante', 'representante.id = contratante.representante_id')
            ->join('faturamento', 'faturamento.id = contratante.faturamento_id')
            ->findAll();

        return view('contratoMain', $data);
    }

    public function search()
    {
        $cnpj = $this->request->getPost('pesquisar');
        $contratante = $this->contratante->findByCnpj($cnpj);

        if (!$contratante) {
            return redirect()->to('contrato')->with('error', 'CNPJ não encontrado');
        }

        $data['contratante'] = $this->contratante->getDadosCompletos($contratante->id);
        $data['faturamento'] = $this->faturamento->findAll();
        $data['title'] = 'contratante';

        return view('contratoFornecimentoForm', $data);
    }
}
