<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
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
    
}
