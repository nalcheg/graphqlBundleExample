<?php

namespace App\GraphQL\Resolver;

use App\Entity\Ticket;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class TicketsListResolver implements ResolverInterface, AliasedInterface {
    private $em;
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function resolve(Argument $args)
    {
        $tickets = $this->em->getRepository(Ticket::class)->findBy(
            [],
            ['id' => 'desc'],
            $args['limit'],
            0
        );
        return ['tickets' => $tickets];
    }

    public static function getAliases()
    {
        return [
            'resolve' => 'TicketsList'
        ];
    }
}
