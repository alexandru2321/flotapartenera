<?php

namespace App\Controllers;

use \Core\View;

class Delivery extends \Core\Controller
{
    public function tazz()
    {
        View::renderTemplate('Delivery/tazz.html', [
            "public_url" => PUBLIC_URL,
            "active" => 'tazz',
        ]);
    }
    public function foodpanda()
    {
        View::renderTemplate('Delivery/foodpanda.html', [
            "public_url" => PUBLIC_URL,
            "active" => 'foodpanda',
        ]);
    }
    public function boltfood()
    {
        View::renderTemplate('Delivery/boltfood.html', [
            "public_url" => PUBLIC_URL,
            "active" => 'boltfood',
        ]);
    }
    public function glovo()
    {
        View::renderTemplate('Delivery/glovo.html', [
            "public_url" => PUBLIC_URL,
            "active" => 'glovo',
        ]);
    }
}
