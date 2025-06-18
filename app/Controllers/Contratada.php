<?php

namespace App\Controllers;
use App\Models\ContratadaModel;
use App\Models\RepresentanteModel;

class Contratada extends BaseController
{
    private $contratada;
    private $representante;

    public function __construct(){
        $this->contratada= new ContratadaModel();
        $this->representante= new RepresentanteModel();
        helper('functions');
    }
    public function index(): string
    {
        $data['title'] = 'contratada';
        $data['contratada'] = $this->contratada->findALL();
        $data['contratada'] = $this->contratada->join('representante', 'representante_id = representante.id')->find();

        return view('contratoFornecimentoForm',$data);
    }

    public function new(): string
    {
        $data['title'] = 'contratada';
        $data['op'] = 'create';
        $data['form'] = 'cadastrar';
        $data['contratada'] = (object) [
            'cnpj'=> '',
            'razaosocial'=> '',
            'logradouro'=> '',
            'cidade'=> '',
            'estado'=> '',
            'email'=> '',
            'representante_id'=> '',            
            'id'=> ''
        ];
        return view('contratoFornecimentoForm',$data);
    }
    public function edit($id)
    {
        $data['representante'] = $this->representante->find(['representante_id' => (int) $id])[0];
        $data['contratada'] = $this->contratada->find(['id' => (int) $id])[0];
        $data['title'] = 'contratada';
        $data['form'] = 'Alterar';
        $data['op'] = 'update';
        return view('contratoFornecimentoForm',$data);
    }

    public function update()
    {
        $dataForm = [
            'id' => $_REQUEST['contratada.id'],
            'cnpj' => $_REQUEST['contratada.cnpj'],
            'razaosocial' => $_REQUEST['contratada.razaosocial'],
            'logradouro' => $_REQUEST['contratada.logradouro'],
            'cidade' => $_REQUEST['contratada.cidade'],
            'estado' => $_REQUEST['contratada.estado'],
            'email' => $_REQUEST['contratada.email'],
            'representante_id' => $_REQUEST['contratada.representante_id']
        ];

        $this->contratada->update($_REQUEST['contratada.id'], $dataForm);
        $data['msg'] = msg('Alterado com Sucesso!','success');
        $data['contratada'] = $this->contratada->join('representante', 'representante_id = representante.id')->find();
        $data['title'] = 'contratada';
        return view('contratoMain',$data);
    }

    public function search()
    {
        $data['contratada'] = $this->contratada->like('contratada.cnpj', $_REQUEST['pesquisar'])->find();
        $total = count($data['contratada']);
        $data['msg'] = msg("Dados Encontrados: {$total}",'success');
        $data['title'] = 'contratada';
        return view('contratoFornecimentoForm',$data);
    }

}