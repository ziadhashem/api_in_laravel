<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2/26/2024
 * Time: 6:04 AM
 */

namespace App\Repositories;

use App\Models\user;


class UserRepository
{
    protected $model;

    public function __construct(user $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        $users = User::all();
        return  $users;
    }

    public function getById(int $userId)
    {

        return user::query()->findOrFail($userId);
    }

    public function create(array $details)
    {
        $user = user::create($details);
        return $user;
    }

    public function update(int $userId, array $details)
    {
        return user::query()->where('id', $userId)->update($details);
    }

    public function delete(int $userId)
    {
        return user::query()->where('id', $userId)->delete();
    }

}