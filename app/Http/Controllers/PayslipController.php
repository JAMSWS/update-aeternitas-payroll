<?php

namespace App\Http\Controllers;

use App\Models\hrdepartment;
use Illuminate\Http\Request;
use App\Exports\PayslipExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class PayslipController extends Controller
{

    public function generatePDF($id)
    {
        $employee = hrdepartment::findOrFail($id);

        // Load the view and pass the employee data to it
        $pdf = Pdf::loadView('payslips.pdf', compact('employee'));

        // Download the PDF file
        return $pdf->download('payslip_' . $employee->custom_id . '.pdf');
    }
    public function show($id)
    {
        $employee = hrdepartment::findOrFail($id);
        return view('payslip.show', compact('employee'));
    }


    public function exportPdf($id)
    {
        $employee = hrdepartment::findOrFail($id);
        $pdf = Pdf::loadView('payslip.pdf', compact('employee'));
        return $pdf->download('payslip.pdf');
    }
}
