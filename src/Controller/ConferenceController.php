<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    #[Route('/{name}', name: 'homepage')]
    public function index(string $name = ""): Response
    {
        $greet = '';
        if($name){
            $greet = "Hello, " . htmlspecialchars($name);
        }

        return new Response(<<<EOF
            <html>
                <body>
                $greet
                    <img src="/images/under-construction-image.gif" >
                </body>
            </html>

EOF);
    }
}
