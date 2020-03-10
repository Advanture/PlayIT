<?php

namespace App\Services;


use App\Models\User;
use App\Models\UserBalance;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VkAuthService
{
    /**
     * Authorize user from vk array.
     *
     * @param array $userData User array from Vk response
     * @return User
     */
    public function authFromVK(array $userData): User
    {
        $user = $this->getUserInstance($userData);

        auth()->login($user, false);

        return $user;
    }

    /**
     * Get or create user from vk array.
     *
     * @param array $userData User array from Vk response
     * @return User
     */
    private function getUserInstance(array $userData): User
    {
        try {
            return User::where('vk_id', $userData['id'])->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $user = null;

            DB::transaction(function () use (&$user, $userData) {
                $user = User::create([
                    'vk_id' => $userData['id'],
                    'first_name' => $userData['first_name'],
                    'last_name' => $userData['last_name']
                ]);

                UserBalance::create([
                    'user_id' => $user->id
                ]);
            });

            return $user;
        }
    }

    /**
     * @param Authenticatable $user
     * @return string
     */
    public function setToken(User $user): string
    {
        $token = Str::random(60);
        $user->update([
            'api_token' => hash('sha256', $token),
        ]);

        return $token;
    }

}
