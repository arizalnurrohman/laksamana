<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Pegawai;
use App\Models\Kabupaten;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PetugasController extends Controller
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
        $kabupaten=Kabupaten::all();
        return view('petugas.index', compact('kabupaten'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'nip_petugas'     =>'required|exists:laksa_ms_pendamping_sosial,nip_petugas'
        ]);
        $petugas=[
            'id'                => Str::uuid()->toString(),
            'nip'               => $request->nip_petugas,
            'nama_petugas'      => $request->nama_petugas,
            'kabupaten_kota_id' => $request->kabupaten_kota,
        ];
        if(Petugas::create($petugas)){
            Pegawai::create([
                'id'            => Str::uuid()->toString(),
                'nip'           => $request->nip_petugas,
                'nama'          => $request->nama_petugas,
                'jk'            => 'JK',
            ]);
        }

        return response()->json(['message' => 'Data berhasil ditambahkan.']);
    }

    public function edit(Request $request)
    {
        $petugas = Petugas::findOrFail($request->id);
        return response()->json($petugas);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id'           => 'required|exists:laksa_ms_pendamping_sosial,id',
            'nama_petugas' => 'required|string|max:255',
            'nip_petugas'  =>'required'
        ]);

        $petugas = Petugas::findOrFail($request->id);
        $payload=[
            'nip_nik'           => $request->nip_petugas,
            'nama_petugas'      => $request->nama_petugas,
            'kabupaten_kota_id' => $request->kabupaten_kota,
        ];
        if($petugas->update($payload)){
            $pegawai=Pegawai::where("nip","=",$petugas->nip)->first();
            if ($pegawai) {
                $pegawai->update([
                    'nip' => $request->nip_petugas, 
                    'nama' => $request->nama_petugas
                ]);
            }
        }

        return response()->json(['message' => 'Data berhasil diperbarui.']);
    }

    public function destroy($id)
    {
        // dd($id);
        try {
            // Cari dan hapus data
            $petugas = Petugas::findOrFail($id);
            if($petugas->delete()){
                $pegawai=Pegawai::where("nip","=",$petugas->nip)->first();
                if ($pegawai) {
                    $pegawai->delete();
                }
            }

            return response()->json(['message' => 'Data deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete data.'], 500);
        }
    }

    public function load_data()
    {
        $petugas = Petugas::select("laksa_ms_pendamping_sosial.*","users.*","laksa_ms_pendamping_sosial.id as pedamping_id")->leftJoin('users', 'laksa_ms_pendamping_sosial.user_id', '=', 'users.id')->orderby("nama_petugas","asc")->get();
        $no=0;
        $data=[];
        foreach ($petugas as $val) {
            $data[$no]['No']            =($no+1);
            $data[$no]['NIP']           =$val->nip_nik;
            $data[$no]['Petugas']       =$val->nama_petugas."<br>email login: ".$val->email;
            $data[$no]['Aksi']          ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                            <button class="btn btn-sm btn-icon btn-warning" Onclick="update_form(\''.$val->pedamping_id.'\')">
                                                <span class="btn-inner">
                                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>
                                                </span>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-danger"  Onclick="delete_form(\''.$val->pedamping_id.'\')">
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
}
