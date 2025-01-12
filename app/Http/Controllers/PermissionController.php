<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
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
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'koordinator']);
        // Role::create(['name' => 'anggota']);
        // Role::create(['name' => 'kepala']);
        // Role::create(['name' => 'assessment']);
        $role = Role::all();
        // dd($role);
        return view('permission.index', compact('role'));
    }

    public function store(Request $request)
    {
        Role::create(['name' => $request->name]);
        return redirect()->route('permission');
    }
    public function edit($id)
    {
        $role = Role::find($id);
        return view('permission.edit', compact('role'));
    }
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        return redirect()->route('permission');
    }
    public function create()
    {
        return view('permission.create');
    }
    public function show($id)
    {
        $role = Role::find($id);
        return view('permission.show', compact('role'));
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('permission');
    }
}
