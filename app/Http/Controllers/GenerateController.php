<?php

namespace App\Http\Controllers;

use App\Models\marche;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;


class GenerateController extends Controller
{


    public function downloadPdf($id)
    {
        // Create a new instance of Dompdf
        $dompdf = new Dompdf();

        $marche=marche::find($id);
        // Render the view as HTML
        $html = View::make('reception_provisoire_impri', compact('marche'))->render();

        // Load the HTML content into Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set any additional configuration options for Dompdf
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Generate a unique filename for the PDF
        $filename = 'reception_provisoire_' . uniqid() . '.pdf';

        // Save the PDF file to a specific directory
        $dompdf->stream($filename, ['Attachment' => true]);

        // Return a response
        return response()->header('Content-Type', 'application/pdf');
    }




    public function goReceptionProvisoire($id)
    {
        $marche=marche::find($id);
        return view('reception_provisoire', compact('marche', ));
    }






}
