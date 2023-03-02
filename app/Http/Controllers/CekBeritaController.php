<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\Image;
use App\Models\komen;
use App\Models\tipe_berita;
use App\Models\users;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CekBeritaController extends Controller
{
public function index(){
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
    
public function index2(){    
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
    
public function coba($id){
    $kate=berita::all();
    $up=berita::with('User','Komen')->findorfail($id);
    $relatedNews = Berita::where('status', 'posting')->whereNotIn('id', [$id])->get();
    $comments = komen::where('berita_id', $id)
    ->where('parent_id', null)
    ->orderBy('created_at', 'desc')
    ->get();

        if ($up->status == 'posting') {
            return view('berita/indexberita',compact('up','kate','relatedNews','comments'));
        }   
}
   
    

public function add(){

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

    //komentar pada cek berita
public function komen(Request $request, $id)
{
    $item = Berita::find($id);
    $item->komentar= $request->komen;
    $item->save();
    
    return redirect('/cek-berita')->with('success', 'Komentar berhasil di isi');
}

//komen di index berita

public function createKomen(Request $request,$parentId = null)
{

    $komen = new Komen;
    if(auth()->check()){
        $komen->user_id = auth()->user()->id;
    } else {
        $komen->user_id = null;
    }
    $komen->comment = $request->comment;
    $komen->name = $request->name;
    $komen->berita_id = $request->berita_id;
    $komen->parent_id = $parentId;
    $komen->save();

    
    
    return back();
}

public function balaskomen(Request $request)
{
    $request->validate([
        'name' => 'required',
        'comment' => 'required',
        'parent_id' => 'required',
    ]);

    $reply = new komen;
    if(auth()->check()){
        $reply->user_id = auth()->user()->id;
    } else {
        $reply->user_id = null;
    }
    $reply->name = $request->name;
    $reply->comment = $request->comment;
    $reply->berita_id = $request->berita_id;
    $reply->parent_id = $request->parent_id;
    $reply->save();

    return back()->with('success', 'Reply posted successfully!');
}





    
   
}
