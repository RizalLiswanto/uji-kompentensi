<?php

namespace App\Http\Controllers;

use App\Models\level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    function index(){
        $data= level::all();
        return view('level/level',compact('data'));

    }
    public function Add(){
       
        return view('level/level-input');
    }
    public function create(Request $request)
    {
        //validate form
        $this->validate($request, [
          'level' => 'required',
         
        ]);


        //create post
        level::create([
          'level'=> $request->level,
        ]);

        //redirect to index
        return redirect('/level')->with(['success', 'Data Berhasil Disimpan!']);
    }
    public function edit($id){
       
        $edit=level::findorfail($id);
      return view('level/level-edit', compact('edit'));
    }
    public function update(Request $r,$id)
      {
        $edit=level::findorfail($id);
        $edit->update($r->all());
        return redirect('/level')->with('success', 'Data berhasil update!');
       
      }
    public function destroy(Request $r)
    {
      level::destroy($r->id_delete);
        return redirect('/level')->with('success', 'Data berhasil dihapus');
  
    }
}
