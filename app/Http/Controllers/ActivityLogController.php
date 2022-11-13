<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

/**
 * Class ActivityLogController
 * @package App\Http\Controllers
 */
class ActivityLogController extends Controller
{
    public static $pageTitle = 'Activity Log';
    // public static $pageDescription = 'Activity Log Description';
    // public static $modelName = 'App\Models\ActivityLog';
    public static $permissionName = 'activity-log';
    public static $folderPath = 'activity-log';
    public static $routePath = 'activity-logs';
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
            return Datatables::of(ActivityLog::query())->addIndexColumn()->make(true);
        }

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $permissionName = self::$permissionName;
        $routePath = self::$routePath;

        return view(self::$folderPath.'.index', compact('pageTitle', 'pageBreadcrumbs', 'permissionName', 'routePath'));
    }

    public function create()
    {
        $activityLog = new ActivityLog();

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/create',
            'title' => 'Create '.self::$pageTitle,
        ];
        $routePath = self::$routePath;
        
        return view(self::$folderPath.'.create', compact('activityLog', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function store(Request $request)
    {
        $req = $request->all();
        $activityLog = ActivityLog::create($req);

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' berhasil ditambahkan.');
    }

    public function show($id)
    {
        $activityLog = ActivityLog::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$id,
            'title' => 'Show '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.show', compact('activityLog', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function edit($id)
    {
        $activityLog = ActivityLog::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$id.'/edit',
            'title' => 'Update '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.edit', compact('activityLog', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function update(Request $request, $id)
    {
        $activityLog = ActivityLog::find($id);
        $req = $request->all();
        $activityLog->update($req);

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' berhasil terupdate');
    }

    public function destroy(Request $req, $id)
    {
        $activityLog = ActivityLog::find($id)->delete();

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
