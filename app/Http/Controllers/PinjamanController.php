<?php

namespace App\Http\Controllers;

use App\Charts\SiswaKelasChart;
use Illuminate\Http\Request;
use App\Models\pinjaman;
use App\Models\buku;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kembalikan($id)
{
    $pinjaman = Pinjaman::find($id);

    if (!$pinjaman) {
        return redirect()->route('pinjaman.index')->with('error', 'Data pinjaman tidak ditemukan.');
    }

    // Mengembalikan entitas buku ke stok
    $buku = Buku::find($pinjaman->id_buku);
    $buku->stock += $pinjaman->entitas;
    $buku->save();

    // Menghapus data pinjaman dari database
    $pinjaman->delete();

    return redirect()->route('pinjaman.index')->with('success', 'Buku berhasil dikembalikan.');
}
    public function index(SiswaKelasChart $siswaKelasChart)
    { 
        $pinjaman = Pinjaman::all();

        // Export PDF if requested
        if (request()->has('export_pdf')) {
            $pdf = new Dompdf();
            $pdf->loadHtml(view('nama-file-view-pdf', compact('pesan')));
            $pdf->setPaper('A4', 'landscape');
            $pdf->render();
            return $pdf->stream('table_pemesan_buku_' . date('Y-m-d') . '.pdf');
        }

        // Otherwise, show the regular view
        return view('pinjaman.index')->with([
            'pinjaman' => $pinjaman,
            'data' => ['SiswaKelasChart' => $siswaKelasChart->build()]
        ]);
    }
    // PinjamanController.php




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pinjaman.create');
    }
    public function cart()
    {
        
        $userId = Auth::id();

        // Dapatkan data pinjaman berdasarkan ID user yang sedang login
        $pinjamanUser = Pinjaman::where('id_user', $userId)->get();
    
        // Dapatkan nama user yang sedang login
        $userName = Auth::user()->name;
    
        return view('cart', compact('pinjamanUser', 'userName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
    'namapeminjam'=>'required',
    'kelas' => 'required|in:10,11,12',
    'entitas'=>'required',
    'tglpinjam'=>'required',
    'tglkembali'=>'required',
    ]);

    $buku = Buku::find($request->id_buku);
         if (!$buku) {
             return redirect()->back()->with('error', 'Buku tidak tersedia.');
         }
 
         // validate stock
         if ($buku->stock < $request->entitas) {
             return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
         }
 
        
    $pinjaman = new Pinjaman;
    $pinjaman->namapeminjam = Auth::user()->name;
    $pinjaman->namapeminjam = $request->namapeminjam;
    $pinjaman->kelas = $request->kelas;
    $pinjaman->id_buku = $request->id_buku;
    $pinjaman->entitas = $request->entitas;
    $pinjaman->tglpinjam = $request->tglpinjam;
    $pinjaman->tglkembali = $request->tglkembali;
    $pinjaman->id_user = Auth::user()->id;
    $pinjaman->save();

    $buku->stock -= $request->entitas;
    $buku->save();

    return back()->with('success', 'Peminjaman Berhasil, Kembalikan Sesuai Waktunya!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pinjaman.edit')->with(['pinjaman' => Pinjaman::find($id), ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namapeminjam'=>'required',
            'kelas' => 'required|in:10,11,12',
            'entitas'=>'required',
            'tglpinjam'=>'required',
            'tglkembali'=>'required',
            ]);
        
            $pinjaman = Pinjaman::find($id);
            $pinjaman->namapeminjam = $request->namapeminjam;
            $pinjaman->kelas = $request->kelas;
            $pinjaman->id_buku = $request->id_buku;
            $pinjaman->entitas = $request->entitas;
            $pinjaman->tglpinjam = $request->tglpinjam;
            $pinjaman->tglkembali = $request->tglkembali;
            $pinjaman->save();
        
            return redirect()->route('pinjaman.index')->with('success', 'Data berhasil terkirim');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pinjaman = Pinjaman::find($id);
        $pinjaman->delete();

        return redirect()->route('pinjaman.index')->with('danger', 'Data Berhasil Dihapus');
    }
    public function detail(Request $request, $namabuku = null)
    {
        if ($namabuku) {
            $buku = Buku::where('namabuku', $namabuku)->first();
    
            // Check 
            if (!$buku) {
                return redirect()->route('pinjaman.index')->with('error', 'Buku not found.');
            }
    
            return view('detail', compact('namabuku', 'buku'));
        }
    
        // Handle 
        return redirect()->route('pinjaman.index')->with('error', 'Invalid request.');
    }
}
