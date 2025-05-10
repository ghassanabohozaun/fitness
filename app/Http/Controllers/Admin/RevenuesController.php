<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Revenue;
use Illuminate\Http\Request;

class RevenuesController extends Controller
{
    //index
    public function index(){
        $title = __('menu.revenues');
        $revenues = Revenue::with('student')
        ->orderByDesc('created_at')
        ->paginate(15);
        return view("admin.home.revenues" , compact('title' , 'revenues'));
    }
}
