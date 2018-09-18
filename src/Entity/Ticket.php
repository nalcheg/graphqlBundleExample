<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="tickets")
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    use IdTrait;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;
    /**
     * @var string $reason
     * @ORM\Column(name="reason", type="text")
     */
    private $reason;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TicketComment", mappedBy="ticket", orphanRemoval=true, cascade={"persist"})
     */
    private $comments;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Ticket
     */
    public function setUser($user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return Ticket
     */
    public function setReason(string $reason): self
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return Collection|TicketComment[]
     */
    public function getTicketCommentes(): Collection
    {
        return $this->comments;
    }

    public function addTicketComment(TicketComment $TicketComment): self
    {
        if (!$this->comments->contains($TicketComment)) {
            $this->comments[] = $TicketComment;
            $TicketComment->setTicket($this);
        }

        return $this;
    }

    public function removeTicketComment(TicketComment $TicketComment): self
    {
        if ($this->comments->contains($TicketComment)) {
            $this->comments->removeElement($TicketComment);
            // set the owning side to null (unless already changed)
            if ($TicketComment->getTicket() === $this) {
                $TicketComment->setTicket(null);
            }
        }

        return $this;
    }
}
