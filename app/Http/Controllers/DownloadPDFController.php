<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

use App\Models\CheckList;
use App\Models\Actividade;
use App\Models\Maquina;
use App\Models\Funcionario;
use App\Models\Pergunta;
use App\Models\TipoActividade;
use App\Models\Resposta;

class DownloadPDFController extends Controller
{
    public function downloadPDF($id)
    {
        $actividades = Actividade::all();
        $maquinas = Maquina::all();
        $funcionarios = Funcionario::all();

        $checklist = CheckList :: find($id);
        $perguntas = Pergunta::all();


        $respostas = Resposta::where('checklist_id', $checklist->id)->get();
        $perguntas = $respostas->map(function ($resposta) {return $resposta->pergunta;});


        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);

        set_time_limit(1800);
        $html = view('PDF.checklist_pdf', compact('checklist', 'respostas', 'actividades', 'maquinas', 'funcionarios'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Defina o nome do arquivo de saída
        $filename = 'checklist.pdf';

        $dompdf->stream($filename);
    }
}
