<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function listbuku()
     {
         $buku = Buku::all();
         return view('listbuku', compact('buku'));
     }
     

    public function index()
    {
        return view('buku.index')->with([ 'buku' => Buku::all(), ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namabuku' => 'required',
            'penerbit' => 'required',
            'stock' => 'required',
            'gambar' => 'required|image|max:2040'
        ]);

        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() .'_'. $slug;
        $gambar->move('uploads/buku/', $new_gambar);


        //$eskul itu variable yg ku buat, bukan yg termasuk folder
    $buku = new Buku;
    $buku ->namabuku = $request->namabuku;
    $buku ->penerbit = $request->penerbit;
    $buku ->stock = $request->stock;
    $buku ->gambar = 'uploads/buku/'.$new_gambar;
    $buku->save();
    
    //sama kaya redirect/kaya header location kalo berhasil
    return redirect()->route('buku.index')->with('success', 'Data Berhasil Ditambah');
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
        return view('buku.edit')->with(['buku' => Buku::find($id), ]);
    }

    /**
     * Update the specified resource in storage.
     */
   /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $request->validate([
        'namabuku' => 'required',
        'penerbit' => 'required',
        'stock' => 'required',
        'gambar' => 'image|max:2040'
    ]);

    $buku = Buku::find($id);

    if (!$buku) {
        return redirect()->route('buku.index')->with('error', 'Data buku not found.');
    }

    // Handle the image upload if a new image is provided
    if ($request->hasFile('gambar')) {
        $gambar = $request->gambar;
        $slug = Str::slug($gambar->getClientOriginalName());
        $new_gambar = time() . '_' . $slug;
        $gambar->move('uploads/buku/', $new_gambar);
        File::delete($buku->gambar); // Delete the old image
        $buku->gambar = 'uploads/buku/' . $new_gambar;
    }

    // Update the book data
    $buku->namabuku = $request->namabuku;
    $buku->penerbit = $request->penerbit;
    $buku->stock = $request->stock;
    $buku->save();

    return redirect()->route('buku.index')->with('success', 'Data Berhasil Diupdate');
}


    /**
     * Remove the specified resource from storage.
     */
   /**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    $buku = Buku::find($id);

    if (!$buku) {
        return redirect()->route('buku.index')->with('error', 'Data buku not found.');
    }

    // Delete the book image from the storage
    File::delete($buku->gambar);

    // Delete the book record from the database
    $buku->delete();

    return redirect()->route('buku.index')->with('success', 'Data Berhasil Dihapus');
}


}
