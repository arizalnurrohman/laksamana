<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\KategoriPPKS;
use Illuminate\Http\Request;

class KategoriKKPSController extends Controller
{
    // function __construct()
    // {
    //     $fix_roles      =array();
    //     $this->page_attribut  =getPageAttribute();
        
    //     $the_roles      =isset($this->page_attribut[0]['permission']) ? $this->page_attribut[0]['permission']  : array();
    //     $the_url        =isset($this->page_attribut[0]['menuURL']) ? $this->page_attribut[0]['menuURL']  : "";
    //     foreach($the_roles as $vall){
    //         $fix_roles[]=$vall->name;
    //     }
    //     $this->middleware(['permission:'.implode("|",$fix_roles)], ['only' => ['index', 'store']]);
    //     $this->middleware(['permission:create '.$the_url], ['only' => ['create', 'store']]);
    //     $this->middleware(['permission:update '.$the_url], ['only' => ['edit', 'update']]);
    //     $this->middleware(['permission:delete '.$the_url], ['only' => ['destroy','hapusMenu']]);
    //     // dd($fix_roles);
    //     /* OLD
    //     $this->middleware(['permission:read menu|create menu|update menu|delete menu'], ['only' => ['index', 'store']]);
    //     $this->middleware(['permission:create menu'], ['only' => ['create', 'store']]);
    //     $this->middleware(['permission:update menu'], ['only' => ['edit', 'update']]);
    //     $this->middleware(['permission:delete menu'], ['only' => ['destroy']]);
    //     */

    //     $this->error    =array();
    //     $this->success  =false;
    // }
    public function index()
    {
        $kategori = KategoriPPKS::all();
        return view('kategori_ppks.index', compact('kategori'))->with('no', 1);
    }
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        $lastSort = KategoriPPKS::max('sort') ?? 0;

        KategoriPPKS::create([
            'id' => Str::uuid()->toString(),
            'kategori' => $request->kategori,
            'sort' => $lastSort + 1,
        ]);

        return response()->json(['message' => 'Data berhasil ditambahkan.']);
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:laksa_ms_kategori_ppks,id',
            'kategori' => 'required|string|max:255',
        ]);

        $kategori = KategoriPPKS::findOrFail($request->id);
        $kategori->update([
            'kategori' => $request->kategori,
        ]);

        return response()->json(['message' => 'Data berhasil diperbarui.']);
    }
}
