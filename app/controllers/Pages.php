<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'title' => 'Homepage',
            'summary' => 'Custom site built on my framework'
        ];

        $this->view('pages/index', $data);
    }
}
