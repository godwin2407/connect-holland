<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberController extends Controller
{
    public $primes;
    
    public function index(Request $request)
    {
        set_time_limit(100);
        
        $number = 10000; //(int) $request->get('number');
        
        if ($number > 1) {
            
            for ($i = 1; $i <= $number; $i++) {
                
                $countAnswers = 0;
                
                for ($j = 1; $j <= $i; $j++) {
                    
                    if ($i % $j === 0) {
                        $countAnswers++;
                        if ($countAnswers > 2) {
//                            echo $i . ' not a prime<br/>';
                            break;
                        }
                    }
                }
            
                if ($countAnswers == 2) {
//                    echo $i . ' is a prime number<br/>';
                    $this->primes[] = $i;
                }
            }
        }
        
        echo "<pre>" . print_r($this->primes, 1) . "</pre>";
        echo __METHOD__ . ': ' . __LINE__ . "</br>";
    }
}
