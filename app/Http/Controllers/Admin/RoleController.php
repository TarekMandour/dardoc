<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'asc')->get();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::select("*")
            ->orderBy('id', 'desc')->get()->groupBy('parent_name');

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        return redirect()->route('roles.index')->with('msg', 'تم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::select("*")
            ->orderBy('id', 'desc')->get()->groupBy('parent_name');
        $r_permissions[] = null;
        $role_permissions = DB::table('role_has_permissions')
            ->where('role_id', $id)
            ->get();
        foreach ($role_permissions as $key => $permission) {
            $r_permissions[] = $permission->permission_id;
        }
        // dd($r_permissions);
        return view('admin.roles.edit', compact('role', 'permissions', 'r_permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        if ($request->has('permissions')) {

            DB::delete("delete from role_has_permissions where role_id = ?", array($id));
            $role->syncPermissions($request->permissions);

            return redirect()->route('roles.index')->with('msg', 'تم بنجاح');
        }

        return back()->with('Failed', 'حدث خطأ ما');;
    }

    public function destroy(Request $request)
    {
         try {
            Role::findOrFail($request->id);
            Role::destroy($request->id);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'Failed']);
        }
        return response()->json(['msg' => 'Success']);
    }


}
