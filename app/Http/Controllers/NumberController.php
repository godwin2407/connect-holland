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
        $number = 1000; //(int) $request->get('number');
        
        $prime = new \App\Models\Number($number);
        $primes = $prime->getPrimes();

        foreach ($primes as $primeNumber) {
            $consecutives = $prime->getConsecutivePrimes($primeNumber);
            if ($consecutives) {
                echo "<pre>" . print_r($consecutives, 1) . "</pre>";
                echo __METHOD__ . ': ' . __LINE__ . "</br>";
            }
        }
        
//        return view('number.index', $data);
    }
}
