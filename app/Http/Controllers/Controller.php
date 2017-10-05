<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(){
      $client = new \GuzzleHttp\Client();
      $res = $client->request('GET', 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=Washington,DC&destinations=New+York+City,NY&key=<PUTKEYHERE>');
      //echo $res->getStatusCode();
      // 200
      //echo $res->getHeaderLine('content-type');
      // 'application/json; charset=utf8'
      return $res->getBody()->destination_addresses;
      // '{"id": 1420053, "name": "guzzle", ...}'

    }
}
