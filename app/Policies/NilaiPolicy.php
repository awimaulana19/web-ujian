<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Nilai;
use Illuminate\Auth\Access\HandlesAuthorization;

class NilaiPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Nilai $nilai)
    {
        return $user->id == $nilai->user_id;
    }
}
