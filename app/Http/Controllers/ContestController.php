<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function index()
    {
        $contests = Contest::paginate(5); // Mengambil 5 lomba per halaman
        return view('contests.index', compact('contests'));
    }

    public function create()
    {
        return view('contests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lomba' => 'required',
            'tanggal_lomba' => 'required|date',
            'lokasi_lomba' => 'required',
        ]);

        $data = $request->except('_token');

        Contest::create($data);

        return redirect()->route('contests.index')
            ->with('success', 'Lomba created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contest = Contest::find($id);
        return view('contests.edit', compact('contest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lomba' => 'required',
            'tanggal_lomba' => 'required|date',
            'lokasi_lomba' => 'required',
        ]);

        $contest = Contest::find($id);
        $contest->update($request->except('_token'));

        return redirect()->route('contests.index')
            ->with('success', 'Lomba updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contest::find($id)->delete();
        return redirect()->route('contests.index')
            ->with('success', 'Lomba deleted successfully');
    }

}
