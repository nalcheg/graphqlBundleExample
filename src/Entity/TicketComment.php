<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tickets_comments")
 * @ORM\Entity(repositoryClass="App\Repository\TicketCommentRepository")
 */
class TicketComment
{
    use IdTrait;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ticket", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ticket;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    /**
     * @var string $comment
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @return Ticket
     */
    public function getTicket(): Ticket
    {
        return $this->ticket;
    }

    /**
     * @param Ticket $ticket
     */
    public function setTicket(Ticket $ticket): void
    {
        $this->ticket = $ticket;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }
}
