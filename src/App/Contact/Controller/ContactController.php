<?php

namespace App\Contact\Controller;

use App\Contact\Model\Contact;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ContactController
{
    public $model;

    public function __construct()
    {
        // $this->model = new Contact();
    }

    public function index(Request $request)
    {

        return render_template('public/contact/index', []);
    }

    public function create(Request $request)
    {

        return render_template('public/contact/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/contact');
    }

    public function edit(Request $request)
    {


        return render_template('public/contact/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/contact');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/contact');
    }
}
