<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InterviewController extends Controller
{

    public function index()
    {
            return view('welcome');
    }


    public function getQuestion(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'technology' => 'required',
                'expertise' => 'required|numeric|gt:0|lt:6',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $question = Questions::select('question')
                ->where('exp_level',$request->expertise)
                ->whereJsonContains('technology',$request->technology )->first();
                return view('interview', compact('question'));
            }
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
}
