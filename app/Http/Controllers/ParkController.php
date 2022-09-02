<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

use App\Models\Park;

class ParkController extends Controller
{
    public function index() {
        return view('user.park');
    }

    public function validateEnterPark(Request $request) {
        $error = null;
        $required = $request->validate([
                'policyNumber' => ['required'],
            ]);
        if (!$required) {
            $error = 'policy number is requried';
        }

        $policyNumber = $request->policyNumber;    
        $validatedPolicyNumber = self::validatePolicyNumber($policyNumber);    
        if (!$validatedPolicyNumber) {
            $error = 'policy number is invalid';
        }

        if ($error) {
            return $error;
        }
    }

    public function validatePolicyNumber($policyNumber) {
        $pattern = '/[A-Z]{1,2}-[0-9]{1,4}-[A-Z]{1,3}/';
        $match = preg_match($pattern, $policyNumber);
        return $match;
    }

    public function enterPark(Request $request, Faker $faker) {
        $validate = self::validateEnterPark($request);
        if ($validate) {
           return back()->with('error', $validate);
        }
        
        $userId = Auth::user()->id;
        $policyNumber = $request->policyNumber;
        $timeNow = date('Y-m-d H:i:s');

        $parkCode = $faker->uuid();

        $park = Park::create([
            'park_code' => $parkCode,
            'user_id' => $userId,
            'policy_number' => $policyNumber,
            'enter_time'=> $timeNow,
        ]);

        $parkHistory = $park->histories()->create([
            'park_id' => $park->id,
            'time' => $timeNow,
            'status' => 'ENTER'
        ]); 

        return redirect()->route('user.home');
    }
}
