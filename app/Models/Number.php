<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    private $primes;
    
    private $number;
    
    public function __construct($number, array $attributes = array())
    {
        parent::__construct($attributes);
        
        $this->number = $number > 1 ? (int) $number : 1;
        $this->primes = [];
    }
    
    /**
     * Finding prime should meet two conditions
     * - It is divisible by 1 
     * - It is divisible only by itself
     */
    public function getPrimes()
    {
        if ($this->number > 1) {
            
            // Looping through every number 
            for ($i = 1; $i <= $this->number; $i++) {
                
                $countAnswers = 0;
                
                // Loop through numbers till current number
                for ($j = 1; $j <= $i; $j++) {
                    
                    // Divisible number
                    if ($i % $j === 0) {
                        $countAnswers++;
                        // number is divisible more than two number, not a prime
                        if ($countAnswers > 2) {
                            break;
                        }
                    }
                }
            
                // Prime number found, conditions met
                if ($countAnswers == 2) {
                    $this->primes[] = $i;
                }
            }
        }
        
        return $this->primes;
    }
    
    public function getConsecutivePrimes($answerNumber)
    {
        $answerNumber = (int) $answerNumber;
        if ($answerNumber > $this->number) {
            throw new Exception('answer must be lower than number');
        }
        if (empty($this->primes)) {
            $this->getPrimes();
        }
        
        $addUp = 0;
        $addUpText = [];
        
        // For every prime number to add up for the answer
        foreach ($this->primes as $prime) {
            $addUp += $prime;
            $addUpText[] = $prime;
            
            // The consecutive numbers add up which have an exact number to answer
            // Also stop adding numbers if the add ups is greater than the answer
            if ($addUp === $answerNumber) {
                
                $addUpText = $answerNumber . ' = ' . implode(' + ', $addUpText);
                return $addUpText;
                
            } elseif ($addUp > $answerNumber) {
                $addUpText = $answerNumber . ' = ' . implode(' + ', $addUpText);
//                echo "<pre>" . print_r($addUpText, 1) . "</pre>";
//                echo __METHOD__ . ': ' . __LINE__ . "</br>";
                break;
            }
        }
    }
}
