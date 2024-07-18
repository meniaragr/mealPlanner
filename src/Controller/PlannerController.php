<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class PlannerController extends AbstractController
{
    #[Route('/profile/planner', name: 'app_planner')]
    public function index(): Response
    {
        $this->denyAccessIfBlocked();

        return $this->render('planner/index.html.twig', [
            'controller_name' => 'PlannerController',
        ]);
    }
    private function denyAccessIfBlocked(): void
    {
        if ($this->isGranted('ROLE_BLOCK')) {
            throw new AccessDeniedException('Access denied. Your account is blocked.');
        }
    }
}
