<?php

namespace App\Controllers;

use App\Framework\Attributes\Route;

class HomeController
{
    #[Route(route: '/', method: 'GET')]
    public function index(): void
    {
        echo 'Home page';
    }

    #[Route('/about', 'GET')]
    public function about(): void
    {
        echo '
        <form method="POST">
            <input name="test" type="text"/>
            <input type="submit"/>
        </form>
        ';
    }

    #[Route('/about', 'POST')]
    public function aboutPost(): void
    {
        echo $_POST['test'];
    }
}
