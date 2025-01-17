<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\Petugas;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Models\SumberRujukan;

class ResidensialController extends Controller
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
        $residensial = [];
        return view('residensial.index', compact('residensial'));
    }
    public function create()
    {
        $petugas = Petugas::select("laksa_ms_pegawai.*","laksa_ms_petugas.*","laksa_ms_petugas.id as petugas_id")->leftjoin("laksa_ms_pegawai","laksa_ms_pegawai.id","=","laksa_ms_petugas.pegawai_id")->get();
        $sumber_rujukan=SumberRujukan::all();
        $agama = Agama::all();
        $provinsi = Provinsi::all();
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $pendidikan=Pendidikan::all();
        return view('residensial.create', compact('petugas','sumber_rujukan','agama','provinsi','kabupaten','kecamatan','pendidikan'));
    }
    public function store(Request $request)
    {
        dd($request->all());
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'description' => 'nullable|max:1000',
        // ]);

        // Item::create($request->all());

        // return redirect()->route('items.create')->with('success', 'Item berhasil ditambahkan!');
    }
}
