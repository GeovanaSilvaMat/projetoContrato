<?php
namespace App\Libraries;

require_once(ROOTPATH . 'vendor/fpdf/fpdf.php');

use FPDF;

class PdfGenerator extends FPDF
{
    public function gerar($html) {
        $this->AddPage();
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 6, strip_tags($html));
        $this->Output('I', 'contrato.pdf');
    }
}
