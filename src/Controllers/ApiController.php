<?php
namespace App\Controllers;

use App\Components\Controller;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function getData() {
        $client = new Client([
            'base_uri' => 'https://dummyjson.com',
        ]);
        $response = $client->request('GET', '/users');
        var_dump(json_decode((string )$response->getBody())->users[0]);
    }
}

