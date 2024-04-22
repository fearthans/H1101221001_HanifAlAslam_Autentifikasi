<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function adminHome(): View
    {
        return view('admin.home');
    }
    public function superAdminHome(): View
    {
        return view('superadmin.home');
    }
    public function Dosen(): View
    {
        return view('dosen.home');
    }
    public function Mahasiswa(): View
    {
        return view('mahasiswa.home');
    }
    public function Tendik(): View
    {
        return view('tendik.home');
    }
    public function adminAkademik(): View
    {
        return view('akademik.home');
    }
    public function adminKeuangan(): View
    {
        return view('keuangan.home');
    }
    public function Direktur(): View
    {
        return view('direktur.home');
    }
    public function wakilDirektur1(): View
    {
        return view('wd1.home');
    }
    public function wakilDirektur2(): View
    {
        return view('wd2.home');
    }
    public function wakilDirektur3(): View
    {
        return view('wd3.home');
    }
    public function adminLPPM(): View
    {
        return view('lppm.home');
    }
    public function adminSDM(): View
    {
        return view('sdm.home');
    }
}
