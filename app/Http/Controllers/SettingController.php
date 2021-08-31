<?php

namespace App\Http\Controllers;


use App\Models\Data;
use App\Models\Identity;
use App\Models\LoginHistory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gender_list = config('constants.gender_list');
        $data['gender_list'] = $gender_list;

        $country_response = Http::get('https://restcountries.eu/rest/v2/all');
        $country_list = $country_response->json();
        $data['country_list'] = $country_list;

        $language_list = config('constants.language_list');
        $data['language_list'] = $language_list;

        return view('setting', $data);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'],
            'name' => ['required', 'string', 'max:128'],
            'birthday' => ['nullable', 'date'],
            'mobile' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:64'],
            'lang' => ['required', 'string', 'max:4'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:16'],
        ], [
        ], [
            'avatar' => trans('setting.avatar'),
            'name' => trans('setting.name'),
            'birthday' => trans('setting.birthday'),
            'mobile' => trans('setting.mobile'),
            'country' => trans('setting.country'),
            'lang' => trans('setting.lang'),
            'address' => trans('setting.address'),
            'postal_code' => trans('setting.postal_code'),
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $user = Auth::user();
        try {
            $user->name = $data['name'];
            $user->birthday= $data['birthday'];
            $user->mobile= $data['mobile'];
            $user->country= $data['country'];
            $user->lang= $data['lang'];
            $user->address= $data['address'];
            $user->postal_code= $data['postal_code'];
            $user->save();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['failed' => trans('setting.profile_failed_msg')]);
        }

        return redirect()->route('setting')->with('success', trans('setting.profile_success_msg'));
    }

    /**
     * id verify
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function idVerify(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'id_doc' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
        ], [
            'id_doc' => trans('setting.id_doc'),
        ]);

        $fileName = $user->login_id.'.'.$request->id_doc->extension();

        $request->id_doc->move(public_path('uploads/kyc'), $fileName);
        $photo_url = url('uploads/kyc') . '/' . $fileName;

        try {
            $id_info = Identity::where('user_id', $user->id)->first();
            if (is_null($id_info))
                $res = Identity::insert([
                    'user_id' => $user->id,
                    'photo_url' => $photo_url,
                ]);
            else {
                $id_info->photo_url = $photo_url;
                $id_info->save();
            }

            $user->kyc_status = config('constants.kyc_status.review');
            $user->save();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['failed' => trans('setting.id_failed_msg'), 'id_failed' => trans('setting.id_failed_msg')]);
        }

        return redirect()->route('setting')->with('success', trans('setting.id_success_msg'))->with('id_success', trans('setting.id_success_msg'));
    }

    /**
     * update password
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ], [
        ], [
            'current_password' => trans('setting.current_pwd'),
            'password' => trans('setting.new_pwd'),
            'password_confirmation' => trans('setting.new_pwd_confirm'),
        ]);

        $user = Auth::user();

        if (!Hash::check($data['current_password'], $user->password))
        {
            $validator->errors()->add('current_password', trans('setting.current_pwd_wrong'));
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        try {
            $user->password = Hash::make($data['password']);
            $user->save();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['failed' => trans('setting.pwd_failed_msg'), 'pwd_failed' => trans('setting.pwd_failed_msg')]);
        }

        return redirect()->route('setting')->with('success', trans('setting.pwd_success_msg'))->with('pwd_success', trans('setting.pwd_success_msg'));
    }

    /**
     * get data list
     *
     * @param Request $request
     */
    public function getDataList(Request $request)
    {
        $data_list = array();
        try {
            $data_list = Data::leftjoin('ct_datas_files', 'ct_datas_files.data_id', '=', 'ct_datas.id')
                ->where('ct_datas.status', config('constants.data_status.valid'))
                ->select('ct_datas.*', 'ct_datas_files.url', 'ct_datas_files.file_name')
                ->orderby('ct_datas.updated_at', 'desc')
                ->get()->toArray();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            echo json_encode($data_list);
            exit;
        }

        echo json_encode($data_list);
    }

    /**
     * get login history
     *
     * @param Request $request
     */
    public function getLoginHistory(Request $request)
    {
        $user = Auth::user();

        $login_history = array();
        try {
            $login_history = LoginHistory::where('user_id', $user->id)
                ->get()->toArray();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            echo json_encode($login_history);
            exit;
        }

        echo json_encode($login_history);
    }
    /**
     * update language setting
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function language(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'lang' => 'required',
        ], [
        ], [
            'lang' => trans('setting.language'),
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $user = Auth::user();

        $user->lang = $data['lang'];
        try {
            $user->save();
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['failed' => trans('setting.lang_failed_msg'), 'language' => trans('setting.lang_failed_msg')]);
        }

        return redirect()->route('setting')->with('success', trans('setting.lang_success_msg'))->with('language', trans('setting.lang_success_msg'));
    }
}