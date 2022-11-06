<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class CalculationController extends Controller
{
    public function index(){
    $categories=Category::all();
    $expenses=Expense::orderBy('created_at', 'desc')->simplePaginate(4);
    // dd($expenses);
    //sum
    $sum=DB::table('expenses')->sum('amount'); 

    // dd($sum);
    return view('calculation',compact('categories','expenses','sum'));
    }
}
