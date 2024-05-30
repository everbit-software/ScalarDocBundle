<?php

namespace Everbit\Bundle\ScalarDocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class DocumentationController extends AbstractController
{
    #[Route('/docs/modern', name: 'api_docs')]
    public function docs()
    {
        return $this->render('docs.html.twig');
    }
}
