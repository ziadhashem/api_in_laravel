<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Mockery\Exception;

class UserController extends Controller{

    private $userRepository;
    public function __construct(UserRepository $userRepository) {
           $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {

        try {
            $users = $this->userRepository->getAll();
            return [
                "status" => 1,
                "data" => $users
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
                "msg"=>$e->getMessage(),
            ];
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return array
     */
    public function store(Request $request)
    {
        try {
            $user = $this->userRepository->create($request->all());
            return [
                "status" => 1,
                "data" => $user,
                 "msg"=>"User is saved",
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
                "msg"=>$e->getMessage(),
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param user $user
     * @return void
     */
    public function show(user $user)
    {
        try {
            $userId = $user->getAttribute('id');
            $user = $this->userRepository->getById($userId);
            return [
                "status" => 1,
                "data" => $user
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
            ];
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param user $user
     * @return void
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param user $user
     * @return array
     */
    public function update(Request $request, user $user)
    {
        try {
            $user = $this->userRepository->update($user->getAttribute('id'),$request->all());
            return [
                "status" => 1,
                "data" => $user,
                "msg" => "user updated successfully"
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
                "msg"=>$e->getMessage(),
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param user $user
     * @return array
     */
    public function destroy(user $user)
    {
        try {
            $user = $this->userRepository->delete($user->getAttribute("id"));
            return [
                "status" => 1,
                "data" => $user,
                "msg" => "user deleted successfully"
            ];
        }
        catch (Exception $e){
            return [
                "status" => 0,
                "data" => [],
                "msg"=>$e->getMessage(),
            ];
        }
    }
}
