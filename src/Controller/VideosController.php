<?php

namespace App\Controller;

use App\Entity\Video;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\VideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VideosController extends AbstractController
{
    #[Route('/videos', name: 'app_video')]
    public function index(
        EntityManagerInterface $entityManager,
        VideoRepository $VideoRepository)    {

        $listeVideo = $VideoRepository->findAll();

        return $this->render('videos/index.html.twig', [
            'listeVideo' => $listeVideo,
        ]);
    }
}
