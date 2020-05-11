<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;

class RequestMarketController extends Controller
{
    protected $currency;

    public function __construct(Currency $currency){
        $this->currency = $currency;
    }

    public function index(){

        $endpoint = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest";
        
        $params = [
            'query' => [
                'start' => '1', 
                'limit' => '5000',
                'convert' => 'USD'
            ],
            'headers' => [
                'X-CMC_PRO_API_KEY' => '770a0af8-ff6d-4c92-8e23-1e178dfa082f'
                
            ]
        ];

        $content = $this->currency->request('GET',$endpoint,$params);

        return view('welcome',compact('content',$content));

    }

    public function fetchLogos(Request $request){
        
        $id = $request->id;

        $endpoint = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/info";
        
        $params = [
            'query' => [
                'id' => $id, 
            ],
            'headers' => [
                'X-CMC_PRO_API_KEY' => '770a0af8-ff6d-4c92-8e23-1e178dfa082f'
                
            ]
        ];
            
        $content = $this->currency->request('GET',$endpoint,$params);

        return $content[$id];
    }

    public function displayLogos() {
        return 31;
    }
}
