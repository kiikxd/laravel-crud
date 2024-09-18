<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Participant;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function printContests()
    {
        $contests = Contest::all();
        $pdf = Pdf::loadView('pdf.contests', ['contests' => $contests]);
        return $pdf->stream('daftar_lomba.pdf');
        // Jika ingin menampilkan di browser, gunakan ini
        // return $pdf->stream('daftar_lomba.pdf');
    }

    public function printParticipants()
    {
        $participants = Participant::with('contest')->get(); // Mengambil data peserta dengan kontes terkait
        $pdf = Pdf::loadView('pdf.participants', ['participants' => $participants]);
        return $pdf->stream('daftar_peserta.pdf'); // Menampilkan PDF di browser
    }
}
