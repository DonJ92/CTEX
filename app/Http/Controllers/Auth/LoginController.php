<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->username = $this->findUsername();
    }

    public function findUsername()
    {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'login_id';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    protected function authenticated(Request $request, $user)
    {
        $user = Auth::user();

        $ip = $request->getClientIp();

        $device = config('constants.device.Unknown');
        if (Browser::isDesktop())
            $device = config('constants.device.Desktop');
        elseif (Browser::isMobile())
            $device = config('constants.device.Mobile');
        elseif (Browser::isTablet())
            $device = config('constants.device.Tablet');

        $platform = Browser::browserFamily();

        $position = Location::get();
        $region = $position->countryName . ' ' . $position->cityName;

        $res = LoginHistory::create([
            'user_id' => $user->id,
            'ip_addr' => $ip,
            'device' => $device,
            'platform' => $platform,
            'region' => $region,
            'accessed_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
