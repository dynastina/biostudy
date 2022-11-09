<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Greeting;
use App\Mail\ForgotPassword;
use App\Mail\RequestAccount;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PagesController extends Controller
{
    public static $pageTitle = 'Pages';
    public static $pageDescription = 'Pages Description';
    public static $modelName = 'App\Models\Pdf';
    public static $folderPath = 'test';
    public static $permissionName = 'test';
    public static $pageBreadcrumbs = [
        [
            'page' => '/',
            'title' => 'Application',
        ],
        [
            'page' => 'test',
            'title' => 'Test',
        ]
    ];

    public function index()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }
        
        $pageTitle = 'Triadhipa Logistics - One Best Expedition Solution for your Business Need';

        return view('pages.login', compact('pageTitle'));
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {

            $user = Auth::user();

            if(empty($user['is_logged_in'])){
                
                Mail::to($user['email'])->send(new Greeting($user));
                
                User::where('id', $user['id'])->update([
                    'is_logged_in' => 1,
                    'last_logged_in' => date('Y-m-d H:i:s')
                ]);
            }

            // 2 means actively login
            User::where('id', $user['id'])->update([
                'is_logged_in' => 2,
                'last_logged_in' => date('Y-m-d H:i:s')
            ]);
            
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('failed', true);
        }
    }
    
    public function forgotPassword()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }
        
        $pageTitle = 'Triadhipa Logistics - Forgot Password';

        return view('pages.forgot-password', compact('pageTitle'));
    }
    
    public function forgotPasswordSend(Request $request)
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $req = $request->all();

        $req['username'] = User::where('email', $req['email'])->pluck('username')->first();
        $req['encrypted_email'] = Crypt::encryptString($req['email']);
        
        $validateEmail = User::where('email', $req['email'])->count();

        if($validateEmail > 0) {

            Mail::to($req['email'])->send(new ForgotPassword($req));
    
            return redirect()->route('login.email-verification', ['email' => $req['email']])
                ->with('success', $req['email']);

        }else{
            return redirect()->route('login.forgot-password')->with('failed', true);
        }

    }
    
    public function emailVerification(Request $request)
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $req = $request->all();
        
        $pageTitle = 'Triadhipa Logistics - Regist an Account';

        return view('verification.verify-email', compact('pageTitle', 'req'));
    }

    public function forgotPasswordResend(Request $request)
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $req = $request->all();

        $req['username'] = User::where('email', $req['email'])->pluck('username')->first();
        $req['encrypted_email'] = Crypt::encryptString($req['email']);
        
        $validateEmail = User::where('email', $req['email'])->count();

        if($validateEmail > 0) {

            Mail::to($req['email'])->send(new ForgotPassword($req));
    
            return redirect()->route('login.email-verification', ['email' => $req['email']]);

        }else{
            return redirect()->route('login')->with('failed', 'Email not found in our database. Please try again!.');
        }

    }
    
    public function forgotPasswordProcess(Request $request)
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $pageTitle = 'Triadhipa Logistics - Forgot Password';

        $req = $request->all();

        $user = User::where('username', $req['u']);
        if(!empty($user->first())){

            try {

                $encryptedEmail = Crypt::decryptString($req['e']);
                if($encryptedEmail == $user->first()['email']){
                    return view('pages.forgot-password-process', compact('pageTitle', 'req'));
                }

            } catch (DecryptException $e) {

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->with('failed', 'Forgot Password Failed');

            }
            
        }else{

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('failed', 'Forgot Password Failed');

        }

    }

    public function forgotPasswordUpdate(Request $request)
    {
        $req = $request->all();

        request()->validate(User::$forgotRules);

        $req['password'] = Hash::make($req['password']);

        $user = User::where('username', $req['username'])->update([
            'password' => $req['password']
        ]);

        return redirect()->route('login.password-verification', ['username' => $req['username']])->with('success', 'Password Successfully Updated!');
    }

    public function passwordVerification(Request $request)
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $req = $request->all();
        
        $pageTitle = 'Triadhipa Logistics - Forgot Password';

        return view('verification.verify-password', compact('pageTitle', 'req'));
    }

    public function regist()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }
        
        $pageTitle = 'Triadhipa Logistics - Regist an Account';

        return view('pages.regist', compact('pageTitle'));
    }

    public function registSend(Request $request)
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $req = $request->all();

        $req['username'] = User::where('email', $req['email'])->pluck('username')->first();
        
        $validateEmail = User::where('email', $req['email'])->count();

        if($validateEmail < 1) {

            $admin = User::with('roles')->whereHas('roles', function ($query){
                return $query->where('roles.id', '1');
            })->get();
            
            foreach($admin as $adm) {
                Mail::to($adm->email)->send(new RequestAccount($req));
            }

            return redirect()->route('login.request-account-verification', ['email' => $req['email']])
                ->with('success', $req['email']);

        }else{
            return redirect()->route('login.regist')->with('failed', true);
        }

    }

    public function accountVerification(Request $request)
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $req = $request->all();
        
        $pageTitle = 'Triadhipa Logistics - Forgot Password';

        return view('verification.verify-request-account', compact('pageTitle', 'req'));
    }

    public function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        User::where('id', $user['id'])->update([
            'is_logged_in' => 1,
        ]);

        return redirect()->route('login')->with('success', true);;
    }

    public function dashboard()
    {
        $userCount = User::count();
        $roleCount = Role::count();

        $pageTitle = 'Dashboard';

        return view('pages.dashboard', compact('userCount', 'roleCount', 'pageTitle'));
    }
}
