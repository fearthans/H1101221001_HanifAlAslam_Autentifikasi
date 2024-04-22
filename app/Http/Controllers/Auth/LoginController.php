<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (
            auth()->attempt(
                array(
                    'email' => $input['email'],
                    'password' => $input['password']
                )
            )
        ) {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.home');
            } else if (auth()->user()->type == 'akademik') {
                return redirect()->route('akademik.home');
            } else if (auth()->user()->type == 'direktur') {
                return redirect()->route('direktur.home');
            } else if (auth()->user()->type == 'dosen') {
              return redirect()->route('dosen.home');
            } else if (auth()->user()->type == 'keuangan') {
              return redirect()->route('keuangan.home');
            } else if (auth()->user()->type == 'lppm') {
              return redirect()->route('lppm.home');
            } else if (auth()->user()->type == 'lppm') {
              return redirect()->route('lppm.home');
            } else if (auth()->user()->type == 'mahasiswa') {
              return redirect()->route('mahasiswa.home');
            } else if (auth()->user()->type == 'sdm') {
              return redirect()->route('sdm.home');
            } else if (auth()->user()->type == 'superadmin') {
              return redirect()->route('superadmin.home');
            } else if (auth()->user()->type == 'tendik') {
              return redirect()->route('tendik.home');
            } else if (auth()->user()->type == 'wd1') {
              return redirect()->route('wd1.home');
            } else if (auth()->user()->type == 'wd2') {
              return redirect()->route('wd2.home');
            } else if (auth()->user()->type == 'wd3') {
              return redirect()->route('wd3.home');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
}
