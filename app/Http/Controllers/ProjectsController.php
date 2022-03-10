<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function getProjectsJson()
    {
        $client = new Client();
        $response = $client->get('http://f5d8-203-212-25-22.ngrok.io/projects/getProjectsJson');
        return new JsonResponse($response->getBody());
    }


    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
