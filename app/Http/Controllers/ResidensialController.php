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
use Illuminate\Http\Request;
use App\Models\SumberRujukan;
use App\Models\KategoriPPKSSub;

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
        $this->status_usulan=['b4a5adb3-db89-11ef-9f06-244bfebc0c45','a961e7f6-db89-11ef-9f06-244bfebc0c45','b995d70b-db89-11ef-9f06-244bfebc0c45','be10c279-db89-11ef-9f06-244bfebc0c45','7078dbc5-db8a-11ef-9f06-244bfebc0c45','7918fc82-db8a-11ef-9f06-244bfebc0c45','1ba4b694-db8b-11ef-9f06-244bfebc0c45','23ac51ea-db8b-11ef-9f06-244bfebc0c45','2ae4ad34-db8b-11ef-9f06-244bfebc0c45','3cdad447-db8b-11ef-9f06-244bfebc0c45','462ce22c-db8b-11ef-9f06-244bfebc0c45','56bd1150-db8b-11ef-9f06-244bfebc0c45','651a521f-db8b-11ef-9f06-244bfebc0c45'];
    }
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
        $kategori = KategoriPPKS::all();
        $gedung=Gedung::all();
        $pasien = Pasien::all();
        $pengampu=Pengampu::all();
        return view('residensial.create', compact('petugas','sumber_rujukan','agama','provinsi','kabupaten','kecamatan','pendidikan','kategori','pasien','gedung','pengampu'));
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
                'pengampu_id'           => $request->residense_pengampu,
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
        $sub_child = Residensial::select("laksa_tr_residensial.id as residensial_id","laksa_tr_residensial.*","laksa_ms_ppks.*","laksa_ms_sumber_rujukan.*","laksa_ms_petugas.*","laksa_ms_pegawai.*","laksa_ms_status.*");
        $sub_child = $sub_child->orderby("laksa_tr_residensial.created_at","DESC");
        $sub_child = $sub_child->leftJoin('laksa_ms_petugas', 'laksa_tr_residensial.petugas_id', '=', 'laksa_ms_petugas.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_pegawai', 'laksa_ms_petugas.pegawai_id', '=', 'laksa_ms_pegawai.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_ppks', 'laksa_tr_residensial.pasien_id', '=', 'laksa_ms_ppks.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_sumber_rujukan', 'laksa_tr_residensial.sumber_id', '=', 'laksa_ms_sumber_rujukan.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_status', 'laksa_tr_residensial.status_id', '=', 'laksa_ms_status.id');
        $sub_child = $sub_child->whereIn("status_id",$this->status_usulan);
        $sub_child = $sub_child->get();
        $data = array();
        $no=0;
        foreach ($sub_child as $val) {
            $data[$no]['No']                =($no+1);
            $data[$no]['Nama Pasien']       =$val->nama_depan.' '.$val->nama_belakang.'<br><span class="badge rounded-pill bg-warning">'.$val->status.'</span>';
            $data[$no]['Tgl Penerimaan']    =date("d-m-Y",strtotime($val->tgl_penerimaan));
            $data[$no]['Sumber']            =$val->sumber;
            $data[$no]['Petugas']           =$val->nama;
            $data[$no]['Aksi']              ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                                <button class="btn btn-sm btn-icon btn-info" Onclick="send_form(\''.$val->residensial_id.'\')">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M21.4274 2.5783C20.9274 2.0673 20.1874 1.8783 19.4974 2.0783L3.40742 6.7273C2.67942 6.9293 2.16342 7.5063 2.02442 8.2383C1.88242 8.9843 2.37842 9.9323 3.02642 10.3283L8.05742 13.4003C8.57342 13.7163 9.23942 13.6373 9.66642 13.2093L15.4274 7.4483C15.7174 7.1473 16.1974 7.1473 16.4874 7.4483C16.7774 7.7373 16.7774 8.2083 16.4874 8.5083L10.7164 14.2693C10.2884 14.6973 10.2084 15.3613 10.5234 15.8783L13.5974 20.9283C13.9574 21.5273 14.5774 21.8683 15.2574 21.8683C15.3374 21.8683 15.4274 21.8683 15.5074 21.8573C16.2874 21.7583 16.9074 21.2273 17.1374 20.4773L21.9074 4.5083C22.1174 3.8283 21.9274 3.0883 21.4274 2.5783Z" fill="currentColor"></path>
                                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M3.01049 16.8079C2.81849 16.8079 2.62649 16.7349 2.48049 16.5879C2.18749 16.2949 2.18749 15.8209 2.48049 15.5279L3.84549 14.1619C4.13849 13.8699 4.61349 13.8699 4.90649 14.1619C5.19849 14.4549 5.19849 14.9299 4.90649 15.2229L3.54049 16.5879C3.39449 16.7349 3.20249 16.8079 3.01049 16.8079ZM6.77169 18.0003C6.57969 18.0003 6.38769 17.9273 6.24169 17.7803C5.94869 17.4873 5.94869 17.0133 6.24169 16.7203L7.60669 15.3543C7.89969 15.0623 8.37469 15.0623 8.66769 15.3543C8.95969 15.6473 8.95969 16.1223 8.66769 16.4153L7.30169 17.7803C7.15569 17.9273 6.96369 18.0003 6.77169 18.0003ZM7.02539 21.5683C7.17139 21.7153 7.36339 21.7883 7.55539 21.7883C7.74739 21.7883 7.93939 21.7153 8.08539 21.5683L9.45139 20.2033C9.74339 19.9103 9.74339 19.4353 9.45139 19.1423C9.15839 18.8503 8.68339 18.8503 8.39039 19.1423L7.02539 20.5083C6.73239 20.8013 6.73239 21.2753 7.02539 21.5683Z" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </button>
                                                <a href="'.route("residensial.edit",$val->residensial_id).'">
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
                                                </button>
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

}
