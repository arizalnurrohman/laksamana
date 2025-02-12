<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\Agama;
use App\Models\Gedung;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Perujuk;
use App\Models\Petugas;
use App\Models\Pengampu;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\StatusLog;
use App\Models\Pendidikan;
use App\Models\Residensial;
use Illuminate\Support\Str;
use App\Models\KategoriPPKS;
use App\Models\Rehabilitasi;
use App\Models\StatusUsulan;
use Illuminate\Http\Request;
use App\Models\SumberRujukan;
use App\Models\KategoriPPKSSub;

use App\Models\LaporanTerminasi;
use Symfony\Component\Process\Process;
use PhpOffice\PhpWord\TemplateProcessor;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ResidensialController extends Controller
{
    private $error;
    private $success;
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
        $this->status_usulan=['1ba4b694-db8b-11ef-9f06-244bfebc0c45','23ac51ea-db8b-11ef-9f06-244bfebc0c45','2518e902-e601-11ef-bfa8-244bfebc0c45','2ae4ad34-db8b-11ef-9f06-244bfebc0c45','3cdad447-db8b-11ef-9f06-244bfebc0c45','462ce22c-db8b-11ef-9f06-244bfebc0c45','56bd1150-db8b-11ef-9f06-244bfebc0c45','651a521f-db8b-11ef-9f06-244bfebc0c45','7078dbc5-db8a-11ef-9f06-244bfebc0c45','7918fc82-db8a-11ef-9f06-244bfebc0c45','8da47964-e600-11ef-bfa8-244bfebc0c45','a961e7f6-db89-11ef-9f06-244bfebc0c45','b4a5adb3-db89-11ef-9f06-244bfebc0c45','b995d70b-db89-11ef-9f06-244bfebc0c45','be10c279-db89-11ef-9f06-244bfebc0c45','be583c52-e600-11ef-bfa8-244bfebc0c45','f164abdc-e600-11ef-bfa8-244bfebc0c45'];
    }
    public function index()
    {
        #$sub_child = $sub_child->leftJoin('laksa_ms_pegawai', 'laksa_ms_pendamping_sosial.pegawai_id', '=', 'laksa_ms_pegawai.id');
        $residensial = [];
        $petugas    =Petugas::leftjoin("laksa_ms_pegawai","laksa_ms_pegawai.nip","=","laksa_ms_pendamping_sosial.nip_nik")->get();
        return view('residensial.index', compact('residensial','petugas'));
    }
    public function create()
    {
        $petugas = Petugas::select("laksa_ms_pegawai.*","laksa_ms_pendamping_sosial.*","laksa_ms_pendamping_sosial.id as petugas_id")->leftjoin("laksa_ms_pegawai","laksa_ms_pegawai.nip","=","laksa_ms_pendamping_sosial.nip_nik")->get();
        $sumber_rujukan=SumberRujukan::all();
        $agama = Agama::all();
        $provinsi = Provinsi::all();
        $kabupaten = Kabupaten::all();
        $kecamatan = Kecamatan::all();
        $pendidikan=Pendidikan::all();
        $kategori = KategoriPPKS::all();
        $gedung=Gedung::all();
        $pasien = Pasien::all();
        $pengampu=Pengampu::all();
        $perujuk=Perujuk::all();

        return view('residensial.create', compact('petugas','sumber_rujukan','agama','provinsi','kabupaten','kecamatan','pendidikan','kategori','pasien','gedung','pengampu','perujuk'));
    }

    public function edit($id){
        $residensial=Residensial::where("id","=",$id)->first();
        $pasien = Pasien::where("id",$residensial->pasien_id)->first();
        return view('residensial.edit', compact('residensial','pasien'));   
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $validator = Validator::make($request->all(), $this->detail_rules()['RULE'], $this->detail_rules()['MESSAGE']);

        if ($validator->fails()) {
            $this->error[] = ($validator->errors()->all())[0];
        } else {
            // Cek apakah data dengan pasien_id yang sama sudah ada untuk tanggal penerimaan yang sama
            if (
                Residensial::where('pasien_id', $request->pasien)->whereDate('tgl_penerimaan', $request->residense_tgl_penerimaan)->exists()
            ) {
                $this->error[] = "Data dengan pasien dan tanggal penerimaan yang sama sudah ada.";
            }
        }

        if (!$this->error) {
            $dokRujukan = null;
            if ($request->hasFile('dokumen_rujukan')) {
                $dokRujukan = $request->file('dokumen_rujukan')->store('uploads/dokumen_rujukan', 'public');
            }
            // dd($dokRujukan);
            $payload = [
                'id'                    => Str::uuid()->toString(),
                'petugas_id'            => $request->residense_petugas,
                'perujuk_id'            => $request->perujuk_id,
                'tgl_penerimaan'        => $request->residense_tgl_penerimaan,
                'sumber_id'             => $request->residense_sumber_rujukan,
                'pasien_id'             => $request->pasien,
                'kategori_ppks_id'      => $request->kategori_ppks,
                'kategori_ppks_json'    => json_encode($request->detail_ppks),
                'masa_layanan'          => $request->masa_layanan ?? null,
                'rencana_tgl_terminasi' => $request->rencana_tgl_terminasi ?? null,
                'pengampu_id'           => $request->pengampu_id ?? null,
                'status_id'             => "b995d70b-db89-11ef-9f06-244bfebc0c45",
                'masa_layanan'          => $request->residense_masa_layanan,
                'rencana_tgl_terminasi' => $request->residense_rencana_terminasi,
                'gedung_id'             => $request->residense_gedung_asrama,
                // 'pengampu_id'           => '11',#;$request->residense_pengampu,
                'up_dokumen_rujukan'    => $dokRujukan,
                'jenis_layanan'         => "Residensial",
                
            ];

            foreach($request->detail_ppks as $key=>$dppks){
                $key            =(KategoriPPKSSub::select("variable_form")->where("id","=",$key)->first())->variable_form;
                
                if(is_array($dppks)){
                    foreach($dppks as $keyx=>$valx){
                        $payload[$key]   =$keyx;
                        $keyx            =(KategoriPPKSSub::select("variable_form")->where("id","=",$keyx)->first())->variable_form;
                        $payload[$keyx]  =$valx;
                    }
                    
                }else{
                    $payload[$key]  =$dppks;
                }

            }
            // dd($payload);

            // Simpan ke database
            if (Residensial::create($payload)) {
                $this->success = true;
            }
        }

        if ($this->success) {
            $response = [
                'status' => 'success',
                'message' => "Data residensial berhasil disimpan.",
            ];
        }

        if ($this->error) {
            $response = [
                'errors' => 'Error',
                'message' => $this->error,
            ];
        }

        return response()->json($response);
        exit;
    }

    public function detail_rules()
    {
        $rules = [
            'residense_petugas'          => 'required',
            'residense_tgl_penerimaan'  => 'required|date',
            'residense_sumber_rujukan'  => 'required',
            'pasien'                    => 'required|uuid',
            'kategori_ppks'             => 'nullable',
        ];

        $messages = [
            'residense_petugas.required'         => 'Kolom Petugas wajib diisi.',
            'residense_tgl_penerimaan.required' => 'Kolom Tanggal Penerimaan wajib diisi.',
            'residense_tgl_penerimaan.date'     => 'Kolom Tanggal Penerimaan harus berupa format tanggal yang valid.',
            'residense_sumber_rujukan.required' => 'Kolom Sumber Rujukan wajib diisi.',
            'pasien.required'                   => 'Kolom Pasien wajib diisi.',
            'pasien.uuid'                       => 'Kolom Pasien harus berupa UUID yang valid.',
        ];

        return array("RULE" => $rules, "MESSAGE" => $messages);
    }

    public function load_residensial(){
        $sub_child = Residensial::select("laksa_tr_layanan.id as residensial_id","laksa_tr_layanan.*","laksa_ms_ppks.*","laksa_ms_sumber_rujukan.*","laksa_ms_pendamping_sosial.*","laksa_ms_pegawai.*","laksa_ms_status.*");
        // $sub_child = $sub_child->orderby("laksa_tr_layanan.created_at","DESC");
        $sub_child = $sub_child->leftJoin('laksa_ms_pendamping_sosial', 'laksa_tr_layanan.petugas_id', '=', 'laksa_ms_pendamping_sosial.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_pegawai', 'laksa_ms_pendamping_sosial.pegawai_id', '=', 'laksa_ms_pegawai.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_ppks', 'laksa_tr_layanan.pasien_id', '=', 'laksa_ms_ppks.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_sumber_rujukan', 'laksa_tr_layanan.sumber_id', '=', 'laksa_ms_sumber_rujukan.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_status', 'laksa_tr_layanan.status_id', '=', 'laksa_ms_status.id');
        $sub_child = $sub_child->whereIn("status_id",$this->status_usulan);
        $sub_child = $sub_child->orderBy("laksa_ms_status.sort","ASC");
        $sub_child = $sub_child->get();
        $data = array();
        $no=0;
        
        foreach ($sub_child as $val) {
            if($val->dokumen_ba){
                $tombol_ba  ='<button class="btn btn-sm btn-icon btn-info" Onclick="dokumen_ba(\''.$val->residensial_id.'\')" title="Lihat Dokumen Berita Acara">
                                                    <span class="btn-inner">
                                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7379 2.76175H8.08493C6.00493 2.75375 4.29993 4.41175 4.25093 6.49075V17.2037C4.20493 19.3167 5.87993 21.0677 7.99293 21.1147C8.02393 21.1147 8.05393 21.1157 8.08493 21.1147H16.0739C18.1679 21.0297 19.8179 19.2997 19.8029 17.2037V8.03775L14.7379 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6231 8.23 17.0431 8.234H19.7981" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.2882 15.3584H8.88818" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.2432 11.606H8.88721" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                    </span>
                                                </button>';
            }else{
                $tombol_ba  ='';
            }

            if($val->status_id=="7918fc82-db8a-11ef-9f06-244bfebc0c45"){
                #Kepala Menyetujui Usulan Residensial
                $btn_generate='<button class="btn btn-sm btn-icon btn-primary" Onclick="generate_form(\''.$val->residensial_id.'\')">
                            <span class="btn-inner">
                                <svg fill="#00ffff" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 221 256" enable-background="new 0 0 221 256" xml:space="preserve" stroke="#00ffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                <g id="SVGRepo_iconCarrier"> <path d="M97.613,68.098l24.882-24.882l-5.686-5.641l-5.686-5.641l-19.105,19.06l-19.105,19.06l-9.28-9.28 c-5.095-5.095-9.462-9.28-9.644-9.28c-0.182,0-2.911,2.593-6.095,5.732l-5.777,5.777l14.966,14.966 c8.233,8.233,15.102,14.966,15.284,14.966C72.64,92.98,83.966,81.79,97.613,68.098L97.613,68.098z M207.166,103.194V128 c0,2.559-1.969,4.528-4.528,4.528s-4.528-1.969-4.528-4.528V91.972c0-1.575-0.197-2.953-0.984-4.331 c-1.378-3.347-4.528-5.906-8.072-6.694c-0.591-0.197-1.575-0.197-2.166-0.197v42.722c0,2.559-1.969,4.528-4.528,4.528 s-4.528-1.969-4.528-4.528V69.528c0-1.181-0.197-1.969-0.394-2.953c-0.197-1.181-0.984-2.166-1.575-3.347 c-0.984-1.181-1.772-2.166-3.15-3.15c-0.984-0.591-2.166-1.181-3.347-1.575c-0.591,0-1.575-0.197-2.756-0.197 c-0.591,0-1.575,0-2.166,0.197V2H2.416v189H126.25c4.134,11.419,13.191,20.475,24.806,24.806V254h67.528V114.416 C218.388,108.116,213.466,103.194,207.166,103.194z M150.859,152.806c-2.559,0-4.528-1.969-4.528-4.528v-40.556 c0-6.3-4.922-11.222-11.222-11.222c-6.984,0-11.222,5.212-11.222,11.294v15.875H33.916v9.056h89.972v13.584H33.916v9.056h89.972 v22.444c0,1.575,0.197,2.953,0.197,4.528H11.275V11.056h143.916v58.472v78.75h0.197 C155.388,150.838,153.419,152.806,150.859,152.806z"/> </g>
                                </svg>
                            </span>
                        </button>';
            }else{
                $btn_generate="";
            }

            if($val->status_id=="b995d70b-db89-11ef-9f06-244bfebc0c45"){
                #Input - Residensial
                $btn_send_approval_kepala='<button class="btn btn-sm btn-icon btn-info" Onclick="send_form(\''.$val->residensial_id.'\')">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M21.4274 2.5783C20.9274 2.0673 20.1874 1.8783 19.4974 2.0783L3.40742 6.7273C2.67942 6.9293 2.16342 7.5063 2.02442 8.2383C1.88242 8.9843 2.37842 9.9323 3.02642 10.3283L8.05742 13.4003C8.57342 13.7163 9.23942 13.6373 9.66642 13.2093L15.4274 7.4483C15.7174 7.1473 16.1974 7.1473 16.4874 7.4483C16.7774 7.7373 16.7774 8.2083 16.4874 8.5083L10.7164 14.2693C10.2884 14.6973 10.2084 15.3613 10.5234 15.8783L13.5974 20.9283C13.9574 21.5273 14.5774 21.8683 15.2574 21.8683C15.3374 21.8683 15.4274 21.8683 15.5074 21.8573C16.2874 21.7583 16.9074 21.2273 17.1374 20.4773L21.9074 4.5083C22.1174 3.8283 21.9274 3.0883 21.4274 2.5783Z" fill="currentColor"></path>
                                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M3.01049 16.8079C2.81849 16.8079 2.62649 16.7349 2.48049 16.5879C2.18749 16.2949 2.18749 15.8209 2.48049 15.5279L3.84549 14.1619C4.13849 13.8699 4.61349 13.8699 4.90649 14.1619C5.19849 14.4549 5.19849 14.9299 4.90649 15.2229L3.54049 16.5879C3.39449 16.7349 3.20249 16.8079 3.01049 16.8079ZM6.77169 18.0003C6.57969 18.0003 6.38769 17.9273 6.24169 17.7803C5.94869 17.4873 5.94869 17.0133 6.24169 16.7203L7.60669 15.3543C7.89969 15.0623 8.37469 15.0623 8.66769 15.3543C8.95969 15.6473 8.95969 16.1223 8.66769 16.4153L7.30169 17.7803C7.15569 17.9273 6.96369 18.0003 6.77169 18.0003ZM7.02539 21.5683C7.17139 21.7153 7.36339 21.7883 7.55539 21.7883C7.74739 21.7883 7.93939 21.7153 8.08539 21.5683L9.45139 20.2033C9.74339 19.9103 9.74339 19.4353 9.45139 19.1423C9.15839 18.8503 8.68339 18.8503 8.39039 19.1423L7.02539 20.5083C6.73239 20.8013 6.73239 21.2753 7.02539 21.5683Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </button>';
            }else{
                $btn_send_approval_kepala='';
            }

            #-- btn edit and ddelete---------------------
            if($val->status_id=="b995d70b-db89-11ef-9f06-244bfebc0c45"){
                $btn_edit_delete='<a href="'.route("residensial.edit",$val->residensial_id).'">
                                                    <button class="btn btn-sm btn-icon btn-warning">
                                                        <span class="btn-inner">
                                                            <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>
                                                        </span>
                                                    </button>
                                                </a>
                                                <button class="btn btn-sm btn-icon btn-danger" Onclick="delete_form(\''.$val->residensial_id.'\')">
                                                    <span class="btn-inner">
                                                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </button>';
            }else{
                $btn_edit_delete="";
            }

            #-- button kirim ke assessment --
            if($val->status_id=="1ba4b694-db8b-11ef-9f06-244bfebc0c45"){
                $btn_send_assessor='<button class="btn btn-sm btn-icon btn-warning" Onclick="send_accessor(\''.$val->residensial_id.'\')">
                                        <span class="btn-inner">
                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21.4274 2.5783C20.9274 2.0673 20.1874 1.8783 19.4974 2.0783L3.40742 6.7273C2.67942 6.9293 2.16342 7.5063 2.02442 8.2383C1.88242 8.9843 2.37842 9.9323 3.02642 10.3283L8.05742 13.4003C8.57342 13.7163 9.23942 13.6373 9.66642 13.2093L15.4274 7.4483C15.7174 7.1473 16.1974 7.1473 16.4874 7.4483C16.7774 7.7373 16.7774 8.2083 16.4874 8.5083L10.7164 14.2693C10.2884 14.6973 10.2084 15.3613 10.5234 15.8783L13.5974 20.9283C13.9574 21.5273 14.5774 21.8683 15.2574 21.8683C15.3374 21.8683 15.4274 21.8683 15.5074 21.8573C16.2874 21.7583 16.9074 21.2273 17.1374 20.4773L21.9074 4.5083C22.1174 3.8283 21.9274 3.0883 21.4274 2.5783Z" fill="currentColor"></path>
                                                <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M3.01049 16.8079C2.81849 16.8079 2.62649 16.7349 2.48049 16.5879C2.18749 16.2949 2.18749 15.8209 2.48049 15.5279L3.84549 14.1619C4.13849 13.8699 4.61349 13.8699 4.90649 14.1619C5.19849 14.4549 5.19849 14.9299 4.90649 15.2229L3.54049 16.5879C3.39449 16.7349 3.20249 16.8079 3.01049 16.8079ZM6.77169 18.0003C6.57969 18.0003 6.38769 17.9273 6.24169 17.7803C5.94869 17.4873 5.94869 17.0133 6.24169 16.7203L7.60669 15.3543C7.89969 15.0623 8.37469 15.0623 8.66769 15.3543C8.95969 15.6473 8.95969 16.1223 8.66769 16.4153L7.30169 17.7803C7.15569 17.9273 6.96369 18.0003 6.77169 18.0003ZM7.02539 21.5683C7.17139 21.7153 7.36339 21.7883 7.55539 21.7883C7.74739 21.7883 7.93939 21.7153 8.08539 21.5683L9.45139 20.2033C9.74339 19.9103 9.74339 19.4353 9.45139 19.1423C9.15839 18.8503 8.68339 18.8503 8.39039 19.1423L7.02539 20.5083C6.73239 20.8013 6.73239 21.2753 7.02539 21.5683Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>';
            }else{
                $btn_send_assessor='';
            }

            if($val->status_id=="3cdad447-db8b-11ef-9f06-244bfebc0c45"){
                $btn_tentukan_layanan='<button class="btn btn-sm btn-icon btn-success" Onclick="tentukan_layanan(\''.$val->residensial_id.'\')">
                                        <span class="btn-inner">
                                            <svg width="20px" height="20px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                            <g id="SVGRepo_iconCarrier"> <title>service-setting</title> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"/> <rect width="48" height="48" fill="none"/> <rect width="48" height="48" fill="none"/> </g> <g id="icons_Q2" data-name="icons Q2"> <g> <path d="M28.7,18.8l-1.8,2.9,1.4,1.4,2.9-1.8,1,.4L33,25h2l.8-3.3,1-.4,2.9,1.8,1.4-1.4-1.8-2.9a4.2,4.2,0,0,0,.4-1L43,17V15l-3.3-.8a4.2,4.2,0,0,0-.4-1l1.8-2.9L39.7,8.9l-2.9,1.8-1-.4L35,7H33l-.8,3.3-1,.4L28.3,8.9l-1.4,1.4,1.8,2.9a4.2,4.2,0,0,0-.4,1L25,15v2l3.3.8A4.2,4.2,0,0,0,28.7,18.8ZM34,14a2,2,0,1,1-2,2A2,2,0,0,1,34,14Z"/> <path d="M42.2,28.7a5.2,5.2,0,0,0-4-1.1l-9.9,1.8a4.5,4.5,0,0,0-1.4-3.3L19.8,19H5a2,2,0,0,0,0,4H18.2l5.9,5.9a.8.8,0,0,1-1.2,1.2l-3.5-3.5a2,2,0,0,0-2.8,2.8l3.5,3.5a4.5,4.5,0,0,0,3.4,1.4,5.7,5.7,0,0,0,1.8-.3h0l13.6-2.4a1,1,0,0,1,.8.2.9.9,0,0,1,.3.7,1,1,0,0,1-.8,1L20.6,36.9,9.7,28H5a2,2,0,0,0,0,4H8.3l11.1,9.1,20.5-3.7a5,5,0,0,0,2.3-8.7Z"/> </g> </g> </g> </g>
                                            </svg>
                                        </span>
                                    </button>';
            }else{
                $btn_tentukan_layanan="";
            }

            if($val->status_id=="f164abdc-e600-11ef-bfa8-244bfebc0c45"){
                $tombol_terminasi='<button class="btn btn-sm btn-icon btn-warning" Onclick="proses_terminasi(\''.$val->residensial_id.'\')">
                                        <span class="btn-inner">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M15.016 7.38948V6.45648C15.016 4.42148 13.366 2.77148 11.331 2.77148H6.45597C4.42197 2.77148 2.77197 4.42148 2.77197 6.45648V17.5865C2.77197 19.6215 4.42197 21.2715 6.45597 21.2715H11.341C13.37 21.2715 15.016 19.6265 15.016 17.5975V16.6545" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M21.8096 12.0215H9.76855" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M18.8813 9.1062L21.8093 12.0212L18.8813 14.9372" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                        </span>
                                    </button>';
            }else{
                $tombol_terminasi='';
            }



            $data[$no]['No']                =($no+1);
            $data[$no]['Nama PPKS']       =$val->nama_depan.' '.$val->nama_belakang.'<br><span class="badge rounded-pill bg-'.$val->style.'">'.$val->status.'</span>';
            $data[$no]['Tgl Penerimaan']    =date("d-m-Y",strtotime($val->tgl_penerimaan));
            $data[$no]['Sumber']            =$val->sumber;
            $data[$no]['Petugas']           =$val->nama_petugas;
            $data[$no]['Aksi']              ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                                '.$tombol_ba.'
                                                '.$btn_generate.'
                                                '.$btn_send_approval_kepala.'
                                                '.$btn_send_assessor.'
                                                '.$btn_tentukan_layanan.'
                                                '.$btn_edit_delete.'
                                                '.$tombol_terminasi.'
                                            </div>';
            $no++;
        }
        return \response()->json($data);
    }

    // public function getPasien(Request $request)
    // {
    //     $pasien = Pasien::findOrFail($request->id);
    //     return response()->json($pasien);
    // }
    public function residensial_get_pasien($id)
    {
        // Cari pasien berdasarkan ID
        $pasien = Pasien::where("laksa_ms_ppks.id", "!=", null);
        $pasien = $pasien->leftJoin('laksa_ms_kabupaten_kota', 'laksa_ms_ppks.kota_id', '=', 'laksa_ms_kabupaten_kota.id')
                        ->leftJoin('laksa_ms_kecamatan', 'laksa_ms_ppks.kecamatan_id', '=', 'laksa_ms_kecamatan.id')
                        ->leftJoin('laksa_ms_provinsi', 'laksa_ms_ppks.provinsi_id', '=', 'laksa_ms_provinsi.id')
                        ->leftJoin('laksa_ms_pendidikan', 'laksa_ms_ppks.pendidikan_id', '=', 'laksa_ms_pendidikan.id')
                        ->leftJoin('laksa_ms_agama', 'laksa_ms_ppks.agama_id', '=', 'laksa_ms_agama.id');
        $pasien = $pasien->where("laksa_ms_ppks.id", $id)->first();

        $birthDate   = Carbon::parse($pasien->tgl_lahir);
        $currentDate = Carbon::now();

        if ($pasien) {
            return response()->json([
                'nik'        => $pasien->nik,
                'nokk'       => $pasien->nokk,
                'tmp_lahir'  => $pasien->tmp_lahir,
                'tgl_lahir'  => $pasien->tgl_lahir,
                'usia'       => floor($birthDate->diffInYears($currentDate)),
                'provinsi'   => $pasien->provinsi,
                'kabupaten'  => $pasien->kabupaten_kota,
                'kecamatan'  => $pasien->kecamatan,
                'kelurahan'  => $pasien->kelurahan_desa_id,
                'alamat'     => $pasien->alamat,
                'domisili'   => $pasien->domisili,
                'agama'      => $pasien->agama,
                'pendidikan' => $pasien->pendidikan,
                'dokumen'    => [
                    'foto' => $pasien->up_foto ? asset('storage/' . $pasien->up_foto) : null,
                    'kk'   => $pasien->up_kk ? asset('storage/' . $pasien->up_kk) : null,
                    'akte' => $pasien->up_akte_lahir ? asset('storage/' . $pasien->up_akte_lahir) : null,
                ],
            ]);
        } else {
            return response()->json(null, 404); // Data pasien tidak ditemukan
        }
    }


    public function getSubKategori($id)
    {
        // Ambil data sub kategori berdasarkan ID kategori
        $subKategori = KategoriPPKSSub::where('kategori_id', $id)->where('parent_id',"=",null)->orderBy("sort","ASC")->get();
        foreach($subKategori as $sk){
            $sk->option=KategoriPPKSSub::where("parent_id","=",$sk->id)->orderBy("sort","ASC")->get();
        }
        if ($subKategori->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }

        return response()->json([
            'success' => true,
            'sub_kategori' => $subKategori
        ]);
    }

    public function getSubKategoriChild($id)
    {
        // Ambil data sub kategori berdasarkan ID kategori
        $subKategoriChild = KategoriPPKSSub::where("parent_id","=",$id)->orderBy("sort","ASC")->get();
        // $subKategoriChild = KategoriPPKSSub::where('kategori_id', $id)->where('parent_id',"=",null)->orderBy("sort","ASC")->get();
        foreach($subKategoriChild as $sk){
            $sk->option=KategoriPPKSSub::where("parent_id","=",$sk->id)->orderBy("sort","ASC")->get();
        }
        if ($subKategoriChild->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }

        return response()->json([
            'success' => true,
            'sub_kategori' => $subKategoriChild
        ]);
    }

    public function store_kirim_kekepala(Request $request, $id)
    {
        try {
            // Cari data residensial berdasarkan ID
            $residendsial = Residensial::find($id);

            // Jika data tidak ditemukan, kembalikan respons 404
            if (!$residendsial) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data residensial tidak ditemukan.',
                ], 404);
            }

            // Update status residensial
            $residendsial->status_id = "7078dbc5-db8a-11ef-9f06-244bfebc0c45"; // Menunggu Persetujuan Kepala
            $residendsial->save();

            return response()->json([
                'success' => true,
                'message' => 'Status residensial berhasil diperbarui.',
                'data' => $residendsial,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui status.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function store_kirim_accessor(Request $request, $id)
    {
        try {
            // Cari data residensial berdasarkan ID
            $residendsial = Residensial::find($id);

            // Jika data tidak ditemukan, kembalikan respons 404
            if (!$residendsial) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data residensial tidak ditemukan.',
                ], 404);
            }

            // Update status residensial
            $residendsial->status_id = "23ac51ea-db8b-11ef-9f06-244bfebc0c45"; // Menunggu Proses Assessment
            $residendsial->save();

            return response()->json([
                'success' => true,
                'message' => 'Status residensial berhasil diperbarui.',
                'data' => $residendsial,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui status.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    

    public function store_generate_ba(Request $request, $id)
    {
        try {
            // Cari data residensial berdasarkan ID
            $residendsial = Residensial::find($id);
            // dd($residendsial);
            // Jika data tidak ditemukan, kembalikan respons 404
            if (!$residendsial) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data residensial tidak ditemukan.',
                ], 404);
            }
            // Panggil function generate_ba
            $baGenerated = $this->generate_ba($id);

            // Jika generate_ba gagal, kembalikan respons gagal
            if (!$baGenerated) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal melakukan generate BA.',
                ], 500);
            }

            // Update status residensial
            $residendsial->status_id = "1ba4b694-db8b-11ef-9f06-244bfebc0c45";#"1ba4b694-db8b-11ef-9f06-244bfebc0c45"; // Dokumen Serah Terima Selesai di Generate
            $residendsial->dokumen_ba = "berita_acara/".$id.".pdf";
            $residendsial->save();

            $logs=new StatusLog();
            $logs->id               =Str::uuid()->toString();
            $logs->jenis_layanan    ="Residensial";
            $logs->layanan_id       =$id;
            $logs->status_id        ="1ba4b694-db8b-11ef-9f06-244bfebc0c45";
            $logs->user_id          ="1";
            $logs->save();

            return response()->json([
                'success' => true,
                'message' => 'Status residensial berhasil diperbarui.',
                'data' => $residendsial,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui status [Generate BA].',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Function generate_ba
    public function generate_ba($id)
    {
        if(Residensial::where('id', $id)->exists()){
            $residensial = Residensial::where('id', $id)->first();
            if($residensial->dokumen_ba_nomor){
                $no_ba       =$residensial->dokumen_ba_nomor_urut;
                $nomor_surat =$residensial->dokumen_ba_nomor;
            }else{
                $no_ba       =Residensial::where('dokumen_ba_tahun', '=', date("Y"))->max('dokumen_ba_nomor_urut') +1;
                $nomor_surat =$no_ba."/4.19/BS.00.01/1/".date("Y");
            }

            $residensial->dokumen_ba_nomor_urut = $no_ba;
            $residensial->dokumen_ba_tahun      = date("Y");
            $residensial->save();
        }
        // dd($nomor_surat);
        $generate_word=$this->generate_word_ba($id,$nomor_surat);
        if($generate_word){
            $generate_pdf =$this->generate_pdf_ba($id);
            // dd($generate_pdf);
            if($generate_pdf){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        #geenrate pdf
    }
    public function getResidensial($id){
        // dd($id);
        $sub_child = Residensial::select("laksa_tr_layanan.id as residensial_id","laksa_tr_layanan.*","laksa_ms_ppks.*","laksa_ms_sumber_rujukan.*","laksa_ms_pendamping_sosial.*","laksa_ms_pegawai.*","laksa_ms_status.*");
        $sub_child = $sub_child->leftJoin('laksa_ms_pendamping_sosial', 'laksa_tr_layanan.petugas_id', '=', 'laksa_ms_pendamping_sosial.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_pegawai', 'laksa_ms_pendamping_sosial.pegawai_id', '=', 'laksa_ms_pegawai.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_ppks', 'laksa_tr_layanan.pasien_id', '=', 'laksa_ms_ppks.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_sumber_rujukan', 'laksa_tr_layanan.sumber_id', '=', 'laksa_ms_sumber_rujukan.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_status', 'laksa_tr_layanan.status_id', '=', 'laksa_ms_status.id');
        $sub_child = $sub_child->where("laksa_tr_layanan.id","=",$id);
        $sub_child = $sub_child->first();

        $sub_child->foto_ppks=$sub_child->up_foto ? asset('storage/' . $sub_child->up_foto) : null;

        return $sub_child;
    }

    public function store_ManajerKasus(Request $request)
    {
        // dd($request->all());
        // Validasi request
        $validatedData = $request->validate([
            'residensial_id' => [
                'required',
                'exists:laksa_tr_layanan,id' // Memastikan residensial_id ada di tabel rehabilitasi
            ],
            'manajer_kasus' => [
                'required',
                // 'exists:laksa_ms_pendamping_sosial,id' // Memastikan petugas_id (manajer kasus) ada di tabel rehabilitasi
            ],
        ]);

        try {
            // Menyimpan data ke dalam tabel rehabilitasi menggunakan model
            $payloads = [
                'id'            => Str::uuid()->toString(),
                'residensial_id' => $validatedData['residensial_id'],
                'petugas_id' => $validatedData['manajer_kasus'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Menyimpan data rehabilitasi dan memperbarui status_id di tabel residensial
            $rehabilitasi = Rehabilitasi::create($payloads);

            // Jika data berhasil disimpan pada tabel rehabilitasi
            if ($rehabilitasi) {
                // Mengupdate field status_id pada tabel residensial
                $residensial = Residensial::find($validatedData['residensial_id']);
                if ($residensial) {
                    $residensial->status_id = '462ce22c-db8b-11ef-9f06-244bfebc0c45'; // Tahap Rehabilitasi
                    $residensial->save();
                }

                return response()->json([
                    'message' => 'Manajer Kasus berhasil ditambahkan.',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Terjadi kesalahan saat menyimpan data',
                ], 500);
            }

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function store_TerminasiLayanan(Request $request,$id){
        // try {
        //     // Cari data residensial berdasarkan ID
        //     $residendsial = Residensial::find($id);

        //     // Jika data tidak ditemukan, kembalikan respons 404
        //     if (!$residendsial) {
        //         return response()->json([
        //             'success' => false,
        //             'message' => 'Data residensial tidak ditemukan.',
        //         ], 404);
        //     }

        //     // Update status residensial
        //     $residendsial->status_id = "23ac51ea-db8b-11ef-9f06-244bfebc0c45"; // Menunggu Proses Assessment
        //     $residendsial->save();

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Status residensial berhasil diperbarui.',
        //         'data' => $residendsial,
        //     ], 200);

        // } catch (\Exception $e) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Terjadi kesalahan saat memperbarui status.',
        //         'error' => $e->getMessage(),
        //     ], 500);
        // }
        // dd($id);
        // dd($request->all());
        $validatedData = $request->validate([
            'id' => [
                'required',
                'exists:laksa_tr_layanan,id' // Memastikan residensial_id ada di tabel rehabilitasi
            ]
        ]);

        try {
            $nomor_surat         =$this->generate_nomor($id);
            // Menyimpan data rehabilitasi dan memperbarui status_id di tabel residensial
            $residensial        = Residensial::find($validatedData['id']);
            $generate_laporan   =$this->generete_terminasi($residensial->id,$nomor_surat['surat']);
            // dd($generate_laporan);
            if ($residensial && $generate_laporan) {
                $residensial->status_id = '2518e902-e601-11ef-bfa8-244bfebc0c45';'f164abdc-e600-11ef-bfa8-244bfebc0c45';#'2518e902-e601-11ef-bfa8-244bfebc0c45'; // Proses Layanan Selesai
                
                if(LaporanTerminasi::where('layanan_id', $id)->exists()){
                    #SAVE GEENERATE LAPORAN ------------------------
                    $laporanu = LaporanTerminasi::where('layanan_id', $id)->first();
                    $laporanu->tgl_terminasi    =date("Y-m-d H:i:s");
                    $laporanu->save();
                }else{
                    $laporan= new LaporanTerminasi();
                    $laporan->id                =Str::uuid()->toString();
                    $laporan->layanan_id        =$id;
                    $laporan->tgl_terminasi     =date("Y-m-d H:i:s");
                    $laporan->no_surat          =$nomor_surat['urut'];
                    $laporan->tahun             =date("Y");
                    $laporan->nomor_terminasi   =$nomor_surat['surat'];
                    $laporan->dokumen_terminasi ="terminasi/".$id.".pdf";
                    $laporan->save();
                }
                #END SAVE..-------------------------------------
                // Jika data berhasil disimpan pada tabel rehabilitasi
                if ($residensial->save()) {
                    // Mengupdate field status_id pada tabel residensial
                    

                    return response()->json([
                        'message' => 'Layanan berhasil diterminasi.',
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'Terjadi kesalahan saat menyimpan data',
                    ], 500);
                }
            }else {
                return response()->json([
                    'message' => 'Terjadi kesalahan saat generate data',
                ], 500);
            }
            

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function generate_nomor($id){ 
        if(LaporanTerminasi::where('layanan_id', $id)->exists()){
            $laporan = LaporanTerminasi::where('layanan_id', $id)->first();
            $no_terminasi   =$laporan->no_surat;
            $nomor_surat    =$laporan->nomor_terminasi;
        }else{
            $no_terminasi=LaporanTerminasi::where('tahun', '=', date("Y"))->max('no_surat') +1;
            $nomor_surat =$no_terminasi."/4.19/RH.00.00/11/".date("Y");
        }
        return ["urut"=>$no_terminasi,"surat"=>$nomor_surat];
    }

    public function generete_terminasi($id,$nomor_surat){
        // return true;
        $generate_word=$this->generate_word($id,$nomor_surat);
        if($generate_word){
            $generate_pdf =$this->generate_pdf($id);
            // dd($generate_pdf);
            if($generate_pdf){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function generate_word($id,$nomor_surat){
        Carbon::setLocale('id');
        #get data residensial
        $residensial=Residensial::where("id",$id)->first();
        $petugas    =Petugas::where("id",$residensial->petugas_id)->first();
        $pengampu   =Pengampu::where("id",$residensial->pengampu_id)->first();
        $ppks       =Pasien::where("id",$residensial->pasien_id)->first();

        $templatePath = public_path('storage/terminasi/template_terminasi.docx');
            
        // Cek apakah template ada
        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template tidak ditemukan!'], 404);
        }

        // Membuat TemplateProcessor dari template yang ada
        $templateProcessor = new TemplateProcessor($templatePath);

        // Data untuk menggantikan placeholder
        $data = [
            'no_surat'               =>$nomor_surat,
            'tgl_terminasi'          =>date("d"),
            'bln_terminasi'          =>Carbon::now()->translatedFormat('F'),
            'thn_terminasi'          =>date("Y"),

            'petugas_layanan_nama'   =>$petugas->nama_petugas,
            'petugas_layanan_nip'    =>$petugas->nip_nik,
            'petugas_layanan_jabatan'=>$petugas->pangkat_jabatan,
            'petugas_layanan_alamat' =>$petugas->alamat_kantor,

            'pengampu_nama'          =>$pengampu->nama_pengampu,
            'pengampu_nik'           =>$pengampu->nik,
            'pengampu_alamat'        =>$pengampu->alamat,
            'pengampu_nohp'          =>$pengampu->nohp,

            'ppks_nama'              =>$ppks->nama_depan." ".$ppks->nama_belakang,
            'ppks_ttl'               =>$ppks->tmp_lahir.", ".date("d",strtotime($ppks->tgl_lahir))." ".Carbon::parse($ppks->tgl_lahir)->translatedFormat('F')." ".date("Y"),
            'ppks_jk'                =>$this->getGenderFromNIK($ppks->nik),
            'ppks_nik'               =>$ppks->nik,
            'ppks_alamat'            =>$ppks->alamat,
        ];

        // Mengganti placeholder di template dengan data
        $templateProcessor->setValues($data);

        // Lokasi file output yang akan disimpan
        $outputPath = public_path('storage/terminasi/'.$id.'.docx');

        // Simpan file di folder yang sama dengan nama output.docx
        $templateProcessor->saveAs($outputPath);
        // Cek apakah file berhasil disimpan
        if (!file_exists($outputPath)) {
            return "gagal buat file word";
        }else{
            return true;
        }
    }

    public function generate_pdf($id){
        $libreOfficePath = '"C:\Program Files\LibreOffice\program\soffice.exe"';
        // Lokasi file Word
        $wordFilePath = public_path("storage\\terminasi\\" . $id . ".docx");
        // Lokasi folder output
        $outputDirectory = public_path('storage\terminasi');
        // Lokasi file PDF output
        $pdfFilePath = $outputDirectory . '\\'.$id.'.pdf';
        // Cek apakah file Word ada
        if (!file_exists($wordFilePath)) {
            return response()->json(['error' => 'File Word tidak ditemukan!'], 404);
        }

        // Pastikan folder output ada
        if (!is_dir($outputDirectory)) {
            mkdir($outputDirectory, 0777, true);
        }

        $command = "{$libreOfficePath} --headless --convert-to pdf --outdir \"{$outputDirectory}\" \"{$wordFilePath}\"";
        // dd($command);
        $process=exec($command);
        // Cek apakah proses berhasil
        if (!file_exists($pdfFilePath)) {
           return "gagal buat pdf";
        }else{
            return true;
        }
    }

    function getGenderFromNIK($nik) {
        if (strlen($nik) < 16) {
            return "NIK tidak valid";
        }
    
        // Ambil angka ke-7 dan ke-8
        $tanggalLahir = (int) substr($nik, 6, 2);
    
        // Perempuan jika tanggal lahir lebih dari 40
        if ($tanggalLahir > 40) {
            return "Perempuan";
        }
        return "Laki-laki";
    }

    public function generate_word_ba($id,$nomor_surat){
        Carbon::setLocale('id');
        
        #get data residensial
        $residensial=Residensial::where("id",$id)->first();
        $petugas    =Petugas::where("id",$residensial->petugas_id)->first();
        $ppks       =Pasien::where("id",$residensial->pasien_id)->first();
        $perujuk    =Perujuk::where("id",$residensial->perujuk_id)->first();
        $kategori   =KategoriPPKS::where("id",$residensial->kategori_ppks_id)->first();
        $pendidikan =Pendidikan::where("id",$ppks->pendidikan_id)->first();

        $templatePath = public_path('storage/berita_acara/template_ba.docx');
       
        // Cek apakah template ada
        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template tidak ditemukan!'], 404);
        }
        
        // Membuat TemplateProcessor dari template yang ada
        $templateProcessor = new TemplateProcessor($templatePath);
        
        // Data untuk menggantikan placeholder
        // Carbon::setLocale('id');
        // dd($nomor_surat);

        // dd($kategori);
        $data = [
            'surat_no'               =>$nomor_surat,
            'surat_hari'             =>Carbon::now()->isoFormat('dddd'),
            'surat_tanggal'          =>date("d"),
            'surat_bulan'            =>Carbon::parse(date("Y-m-d"))->translatedFormat('F'),
            'surat_tahun'            =>date("Y"),
            'surat_tanggal_surat'    =>Carbon::parse(date("Y-m-d"))->translatedFormat('d F Y'),

            'perujuk_nama'           =>$perujuk->nama_perujuk,
            'perujuk_nik'            =>$perujuk->nip_nrp,
            'perujuk_jabatan'        =>$perujuk->pangkat_jabatan,
            'perujuk_instansi'       =>$perujuk->instansi_perujuk,
            'perujuk_kantor'         =>$perujuk->alamat_kantor,
            'perujuk_telp_kantor'    =>$perujuk->telp_kantor,
            'perujuk_nohp'           =>$perujuk->no_hp,

            'petugas_nama'           =>$petugas->nama_petugas,
            'petugas_nik'            =>$petugas->nip_nik,
            'petugas_jabatan'        =>$petugas->pangkat_jabatan,
            'petugas_alamat_kantor'  =>$petugas->alamat_kantor,
            'petugas_telp_kantor'    =>$petugas->telp_kantor,

            'ppks_nama'              =>$ppks->nama_depan." ".$ppks->nama_belakang,
            'ppks_ttl'               =>$ppks->tmp_lahir.", ".date("d",strtotime($ppks->tgl_lahir))." Bulan ".date("Y"),
            // 'ppks_jk'                =>$this->getGenderFromNIK($ppks->nik),
            'ppks_nik'               =>$ppks->nik,
            'ppks_alamat'            =>$ppks->alamat,
            'ppks_kategori'          =>$kategori->kategori,
            'ppks_pendidikan'        =>$pendidikan->pendidikan,

            'layanan_mulai'          =>Carbon::parse($residensial->tgl_penerimaan)->translatedFormat('d F Y'),
            'layanan_selesai'        =>Carbon::parse($residensial->rencana_tgl_terminasi)->translatedFormat('d F Y'),
        ];
        // dd($data);
        
        
        // Mengganti placeholder di template dengan data
        $templateProcessor->setValues($data);
        
        // Lokasi file output yang akan disimpan
        $outputPath = public_path('storage/berita_acara/'.$id.'.docx');

        // Simpan file di folder yang sama dengan nama output.docx
        $templateProcessor->saveAs($outputPath);
        // Cek apakah file berhasil disimpan
        if (!file_exists($outputPath)) {
            return "gagal buat file word";
        }else{
            return true;
        }
    }

    public function generate_pdf_ba($id){
        $libreOfficePath = '"C:\Program Files\LibreOffice\program\soffice.exe"';
        // Lokasi file Word
        $wordFilePath = public_path("storage\\berita_acara\\" . $id . ".docx");
        // Lokasi folder output
        $outputDirectory = public_path('storage\berita_acara');
        // Lokasi file PDF output
        $pdfFilePath = $outputDirectory . '\\'.$id.'.pdf';
        // Cek apakah file Word ada
        if (!file_exists($wordFilePath)) {
            return response()->json(['error' => 'File Word tidak ditemukan!'], 404);
        }

        // Pastikan folder output ada
        if (!is_dir($outputDirectory)) {
            mkdir($outputDirectory, 0777, true);
        }

        $command = "{$libreOfficePath} --headless --convert-to pdf --outdir \"{$outputDirectory}\" \"{$wordFilePath}\"";
        // dd($command);
        $process=exec($command);
        // Cek apakah proses berhasil
        if (!file_exists($pdfFilePath)) {
           return "gagal buat pdf";
        }else{
            return true;
        }
    }

}
