<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Agama;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Petugas;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Pendidikan;
use App\Models\Residensial;
use App\Models\KategoriPPKS;
use Illuminate\Http\Request;
use App\Models\SumberRujukan;
use App\Models\KategoriPPKSSub;
use Validator;
use Illuminate\Support\Str;

class ResidensialController extends Controller
{
    private $error;
    private $success;
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
        $kategori = KategoriPPKS::all();
        $pasien = Pasien::all();
        return view('residensial.create', compact('petugas','sumber_rujukan','agama','provinsi','kabupaten','kecamatan','pendidikan','kategori','pasien'));
    }
    public function store(Request $request)
    {
        dd($request->all());
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
            $payload = [
                'id'                    => Str::uuid()->toString(),
                'petugas_id'            => $request->residense_petugas,
                'tgl_penerimaan'        => $request->residense_tgl_penerimaan,
                'sumber_id'             => $request->residense_sumber_rujukan,
                'pasien_id'             => $request->pasien,
                'kategori_ppks_id'      => $request->kategori_ppks,
                'masa_layanan'          => $request->masa_layanan ?? null,
                'rencana_tgl_terminasi' => $request->rencana_tgl_terminasi ?? null,
                'pengampu_id'           => $request->pengampu_id ?? null,
                'status'                => $request->status ?? 'aktif',
                'up_dokumen_rujuk'      => $request->up_dokumen_rujuk ?? null,
            ];

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
        $sub_child = Residensial::select("laksa_ms_residensial.id as residensial_id")->orderby("created_at","DESC")->get();
        $data = array();
        $no=0;
        foreach ($sub_child as $val) {
            $data[$no]['No']                =($no+1);
            $data[$no]['Nama Pasien']       =$val->pasien_id;
            $data[$no]['Tgl Penerimaan']    =$val->tgl_penerimaan;
            $data[$no]['Sumber']            =$val->sumber_id;
            $data[$no]['Petugas']           =$val->petugas_id;
            $data[$no]['Aksi']              ='<div class="btn-group" role="group" aria-label="Group Aksi">
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
        $pasien = Pasien::where("laksa_ms_pasien.id","!=",null);
        $pasien = $pasien->leftJoin('laksa_ms_kabupaten_kota', 'laksa_ms_pasien.kota_id', '=', 'laksa_ms_kabupaten_kota.id')
                         ->leftJoin('laksa_ms_kecamatan', 'laksa_ms_pasien.kecamatan_id', '=', 'laksa_ms_kecamatan.id')
                         ->leftJoin('laksa_ms_provinsi', 'laksa_ms_pasien.provinsi_id', '=', 'laksa_ms_provinsi.id')
                         ->leftJoin('laksa_ms_pendidikan', 'laksa_ms_pasien.pendidikan_id', '=', 'laksa_ms_pendidikan.id')
                         ->leftJoin('laksa_ms_agama', 'laksa_ms_pasien.agama_id', '=', 'laksa_ms_agama.id');
        $pasien = $pasien->where("laksa_ms_pasien.id",$id)->first();

        $birthDate      = Carbon::parse($pasien->tgl_lahir);
        $currentDate    = Carbon::now();

        if ($pasien) {
            return response()->json([
                'nik'       => $pasien->nik,
                'nokk'      => $pasien->nokk,
                'tmp_lahir' => $pasien->tmp_lahir,
                'tgl_lahir' => $pasien->tgl_lahir,
                'usia'      => floor($birthDate->diffInYears($currentDate)),
                'provinsi'  => $pasien->provinsi,
                'kabupaten' => $pasien->kabupaten_kota,
                'kecamatan' => $pasien->kecamatan,
                'kelurahan' => $pasien->kelurahan_desa_id,
                'alamat'    => $pasien->alamat,
                'domisili'  => $pasien->domisili,
                'agama'     => $pasien->agama,
                'pendidikan'=> $pasien->pendidikan,
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

}
