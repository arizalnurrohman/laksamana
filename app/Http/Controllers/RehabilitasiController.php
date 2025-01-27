<?php

namespace App\Http\Controllers;

use App\Models\Rehabilitasi;
use Illuminate\Http\Request;
use App\Models\RehabilitasiPerkembangan;

class RehabilitasiController extends Controller
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
        $rehabilitasi = Rehabilitasi::all();
        return view('rehabilitasi.index', compact('rehabilitasi'))->with('no', 1);
    }

    public function load_data()
    {
        $rehabilitasi = Rehabilitasi::orderby("laksa_tr_residensial.created_at","asc");
        $rehabilitasi = $rehabilitasi->select('laksa_tr_residensial.*', 'laksa_ms_ppks.*','laksa_tr_rehabilitasi.*','laksa_tr_rehabilitasi.id as rehabilitasi_id');
        $rehabilitasi = $rehabilitasi->leftJoin('laksa_tr_residensial', 'laksa_tr_rehabilitasi.residensial_id', '=', 'laksa_tr_residensial.id');
        $rehabilitasi = $rehabilitasi->leftJoin('laksa_ms_ppks', 'laksa_tr_residensial.pasien_id', '=', 'laksa_ms_ppks.id');
        $rehabilitasi = $rehabilitasi->get();
        $no=0;
        foreach ($rehabilitasi as $val) {
            $data[$no]['No']            =($no+1);
            $data[$no]['Nama PPKS']     =$val->nama_depan." ".$val->nama_belakang."<br>".date("d-m-Y",strtotime($val->tgl_penerimaan));
            $data[$no]['Rehabilitasi']  =RehabilitasiPerkembangan::where("rehabilitasi_id","=",$val->rehabilitasi_id)->count();

            $data[$no]['Aksi']          ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                            <button class="btn btn-sm btn-icon btn-warning" Onclick="update_form(\''.$val->id.'\')">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.334 2.75H7.665C4.644 2.75 2.75 4.889 2.75 7.916V16.084C2.75 19.111 4.634 21.25 7.665 21.25H16.333C19.364 21.25 21.25 19.111 21.25 16.084V7.916C21.25 4.889 19.364 2.75 16.334 2.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.9393 12.0129H15.9483" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M11.9301 12.0129H11.9391" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M7.92128 12.0129H7.93028" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                </span>
                                            </button>
                                            
                                        </div>';
            $no++;
        }
        return \response()->json($data);
    }
}
