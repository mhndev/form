<?php
/**
 * Created by PhpStorm.
 * User: majid
 * Date: 4/3/16
 * Time: 5:26 PM
 */

class Url
{

    protected $routes;

    public function __construct(array $data)
    {
        $this->routes = $data;
    }

    function redirect($route)
    {
        if(strpos($route, 'http') || strpos($route, 'www')){
            header('Location '.$route);
        }else{
            header('Location '.$this->getUrl($route));
        }

        die();
    }


    function getUrl($route)
    {
        $protocol = !empty($_SERVER['HTTPS']) ? 'https' : 'http';
        return $protocol.'://'.$_SERVER['HTTP_HOST'].':'.$_SERVER['REMOTE_PORT'].'/'.$this->routes[$route];
    }

}



//injuri class ro besaz
/**
 *
 * $router = new Url(include 'routes.php');
 *
 */
