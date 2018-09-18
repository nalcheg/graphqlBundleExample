<?php

namespace App\Controller;

use App\Entity\Ticket;
use App\Entity\TicketComment;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
//        /** @var EntityManager $em */
//        $em = $this->getDoctrine()->getManager();
//
//        $ticketRepo = $em->getRepository(Ticket::class);
//        /** @var Ticket $firstTicket */
//        $firstTicket = $ticketRepo->find(1);
//
//        $newComment = new TicketComment();
//        $newComment->setUser($em->getReference(User::class, 1));
//        $newComment->setComment('First ticket, first comment.');
//
//        $firstTicket->addTicketComment($newComment);
//
//        $em->persist($firstTicket);
//
//        $newTicket = new Ticket();
//        $newTicket->setReason('aaaa');
//        $newTicket->setUser($em->getReference(User::class, 1));
//        $em->persist($newTicket);
//
//        $ticketsRepo = $em->getRepository(Ticket::class);
//        $tickets = $ticketsRepo->findAll();
//
//        dump($tickets);
//        $comments = $tickets[0]->getTicketCommentes()[0];
//        dump($comments);
//
//        $em->flush();

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
