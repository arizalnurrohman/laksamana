<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $datamenu = Menu::whereNull('parent_id')->orderBy("sort","ASC")->get();
        foreach($datamenu as $key => $val){
            $val->child=Menu::where('parent_id',$val->id)->orderBy("sort","ASC")->count();
        }
        return view('menu.index', compact('datamenu'))->with('no', 1);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'menu' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'sort' => 'required|integer',
            'parent_id' => 'nullable|exists:menu,id',
        ]);
        // dd($request->menu);
        Menu::create([
            'id' => (string) Str::uuid(),
            'menu' => $request->menu,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'icon' => $request->icon,
            'url' => $request->url,
            'access' => $request->access,
            'sort' => $request->sort,
        ]);

        return response()->json(['success' => true, 'message' => 'Menu berhasil ditambahkan.']);
    }
}
