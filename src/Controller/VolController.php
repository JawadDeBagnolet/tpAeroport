<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Vol;
use App\Repository\VolRepository;

class VolController extends AbstractController
{
    /**
     * @Route("/vol", name="app_vol")
     */
    public function index(): Response
    {
        return $this->render('vol/index.html.twig', [
            'controller_name' => 'VolController',
            'message' => 'Bienvenue sur la gestion des vols !',
        ]);
    }

    /**
     * @Route("/vol/{id}", name="vol_detail")
     */
    public function detail(int $id): Response
    {
        return new Response("Détails du vol numéro : $id");
    }

    /**
     * @Route("/vol/ajout", name="ajouter_vol")
     */
    public function ajouterVol(EntityManagerInterface $entityManager): Response
    {
        $vol = new Vol();
        $vol->setDestination('Paris');
        $vol->setHeureDepart(new \DateTime('2024-07-01 10:00:00'));
        $vol->setHeureArrivee(new \DateTime('2024-07-01 12:00:00'));
        $vol->setPrix(150.00);

        $entityManager->persist($vol);
        $entityManager->flush();

        return new Response('Vol ajouté avec succès !');
    }

    /**
     * @Route("/vols", name="liste_vols")
     */
    public function listeVols(VolRepository $volRepository): Response
    {
        $vols = $volRepository->findAll();

        return $this->render('vol/liste.html.twig', ['vols' => $vols]);
    }

    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function adminDashboard(): Response
    {
        return new Response('<h1>Espace Admin</h1>');
    }

}
