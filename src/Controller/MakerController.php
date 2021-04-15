<?php

namespace App\Controller;

use App\Entity\Maker;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MakerController extends AbstractController
{
    /**
     * @Route("/api/ping", name="makers_ping", methods={"GET"})
     */
    public function pingMakers(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Maker::class);

        $count = $repository->createQueryBuilder('M')
            ->select('count(M.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return $this->json($count);
    }

    /**
     * @Route("/api/makers", name="makers_list")
     */
    public function listMakers(): Response
    {

        $em = $this->getDoctrine()->getRepository(Maker::class);

        // Bug: The date value was immutable, so the interval was not subtracted
        $date = new \DateTime();
        $date->sub(new \DateInterval('P3D'));
        $makers = $em->createQueryBuilder('M')
            ->where('M.createdAt > :date ')
            ->orderBy('M.createdAt', 'ASC')
            ->setParameter('date', $date)
            ->getQuery()->execute()
        ;

        return $this->render('maker/list.html.twig', [
            'makers' => $makers
        ]);
    }
}
