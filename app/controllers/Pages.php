<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = ['title' => 'homepage'];

        $this->view('pages/index', $data);
    }

    public function about()
    {
    }
}
