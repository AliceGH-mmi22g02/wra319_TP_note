<?php

namespace App\Controller;

use App\Entity\Chaine;
use App\Repository\ChaineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(
        EntityManagerInterface $entityManager,
        ChaineRepository $ChaineRepository)    {

        $listeChaine = $ChaineRepository->findAll();

        return $this->render('accueil/index.html.twig', [
            'listeChaine' => $listeChaine,
        ]);
    }
}
