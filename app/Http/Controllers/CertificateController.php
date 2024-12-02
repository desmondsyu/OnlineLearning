<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;
use Codedge\Fpdf\Fpdf\Fpdf;

class CertificateController extends FPDF
{
    protected $courseController;

    public function __construct(CourseController $courseController)
    {
        $this->courseController = $courseController;
    }

    public function exportPdf($courseId)
    {
        $courseName = $this->courseController->searchById($courseId)->title;
        $tutorName =  $this->courseController->searchById($courseId)->tutor->name;
        $studentName = Auth::user()->name;

        $pdf = new Fpdf('L', 'mm', 'A4');
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 24);
        $pdf->SetTextColor(0, 51, 102);

        $pdf->Cell(0, 20, 'Certificate of Completion', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 16);
        $pdf->SetTextColor(0, 0, 0);

        $pdf->MultiCell(
            0,
            10,
            "This is to certify that\n\n" .
                strtoupper($studentName) . "\n\n" .
                "has successfully completed the course\n\n" .
                strtoupper($courseName) . "\n\n" .
                "under the guidance of",
            0,
            'C'
        );

        $pdf->SetFont('Arial', 'U', 16);
        $pdf->Cell(0, 10, strtoupper($tutorName), 0, 1, 'C');

        $pdf->Ln(20);

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Authorized Signature', 0, 1, 'R');
        $pdf->Line(150, $pdf->GetY(), 250, $pdf->GetY());

        $pdf->Output('I', 'Certificate.pdf');
    }
}
