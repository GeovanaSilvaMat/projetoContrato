<?php

namespace App\Controllers;

use App\Models\FaturamentoModel;


class Faturamento extends BaseController
{
    private $faturamento;

    public function __construct(){
        $this->faturamento= new FaturamentoModel();
        helper('functions');
    }
    public function index(): string
    {
        $data['title'] = 'faturamento';
        $data['faturamento'] = $this->faturamento->findALL();

        return view('contratoFornecimentoForm',$data);
    }

    public function new(): string
    {
        $data['title'] = 'faturamento';
        $data['op'] = 'create';
        $data['form'] = 'cadastrar';
        $data['faturamento'] = (object) [
            'prazo'=> '',
            'vencimento'=> '',            
            'id'=> ''
        ];
        return view('contratoFornecimentoForm',$data);
    }
    public function edit($id)
    {
        $data['faturamento'] = $this->faturamento->find(['id' => (int) $id])[0];
        $data['title'] = 'faturamento';
        $data['form'] = 'Alterar';
        $data['op'] = 'update';
        return view('contratoFornecimentoForm',$data);
    }

    public function update()
    {
        $dataForm = [
            'id' => $_REQUEST['faturamento.id'],
            'prazo' => $_REQUEST['faturamento.prazo'],
            'vencimento' => $_REQUEST['faturamento.vencimento'],

        ];

        $this->faturamento->update($_REQUEST['faturamento.id'], $dataForm);
        $data['msg'] = msg('Alterado com Sucesso!','success');
        $data['faturamento'] = $this->faturamento->find();
        $data['title'] = 'faturamento';
        return view('contratoMain',$data);
    }

}