<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

/**
 * Class AnnouncementController
 * @package App\Http\Controllers
 */
class AnnouncementController extends Controller
{
    public static $pageTitle = 'Announcement';
    // public static $pageDescription = 'Announcement Description';
    // public static $modelName = 'App\Models\Announcement';
    public static $permissionName = 'announcement';
    public static $folderPath = 'announcement';
    public static $routePath = 'announcements';
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
            return Datatables::of(Announcement::query())->addIndexColumn()->make(true);
        }

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $permissionName = self::$permissionName;
        $routePath = self::$routePath;

        return view(self::$folderPath.'.index', compact('pageTitle', 'pageBreadcrumbs', 'permissionName', 'routePath'));
    }

    public function create()
    {
        $announcement = new Announcement();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/create',
            'title' => 'Create '.self::$pageTitle,
        ];
        $routePath = self::$routePath;
        
        return view(self::$folderPath.'.create', compact('announcement', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function store(Request $request)
    {
        $req = $request->all();
        $req['created_by'] = Auth::user()->id;
        $req['updated_by'] = Auth::user()->id;

        $announcement = Announcement::create($req);

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' berhasil ditambahkan.');
    }

    public function show($id)
    {
        $announcement = Announcement::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$id,
            'title' => 'Show '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.show', compact('announcement', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function edit($id)
    {
        $announcement = Announcement::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$id.'/edit',
            'title' => 'Update '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.edit', compact('announcement', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::find($id);
        $req = $request->all();
        $req['updated_by'] = Auth::user()->id;
        
        $announcement->update($req);

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' berhasil terupdate');
    }

    public function destroy(Request $req, $id)
    {
        $announcement = Announcement::find($id)->delete();

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
