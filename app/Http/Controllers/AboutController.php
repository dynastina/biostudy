<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Content;
use App\Models\ActivityLog;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{

    // public static $pageTitle = 'About';
    // public static $pageDescription = 'about Description';
    // public static $modelName = 'App\Models\about';
    public static $permissionName = 'about';
    public static $folderPath = 'about';
    public static $routePath = 'about';
    public static $pageBreadcrumbs = [];

    public function faq(Request $request)
    {
        $pageTitle = 'FAQ';
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $permissionName = self::$permissionName;
        $routePath = self::$routePath;
        
        $faq = Content::where('page', 'faq')->where('content_type', 'about')->first();
        
        return view(self::$folderPath.'.faq', compact('pageTitle', 'pageBreadcrumbs', 'permissionName', 'routePath', 'faq'));
    }
    
    public function team(Request $request)
    {
        $pageTitle = 'Team';
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $permissionName = self::$permissionName;
        $routePath = self::$routePath;

        $team = Content::where('page', 'team')->where('content_type', 'about')->first();

        $users = User::where('is_active', 1)->orderBy('name', 'asc')->get();
        
        return view(self::$folderPath.'.team', compact('pageTitle', 'pageBreadcrumbs', 'permissionName', 'routePath', 'users', 'team'));
    }
    
    public function company(Request $request)
    {
        $pageTitle = 'Perusahaan';
        $pageBreadcrumbs = self::$pageBreadcrumbs;
        $permissionName = self::$permissionName;
        $routePath = self::$routePath;

        $company = Content::where('page', 'company')->where('content_type', 'about')->first();
        $vision = Content::where('page', 'company')->where('content_type', 'vision')->first();
        
        return view(self::$folderPath.'.company', compact('pageTitle', 'pageBreadcrumbs', 'permissionName', 'routePath', 'company', 'vision'));
    }
    
}
