<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\level;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Index(){ 
   $data = User::all();
   return view('content/content',compact('data'));


    }

    public function Add(){
       
        return view('content/content-input');
    }
    public function create(Request $request)
    {
        //validate form
        $this->validate($request, [
          'username' => 'required',
          'email' => 'required',
          'password' => 'required',
          'nama' => 'required',
          'alamat' => 'required',
          'nomor' => 'required',
          'tanggal_lahir' => 'required',
          'tempatlahir' => 'required',
          'jenis_kelamin' => 'required',
          'level_id' => 'required',
        ]);


        //create post
        user::create([
          'username' => $request->username,
          'email' => $request->email,
          'password' => $request->password,
          'nama' => $request->nama,
          'alamat'=> $request->alamat,
          'nomor'=> $request->nomor,
          'tanggal_lahir'=> $request->tanggal_lahir,
          'tempatlahir'=> $request->tempatlahir,
          'jenis_kelamin'=> $request->jenis_kelamin,
          'level_id'=> $request->level_id,
        ]);

        //redirect to index
        return redirect()->route('content')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit($id){
       
        $edit=user::findorfail($id);
      return view('content/content-edit', compact('edit'));
    }
    public function update(Request $r,$id)
      {
        $edit=user::findorfail($id);
        $edit->update($r->all());
        return redirect('/content')->with('success', 'Data berhasil update!');
       
      }
    public function destroy(Request $r)
    {
      user::destroy($r->id_delete);
        return redirect('/content')->with('success', 'Data berhasil dihapus');
  
    }

}
