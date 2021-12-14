<?php

namespace App\Search\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class SearchController
{
    public $model;

    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        $url = $request->getPathInfo();
        $search = $request->query->get('search');
        dd($request, $url, $search);
        
    }

    public function create(Request $request)
    {

        return render_template('home/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function edit(Request $request)
    {


        return render_template('home/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }
}
