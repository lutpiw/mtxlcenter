<?php

namespace App\Http\Controllers;

use App\Models\ZiswafProgram;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $frontService;

    // public function __construct(FrontService $frontService)
    // {
    //     @$this->frontService = $frontService;
    // }

    public function program(ZiswafProgram $program) {
        return view('front.program', compact('program'));
    }
}
