<?php

namespace App\Http\Controllers;

use Framework\Http\Response;

class PostController
{

    public function show(int $id): Response
    {
        return new Response("<h1>HELO!.$id</h1>");

    }

}