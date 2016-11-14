<?php
/**
 * Created by PhpStorm.
 * User: Tim'sMac
 * Date: 11/13/2016
 * Time: 10:03 PM
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction(){
        return $this->render('main/homepage.html.twig');
    }

}