<?php

namespace App\Services;


use App\Models\Rank;
use App\Models\User;
use App\Models\UserBalance;
use App\Utils\UserManagerUtil;
use Illuminate\Contracts\Auth\Authenticatable;

class UserService
{
    /**
     * Remove all and set one of roles.
     *
     * @param Authenticatable $user
     * @param string $roleValue
     */
    public function resetRole(Authenticatable $user, string $roleValue): void
    {
        $userManagerUtil = new UserManagerUtil($user);

        foreach ($userManagerUtil->getAllUserRoles() as $userRole)
            $user->removeRole($userRole);

        if ($roleValue === 0) {
            return ;
        }

        $user->assignRole($roleValue);
    }

    /**
     * @param Authenticatable $user
     * @return array
     */
    public function getRatingStats(Authenticatable $user): array
    {
        return [
            'position' => UserBalance::where('max_coins', '>=', $user->balance->max_coins)
                ->count(),
            'one_place' => (UserBalance::where('max_coins', $user->balance->max_coins)
                ->count() - 1),
            'remaining' => $this->remainingCoins($user),
            'complete_progress_bar' => $this->completeProgressBar($user)
        ];
    }

    /**
     * @param Authenticatable $user
     * @return int
     */
    private function completeProgressBar(Authenticatable $user): int
    {
        $userMaxCoins = $user->balance->max_coins;
        $rank = $this->getNextRank($user);

        return ($userMaxCoins / $rank->required_coins) * 100;
    }

    /**
     * How much coins remaining to achieve the next rank.
     *
     * @param Authenticatable $user
     * @return int
     */
    private function remainingCoins(Authenticatable $user): int
    {
        $rank = $this->getNextRank($user);
        $userBalance = $user->balance;

        if ($rank->required_coins !== $user->rank->required_coins) {
            return ($rank->required_coins - $userBalance->max_coins);
        }

        return 0;
    }

    /**
     * @param Authenticatable $user
     * @return Rank
     */
    private function getNextRank(Authenticatable $user): Rank
    {
        $userBalance = $user->balance;

        $rank = Rank::where('required_coins', '>', $userBalance->max_coins)
            ->get();

        if (! $rank->isEmpty()) {
            $minimumRank = $rank->where('required_coins', $rank->min('required_coins'))
                ->first();

            return $minimumRank;
        }

        return $user->rank;
    }
}
