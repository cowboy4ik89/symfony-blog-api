<?php

namespace BlogBundle\Controller\Api\v1;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserProfileController extends Controller
{
    public function getAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function getAll()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function getAllSince()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function create(Request $request)
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }

    public function update(Request $request)
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }
}
