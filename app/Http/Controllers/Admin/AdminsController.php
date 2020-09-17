<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            // dd($data);
            if (Auth::guard('admin')->attempt([
                'email' => $data['email'],
                'password' => $data['password']
            ])) {
                return view('admin');
            } else {
                return view('admin.login');
            }
        }
        return view('admin.login');
    }
}
