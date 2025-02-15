<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\KategoriPPKS;
use Illuminate\Http\Request;
use App\Models\KategoriPPKSSub;
use DB;

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
    public function edit(Request $request)
    {
        $kategori = KategoriPPKS::findOrFail($request->id);
        return response()->json($kategori);
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

    public function destroy($id)
    {
        try {
            // Cari dan hapus data
            $persyaratan = KategoriPPKS::findOrFail($id);
            $persyaratan->delete();

            return response()->json(['message' => 'Data deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete data.'], 500);
        }
    }

    public function sub_ppsk($id){
        $data = KategoriPPKS::where('id', $id)->get();
        return response()->json($data);
    }

    public function sub_child_ppsk($id){
        $data = KategoriPPKSSub::where('id', $id)->get();
        return response()->json($data);
    }

    public function destroy_sub_child($id)
    {
        try {
            // Cari dan hapus data
            $persyaratan = KategoriPPKSSub::findOrFail($id);
            $persyaratan->delete();

            return response()->json(['message' => 'Data deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete data.'], 500);
        }
    }

    public function load_sub_child_list_ppsk($id){
        $sub_child = KategoriPPKSSub::where('parent_id', $id)->orderby("sort","asc")->get();
        $data = array();
        $no=0;
        foreach ($sub_child as $val) {
            $data[$no]['No']        =($no+1);
            $data[$no]['Pilihan']   =$val->sub_kategori_ppks;
            $data[$no]['Aksi']      ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                        <button class="btn btn-sm btn-icon btn-warning" Onclick="updatechild_canvas(\''.$val->id.'\')">
                                            <span class="btn-inner">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>
                                            </span>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-danger" Onclick="deletechild_canvas(\''.$val->id.'\')">
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
    

    public function sub_store(Request $request)
    {
        // dd($request->all());
        // dd($request->parent_id);
        $request->validate([
            'kategori_id' => 'required',
            'kategori_sub' => 'required|string|max:255',
        ]);

        $lastSort = KategoriPPKSSub::where("parent_id","=",$request->parent_id)->max('sort') ?? 0;

        if($request->sub_id){
            $subkategori = KategoriPPKSSub::findOrFail($request->sub_id);
            $subkategori->update([
                'sub_kategori_ppks' => $request->kategori_sub,
            ]);
            return response()->json(['message' => 'Data berhasil diperbarui.']);
        }else{
            KategoriPPKSSub::create([
                'id'                => Str::uuid()->toString(),
                'kategori_id'       => $request->kategori_id,
                'parent_id'         => $request->parent_id,
                'sub_kategori_ppks' => $request->kategori_sub,
                'sort'              => $lastSort + 1,
            ]);
            return response()->json(['message' => 'Data berhasil ditambahkan.']);
        }
        
    }

    
    public function load_data_sub(Request $request,$id)
    {
        $kategori_sub = KategoriPPKSSub::select("laksa_ms_kategori_ppks_sub.*")->where("kategori_id","=",$id)->whereNull("parent_id")->orderby("sort","asc");
        $kategori_sub = $kategori_sub->addSelect([
            'total_child' => KategoriPPKSSub::selectRaw('COUNT(*)')
                ->whereColumn('parent_id', '=', 'laksa_ms_kategori_ppks_sub.id')
                ->take(1)
        ]);
        $kategori_sub=$kategori_sub->get();
        $no=0;
        $data = array();
        foreach ($kategori_sub as $val) {
            $data[$no]['No']        =($no+1);
            $data[$no]['Sub Kategori']  =$val->sub_kategori_ppks.($val->total_child >0 ? " [".$val->total_child."]" : "");
            $data[$no]['Aksi']      ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                        <button class="btn btn-sm btn-icon btn-success" onclick="optionalOffCanvas(\''.$val->id.'\')">
                                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-warning" Onclick="updatesub_form(\''.$val->id.'\')">
                                            <span class="btn-inner">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>
                                            </span>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-danger" Onclick="deletesub_form(\''.$val->id.'\')">
                                            <span class="btn-inner">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>';
                                    // <button class="btn btn-sm btn-icon btn-success" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">
                                    //         <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    //             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    //         </svg>
                                    //     </button>
            $no++;
        }
        return \response()->json($data);
    }

    public function load_data()
    {
        $kategori = KategoriPPKS::orderby("sort","asc")->get();
        $no=0;
        foreach ($kategori as $val) {
            $data[$no]['No']        =($no+1);
            $data[$no]['Kategori']  =$val->kategori;
            $data[$no]['Aksi']      ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                        <button class="btn btn-sm btn-icon btn-info" Onclick="modalDetail(\''.$val->id.'\')">
                                            <span class="btn-inner">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z" fill="currentColor"></path></svg>
                                            </span>
                                        </button>
                                        
                                        <button class="btn btn-sm btn-icon btn-warning" Onclick="update_form(\''.$val->id.'\')">
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
                                    // <button class="btn btn-sm btn-icon btn-success">
                                    //         <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    //             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    //         </svg>
                                    //     </button>
            $no++;
        }
        return \response()->json($data);
    }
}
