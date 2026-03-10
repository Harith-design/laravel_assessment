<?php

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/companies', function (Request $request) {

    $token = $request->bearerToken(); // get token from header

    if ($token !== 'COMPANY_SECRET_API_TOKEN') {
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    $company_name = $request->input('company');
    $company = Companies::where('name', $company_name)->first();

    if($company){

        return response()->json([
            'Company Detail' => $company,
            
            'employee_count' => $company->employees->count(),

        ]);

    }else{
        return response()->json('Not Found');
    }




    // return Companies::where('name', $company_name)->first();
})->name('api.company');
