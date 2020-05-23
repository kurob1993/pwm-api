<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class Maps extends Controller
{
    public function location($long, $lat)
    {
        $user = Auth::user();
        if ($user->id >= 1 && $user->id <= 1666) {
            $apiKey = 'pk.eyJ1Ijoia3Vyb2IiLCJhIjoiY2thZ3JyOW1lMDh2eDJ6bXRxMmY1M2I5ciJ9.NZiktTPERrR89-plvvF7oQ';
        }
        if ($user->id >= 1667 && $user->id <= 2666) {
            $apiKey = 'pk.eyJ1Ijoic3VtaXlhdGlhbm5ham11IiwiYSI6ImNrYWlxMGoydjAzdGUydnF6cDFuYjluaGYifQ.KUKld8HU4v3uQdPLE0XgtA';
        }
        if ($user->id >= 2667) {
            $apiKey = 'pk.eyJ1IjoidGltd2Via3MiLCJhIjoiY2thaXFtcnpzMDQ0cTJ3bnZwMDJrZmo0ciJ9.cY8hMbcguFl-sWdy8o8HWA';
        }

        // Create a client with a base URI
        $client = new Client(['base_uri' => 'https://api.mapbox.com/']);
        // Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'geocoding/v5/mapbox.places/'.$long.','.$lat.'.json?access_token='.$apiKey);
        $body = $response->getBody();

        $data = json_decode($body,true);
        return $data;
    }
}
