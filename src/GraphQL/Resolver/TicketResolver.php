<?php
namespace App\GraphQL\Resolver;

use App\Entity\Ticket;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class TicketResolver implements ResolverInterface, AliasedInterface {

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function resolve(Argument $args)
    {
        $ticket = $this->em->getRepository(Ticket::class)->find($args['id']);
        return $ticket;
    }

    public static function getAliases()
    {
        return [
            'resolve' => 'Ticket'
        ];
    }
}
