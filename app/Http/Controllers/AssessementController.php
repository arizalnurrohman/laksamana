<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\Agama;
use App\Models\Gedung;
use App\Models\Pasien;
use App\Models\Bantuan;
use App\Models\Pegawai;
use App\Models\Petugas;
use App\Models\Pengampu;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Assessment;
use App\Models\Pendidikan;
use App\Models\Residensial;
use Illuminate\Support\Str;
use App\Models\KategoriPPKS;
use App\Models\Rehabilitasi;
use App\Models\StatusUsulan;
use Illuminate\Http\Request;
use App\Models\SumberRujukan;
use App\Models\FormAssessment;
use App\Models\KategoriPPKSSub;
use App\Models\FormAssessmentSub;
use App\Models\KomponenIntervensi;
use App\Models\FormAssessmentFormValue;

class AssessementController extends Controller
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
        $this->status_usulan=["23ac51ea-db8b-11ef-9f06-244bfebc0c45",'2ae4ad34-db8b-11ef-9f06-244bfebc0c45','56bd1150-db8b-11ef-9f06-244bfebc0c45'];
    }
    public function index()
    {
        $assessement = [];
        return view('assessement.index', compact('assessement'));
    }

    public function get_assessement($id){
        $residensial = Residensial::findOrFail($id);
        $pendidikan  = Pendidikan::all();
        $bantuan     = Bantuan::orderBy("sort","ASC")->get();
        $agama       = Agama::all();
        $pasien      = Pasien::where("laksa_ms_ppks.id","=",$residensial->pasien_id);
        $komponen_intervensi=KomponenIntervensi::orderBy("sort","ASC")->get();
        $pasien      = $pasien->leftJoin('laksa_ms_kabupaten_kota', 'laksa_ms_ppks.kota_id', '=', 'laksa_ms_kabupaten_kota.id')
                        ->leftJoin('laksa_ms_kecamatan', 'laksa_ms_ppks.kecamatan_id', '=', 'laksa_ms_kecamatan.id')
                        ->leftJoin('laksa_ms_provinsi', 'laksa_ms_ppks.provinsi_id', '=', 'laksa_ms_provinsi.id')
                        ->leftJoin('laksa_ms_pendidikan', 'laksa_ms_ppks.pendidikan_id', '=', 'laksa_ms_pendidikan.id')
                        ->leftJoin('laksa_ms_agama', 'laksa_ms_ppks.agama_id', '=', 'laksa_ms_agama.id');
        $pasien      = $pasien->first();
        // dd($pasien);
        $pengampu    = Pengampu::where("laksa_ms_pengampu.id","=",$residensial->pengampu_id);
        $pengampu      = $pengampu->leftJoin('laksa_ms_pendidikan', 'laksa_ms_pengampu.pendidikan_id', '=', 'laksa_ms_pendidikan.id')
                        ->leftJoin('laksa_ms_agama', 'laksa_ms_pengampu.agama_id', '=', 'laksa_ms_agama.id');
        $pengampu    = $pengampu->first();
        $petugas = Petugas::select("laksa_ms_pegawai.*","laksa_ms_pendamping_sosial.*","laksa_ms_pendamping_sosial.id as petugas_id")->leftjoin("laksa_ms_pegawai","laksa_ms_pegawai.nip","=","laksa_ms_pendamping_sosial.nip_nik")->get();
        
        $detail_ppks_value=[];
        // dd(json_decode($residensial->kategori_ppks_json));
        foreach(json_decode($residensial->kategori_ppks_json) as $key=>$detail_ppks){
            if(is_array($detail_ppks)){
                dd("objeck");
            }else{
                if(is_object($detail_ppks)){
                    foreach($detail_ppks as $keyx=>$detail_ppksx){
                        $detail_ppks_value[]=[
                            "combo_box" =>(KategoriPPKSSub::select("sub_kategori_ppks")->where("id","=",$keyx)->first())->sub_kategori_ppks,
                            "key"       =>$keyx,
                            "value"     =>is_null(KategoriPPKSSub::select("sub_kategori_ppks")->where("id","=",$detail_ppksx)->first()) ? $detail_ppksx : (KategoriPPKSSub::select("sub_kategori_ppks")->where("id","=",$detail_ppksx)->first())->sub_kategori_ppks,
                        ];
                    }
                }else{
                    $detail_ppks_value[]=[
                        "combo_box" =>(KategoriPPKSSub::select("sub_kategori_ppks")->where("id","=",$key)->first())->sub_kategori_ppks,
                        "key"       =>$key,
                        "value"     =>is_null(KategoriPPKSSub::select("sub_kategori_ppks")->where("id","=",$detail_ppks)->first()) ? $detail_ppks : (KategoriPPKSSub::select("sub_kategori_ppks")->where("id","=",$detail_ppks)->first())->sub_kategori_ppks,
                    ];
                }
            }
        }
        $residensial->kondisi_ppks  =$detail_ppks_value;
        if($residensial->dokumen_ba){
            $residensial->path_dokumen_ba=asset('storage/' . $residensial->dokumen_ba);
        }
        // dd($residensial);

        $assessement_form=FormAssessment::orderBy("sort","ASC")->get();

        foreach($assessement_form as $af){
            $af->child=FormAssessmentSub::where("form_assessment_id","=",$af->id)->where("parent_id","=",null)->orderBy("sort","ASC")->get();
            foreach($af->child as $option){
                $option->option=FormAssessmentSub::where("parent_id","=",$option->id)->orderBy("sort","ASC")->get();
            }
        }

        $komponen_layanan_yang_diberikan=FormAssessmentSub::where("parent_id","=","1f3d613e-1c7b-4204-9f88-4d6b70e4da8e")->get();

        // dd($assessement_form);
        
        return view('assessement.assessment', compact('residensial','pasien','pengampu','agama','pendidikan','bantuan','assessement_form','komponen_layanan_yang_diberikan','komponen_intervensi','petugas'));
    }

    public function edit_Assessment($id){

    }

    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), $this->detail_rules()['RULE'], $this->detail_rules()['MESSAGE']);

        if ($validator->fails()) {
            $this->error[] = ($validator->errors()->all())[0];
        } else {
            if (!Residensial::where('id', $request->residensial_id)->exists()) {
                $this->error[] = "Data residensial tidak ada.";
            }
        }

        if (!$this->error) {
            // dd($request->all());
            #id 	residensial_id 	tgl_assessment 	satuan_kerja 	bantuan_id 	assessment_json 	created_at 	updated_at 	deleted_at 	
            $payload = [
                'id'               => Str::uuid()->toString(),
                'residensial_id'   => $request->residensial_id,
                'tgl_assessment'   => date('Y-m-d H:i:s'),
                'satuan_kerja'     => '123',
                'bantuan_id'       => '123',
                'assessment_json'  => json_encode($request->assessment),
                'uraian_komponen_layanan'=>$request->uraian_komponen_layanan,

                'intervensi_komponen_yang_diberikan'    =>$request->intervensi_komponen,
                'intervensi_uraian_komponen_layanan'    =>$request->intervensi_uraian_komponen,
                'intervensi_waktu_pemebrian_layanan'    =>$request->intervensi_waktu_pemberian,
                'intervensi_pihak_yang_terlibat'        =>$request->intervensi_pihak_yang_terlibat,
                'rencana_intervensi_lanjutan'           =>is_array($request->bentuk_layanan) ? json_encode($request->bentuk_layanan) : '[]',
                'rekomendasi_catatan'                   =>$request->rekomendasi_catatan,
            ];

            if (Assessment::create($payload)) {
                $this->success = true;
                // Update data pada tabel Residensial
                $updated = Residensial::where('id', $request->residensial_id)->update(["status_id"=>"2ae4ad34-db8b-11ef-9f06-244bfebc0c45"]);
            }

            if($this->success){
                // Pastikan Anda sudah memvalidasi data di $request->assessment sebelumnya
                $assessments            = $request->assessment;
                $assessmentId           = $payload['id']; // Set nilai assessment_id
                $now                    = Carbon::now(); // Waktu saat ini untuk created_at dan updated_at
                // dd($assessments);
                // Data yang akan disimpan
                $dataToInsert = [];
                foreach ($assessments as $formAssessmentId => $subAssessment) {
                    foreach ($subAssessment as $formAssessmentSubId => $value) {
                        if($value != null){
                            // Jika value adalah file, simpan ke storage
                            if ($value instanceof \Illuminate\Http\UploadedFile) {
                                // Simpan file ke folder 'uploads/assessment' di storage
                                $filePath = $value->store('uploads/assessment', 'public');

                                // Masukkan data file ke array untuk dimasukkan ke database
                                $dataToInsert[] = [
                                    'id'                        => Str::uuid()->toString(),
                                    'form_assessment_id'        => $formAssessmentId,
                                    'form_assessment_sub_id'    => $formAssessmentSubId,
                                    'assessment_id'             => $assessmentId,
                                    'assessment_value'          => $filePath, // Path file yang disimpan
                                    'assessment_type'           =>'file',
                                    'created_at'                => $now,
                                    'updated_at'                => $now,
                                    
                                ];
                            } elseif (!is_null($value) && $value !== '') {
                                // Masukkan data teks ke array untuk dimasukkan ke database
                                if(is_array($value)){
                                    $value=json_encode($value);
                                }else{
                                    $value=$value;
                                }
                                $dataToInsert[] = [
                                    'id'                        => Str::uuid()->toString(),
                                    'form_assessment_id'        => $formAssessmentId,
                                    'form_assessment_sub_id'    => $formAssessmentSubId,
                                    'assessment_id'             => $assessmentId,
                                    'assessment_value'          => $value,
                                    'assessment_type'           =>'text',
                                    'created_at'                => $now,
                                    'updated_at'                => $now,
                                ];
                            }
                        }else{
                            $this->error[]="Kolom <strong>".(FormAssessmentSub::select("sub_kategori_assessment")->where("id",$formAssessmentSubId)->first())->sub_kategori_assessment."</strong> Wajib Di Isi<br>";
                        }
                    }
                }
                // print_r($dataToInsert);
                // Masukkan data ke database menggunakan batch insert
                if (!empty($dataToInsert)) {
                    if(FormAssessmentFormValue::insert($dataToInsert)){
                        $payload_pengampu=[
                            'id'                    =>Str::uuid()->toString(),
                            'nama_pengampu'         =>$request->pengampu_nama,
                            'hubungan_dengan_ppks'  =>$request->pengampu_hubungan_dengan_ppks,
                            'tmp_lahir'             =>$request->pengampu_tmp_lahir,
                            'tgl_lahir'             =>$request->pengampu_tgl_lahir,
                            'nohp'                  =>$request->pengampu_nohp,
                            'agama_id'              =>$request->pengampu_agama,
                            'nik'                   =>$request->pengampu_nik,
                            'nokk'                  =>$request->pengampu_nokk,
                            'sudah_ada_dtks'        =>$request->pengampu_apakah_sudah_masuk_dtks,
                            'bantuan_saat_ini'      =>$request->pengampu_bantuan_yang_sudah_diterima,
                            'pendidikan_id'         =>$request->pengampu_pendidikan_terakhir,
                            'status_kawin'          =>$request->pengampu_status_kawin,
                            'pekerjaan'             =>$request->pengampu_pekerjaan,
                            'pengeluaran_perbulan'  =>$request->pengampu_pengeluaran_per_bulan,
                            'created_at'            => $now,
                            'updated_at'            => $now,
                        ];
                        if(Pengampu::create($payload_pengampu)){
                            $pengampux = Residensial::where('id', $request->residensial_id)->update(["pengampu_id"=>$payload_pengampu['id']]);
                        }
                    }
                }

                $payloads = [
                    'id'            => Str::uuid()->toString(),
                    'residensial_id' => $request->residensial_id,
                    'petugas_id' => $request->layanan_manajer_kasus,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
    
                // Menyimpan data rehabilitasi dan memperbarui status_id di tabel residensial
                $rehabilitasi = Rehabilitasi::create($payloads);
            }
        
        }

        if ($this->success) {
            $response = [
                'status'  => 'success',
                'message' => "Assessment berhasil",
            ];
        }

        if ($this->error) {
            $response = [
                'errors'  => 'Error',
                'message' => $this->error,
            ];
        }

        return response()->json($response);
    }

    function detail_rules(){
        $rules=[
            'residensial_id'            =>'required',
            "pengampu_nama" => 'required',
            "pengampu_nik" => 'required',
            "pengampu_nokk" => 'required',
            "pengampu_tmp_lahir" => 'required',
            "pengampu_tgl_lahir" => 'required',
            "pengampu_nohp" => 'required',
            "pengampu_agama" => 'required',
            "pengampu_pendidikan_terakhir" => 'required',
            "pengampu_hubungan_dengan_ppks" => 'required',
            "pengampu_apakah_sudah_masuk_dtks" => 'required',
            "pengampu_bantuan_yang_sudah_diterima" => 'required',
            "pengampu_status_kawin" => 'required',
            "pengampu_pekerjaan" => 'required',
            "pengampu_pengeluaran_per_bulan" => 'required',
            
        ];
        $messages=[
            'residensial_id.required'       => 'Pilahkan Pilih Residensial yang akan di assessment.',
            "pengampu_nama"                 => 'Kolom Nama Pengampu Wajib Di isi',
            "pengampu_nik"                  => 'Kolom NIK Pengampu Wajib Di isi',
            "pengampu_nokk"                 => 'Kolom NO KK Pengampu Wajib Di isi',
            "pengampu_tmp_lahir"            => 'Kolom Tempat Lahir Pengampu Wajib Di isi',
            "pengampu_tgl_lahir"            => 'Kolom Tanggak Lahir Pengampu Wajib Di isi',
            "pengampu_nohp"                 => 'Kolom NO HP Pengampu Wajib Di isi',
            "pengampu_agama"                => 'Kolom Agama Pengampu Wajib Di isi',
            "pengampu_pendidikan_terakhir"  => 'Kolom Pendidikan Terakhir Pengampu Wajib Di isi',
            "pengampu_hubungan_dengan_ppks" => 'Kolom Hubungan dengan PPKS Pengampu Wajib Di isi',
            "pengampu_apakah_sudah_masuk_dtks"      => 'Kolom Apakah sudah masuk DTKS Wajib Di isi',
            "pengampu_bantuan_yang_sudah_diterima"  => 'KolomBantuan yang sudah diterima saat ini Wajib Di isi',
            "pengampu_status_kawin"                 => 'Kolom Status Kawin Pengampu Wajib Di isi',
            "pengampu_pekerjaan"                    => 'Kolom Pekerjaan Pengampu Wajib Di isi',
            "pengampu_pengeluaran_per_bulan"        => 'Kolom Pengeluaran per Bulan Pengampu Wajib Di isi',
        ];
        return array("RULE"=>$rules,"MESSAGE"=>$messages);
    }


    public function load_assessement(){
        $sub_child = Residensial::select("laksa_tr_layanan.id as residensial_id","laksa_tr_layanan.*","laksa_ms_ppks.*","laksa_ms_sumber_rujukan.*","laksa_ms_pendamping_sosial.*","laksa_ms_pegawai.*","laksa_ms_status.*");
        $sub_child = $sub_child->orderby("laksa_tr_layanan.created_at","DESC");
        $sub_child = $sub_child->leftJoin('laksa_ms_pendamping_sosial', 'laksa_tr_layanan.petugas_id', '=', 'laksa_ms_pendamping_sosial.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_pegawai', 'laksa_ms_pendamping_sosial.pegawai_id', '=', 'laksa_ms_pegawai.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_ppks', 'laksa_tr_layanan.pasien_id', '=', 'laksa_ms_ppks.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_sumber_rujukan', 'laksa_tr_layanan.sumber_id', '=', 'laksa_ms_sumber_rujukan.id');
        $sub_child = $sub_child->leftJoin('laksa_ms_status', 'laksa_tr_layanan.status_id', '=', 'laksa_ms_status.id');
        $sub_child = $sub_child->whereIn("status_id",$this->status_usulan);
        $sub_child = $sub_child->get();
        $data = array();
        $no=0;
        $tombol_send_data   ="";
        foreach ($sub_child as $val) {
            $isAssement=Assessment::where("residensial_id",$val->residensial_id)->count();
            if($isAssement>0 && $val->status_id=="2ae4ad34-db8b-11ef-9f06-244bfebc0c45"){
                $tombol_edit='<a href="'.route("edit_assessement",$val->residensial_id).'">
                                                <button class="btn btn-sm btn-icon btn-info">
                                                    <span class="btn-inner">
                                                        <svg fill="#ffffff" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <g id="SVGRepo_iconCarrier"> <path d="M1468.214 0v551.145L840.27 1179.089c-31.623 31.623-49.693 74.54-49.693 119.715v395.289h395.288c45.176 0 88.093-18.07 119.716-49.694l162.633-162.633v438.206H0V0h1468.214Zm129.428 581.3c22.137-22.136 57.825-22.136 79.962 0l225.879 225.879c22.023 22.023 22.023 57.712 0 79.848l-677.638 677.637c-10.616 10.503-24.96 16.49-39.98 16.49H903.516v-282.35c0-15.02 5.986-29.364 16.49-39.867Zm-920.005 548.095H338.82v112.94h338.818v-112.94Zm225.88-225.879H338.818v112.94h564.697v-112.94Zm734.106-202.5-89.561 89.56 146.03 146.031 89.562-89.56-146.031-146.031Zm-508.228-362.197H338.82v338.818h790.576V338.82Z" fill-rule="evenodd"/> </g>
                                                        </svg>
                                                    </span>
                                                </button>
                                                </a>';
            }else{
                $tombol_edit='';
            }
            if($val->status_id=="2ae4ad34-db8b-11ef-9f06-244bfebc0c45"){
                $tombol_send_data   ='<button class="btn btn-sm btn-icon btn-info" Onclick="send_form(\''.$val->residensial_id.'\')">
                                        <span class="btn-inner">
                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21.4274 2.5783C20.9274 2.0673 20.1874 1.8783 19.4974 2.0783L3.40742 6.7273C2.67942 6.9293 2.16342 7.5063 2.02442 8.2383C1.88242 8.9843 2.37842 9.9323 3.02642 10.3283L8.05742 13.4003C8.57342 13.7163 9.23942 13.6373 9.66642 13.2093L15.4274 7.4483C15.7174 7.1473 16.1974 7.1473 16.4874 7.4483C16.7774 7.7373 16.7774 8.2083 16.4874 8.5083L10.7164 14.2693C10.2884 14.6973 10.2084 15.3613 10.5234 15.8783L13.5974 20.9283C13.9574 21.5273 14.5774 21.8683 15.2574 21.8683C15.3374 21.8683 15.4274 21.8683 15.5074 21.8573C16.2874 21.7583 16.9074 21.2273 17.1374 20.4773L21.9074 4.5083C22.1174 3.8283 21.9274 3.0883 21.4274 2.5783Z" fill="currentColor"></path>
                                                <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M3.01049 16.8079C2.81849 16.8079 2.62649 16.7349 2.48049 16.5879C2.18749 16.2949 2.18749 15.8209 2.48049 15.5279L3.84549 14.1619C4.13849 13.8699 4.61349 13.8699 4.90649 14.1619C5.19849 14.4549 5.19849 14.9299 4.90649 15.2229L3.54049 16.5879C3.39449 16.7349 3.20249 16.8079 3.01049 16.8079ZM6.77169 18.0003C6.57969 18.0003 6.38769 17.9273 6.24169 17.7803C5.94869 17.4873 5.94869 17.0133 6.24169 16.7203L7.60669 15.3543C7.89969 15.0623 8.37469 15.0623 8.66769 15.3543C8.95969 15.6473 8.95969 16.1223 8.66769 16.4153L7.30169 17.7803C7.15569 17.9273 6.96369 18.0003 6.77169 18.0003ZM7.02539 21.5683C7.17139 21.7153 7.36339 21.7883 7.55539 21.7883C7.74739 21.7883 7.93939 21.7153 8.08539 21.5683L9.45139 20.2033C9.74339 19.9103 9.74339 19.4353 9.45139 19.1423C9.15839 18.8503 8.68339 18.8503 8.39039 19.1423L7.02539 20.5083C6.73239 20.8013 6.73239 21.2753 7.02539 21.5683Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </button>';
            }else{
                $tombol_send_data="";
            }

            if($val->status_id=="23ac51ea-db8b-11ef-9f06-244bfebc0c45"){
                $tombol_assesment   ='<a href="'.route("check_assessement",$val->residensial_id).'">
                                        <button class="btn btn-sm btn-icon btn-warning">
                                            <span class="btn-inner">
                                                <svg fill="#ffffff" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                <g id="SVGRepo_iconCarrier"> <path d="M1468.214 0v551.145L840.27 1179.089c-31.623 31.623-49.693 74.54-49.693 119.715v395.289h395.288c45.176 0 88.093-18.07 119.716-49.694l162.633-162.633v438.206H0V0h1468.214Zm129.428 581.3c22.137-22.136 57.825-22.136 79.962 0l225.879 225.879c22.023 22.023 22.023 57.712 0 79.848l-677.638 677.637c-10.616 10.503-24.96 16.49-39.98 16.49H903.516v-282.35c0-15.02 5.986-29.364 16.49-39.867Zm-920.005 548.095H338.82v112.94h338.818v-112.94Zm225.88-225.879H338.818v112.94h564.697v-112.94Zm734.106-202.5-89.561 89.56 146.03 146.031 89.562-89.56-146.031-146.031Zm-508.228-362.197H338.82v338.818h790.576V338.82Z" fill-rule="evenodd"/> </g>
                                                </svg>
                                            </span>
                                        </button>
                                        </a>';
            }else{
                $tombol_assesment="";
            }

            if($val->status_id=="56bd1150-db8b-11ef-9f06-244bfebc0c45"){
                $rehabilitasi=Rehabilitasi::where("residensial_id","=",$val->residensial_id)->first();
                $tombol_reviu   ='<button class="btn btn-sm btn-icon btn-danger" Onclick="reviu_perkembangan(\''.$rehabilitasi->id.'\')">
                                    <span class="btn-inner">
                                        <svg fill="#ffffff" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                        <g id="SVGRepo_iconCarrier"> <path d="M1468.214 0v551.145L840.27 1179.089c-31.623 31.623-49.693 74.54-49.693 119.715v395.289h395.288c45.176 0 88.093-18.07 119.716-49.694l162.633-162.633v438.206H0V0h1468.214Zm129.428 581.3c22.137-22.136 57.825-22.136 79.962 0l225.879 225.879c22.023 22.023 22.023 57.712 0 79.848l-677.638 677.637c-10.616 10.503-24.96 16.49-39.98 16.49H903.516v-282.35c0-15.02 5.986-29.364 16.49-39.867Zm-920.005 548.095H338.82v112.94h338.818v-112.94Zm225.88-225.879H338.818v112.94h564.697v-112.94Zm734.106-202.5-89.561 89.56 146.03 146.031 89.562-89.56-146.031-146.031Zm-508.228-362.197H338.82v338.818h790.576V338.82Z" fill-rule="evenodd"/> </g>
                                        </svg>
                                    </span>
                                </button>
                            ';
            }else{
                $tombol_reviu="";
            }
           

            $data[$no]['No']                =($no+1);
            $data[$no]['Nama PPKS']       =$val->nama_depan.' '.$val->nama_belakang.'<br><span class="badge rounded-pill bg-warning">'.$val->status.'</span>';
            $data[$no]['Tgl Penerimaan']    =date("d-m-Y",strtotime($val->tgl_penerimaan));
            $data[$no]['Sumber']            =$val->sumber;
            $data[$no]['Petugas']           =$val->nama;
            $data[$no]['Aksi']              ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                                '.$tombol_send_data.'
                                                '.$tombol_assesment.'
                                                '.$tombol_edit.'
                                                '.$tombol_reviu.'
                                            </div>';
            $no++;
        }
        return \response()->json($data);
    }

    public function store_kirim_koordinator(Request $request, $id)
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
            $residendsial->status_id = "462ce22c-db8b-11ef-9f06-244bfebc0c45"; // Tahap Rehabilitasi
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

    public function reviuDokumenPerkembangan($id){
        $rehabilitasi = Rehabilitasi::findOrFail($id);
        // dd($dokumen_ba);
        $return['dokumen_rehabilitasi']=asset('storage/' . $rehabilitasi->laporan_rehabilitasi);
        $return['residensial_id']= $rehabilitasi->residensial_id;
        
        return $return;
    }
    public function reviuKirimPerkembangan(Request $request){
        function reviu_rules()
            {
            $rules = [
                'residensial_id'          => 'required',
                'perkembangan_catatan'      => 'required',
            ];

            $messages = [
                'residensial_id.required'         => 'Kolom ID wajib diisi.',
                'perkembangan_catatan.required'     => 'Kolom Catatan Perkembangan: wajib diisi.',
            ];

            return array("RULE" => $rules, "MESSAGE" => $messages);
        }  

        $validator = \Validator::make($request->all(), reviu_rules()['RULE'],reviu_rules()['MESSAGE']);
        if ($validator->fails()){
            $this->error[]=($validator->errors()->all())[0];
        }else{
            $residensial = new Residensial();
            if ($residensial->where('id', $request->residensial_id)->exists()) {
                
            }else{
                $this->error[]="Data Assesment tidak ada";
            }
        }
        if(!($this->error)){
            $rehabilitasi = Rehabilitasi::where('residensial_id', $request->residensial_id)->firstOrFail();
            $payload=[
                'assessor_catatan'      => $request->perkembangan_catatan,
                'assessor_catatan_tgl'  => date("Y-m-d H:i:s"),
            ];
            
            $update_model=Rehabilitasi::where('id', $rehabilitasi->id)->update($payload);
            if ($update_model) {
                $updated = Residensial::where('id', $request->residensial_id)->update(["status_id"=>"be583c52-e600-11ef-bfa8-244bfebc0c45"]);
                $this->success=true;
            }
        }
        if($this->success){
            $response=[
                'status'=>'success',
                'message'=>"Update reviu Assessment Berhasil",
                'redirect'=>route('perujuk')
            ];
        }
        if($this->error){
            $response=[
                'errors'=>'Error',
                'message'=>$this->error,
            ];
        }
        return response()->json($response);
        exit;
    }
}
