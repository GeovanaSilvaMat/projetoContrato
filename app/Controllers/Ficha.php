<?php

namespace App\Controllers;

use App\Models\ContratanteModel;
use FPDF;

class Ficha extends BaseController
{
    public function gerar($id)
    {
        $model = new ContratanteModel();
        $dados = $model->getDadosCompletos((int) $id);

        if (!$dados) {
            return redirect()->to('contratante')->with('error', 'Dados do contratante não encontrados');
        }

        $pdf = new \FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode('Contrato de Fornecimento'), 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode('Razão Social: ' . $dados->razaosocial), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('CNPJ: ' . $dados->cnpj), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Email: ' . $dados->email), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Endereço: ' . $dados->logradouro . ', ' . $dados->cidade . ' - ' . $dados->estado), 0, 1);

        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, utf8_decode('Representante Legal'), 0, 1);

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode('Nome: ' . $dados->representante_nome), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Email: ' . $dados->representante_email), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Endereço: ' . $dados->representante_logradouro . ', ' . $dados->representante_cidade . ' - ' . $dados->representante_estado), 0, 1);

        $pdf->Output('I', 'contrato_' . $dados->cnpj . '.pdf');
        exit;
    }
}
