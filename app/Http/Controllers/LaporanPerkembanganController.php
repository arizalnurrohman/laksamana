<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\Agama;
use App\Models\Gedung;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Petugas;
use App\Models\Pengampu;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Pendidikan;
use App\Models\Residensial;
use Illuminate\Support\Str;
use App\Models\KategoriPPKS;
use App\Models\StatusUsulan;
use App\Models\Rehabilitasi;
use Illuminate\Http\Request;
use App\Models\SumberRujukan;
use App\Models\KategoriPPKSSub;
use App\Models\Perujuk;

class LaporanPerkembanganController extends Controller
{
    private $status_usulan;
    function __construct()
    {
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
        $this->status_usulan=['1ba4b694-db8b-11ef-9f06-244bfebc0c45'];
    }
    public function index()
    {
        return view('laporan_perkembangan.index');
    }

    public function load_laporan(){
        $sub_child = Residensial::select("laksa_tr_layanan.id as residensial_id","laksa_tr_layanan.*","laksa_ms_ppks.*","laksa_ms_sumber_rujukan.*","laksa_ms_pendamping_sosial.*","laksa_ms_pegawai.*","laksa_ms_status.*","laksa_ms_status.*","laksa_tr_status.*","laksa_tr_status.created_at as tgl_status");
        $sub_child = $sub_child->orderby("laksa_tr_layanan.created_at","DESC");
        $sub_child = $sub_child->leftJoin('laksa_ms_pendamping_sosial', 'laksa_tr_layanan.petugas_id', '=', 'laksa_ms_pendamping_sosial.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_pegawai', 'laksa_ms_pendamping_sosial.pegawai_id', '=', 'laksa_ms_pegawai.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_ppks', 'laksa_tr_layanan.pasien_id', '=', 'laksa_ms_ppks.id');
        $sub_child = $sub_child->leftJoin('laksa_tr_status', 'laksa_tr_layanan.id', '=', 'laksa_tr_status.layanan_id');
        $sub_child = $sub_child->leftJoin('laksa_ms_sumber_rujukan', 'laksa_tr_layanan.sumber_id', '=', 'laksa_ms_sumber_rujukan.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_status', 'laksa_tr_layanan.status_id', '=', 'laksa_ms_status.id');
        $sub_child = $sub_child->whereIn("laksa_tr_status.status_id",$this->status_usulan);
        $sub_child = $sub_child->get();
        $data = array();
        $no=0;
        
        foreach ($sub_child as $val) {
            $data[$no]['No']                =($no+1);
            $data[$no]['Nama PPKS']       =$val->nama_depan.' '.$val->nama_belakang.'<br><span class="badge rounded-pill bg-'.$val->style.'">'.$val->status.'</span>';
            $data[$no]['Tanggal']           =date("d-m-Y H:i:s",strtotime($val->tgl_status));
            $data[$no]['Aksi']              ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                                <button class="btn btn-sm btn-icon btn-info" Onclick="dokumen_ba(\''.$val->residensial_id.'\')" title="Lihat Dokumen Berita Acara">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                    </span>
                                                </button>
                                            </div>';
            $no++;
        }
        return \response()->json($data);
    }

    public function get_ba($id){
        $dokumen_ba = Residensial::findOrFail($id);
        // dd($dokumen_ba);
        $return['dokumen_ba']=asset('storage/' . $dokumen_ba->dokumen_ba);
        return $return;
    }
}
