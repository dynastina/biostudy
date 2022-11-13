<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function logActivity(Request $request)
    {
        try {

            $data = ActivityLog::orderBy('id', 'desc')->get()->take(15)->toArray();
            foreach ($data as $key => $dt){
                $data[$key]['user'] = User::find($dt['created_by'])->toArray();
            }
            
            return $data;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
    
    public function announcement(Request $request)
    {
        try {

            $req = $request->all();

            $status = AnnouncementStatus::where('user_id', $req['id'])->where('status', 0)->update([
                'status' => 1
            ]);

            $data = Announcement::orderBy('id', 'asc')->get()->toArray();
            foreach ($data as $key => $dt){
                $data[$key]['user'] = User::find($dt['created_by'])->toArray();
            }
            
            return $data;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
    
    public function announcementStatus(Request $request)
    {
        try {

            $req = $request->all();

            $status = AnnouncementStatus::where('user_id', $req['id'])->where('status', 0)->count();
            
            return $status;
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
    
}
