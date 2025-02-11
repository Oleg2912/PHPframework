<?php

namespace App\Http\Controllers;

use Framework\Http\Response;

class HomeController
{

    public function index(): Response
    {
        return new Response('<h1>HELO!1321231231231</h1>');

    }

}