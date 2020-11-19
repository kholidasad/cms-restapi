<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NewsController extends Controller
{
    public function getData() {
        $client = new Client();
        $request = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=402c0210bc254410a2d779a33a69395a');
        $response = $request->getBody();
        $result = json_decode($response);
        
        return view('home', ['artikel'=>$result->articles]);
    }

    public function searchData(Request $request) {
        $client = new Client();
        $query = $request->keyword;
        $req = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=402c0210bc254410a2d779a33a69395a&q='.$query);
        $response = $req->getBody();

        $result = json_decode($response);
        return view('home', ['artikel'=>$result->articles]);
    }
}
