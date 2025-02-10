<?php

namespace Framework\Http;

class Kernel
{
    public function handle(Request $request): Response
    {
        return new Response("<h1>HELO!1</h1>");
    }
}