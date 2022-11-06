<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Expense;

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
        $categories=Category::all();
        $expenses=Expense::orderBy('created_at', 'desc')->simplePaginate(4);
        // dd($expenses);
        //sum
        $sum=DB::table('expenses')->sum('amount'); 

        // dd($sum);
        return view('home',compact('categories','expenses','sum'));
        
    }

   
}
