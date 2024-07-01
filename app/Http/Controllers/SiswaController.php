<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
   public function index(Request $request)
    {
        $query = $request->input('query');
        $siswas = null;

        if ($query) {
            $siswas = Siswa::where('nama', 'LIKE', "%$query%")
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $siswas = Siswa::orderBy('created_at', 'desc')->get();
        }

        return view('datasiswa', compact('siswas'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'ttl' => 'required|string|max:255', // Adjusted to string
            'sekolah' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);
    
        Siswa::create($request->all());
    
        return redirect()->route('siswa.index')->with('success', 'Data Siswa Berhasil Ditambahkan.');
    }

    public function destroy($id): RedirectResponse
    {
        //get siswa by ID
        $siswa = Siswa::findOrFail($id);

        //delete siswa
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function update(Request $request, $id)
    {
        // dd('b');
        $request->validate([
        'nama' => 'required|string|max:255',
        'ttl' => 'required|string|max:255',
        'sekolah' => 'required|string|max:255',
        'keterangan' => 'required|string|max:255',
    ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data Siswa Berhasil Diperbarui.');
    }
}