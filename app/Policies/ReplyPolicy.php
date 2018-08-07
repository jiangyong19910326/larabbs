<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reply;

class ReplyPolicy extends Policy
{
    public function update(User $user, Reply $reply)
    {
        return $user->isAuthOf($reply);
    }

    public function store(User $user, Reply $reply)
    {
        return $user->isAuthOf($reply);
    }

    public function destroy(User $user, Reply $reply)
    {
        return $user->isAuthOf($reply) || $user->isAuthOf($reply->topic);
    }
}
