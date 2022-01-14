<?php

namespace App\Http\Controllers\Payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MPESAResponsesController extends Controller
{
    public function validation(Request $request){
        Log::info('Validation endpoint hit');
        Log::info($request);

    }

    public function confirmation(Request $request){
        Log::info('Validation endpoint hit');
        Log::info($request);

    }
}
