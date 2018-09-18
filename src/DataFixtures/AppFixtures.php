<?php

namespace App\DataFixtures;

use App\Entity\Ticket;
use App\Entity\TicketComment;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $adminUser = new User();
        $adminUser->setLogin('admin');
        $adminUser->setName('adminName');
        $adminUser->setPassword('1234');
        $manager->persist($adminUser);

        $firstTicket = new Ticket();
        $firstTicket->setUser($adminUser);
        $firstTicket->setReason('First Ticket Reason');
        $manager->persist($firstTicket);

        $secondTicket = new Ticket();
        $secondTicket->setUser($adminUser);
        $secondTicket->setReason('Second Ticket Reason');
        $manager->persist($secondTicket);

        $newComment = new TicketComment();
        $newComment->setUser($adminUser);
        $newComment->setTicket($firstTicket);
        $newComment->setComment('First ticket, first comment.');
        $manager->persist($newComment);

        $newComment = new TicketComment();
        $newComment->setUser($adminUser);
        $newComment->setTicket($firstTicket);
        $newComment->setComment('First ticket, second comment.');
        $manager->persist($newComment);

        $newComment = new TicketComment();
        $newComment->setUser($adminUser);
        $newComment->setTicket($secondTicket);
        $newComment->setComment('Second ticket, first comment.');
        $manager->persist($newComment);

        $newComment = new TicketComment();
        $newComment->setUser($adminUser);
        $newComment->setTicket($secondTicket);
        $newComment->setComment('Second ticket, second comment.');
        $manager->persist($newComment);

        $manager->flush();
    }
}
