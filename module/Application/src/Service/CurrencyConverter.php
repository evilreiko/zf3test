<?php 
// Define a namespace where our custom service lives.
namespace Application\Service;

// Define a currency converter service class.
class CurrencyConverter 
{
    
    public function __construct()
    {
        
    }
    
    // Converts euros to US dollars.
    public function convertEURtoUSD($amount) 
    {
        return $amount*1.25;
    }
	
    //...
}