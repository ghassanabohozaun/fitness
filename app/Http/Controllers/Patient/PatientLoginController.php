<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\PatientLoginRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientLoginController extends Controller
{


    public function getLogin()
    {
        $title = __('login.login');
        return view('patient.auth.login', compact('title'));
    }

    /// do Login
    public function doLogin(PatientLoginRequest $request)
    {
        $patient = Patient::where('email', $request->email)->first();

        if (!$patient) {
            return redirect()
                ->route('get.patient.login')
                ->with(['error' => __('login.account_unavailable')]);
        } else {
            if ($patient->freeze == 'on') {
                return redirect()
                    ->route('get.patient.login')
                    ->with(['error' => __('login.account_disabled')]);
            } else {
                if (
                    auth()
                        ->guard('patient')
                        ->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])
                ) {
                    return redirect()->route('patient.dashboard');
                } else {
                    return redirect()
                        ->route('get.patient.login')
                        ->with(['error' => __('login.login_failed')]);
                } // end  auth else
            }
        } //end patient else
    }

    // logout
    public function logout()
    {
        auth()->guard('patient')->logout();
        return redirect()->route('get.patient.login');
    }

}
