<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\Image;
use App\Models\tipe_berita;
use App\Models\users;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CekBeritaController extends Controller
{
   


   


    //
    function index(){
        $data = berita::with('tipe_berita')->paginate(10);
        $timeAgoArray = [];

foreach ($data as $item) {
    $createdAt = Carbon::parse($item->created_at);
    $diffInDays = $createdAt->diffInDays();
    $diffInHours = $createdAt->diffInHours();
    $diffInMinutes = $createdAt->diffInMinutes();

    if ($diffInMinutes < 60) {
        $timeAgo = $diffInMinutes.' menit yang lalu';
    }
    elseif ($diffInHours < 24) {
        $timeAgo = $diffInHours.' jam yang lalu';
    }
    elseif ($diffInDays < 7) {
        $timeAgo = $diffInDays.' hari yang lalu';
    }
    else {
        $timeAgo = $createdAt->isoFormat('D MMMM Y');
    }

    $timeAgoArray[$item->id] = $timeAgo;
}
        return view('cekberita/cek-berita',compact('data','timeAgoArray'));
    }
    
    function index2(){ 

       
$beritas = berita::with('images')->where('status', 'posting')->latest('created_at')->get();
$timeAgoArray = [];

foreach ($beritas as $item) {
    $createdAt = Carbon::parse($item->created_at);
    $diffInDays = $createdAt->diffInDays();
    $diffInHours = $createdAt->diffInHours();
    $diffInMinutes = $createdAt->diffInMinutes();

    if ($diffInMinutes < 60) {
        $timeAgo = $diffInMinutes.' menit yang lalu';
    }
    elseif ($diffInHours < 24) {
        $timeAgo = $diffInHours.' jam yang lalu';
    }
    elseif ($diffInDays < 7) {
        $timeAgo = $diffInDays.' hari yang lalu';
    }
    else {
        $timeAgo = $createdAt->isoFormat('D MMMM Y');
    }

    $timeAgoArray[$item->id] = $timeAgo;
}

return view('berita/indexberita2', compact('beritas', 'timeAgoArray'));

       

    }
    
    function coba($id){
        $kate=berita::all();
        $up=berita::findorfail($id);
        $relatedNews = Berita::where('status', 'posting')->whereNotIn('id', [$id])->get();
        

        if ($up->status == 'posting') {
            return view('berita/indexberita',compact('up','kate','relatedNews'));
        }
       
       
    }
   
    

    function add(){

        $kate=tipe_berita::all();
       
         return view('berita/create-berita',compact('kate'));
        
    }
    public function create(Request $request){

        
        $berita = berita::create([
            'judul' => $request->judul,
            'user_id' => auth()->user()->id,
            'tipe_berita_id' => $request->tipeberita,
            'isi_berita' => $request->isi,
        ]);
     
   

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            
            $image->storeAs('public/news', $imageName);
            $imagee =[
                'berita_id' => $berita->id,
                'image' => $imageName,
                ];
                Image::create($imagee);
          
        
        }
        return redirect('/')->with('success', 'Berita sedang di tinjau');
    }    
 
   
public function updateHeadlineStatus(Request $request, $id)
{
    try {
        $berita = Berita::findOrFail($id);
        $status_headline = $request->input('status_headline');

        if ($status_headline == 2) {
            $berita->status_headline = 2;
        } else {
            $berita->status_headline = 1;
        }

        $berita->save();

        return response()->json(['message' => 'Status berita berhasil diubah.']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Terjadi kesalahan dalam mengubah status berita.', 'error' => $e->getMessage()], 500);
    }
}
public function update(Request $request, $id)
{
    $item = Berita::find($id);
    $item->status = $request->status;
    $item->save();
    
    if ($request->status === 'deleted') {
        return response()->json(['message' => 'Status berita berhasil diubah ,Jangan lupa Untuk isi komentar']);
    }

    return response()->json(['message' => 'Status berita berhasil diubah']);
       
    }
    public function deleted()
    {
        $message = session()->get('message');
        return view('deleted', compact('message'));
    }





    
public function komen(Request $request, $id)
{
    $item = Berita::find($id);
    $item->komentar= $request->komen;
    $item->save();
    
    return redirect('/cek-berita')->with('success', 'Komentar berhasil di isi');
}


    
   
}
