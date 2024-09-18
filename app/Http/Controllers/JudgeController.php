<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use App\Models\Judge;
use Illuminate\Http\Request;

class JudgeController extends Controller
{
    public function index()
    {
        $judges = Judge::with('contest')->paginate(5); // Mengambil 5 peserta per halaman
        return view('judges.index', compact('judges'));
    }

    public function create()
    {
        $contests = Contest::all();
        return view('judges.create', compact('contests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lomba' => 'required|exists:contests,id',
            'nama_juri' => 'required',
            'alamat_juri' => 'required',
            'email_juri' => 'required|email',
            'no_hp' => 'required',
        ]);

        Judge::create($request->all());

        return redirect()->route('judges.index')
            ->with('success', 'Juri created successfully.');
    }

    public function edit(Judge $judge)
    {
        $contests = Contest::all();
        return view('judges.edit', compact('judge', 'contests'));
    }

    public function update(Request $request, Judge $judge)
    {
        $request->validate([
            'id_lomba' => 'required|exists:contests,id',
            'nama_juri' => 'required',
            'alamat_juri' => 'required',
            'email_juri' => 'required|email',
            'no_hp' => 'required',
        ]);

        $judge->update($request->all());

        return redirect()->route('judges.index')
            ->with('success', 'Juri updated successfully.');
    }

    public function destroy(string $id)
    {
        Judge::find($id)->delete();
        return redirect()->route('judges.index')
            ->with('success', 'Juri deleted successfully');
    }
}
