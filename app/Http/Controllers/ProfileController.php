<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public static $pageTitle = 'Profile';
    // public static $pageDescription = 'User Description';
    // public static $modelName = 'App\Models\User';
    public static $permissionName = 'profile';
    public static $folderPath = 'profile';
    public static $routePath = 'profiles';
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

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $role = Role::where('id', $user->role_id)->pluck('name')->first();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$user->id,
            'title' => 'Show '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.index', compact('user', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'role'));
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

        $user = User::create($req);
        $user->assignRole($roleName);

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' created successfully.');
    }

    public function show($id)
    {
        $user = User::find($id);
        $role = Role::where('id', $user->role_id)->pluck('name')->first();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$id,
            'title' => 'Show '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.show', compact('user', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'role'));
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

    public function update(Request $request)
    {
        $req = $request->all();
        
        $user = User::find($req['id']);

        if ($request->file('avatar')) {
            $name = $request->file('avatar')->getClientOriginalName();
            $name = str_replace(' ', '-', $name);
            $fileName = rand().'_'.time().'_'.$name;  
            $request->avatar->move(public_path('uploads/profile'), $fileName);

            $req['profile_image'] = $fileName;
            $req['profile_dir'] = 'uploads/profile';
        }else{
            $req['profile_image'] = NULL;
            $req['profile_dir'] = NULL;
        }

        $user->update($req);

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' updated successfully');
    }

    public function destroy(Request $req, $id)
    {
        $user = User::find($id)->delete();

        if ($req->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => self::$pageTitle.' deleted successfully'
            ], 200);
        }

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' deleted successfully');
    }
}
