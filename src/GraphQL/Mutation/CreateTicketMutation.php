<?php

namespace App\GraphQL\Mutation;

use App\Entity\Ticket;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class CreateTicketMutation implements MutationInterface, AliasedInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param int    $userId
     * @param string $reason
     * @return Ticket
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function createTicket(int $userId, string $reason): Ticket
    {
        $newTicket = new Ticket();
        $newTicket->setReason($reason);
        $newTicket->setUser($this->em->getReference(User::class, $userId));
        $this->em->persist($newTicket);
        $this->em->flush();

        return $newTicket;
    }

    /**
     * @return array
     */
    public static function getAliases()
    {
        return [
            'createTicket' => 'create_ticket'
        ];
    }
}
