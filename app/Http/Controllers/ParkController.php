<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParkController extends Controller
{
    public function index() {
        return view('user.park');
    }

    public function validateEnterPark(Request $request) {
        $validate = $request->validate([
            'policyNumber' => ['required'],
        ]);

        if (!$validate) {
            return view('user.home')->with('error', 'policy number is required');
        }

        $policyNumber = $request->policyNumber;
        
        $validatedPolicyNumber = self::validatePolicyNumber($policyNumber);
        if (!$validatedPolicyNumber) {
            return view('user.home')->with('error', 'invalid policy number');
        }
        
    }

    public function validatePolicyNumber($policyNumber) {
        $pattern = '/^[A-Z]{1,2}-[0-9]{1,4}-[A-Z]{1,3}$/';
        $match = preg_match($pattern, $policyNumber);
        return $match;
    }

    public function enterPark(Request $request) {
        self::validateEnterPark($request);
        $policyNumber = $request->policyNumber;
        $timestampNow = date('Y-m-d H:i:s');
    }


}
