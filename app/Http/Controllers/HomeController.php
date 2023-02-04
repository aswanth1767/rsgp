<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        try {
            $questions = Questions::latest()->paginate(1);
            return view('home', compact('questions'));
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function form()
    {
        return view('form');
    }

    public function saveQuestion(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'question' => 'required',
                'technology' => 'required',
                'expertise' => 'required|numeric|gt:0|lt:6',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                Questions::create(['question' => $request->question, 'technology' => json_encode($request->technology), 'answer' => $request->answer, 'exp_level' => $request->expertise]);
                return redirect()->back()->with('success', 'Question Saved Successfully');
            }
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
}
