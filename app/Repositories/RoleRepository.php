<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAll()
    {
        return Role::all();
    }

    public function getById($roleId)
    {
        return Role::findOrFail($roleId);
    }

    public function delete($roleId)
    {
        Role::destroy($roleId);
    }

    public function createOrUpdate(array $data, int $roleId = null)
    {
        if ($roleId) {
            $role = Role::findOrFail($roleId);
            $role->update($data);

            return $role;
        }

        return Role::create($data);
    }

    public function getByTitle($name)
    {
        return Role::where('title', $name)->first();
    }
}
