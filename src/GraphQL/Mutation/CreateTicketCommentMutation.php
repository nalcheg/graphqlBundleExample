<?php

namespace App\GraphQL\Mutation;

use App\Entity\Ticket;
use App\Entity\TicketComment;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class CreateTicketCommentMutation implements MutationInterface, AliasedInterface
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param int $ticketId
     * @param int $userId
     * @param string $comment
     * @return TicketComment
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function createTicketComment(int $ticketId, int $userId, string $comment): TicketComment
    {
        $newComment = new TicketComment();
        $newComment->setTicket($this->em->getReference(Ticket::class, $ticketId));
        $newComment->setUser($this->em->getReference(User::class, $userId));
        $newComment->setComment($comment);
        $this->em->persist($newComment);
        $this->em->flush();

        return $newComment;
    }

    /**
     * @return array
     */
    public static function getAliases()
    {
        return [
            'createTicketComment' => 'create_ticket_comment'
        ];
    }
}
