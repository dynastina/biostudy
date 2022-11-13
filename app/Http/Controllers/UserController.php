<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public static $pageTitle = 'User';
    // public static $pageDescription = 'User Description';
    // public static $modelName = 'App\Models\User';
    public static $permissionName = 'user';
    public static $folderPath = 'user';
    public static $routePath = 'users';
    public static $pageBreadcrumbs = [];

    function __construct()
    {
        $this->middleware('permission:'.self::$permissionName.'-list', ['only' => ['index']]);
        $this->middleware('permission:'.self::$permissionName.'-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:'.self::$permissionName.'-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:'.self::$permissionName.'-delete', ['only' => ['destroy']]);
        $this->middleware('permission:'.self::$permissionName.'-show', ['only' => ['show']]);

        self::$pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath,
            'title' => 'List '.self::$pageTitle,
        ];
    }

    public function index(Request $req)
    {
        if ($req->ajax()) {
            return Datatables::of(User::with('roles'))->addIndexColumn()->make(true);
        }

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $permissionName = self::$permissionName;
        $routePath = self::$routePath;

        return view(self::$folderPath.'.index', compact('pageTitle', 'pageBreadcrumbs', 'permissionName', 'routePath'));
    }

    public function create()
    {
        $user = new User();
        $roles = Role::pluck('name', 'id')->all();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/create',
            'title' => 'Create '.self::$pageTitle,
        ];
        $routePath = self::$routePath;
        
        return view(self::$folderPath.'.create', compact('user', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'roles'));
    }

    public function store(Request $request)
    {
        request()->validate(User::$rules);
        $req = $request->all();
        $req['password'] = Hash::make($req['password']);

        $roleName = Role::where('id', $req['roles'])->pluck('name', 'id')->first();
        $req['role_id'] = $req['roles'];
        $req['is_logged_in'] = null;
        $req['is_active'] = 1;
        $req['logged_in_attempt'] = 0;

        $user = User::create($req);
        $user->assignRole($roleName);

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' berhasil di tambahkan.');
    }

    public function show($id, Request $req)
    {
        
        $user = User::find($id);
        $role = Role::where('id', $user->role_id)->pluck('name')->first();
        
        if ($req->ajax()) {
            return Datatables::of(ActivityLog::where('created_by', $user->id)->get())->addIndexColumn()->make(true);
        }

        // completion profile
        $completion = 0;

        if(!empty($user->name)){
            $completion += 1;
        }
        if(!empty($user->email)){
            $completion += 1;
        }
        if(!empty($user->email_verified_at)){
            $completion += 1;
        }
        if(!empty($user->password)){
            $completion += 1;
        }
        if(!empty($user->password_hint)){
            $completion += 1;
        }
        if(!empty($user->position)){
            $completion += 1;
        }
        if(!empty($user->address)){
            $completion += 1;
        }
        if(!empty($user->phone)){
            $completion += 1;
        }
        if(!empty($user->religion)){
            $completion += 1;
        }
        if(!empty($user->gender)){
            $completion += 1;
        }
        if(!empty($user->education)){
            $completion += 1;
        }
        if(!empty($user->marital_status)){
            $completion += 1;
        }
        if(!empty($user->profile_image)){
            $completion += 1;
        }
        if(!empty($user->birth_date)){
            $completion += 1;
        }

        $completion = ceil($completion/14 *100);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$user->id,
            'title' => 'Show '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.show', compact('user', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'role', 'completion', 'id'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$id.'/edit',
            'title' => 'Update '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.edit', compact('user', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'roles', 'userRole'));
    }

    public function update(Request $request, User $user)
    {
        $req = $request->all();
        if (!empty($req['password'])) {
            $req['password'] = Hash::make($req['password']);
        } else {
            unset($req['password']);
        }
        $user->update($req);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($req['roles']);

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' berhasil di update');
    }

    public function destroy(Request $req, $id)
    {
        $user = User::find($id)->delete();

        if ($req->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => self::$pageTitle.' berhasil di hapus'
            ], 200);
        }

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' berhasil di hapus');
    }
}
