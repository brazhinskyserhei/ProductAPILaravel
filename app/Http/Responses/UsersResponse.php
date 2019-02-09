<?php

namespace App\Http\Responses;

use App\User;

class UsersResponse extends \League\Fractal\TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
            'avatar'=>$user->avatar,
        ];
    }
}