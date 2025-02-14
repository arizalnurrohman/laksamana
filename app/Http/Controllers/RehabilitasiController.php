<?php

namespace App\Http\Controllers;

use Storage;
use Validator;
use Carbon\Carbon;
use App\Models\Agama;
use App\Models\Aspek;
use App\Models\Pasien;
use App\Models\Bantuan;
use App\Models\Perujuk;
use App\Models\Petugas;
use App\Models\Pengampu;
use App\Models\Assessment;
use App\Models\Pendidikan;
use App\Models\Residensial;
use Illuminate\Support\Str;
use App\Models\KategoriPPKS;
use App\Models\Rehabilitasi;
use Illuminate\Http\Request;
use App\Models\FormAssessmentSub;
use App\Models\KomponenPerkembangan;
use App\Models\FormAssessmentFormValue;
use App\Models\PendampingSosial;
use App\Models\PetugasLayanan;
use App\Models\RehabilitasiPerkembangan;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\RehabilitasiPerkembanganNilai;

class RehabilitasiController extends Controller
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
        $rehabilitasi = Rehabilitasi::all();
        return view('rehabilitasi.index', compact('rehabilitasi'))->with('no', 1);
    }

    public function detail($id){
        
        $rehabilitasi = Rehabilitasi::orderby("laksa_tr_layanan.created_at","asc");
        $rehabilitasi = $rehabilitasi->select('laksa_tr_layanan.*', 'laksa_ms_ppks.*','laksa_tr_rehabilitasi.*','laksa_tr_rehabilitasi.id as rehabilitasi_id');
        $rehabilitasi = $rehabilitasi->leftJoin('laksa_tr_layanan', 'laksa_tr_rehabilitasi.residensial_id', '=', 'laksa_tr_layanan.id');
        $rehabilitasi = $rehabilitasi->leftJoin('laksa_ms_ppks', 'laksa_tr_layanan.pasien_id', '=', 'laksa_ms_ppks.id');
        $rehabilitasi = $rehabilitasi->where('laksa_tr_rehabilitasi.id', '=', $id);
        $rehabilitasi = $rehabilitasi->first();

        $komponen     =KomponenPerkembangan::orderBy("sort","asc")->get();
        $aspek        =Aspek::orderBy("sort","asc")->get();
        
        $komponen_layanan_yang_diberikan=FormAssessmentSub::where("parent_id","=","1f3d613e-1c7b-4204-9f88-4d6b70e4da8e")->get();

        $assessment =Assessment::where("residensial_id",$rehabilitasi->residensial_id)->first();

        return view('rehabilitasi.detail', compact('rehabilitasi','komponen','aspek','komponen_layanan_yang_diberikan',"assessment"))->with('no', 1);
    }

    public function rehabilitasiLaporan($id){
        $rehabilitasi = Rehabilitasi::findOrFail($id);
        // dd($dokumen_ba);
        $return['dokumen_rehabilitasi']=asset('storage/' . $rehabilitasi->laporan_rehabilitasi);
        return $return;
    }

    public function ajukanTerminasi(Request $request,$id){
        // dd($request->all());
        // dd($id);
        try {
            $residensial = Residensial::leftJoin('laksa_tr_rehabilitasi', 'laksa_tr_layanan.id', '=', 'laksa_tr_rehabilitasi.residensial_id')->where("laksa_tr_rehabilitasi.id", "=", $id)->first();
            if ($residensial) {
                // Gunakan update dengan kondisi yang lebih spesifik

                $updated = Residensial::where('id', $residensial->residensial_id)->update(["status_id"=>"56bd1150-db8b-11ef-9f06-244bfebc0c45"]);
                

                return response()->json([
                    'message' => 'Proses terminasi berhasil diajukan.',
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

    public function get_rehabilitasiPerkembangan($id){
        $perkembangan=RehabilitasiPerkembangan::where("id",$id)->first();
        // dd($perkembangan);
        $perkembangan_nilai=RehabilitasiPerkembanganNilai::where("rehabilitasi_perkembangan_id","=",$perkembangan->id);
        // $perkembangan_nilai=$perkembangan_nilai->leftJoin('laksa_ms_komponen_perkembangan', 'laksa_tr_rehabilitasi_perkembangan_nilai.komponen_id', '=', 'laksa_ms_komponen_perkembangan.id');
        // $perkembangan_nilai=$perkembangan_nilai->leftJoin('laksa_ms_aspek', 'laksa_tr_rehabilitasi_perkembangan_nilai.aspek_id', '=', 'laksa_ms_aspek.id');
        // $perkembangan_nilai=$perkembangan_nilai->orderBy("laksa_ms_komponen_perkembangan.sort","ASC");
        // $perkembangan_nilai=$perkembangan_nilai->orderBy("laksa_ms_aspek.sort","ASC");
        $perkembangan_nilai=$perkembangan_nilai->get();
        // dd($perkembangan_nilai);
        $perkembangan_nilai_array=[];
        foreach($perkembangan_nilai as $perkembangan_nilaix){
            $perkembangan_nilai_array[$perkembangan_nilaix->komponen_id][$perkembangan_nilaix->aspek_id]=$perkembangan_nilaix->komponen_aspek_nilai;
            // dd($perkembangan_nilaix->komponen_id);
        }
        // dd($perkembangan_nilai_array);

        $komponen   =KomponenPerkembangan::orderBy("sort","asc")->get();
        $aspek      =Aspek::orderBy("sort","asc")->get();
        $html="";
        $no=1;
        foreach($komponen as $komponenx){
            $html.='<tr>';
                $html.='<td class="text-center p-1">'.$no.'</td>';
                $html.='<td class="p-1">'.$komponenx->komponen.'</td>';
                foreach($aspek as $aspekx){
                    $html.='<td width="20" class="text-center p-1">';
                        $html.='<div class="form-check form-check-inline">';
                            $html.='<input type="radio" class="form-check-input" value="1" name="perkembangan['.$komponenx->id.']['.$aspekx->id.']" '.(isset($perkembangan_nilai_array[$komponenx->id][$aspekx->id]) ? ($perkembangan_nilai_array[$komponenx->id][$aspekx->id]==1 ? 'checked="Checked"' : '') : '').'>';
                        $html.='</div>';
                    $html.='</td>';
                    $html.='<td width="20" class="text-center p-1">';
                        $html.='<div class="form-check form-check-inline">';
                            $html.='<input type="radio" class="form-check-input" value="2" name="perkembangan['.$komponenx->id.']['.$aspekx->id.']" '.(isset($perkembangan_nilai_array[$komponenx->id][$aspekx->id]) ? ($perkembangan_nilai_array[$komponenx->id][$aspekx->id]==2 ? 'checked="Checked"' : '') : '').'>';
                        $html.='</div>';
                    $html.='</td>';
                    $html.='<td width="20" class="text-center p-1">';
                        $html.='<div class="form-check form-check-inline">';
                            $html.='<input type="radio" class="form-check-input" value="3" name="perkembangan['.$komponenx->id.']['.$aspekx->id.']" '.(isset($perkembangan_nilai_array[$komponenx->id][$aspekx->id]) ? ($perkembangan_nilai_array[$komponenx->id][$aspekx->id]==3 ? 'checked="Checked"' : '') : '').'>';
                        $html.='</div>';
                    $html.='</td>';
                }
            $html.='</tr>';
            $no++;
        }
        
        return [
            "html"      =>$html,
            "catatan"   =>$perkembangan->catatan_perkembangan,
            "foto"       =>$perkembangan->foto_perkembangan ? asset('storage/' . $perkembangan->foto_perkembangan) : '',
            "file"      =>$perkembangan->file_perkembangan ? asset('storage/' . $perkembangan->file_perkembangan) : '',
            "tgl"       =>$perkembangan->tgl_perkembangan,
            "id"        =>$perkembangan->id,
        ];
    }

    public function load_data()
    {
        $rehabilitasi = Rehabilitasi::orderby("laksa_tr_layanan.created_at","asc");
        $rehabilitasi = $rehabilitasi->select('laksa_tr_layanan.*', 'laksa_ms_ppks.*','laksa_tr_rehabilitasi.*','laksa_tr_rehabilitasi.id as rehabilitasi_id');
        $rehabilitasi = $rehabilitasi->leftJoin('laksa_tr_layanan', 'laksa_tr_rehabilitasi.residensial_id', '=', 'laksa_tr_layanan.id');
        $rehabilitasi = $rehabilitasi->leftJoin('laksa_ms_ppks', 'laksa_tr_layanan.pasien_id', '=', 'laksa_ms_ppks.id');
        $rehabilitasi = $rehabilitasi->where("laksa_tr_layanan.status_id","=",'462ce22c-db8b-11ef-9f06-244bfebc0c45');
        $rehabilitasi = $rehabilitasi->get();
        $no=0;
        $data=[];
        foreach ($rehabilitasi as $val) {
            $data[$no]['No']            =($no+1);
            $data[$no]['Nama PPKS']     =$val->nama_depan." ".$val->nama_belakang."<br>".date("d-m-Y",strtotime($val->tgl_penerimaan));
            $data[$no]['Rehabilitasi']  =RehabilitasiPerkembangan::where("rehabilitasi_id","=",$val->rehabilitasi_id)->count();

            $data[$no]['Aksi']          ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                            <a href="'.route("rehabilitasi.detail",$val->rehabilitasi_id).'">
                                            <button class="btn btn-sm btn-icon btn-warning">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.334 2.75H7.665C4.644 2.75 2.75 4.889 2.75 7.916V16.084C2.75 19.111 4.634 21.25 7.665 21.25H16.333C19.364 21.25 21.25 19.111 21.25 16.084V7.916C21.25 4.889 19.364 2.75 16.334 2.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.9393 12.0129H15.9483" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M11.9301 12.0129H11.9391" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M7.92128 12.0129H7.93028" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                </span>
                                            </button>
                                            </a>
                                        </div>';
            $no++;
        }
        return \response()->json($data);
    }

    public function store_PerkembanganRehabilitasi(Request $request){
        // Validasi data
        $validator = Validator::make($request->all(), $this->detail_rules()['RULE'], $this->detail_rules()['MESSAGE']);

        if ($validator->fails()) {
            $this->error[] = ($validator->errors()->all())[0];
        } else {
            // dd($request->perkembangan);
            foreach($request->perkembangan as $key=>$perkembanganx){
                if(count($perkembanganx)!==3){
                    $this->error[]="Perkembangan Komponen ".((KomponenPerkembangan::where("id",$key)->first())->komponen)." Belum Lengkap<br>";
                }
            }
        }

        if (!$this->error) {
            // dd($request->all());
            // Simpan file unggahan
            $fotoPath = null;
            $filePath = null;

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('uploads/perkembangan/foto', 'public');
            }

            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('uploads/perkembangan/file', 'public');
            }

            // Payload data pasien
            $count_success=0;
            $count_errors =0;

            #SAVE FEHABILITASI PERKEMBANGAN------

            $rehabilitasi=[
                'id'                    =>Str::uuid()->toString(),
                'rehabilitasi_id'       =>$request->perkembangan_rehabilitasi_id,
                'tgl_perkembangan'      =>$request->perkembangan_tanggal,
                'foto_perkembangan'     =>$fotoPath,
                'file_perkembangan'     =>$filePath,
                'catatan_perkembangan'  =>$request->perkembangan_catatan,
            ];
            if(RehabilitasiPerkembangan::create($rehabilitasi)){
                foreach($request->perkembangan as $key=>$perkembanganx){
                    foreach($perkembanganx as $aspek_id=>$value_aspek){
                        $payload = [
                            'id'                            => Str::uuid()->toString(),
                            'rehabilitasi_perkembangan_id'  => $rehabilitasi['id'],
                            'komponen_id'                   => $key,
                            'aspek_id'                      => $aspek_id,
                            'komponen_aspek_nilai'          => $value_aspek,
                        ];

                        if (RehabilitasiPerkembanganNilai::create($payload)) {
                            $count_success++;
                        }else{
                            $count_errors++;
                        }
                    }
                }
            }

            if($count_errors <=0){
                $this->success = true;
            }
        }

        if ($this->success) {
            $response = [
                'status'  => 'success',
                'message' => "Pemberian Perkembangan Rehabilitasi berhasil",
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

    public function store_Intervensi(Request $request){
        // Validasi data
        // dd($request->all());
        $validator = Validator::make($request->all(), $this->intervensi_rules()['RULE'], $this->intervensi_rules()['MESSAGE']);

        if ($validator->fails()) {
            $this->error[] = ($validator->errors()->all())[0];
        } else {
            // dd($request->perkembangan);
            
        }

        if (!$this->error) {
            $payload=[
                'intervensi_komponen_yang_diberikan'=>$request->intervensi_komponen,
                'intervensi_uraian_komponen_layanan'=>$request->intervensi_uraian_komponen,
                'intervensi_waktu_pemebrian_layanan'=>$request->intervensi_waktu_pemberian,
                'intervensi_pihak_yang_terlibat'    =>$request->intervensi_pihak_yang_terlibat,
                'rencana_intervensi_lanjutan'       =>json_encode($request->bentuk_layanan),
                'rekomendasi_catatan'               =>$request->rekomendasi_catatan,
            ];
            if(Assessment::where('id', $request->assessment_id)->update($payload)){
                $this->success = true;
            }
        }

        if ($this->success) {
            $response = [
                'status'  => 'success',
                'message' => "Pemberian Intervensi berhasil",
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

    function intervensi_rules(){
        $rules=[
            'assessment_id'            =>'required',
        ];
        $messages=[
            'assessment_id.required'   => 'Kolom Id Layanan wajib diisi.',
        ];
        return array("RULE"=>$rules,"MESSAGE"=>$messages);
    }

    public function store_PerkembanganRehabilitasiUpdate(Request $request){
        // Validasi data
        // dd($request->all());
        $validator = Validator::make($request->all(), $this->detail_rules()['RULE'], $this->detail_rules()['MESSAGE']);
    
        if ($validator->fails()) {
            $this->error[] = ($validator->errors()->all())[0];
        } else {
            foreach($request->perkembangan as $key=>$perkembanganx){
                if(count($perkembanganx) !== 3){
                    $this->error[] = "Perkembangan Komponen ".((KomponenPerkembangan::where("id",$key)->first())->komponen)." Belum Lengkap<br>";
                }
            }
        }
    
        if (!$this->error) {
            $rehabilitasi = RehabilitasiPerkembangan::find($request->perkembangan_rehabilitasi_id);
            if (!$rehabilitasi) {
                return response()->json(['errors' => 'Error', 'message' => 'Data tidak ditemukan'], 404);
            }

            // Simpan file unggahan
            $fotoPath = $rehabilitasi->foto_perkembangan;
            $filePath = $rehabilitasi->file_perkembangan;
    
            if ($request->hasFile('foto')) {
                if ($fotoPath && \Storage::disk('public')->exists($fotoPath)) {
                    Storage::disk('public')->delete($fotoPath);
                }
                $fotoPath = $request->file('foto')->store('uploads/perkembangan/foto', 'public');
            }
    
            if ($request->hasFile('file')) {
                if ($filePath && \Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($fotoPath);
                }
                $filePath = $request->file('file')->store('uploads/perkembangan/file', 'public');
            }
    
            // Perbarui data rehabilitasi
            $rehabilitasi->update([
                'tgl_perkembangan'      => $request->perkembangan_tanggal,
                'foto_perkembangan'     => $fotoPath,
                'file_perkembangan'     => $filePath,
                'catatan_perkembangan'  => $request->perkembangan_catatan,
            ]);
    
            $count_success = 0;
            $count_errors = 0;
    
            // Perbarui atau buat ulang nilai perkembangan
            foreach ($request->perkembangan as $key => $perkembanganx) {
                foreach ($perkembanganx as $aspek_id => $value_aspek) {
                    $payload = [
                        'komponen_aspek_nilai' => $value_aspek,
                    ];
                    
                    $nilai = RehabilitasiPerkembanganNilai::where([
                        ['rehabilitasi_perkembangan_id', '=', $rehabilitasi->id],
                        ['komponen_id', '=', $key],
                        ['aspek_id', '=', $aspek_id]
                    ])->first();
    
                    if ($nilai) {
                        if ($nilai->update($payload)) {
                            $count_success++;
                        } else {
                            $count_errors++;
                        }
                    } else {
                        $payload['id'] = Str::uuid()->toString();
                        $payload['rehabilitasi_perkembangan_id'] = $rehabilitasi->id;
                        $payload['komponen_id'] = $key;
                        $payload['aspek_id'] = $aspek_id;
                        
                        if (RehabilitasiPerkembanganNilai::create($payload)) {
                            $count_success++;
                        } else {
                            $count_errors++;
                        }
                    }
                }
            }
    
            if ($count_errors <= 0) {
                $this->success = true;
            }
        }
    
        if ($this->success) {
            $response = [
                'status'  => 'success',
                'message' => "Perkembangan Rehabilitasi berhasil diperbarui",
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

    
    
    public function destroy($id)
    {
        // dd($id);
        try {
            // Cari dan hapus data
            $perkembangan   = RehabilitasiPerkembangan::findOrFail($id);
            if ($perkembangan->delete()) {
                // Hapus semua data terkait di RehabilitasiPerkembanganNilai
                RehabilitasiPerkembanganNilai::where('rehabilitasi_perkembangan_id', $id)->delete();
                return response()->json(['message' => 'Data deleted successfully!'], 200);
            } else {
                return response()->json(['message' => 'Failed to delete data.x'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete data.'], 500);
        }
    }
    

    function detail_rules(){
        $rules=[
            'perkembangan'            =>'required',
            'perkembangan_tanggal'    =>'required',
            'perkembangan_catatan'    =>'required',
        ];
        $messages=[
            'perkembangan.required'           => 'Kolom Pilihan perkembangan  wajib diisi.',
            'perkembangan_tanggal.required'   => 'Kolom Tanggal perkembangan  wajib diisi.',
            'perkembangan_catatan.required'   => 'Kolom Catatan perkembangan  wajib diisi.',
        ];
        return array("RULE"=>$rules,"MESSAGE"=>$messages);
    }

    public function load_data_perkembangan($id)
    {
        // dd("aa");
        $rehabilitasi = RehabilitasiPerkembangan::orderby("laksa_tr_rehabilitasi_perkembangan.created_at","asc");
        $rehabilitasi = $rehabilitasi->where('rehabilitasi_id', '=', $id);
        $rehabilitasi = $rehabilitasi->get();
        $no=0;
        $data=[];
        foreach ($rehabilitasi as $val) {
            $data[$no]['No']                    =($no+1);
            $data[$no]['Tanggal Perkembangan']  =date("d-m-Y",strtotime($val->tgl_perkembangan));
            // $data[$no]['IMG']          ='<img src="'.asset('storage/' . $val->foto_perkembangan).'" alt="Foto Perkembangan" class="rounded avatar-100" style="max-width: 30px;  cursor: pointer;" data-bs-toggle="modal" data-bs-target="#zoomModal">';

            $data[$no]['Aksi']          ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                            <button class="btn btn-sm btn-icon btn-info" Onclick="detail_form(\''.$val->id.'\')">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.334 2.75H7.665C4.644 2.75 2.75 4.889 2.75 7.916V16.084C2.75 19.111 4.634 21.25 7.665 21.25H16.333C19.364 21.25 21.25 19.111 21.25 16.084V7.916C21.25 4.889 19.364 2.75 16.334 2.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.9393 12.0129H15.9483" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M11.9301 12.0129H11.9391" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M7.92128 12.0129H7.93028" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                </span>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-warning" Onclick="edit_form(\''.$val->id.'\')">
                                                <span class="btn-inner">
                                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>
                                                </span>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-danger" Onclick="delete_form(\''.$val->id.'\')">
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

    public function generate_rehabilitasi($id){
        $rehabilitasi_perkembangan=RehabilitasiPerkembangan::select("rehabilitasi_id","id")->where("rehabilitasi_id","=",$id)->get();
        
        foreach($rehabilitasi_perkembangan as $perkembangan){
            #select("laksa_tr_rehabilitasi_perkembangan_nilai.komponen_aspek_nilai","laksa_tr_rehabilitasi_perkembangan_nilai.aspek_id","laksa_tr_rehabilitasi_perkembangan_nilai.komponen_id","laksa_ms_komponen_perkembangan.komponen","laksa_ms_aspek.aspek")->
            $perkembangan_nilai =RehabilitasiPerkembanganNilai::leftJoin('laksa_ms_aspek', 'laksa_tr_rehabilitasi_perkembangan_nilai.aspek_id', '=', 'laksa_ms_aspek.id')
                                                                ->leftJoin('laksa_ms_komponen_perkembangan', 'laksa_tr_rehabilitasi_perkembangan_nilai.komponen_id', '=', 'laksa_ms_komponen_perkembangan.id')
                                                                ->where("rehabilitasi_perkembangan_id","=",$perkembangan->id)
                                                                ->get();
            // dd($perkembangan_nilai);
            $perkembangan_nilai_array[$perkembangan->id]   =[];
            foreach($perkembangan_nilai as $perkembangan_nilaix){
                $perkembangan_nilai_array[$perkembangan->id][$perkembangan_nilaix->komponen_id][$perkembangan_nilaix->aspek_id]=$perkembangan_nilaix->komponen_aspek_nilai;
            }
            $perkembangan->nilai=$perkembangan_nilai_array;
        }
        $perkembangan_array=$perkembangan->toArray();
        foreach($perkembangan_array['nilai'] as $id_perkembangan=>$komponen){
            // dd($komponen);
            foreach($komponen as $id_komponen=>$nilai_komponen){
                $total                  = array_sum($nilai_komponen);
                $jumlah_aspek           = count($nilai_komponen);
                $perkembangan_nilai_rata[$id_perkembangan][$id_komponen]              = $total / $jumlah_aspek;
            }
        }

        // Loop untuk menggabungkan dan menghitung rata-rata
        foreach ($perkembangan_nilai_rata as $subArray) {
            foreach ($subArray as $key => $value) {
                if (!isset($rata_rata[$key])) {
                    $rata_rata[$key] = ['total' => 0, 'count' => 0];
                }
                $rata_rata[$key]['total'] += $value;
                $rata_rata[$key]['count'] += 1;
            }
        }

        // Hitung rata-rata
        foreach ($rata_rata as $key => $val) {
            $rata_rata[$key] = round($val['total'] / $val['count'], 2);
        }

        foreach ($rata_rata as $key => $value) {
            if ($value >= 1 && $value <= 1.6) {
                $kategori[$key] = "Kurang";
            } elseif ($value >= 1.7 && $value < 2.3) {
                $kategori[$key] = "Cukup";
            } elseif ($value >= 2.4 && $value <=3) {
                $kategori[$key] = "Baik";
            } else {
                $kategori[$key] = "Tidak Diketahui";
            }
        }

        $laporan_akumulasi = [
            "nilai" => $rata_rata,
            "conversi" => $kategori
        ];

        // Tampilkan hasil
        // print_r($rata_rata);
        if($laporan_akumulasi){
            $generate_word=$this->generate_word_rehabilitasi($id,$laporan_akumulasi);
            if($generate_word){
                $generate_pdf =$this->generate_pdf_rehabilitasi($id);
                // dd($generate_pdf);
                if($generate_pdf){
                    $rehabilitasi = Rehabilitasi::find($id);
                    $rehabilitasi->laporan_rehabilitasi = "rehabilitasi/".$id.".pdf";
                    $rehabilitasi->laporan_tanggal      = date("Y-m-d H:i:s");
                    $rehabilitasi->laporan_akumulasi    = json_encode($laporan_akumulasi);
                    if($rehabilitasi->save()){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        
    }

    public function generate_word_rehabilitasi($id,$data_nilai){
        $rehabilitasi=Rehabilitasi::where("id",$id)->first();
        Carbon::setLocale('id');
        
        #get data residensial
        $residensial=Residensial::where("id",$rehabilitasi->residensial_id)->first();
        $rehabilitasi=Rehabilitasi::where("residensial_id",$residensial->id)->first();
        $pendamping    =PendampingSosial::where("id",$rehabilitasi->petugas_id)->first();#pendamping sosial
        $ppks       =Pasien::where("laksa_ms_ppks.id",$residensial->pasien_id);
        $ppks       =$ppks->select('laksa_ms_ppks.*','laksa_ms_provinsi.*','laksa_ms_kabupaten_kota.*','laksa_ms_kecamatan.*',"laksa_ms_ppks.id as pasien_id")
        ->leftJoin('laksa_ms_kabupaten_kota', 'laksa_ms_ppks.kota_id', '=', 'laksa_ms_kabupaten_kota.id')
        ->leftJoin('laksa_ms_kecamatan', 'laksa_ms_ppks.kecamatan_id', '=', 'laksa_ms_kecamatan.id')
        ->leftJoin('laksa_ms_provinsi', 'laksa_ms_ppks.provinsi_id', '=', 'laksa_ms_provinsi.id');
        $ppks       =$ppks->first();

        // dd($datax);
        $templatePath = public_path('storage/rehabilitasi/template_rehabilitasi.docx');
       
        // Cek apakah template ada
        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template tidak ditemukan!'], 404);
        }
        $kategori   =KategoriPPKS::where("id",$residensial->kategori_ppks_id)->first();
        // Membuat TemplateProcessor dari template yang ada
        $templateProcessor = new TemplateProcessor($templatePath);
        $data_nilaix=[];
        foreach($data_nilai['conversi'] as $key=>$value){
            $data_nilaix[$key] = $value;
        }
        $data_ppks = [
            'ppks_provinsi'          =>$ppks->provinsi,
            'ppks_kabupaten'         =>$ppks->kabupaten_kota,
            'ppks_kecamatan'         =>$ppks->kecamatan,
            'ppks_kelurahan'         =>$ppks->kelurahan_desa_id,
            'ppks_desa'              =>$ppks->kelurahan_desa_id,
            'ppks_domisili'          =>$ppks->domisili,
            'ppks_nama'              =>$ppks->nama_depan." ".$ppks->nama_belakang,
            'ppks_ttl'               =>$ppks->tmp_lahir.", ".date("d",strtotime($ppks->tgl_lahir))." Bulan ".date("Y"),
            'ppks_tmp_lahir'         =>$ppks->tmp_lahir,
            'ppks_tgl_lahir'         =>date("d",strtotime($ppks->tgl_lahir))." Bulan ".date("Y"),
            'ppks_jk'                =>$this->getGenderFromNIK($ppks->nik),
            'ppks_agama'             =>$ppks->agama,
            'ppks_nik'               =>$ppks->nik,
            'ppks_kk'                =>$ppks->nokk,
            'ppks_alamat'            =>$ppks->alamat,
            'ppks_kategori'          =>$kategori->kategori,
            'ppks_status_kawin'      =>"Belum Kawin",


            'kategori_ppks'         =>$kategori->kategori,

            'assessor_nama'         =>isset($assesor->nama_petugas) ? $assesor->nama_petugas : 'Nama Petugas',
            

            'layanan_mulai'          =>Carbon::parse($residensial->tgl_penerimaan)->translatedFormat('d F Y'),
            'layanan_selesai'        =>Carbon::parse($residensial->rencana_tgl_terminasi)->translatedFormat('d F Y'),
            'layanan_masa_rehab'     =>$residensial->masa_layanan,
            'layanan_kategori'       =>$kategori->kategori,
            'layanan_kasus'          =>$kategori->kategori,
            'layanan_pendamping'     =>isset($pendamping->nama_petugas) ? $pendamping->nama_petugas : 'Nama Petugas',
        ];
        
        $data=array_merge(array_merge($data_ppks,$data_nilaix));
       
        // dd($data);
        
        
        // Mengganti placeholder di template dengan data
        $templateProcessor->setValues($data);

        /*
        $data_rehabilitasi = [
            ['tahun' => 2023, 'jenis_nama' => 'Terapi Musik', 'nilai_disiplin' => 85, 'nilai_tekun' => 90, 'nilai_kreatif' => 88],
            ['tahun' => 2024, 'jenis_nama' => 'Kelas Seni', 'nilai_disiplin' => 80, 'nilai_tekun' => 85, 'nilai_kreatif' => 90],
            ['tahun' => 2025, 'jenis_nama' => 'Terapi Drama', 'nilai_disiplin' => 88, 'nilai_tekun' => 87, 'nilai_kreatif' => 92]
        ];
        $templateProcessor->cloneRow('tahun', count($data_rehabilitasi));
        foreach ($data_rehabilitasi as $index => $rehab) {
            $rowIndex = $index + 1; // CloneRow menggunakan indeks mulai dari 1
            $templateProcessor->setValue("tahun#{$rowIndex}", $rehab['tahun']);
            $templateProcessor->setValue("jenis_nama#{$rowIndex}", $rehab['jenis_nama']);
            $templateProcessor->setValue("nilai_disiplin#{$rowIndex}", $rehab['nilai_disiplin']);
            $templateProcessor->setValue("nilai_tekun#{$rowIndex}", $rehab['nilai_tekun']);
            $templateProcessor->setValue("nilai_kreatif#{$rowIndex}", $rehab['nilai_kreatif']);
        }
            */
        // dd($rehabilitasi_perkembangan);
        $datax= [
            [
                'no' => 1,
                'waktu' => 'MINGGU 1',
                'komponen' => [
                    ['nama' => 'Ibadah'],
                    ['nama' => 'Piket Asrama'],
                    ['nama' => 'Morning Meeting']
                ],
                'aspek' => [
                    'kedisiplinan' => 'cukup',
                    'ketekunan' => 'cukup',
                    'kreatifitas' => 'cukup'
                ],
                'desc' => 'Cukup',
                'catatan' => ''
            ],
            [
                'no' => 2,
                'waktu' => 'MINGGU 2',
                'komponen' => [
                    ['nama' => 'Ibadah'],
                    ['nama' => 'Piket Asrama'],
                    ['nama' => 'Morning Meeting']
                ],
                'aspek' => [
                    'kedisiplinan' => 'cukup',
                    'ketekunan' => 'cukup',
                    'kreatifitas' => 'cukup'
                ],
                'desc' => 'Cukup',
                'catatan' => ''
            ]
        ];

        $rehabilitasi_perkembangan=$this->get_perkembangan($rehabilitasi->id);
        
        $templateProcessor->cloneRow('no', count($rehabilitasi_perkembangan));

        // Looping untuk mengisi data
        foreach ($rehabilitasi_perkembangan as $index => $item) {
            $row = $index + 1;

            $templateProcessor->setValue("no#{$row}", $item['no']);
            $templateProcessor->setValue("waktu#{$row}", $item['waktu']);
            $templateProcessor->setValue("dsc#{$row}", $item['desc']);
            $templateProcessor->setValue("ktr#{$row}", $item['catatan']);

            // Komponen Intervensi
            $checkText['nak'] ="";
            $checkText['nac'] ="";
            $checkText['nab'] ="";

            $checkText['ntk'] ="";
            $checkText['ntc'] ="";
            $checkText['ntb'] ="";

            $checkText['nkk'] ="";
            $checkText['nkc'] ="";
            $checkText['nkb'] ="";
            $komponenText = "";
            foreach ($item['komponen'] as $idx => $komponen) {
                $komponenText .= ($idx + 1) . ". " . $komponen['nama'] . "\n";
                // $checkText['nak'] .= "✔\n";
                // $checkText['nac'] .= "\n";
                // $checkText['nab'] .= "\n";

                // $checkText['ntk'] .= "\n";
                // $checkText['ntc'] .= "\n";
                // $checkText['ntb'] .= "✔\n";

                // $checkText['nkk'] .= "\n";
                // $checkText['nkc'] .= "✔\n";
                // $checkText['nkb'] .= "\n";

                $item['perkembangan'][$komponen['nama']]['e7ce00ea-dcbb-11ef-beef-244bfebc0c45'] == 1 ? $checkText['nak'] .= "✔\n" : $checkText['nak'] .= "-\n";
                $item['perkembangan'][$komponen['nama']]['e7ce00ea-dcbb-11ef-beef-244bfebc0c45'] == 2 ? $checkText['nac'] .= "✔\n" : $checkText['nac'] .= "-\n";
                $item['perkembangan'][$komponen['nama']]['e7ce00ea-dcbb-11ef-beef-244bfebc0c45'] == 3 ? $checkText['nab'] .= "✔\n" : $checkText['nab'] .= "-\n";

                $item['perkembangan'][$komponen['nama']]['e7ce0997-dcbb-11ef-beef-244bfebc0c45'] == 1 ? $checkText['ntk'] .= "✔\n" : $checkText['ntk'] .= "-\n";
                $item['perkembangan'][$komponen['nama']]['e7ce0997-dcbb-11ef-beef-244bfebc0c45'] == 2 ? $checkText['ntc'] .= "✔\n" : $checkText['ntc'] .= "-\n";
                $item['perkembangan'][$komponen['nama']]['e7ce0997-dcbb-11ef-beef-244bfebc0c45'] == 3 ? $checkText['ntb'] .= "✔\n" : $checkText['ntb'] .= "-\n";

                $item['perkembangan'][$komponen['nama']]['e7ce12f6-dcbb-11ef-beef-244bfebc0c45'] == 1 ? $checkText['nkk'] .= "✔\n" : $checkText['nkk'] .= "-\n";
                $item['perkembangan'][$komponen['nama']]['e7ce12f6-dcbb-11ef-beef-244bfebc0c45'] == 2 ? $checkText['nkc'] .= "✔\n" : $checkText['nkc'] .= "-\n";
                $item['perkembangan'][$komponen['nama']]['e7ce12f6-dcbb-11ef-beef-244bfebc0c45'] == 3 ? $checkText['nkb'] .= "✔\n" : $checkText['nkb'] .= "-\n";

                
            }
            $templateProcessor->setValue("komponen#{$row}", trim($komponenText));

            $templateProcessor->setValue("nak#{$row}", trim($checkText['nak']));
            $templateProcessor->setValue("nac#{$row}", trim($checkText['nac']));
            $templateProcessor->setValue("nab#{$row}", trim($checkText['nab']));

            $templateProcessor->setValue("ntk#{$row}", trim($checkText['ntk']));
            $templateProcessor->setValue("ntc#{$row}", trim($checkText['ntc']));
            $templateProcessor->setValue("ntb#{$row}", trim($checkText['ntb']));

            $templateProcessor->setValue("nkk#{$row}", trim($checkText['nkk']));
            $templateProcessor->setValue("nkc#{$row}", trim($checkText['nkc']));
            $templateProcessor->setValue("nkb#{$row}", trim($checkText['nkb']));
            /*
            // Aspek Kedisiplinan
            $templateProcessor->setValue("nak#{$row}", $item['aspek']['kedisiplinan'] == 'kurang' ? '✔' : '');
            $templateProcessor->setValue("nac#{$row}", $item['aspek']['kedisiplinan'] == 'cukup' ? '✔' : '');
            $templateProcessor->setValue("nab#{$row}", $item['aspek']['kedisiplinan'] == 'baik' ? '✔' : '');

            // Aspek Ketekunan
            $templateProcessor->setValue("ntk#{$row}", $item['aspek']['ketekunan'] == 'kurang' ? '✔' : '');
            $templateProcessor->setValue("ntc#{$row}", $item['aspek']['ketekunan'] == 'cukup' ? '✔' : '');
            $templateProcessor->setValue("ntb#{$row}", $item['aspek']['ketekunan'] == 'baik' ? '✔' : '');

            // Aspek Kreatifitas/Inisiatif
            $templateProcessor->setValue("nkk#{$row}", $item['aspek']['kreatifitas'] == 'kurang' ? '✔' : '');
            $templateProcessor->setValue("nkc#{$row}", $item['aspek']['kreatifitas'] == 'cukup' ? '✔' : '');
            $templateProcessor->setValue("nkb#{$row}", $item['aspek']['kreatifitas'] == 'baik' ? '✔' : '');
            */
        }

        
        // Lokasi file output yang akan disimpan
        $outputPath = public_path('storage/rehabilitasi/'.$id.'.docx');

        // Simpan file di folder yang sama dengan nama output.docx
        $templateProcessor->saveAs($outputPath);
        // Cek apakah file berhasil disimpan
        // dd($templateProcessor);
        if (!file_exists($outputPath)) {
            return "gagal buat file word";
        }else{
            return true;
        }
    }

    public function get_perkembangan($id){
        $perkembangan=RehabilitasiPerkembangan::where("rehabilitasi_id",$id)->orderBy("tgl_perkembangan","ASC")->get();
        $return=[];
        $no=1;
        $aspek_nilai=[];
        foreach($perkembangan as $perkembanganx){
            $perkembangan_nilai=RehabilitasiPerkembanganNilai::select("laksa_ms_komponen_perkembangan.komponen")->leftJoin('laksa_ms_komponen_perkembangan', 'laksa_tr_rehabilitasi_perkembangan_nilai.komponen_id', '=', 'laksa_ms_komponen_perkembangan.id')->where("rehabilitasi_perkembangan_id",$perkembanganx->id)->groupBy("laksa_ms_komponen_perkembangan.komponen")->groupBy("laksa_ms_komponen_perkembangan.sort")->orderBy("laksa_ms_komponen_perkembangan.sort","ASC")->get();
            $nama_x=[];
            foreach($perkembangan_nilai as $perkembangan_nilaix){
                $nama_x[]['nama']=$perkembangan_nilaix->komponen;
            }
            $perkembangan_nilai_value=RehabilitasiPerkembanganNilai::leftJoin('laksa_ms_komponen_perkembangan', 'laksa_tr_rehabilitasi_perkembangan_nilai.komponen_id', '=', 'laksa_ms_komponen_perkembangan.id')
                                                                     ->leftJoin('laksa_ms_aspek', 'laksa_tr_rehabilitasi_perkembangan_nilai.aspek_id', '=', 'laksa_ms_aspek.id')
                                                                     ->where("rehabilitasi_perkembangan_id",$perkembanganx->id)
                                                                     ->orderBy("laksa_ms_komponen_perkembangan.sort","ASC")
                                                                     ->get();
            
            foreach($perkembangan_nilai_value as $pkn){
                $aspek_nilai[$pkn->komponen][$pkn->aspek_id]=$pkn->komponen_aspek_nilai;
            }
            
            $return[]=[
                'no' => $no,
                'waktu' => date("d m Y",strtotime($perkembanganx->tgl_perkembangan)),
                'komponen' =>$nama_x,
                'aspek' => [
                    'kedisiplinan' => 'cukup',
                    'ketekunan' => 'cukup',
                    'kreatifitas' => 'cukup'

                    // 'kedisiplinan' => ['cukup', 'cukup', 'cukup'],
                    // 'ketekunan' => ['cukup', 'cukup', 'cukup'],
                    // 'kreatifitas' => ['cukup', 'cukup', 'cukup']
                ],
                'perkembangan'=>$aspek_nilai,
                'desc' => '',
                'catatan' => $perkembanganx->catatan_perkembangan
            ];
            $no++;
        }
        // dd($aspek_nilai);
        // dd($return);

        return $return;
    }

    public function generate_pdf_rehabilitasi($id){
        $libreOfficePath = '"C:\Program Files\LibreOffice\program\soffice.exe"';
        // Lokasi file Word
        $wordFilePath = public_path("storage\\rehabilitasi\\" . $id . ".docx");
        // Lokasi folder output
        $outputDirectory = public_path('storage\rehabilitasi');
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
    
}
