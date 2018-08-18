<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberController extends Controller
{
    public $primes;
    
    public function index(Request $request)
    {
        set_time_limit(100);
        $timeStart = microtime(true);
        $number = 1000; //(int) $request->get('number'); // This should be in a form
        $consecutives = [];
        
        $prime = new \App\Models\Number($number);
        $primes = $prime->getPrimes();

        foreach ($primes as $primeNumber) {
            $consecutive = $prime->getConsecutivePrimes($primeNumber);
            if ($consecutive) {
                $consecutives[] = $consecutive;
            }
        }
        
        $data = [
            'primes' => $primes,
            'consecutives' => $consecutives
        ];
        
        return view('number.index', $data);
    }
}
