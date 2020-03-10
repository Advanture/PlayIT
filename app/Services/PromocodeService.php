<?php

namespace App\Services;


use App\Events\PromocodeUsed;
use App\Models\Promocode;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;

class PromocodeService
{
    /**
     * @param string $value
     * @param Authenticatable $user
     * @return bool
     */
    public function usePromocode(string $value, Authenticatable $user): bool
    {
        $promocode = Promocode::where('value', $value)->first();

        if ($promocode) { // If promocode defined
            if ($promocode->usage_count > 0) { // If can be used
                if (! $user->tasks->contains($promocode->task)) { // If user not complete the task
                    event(new PromocodeUsed($promocode, $user));

                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Create a promocode from basic params.
     *
     * @param int $taskId
     * @param int $usageCount
     * @param int $creatorId
     * @return Promocode
     */
    public function create(int $taskId, int $usageCount, int $creatorId): Promocode
    {
        return Promocode::create([
            'task_id'       => $taskId,
            'usage_count'   => $usageCount,
            'creator_id'    => $creatorId,
            'value'         => $this->generateValue()
        ]);
    }

    /**
     * Generate random promocode value
     *
     * @return string
     */
    private function generateValue(): string
    {
        return Str::random(3) . '-'
            . Str::random(3);
    }
}
