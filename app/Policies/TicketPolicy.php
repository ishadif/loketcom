<?php

namespace App\Policies;

use App\Event;
use App\Ticket;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    

    /**
     * Determine whether the user can update the ticket.
     *
     * @param  \App\User  $user
     * @param  \App\Ticket  $ticket
     * @return mixed
     */
    public function update(User $user, Ticket $ticket)
    {
        return $user->id == $ticket->event->user_id;
    }
}
