<?php

namespace App\Controller;

use App\Entity\Chaine;
use App\Form\ChaineType;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ChaineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChaineController extends AbstractController
{

    #[Route('/chaine/id', name: 'chaineid')]
    public function chaineid( EntityManagerInterface $entityManager,
    ChaineRepository $ChaineRepository)    {

    $listeChaineVideo = $ChaineRepository->findBy($where, $order, $limit, $offset);

    return $this->render('chaine/id.html.twig', [
        'listeChaineVideo' => $listeChaineVideo,
    ]);
    }

    #[Route('/chaine/ajouter', name: 'ajouter')]
    public function ajouter(Request $request, EntityManagerInterface $entityManager): Response
    {
        $Chaine = new Chaine();
        $form = $this->createForm(ChaineType::class, $Chaine);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($Chaine);
            $entityManager->flush();

            return $this->redirectToRoute('app_accueil');
        }
    
        return $this->render('chaine/ajouter.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/chaine/editer/{id}', name: 'editer')]
    public function editer(Request $request, EntityManagerInterface $entityManager, ChaineRepository $ChaineRepository, $id): Response
    {

    $chaine = $ChaineRepository->find($id);

    $form = $this->createForm(ChaineType::class, $chaine);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
       
        $entityManager->flush();

        return $this->redirectToRoute('app_accueil');
    }

    return $this->render('chaine/editer.html.twig', [
        'form' => $form->createView(),
    ]);
    }

}
