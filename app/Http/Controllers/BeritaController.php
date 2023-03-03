<?php

namespace App\Http\Controllers;

use App\Models\tipe_berita;
use App\Models\User;
use Illuminate\Http\Request;

class BeritaController extends Controller
{

     function coba(){

        return view('berita/indexberita');

    }

    function tipe(){

      $data=tipe_berita::all();
      return view('indexberita/tipeberita',compact('data'));

    }  

    public function Add(){
       
      return view('indexberita/tipe-berita-add');

    }     

    public function create(Request $request){

      $validasi=$request->validate([
        'tipe' => 'required',
    ], [
        'tipe.required' => 'Tipe harus diisi.',
    ]);
      
          tipe_berita::create($validasi);

        return redirect('/tipe-berita')->with(['success', 'Data Berhasil Disimpan!']);
    }    

    public function edit($id){
       
      $edit=tipe_berita::findorfail($id);
    return view('indexberita/tipe-berita-edit', compact('edit'));
   }  

   public function update(Request $r,$id){
     $edit=tipe_berita::findorfail($id);
     $edit->update($r->all());
     return redirect('/tipe-berita')->with('success', 'Data berhasil update!');
    
   }

   public function destroy(Request $r){
   tipe_berita::destroy($r->id_delete);
     return redirect('/tipe-berita')->with('success', 'Data berhasil dihapus');

    }

    public function tampilkan($id){
      $edit=tipe_berita::findorfail($id);
    return view('berita/berita', compact('edit'));
    }      
}

