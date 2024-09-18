<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::with('contest')->paginate(10); // Mengambil 5 peserta per halaman
        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        // Mengambil semua lomba untuk ditampilkan dalam dropdown
        $contests = Contest::all();
        return view('participants.create', compact('contests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lomba' => 'required|exists:contests,id',
            'nama_peserta' => 'required',
            'jurusan' => 'required',
            'email_peserta' => 'required|email',
            'no_hp' => 'required',
        ]);

        Participant::create($request->all());

        return redirect()->route('participants.index')
            ->with('success', 'Peserta created successfully.');
    }

    public function edit(Participant $participant)
    {
        $contests = Contest::all();
        return view('participants.edit', compact('participant', 'contests'));
    }

    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'id_lomba' => 'required|exists:contests,id',
            'nama_peserta' => 'required',
            'jurusan' => 'required',
            'email_peserta' => 'required|email',
            'no_hp' => 'required',
        ]);

        $participant->update($request->all());

        return redirect()->route('participants.index')
            ->with('success', 'Peserta updated successfully.');
    }

    public function destroy(string $id)
    {
        Participant::find($id)->delete();
        return redirect()->route('participants.index')
            ->with('success', 'Lomba deleted successfully');
    }
}
