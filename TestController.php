<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;
use GuzzleHttp\Client;


/**
* 
*/
class TestController extends Controller
{
	
	public function testRecuperation()
	{
		$client = ApiClientFactory::createApiClient();
		$historicalData = $client->getHistoricalData("AAPL", ApiClient::INTERVAL_1_DAY, new \DateTime("-10 days"), new \DateTime("today"));
		/* \Log::info($historicalData); */
		
       $srzed = serialize($historicalData);

		/* print_r($historicalData); */
		 $fh = fopen('quotesData.txt','a+');
		 fwrite($fh,$srzed);
		 fclose($fh);

		echo '<pre>';
			print_r($historicalData); // Sert à afficher de façon propre les propriétés d'un objet.
		echo '</pre>';
		 
	}



		/* print_r($historicalData); */
		 
	
	public function index()
    {
        return view('test');
    }
    
}




