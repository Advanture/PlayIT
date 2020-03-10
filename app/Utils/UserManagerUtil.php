<?php

namespace App\Utils;


use Illuminate\Contracts\Auth\Authenticatable;

class UserManagerUtil
{
    /**
     * @var Authenticatable
     */
    private $user;

    /**
     * @var array
     */
    private $roles = [
        'admin'     => 'Администратор',
        'moderator' => 'Модератор',
        'smm'       => 'СММ'
    ];

    /**
     * UserManagerUtil constructor.
     * @param Authenticatable $user
     */
    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getUserFullName(): string
    {
        return $this->user->first_name . ' ' . $this->user->last_name;
    }

    /**
     * @return string
     */
    public function generateVkUrl(): string
    {
        return 'https://vk.com/id' . $this->user->vk_id;
    }

    /**
     * Get all roles sorted by important.
     *
     * @return array
     */
    public function getAllRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return string
     */
    public function getPrimaryRoleName(): string
    {
        foreach ($this->getAllRoles() as $roleValue => $roleName) {
            if ($this->user->hasRole($roleValue))
                return $roleName;
        }

        return 'Обыватель';
    }

    /**
     * @return array
     */
    public function getAllUserRoles(): array
    {
        $roles = [];

        foreach ($this->getAllRoles() as $roleValue => $roleName) {
            if ($this->user->hasRole($roleValue))
                $roles[] = $roleValue;
        }

        return $roles;
    }
}