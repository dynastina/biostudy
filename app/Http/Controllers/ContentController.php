<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ActivityLog;
use App\Models\ContentFile;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

/**
 * Class ContentController
 * @package App\Http\Controllers
 */
class ContentController extends Controller
{
    public static $pageTitle = 'Content';
    // public static $pageDescription = 'Content Description';
    // public static $modelName = 'App\Models\Content';
    public static $permissionName = 'content';
    public static $folderPath = 'content';
    public static $routePath = 'contents';
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
            return Datatables::of(Content::query())->addIndexColumn()->make(true);
            // return Datatables::of(Content::with('roles'))->addIndexColumn()->make(true);
        }

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $permissionName = self::$permissionName;
        $routePath = self::$routePath;

        return view(self::$folderPath.'.index', compact('pageTitle', 'pageBreadcrumbs', 'permissionName', 'routePath'));
    }

    public function create()
    {
        $content = new Content();
        $contentType = $this->contentType;
        $contentPage = $this->contentPage;

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/create',
            'title' => 'Create '.self::$pageTitle,
        ];
        $routePath = self::$routePath;
        
        return view(self::$folderPath.'.create', compact('content', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'contentType', 'contentPage'));
    }

    public function store(Request $request)
    {
        $req = $request->all();
        $req['created_by'] = Auth::user()->id;
        $req['updated_by'] = Auth::user()->id;


        if ($request->file('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $fileName = rand().'_'.time().'_'.$name;  
            $request->file->move(public_path('uploads/content'), $fileName);

            $req['file'] = $fileName;
            $req['file_dir'] = 'uploads/content';
        }
        $contentFile = [];
        if ($request->file('gallery') && count($request->file('gallery'))) {
            foreach ($request->file('gallery') as $key => $value) {
                $name = $request->file('gallery')[$key]->getClientOriginalName();
                $fileName = rand().'_'.time().'_'.$name;  
                $request->gallery[$key]->move(public_path('uploads/content_file'), $fileName);

                $contentFile[] = [
                    'file' => $fileName,
                    'file_dir' => 'uploads/content_file',
                ];
            }
        }
        
        // logs
        ActivityLog::create([
            'name' => Auth::user()->name . ' menambahkan ' . self::$pageTitle . ' baru dengan judul '. $req['title'],
            'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="currentColor"></path>
                <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="currentColor"></path>
            </svg>',
            'created_by' => Auth::user()->id
        ]);

        $content = Content::create($req);
        if (count($contentFile)) {
            $content->contentFiles()->createMany($contentFile);
        }

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' berhasil ditambahkan.');
    }

    public function show($id)
    {
        $content = Content::find($id);

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$id,
            'title' => 'Show '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.show', compact('content', 'pageTitle', 'pageBreadcrumbs', 'routePath'));
    }

    public function edit($id)
    {
        $content = Content::find($id);
        $contentType = $this->contentType;
        $contentPage = $this->contentPage;

        $pageTitle = self::$pageTitle;
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $pageBreadcrumbs[] = [
            'page' => '/application/'.self::$routePath.'/'.$id.'/edit',
            'title' => 'Update '.self::$pageTitle,
        ];
        $routePath = self::$routePath;

        return view(self::$folderPath.'.edit', compact('content', 'pageTitle', 'pageBreadcrumbs', 'routePath', 'contentType', 'contentPage'));
    }

    public function update(Request $request, $id)
    {
        $content = Content::find($id);
        $req['updated_by'] = Auth::user()->id;

        $req = $request->all();
        if ($request->file('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $fileName = rand().'_'.time().'_'.$name;  
            $request->file->move(public_path('uploads/content'), $fileName);

            $req['file'] = $fileName;
            $req['file_dir'] = 'uploads/content';
        }
        $contentFile = [];
        if ($request->file('gallery') && count($request->file('gallery'))) {
            foreach ($request->file('gallery') as $key => $value) {
                $name = $request->file('gallery')[$key]->getClientOriginalName();
                $fileName = rand().'_'.time().'_'.$name;  
                $request->gallery[$key]->move(public_path('uploads/content_file'), $fileName);

                $contentFile[] = [
                    'file' => $fileName,
                    'file_dir' => 'uploads/content_file',
                ];
            }
        }

        // logs
        ActivityLog::create([
            'name' => Auth::user()->name . ' mengubah ' . self::$pageTitle . ' dengan judul '. $req['title'],
            'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                    </svg>',
            'created_by' => Auth::user()->id
        ]);

        $content->update($req);
        if (count($contentFile)) {
            $content->contentFiles()->createMany($contentFile);
        }

        return redirect()->route(self::$routePath.'.index')
            ->with('success', self::$pageTitle.' berhasil terupdate');
    }

    public function destroy(Request $req, $id)
    {
        $content = Content::find($id);

        // logs
        ActivityLog::create([
            'name' => Auth::user()->name . ' menghapus ' . self::$pageTitle . ' dengan judul '. $content['title'],
            'icon' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z" fill="currentColor"></path>
                            <path opacity="0.3" d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z" fill="currentColor"></path>
                        </svg>',
            'created_by' => Auth::user()->id
        ]);
        
        $content->delete();

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

    public function destroyContentFile(Request $req, $id)
    {
        $content = ContentFile::find($id)->delete();

        if ($req->ajax()) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'File berhasil di hapus'
            ], 200);
        }

        return redirect()->route(self::$routePath.'.index')
            ->with('success', 'File berhasil di hapus');
    }
}
