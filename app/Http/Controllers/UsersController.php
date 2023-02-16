<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Requests;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Termwind\Components\Dd;

class UsersController extends Controller
{
     /**
     * Store a newly created User.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
           //email validation will check if that user with email exists
        
                // insert user data into database
                $user = User::create($request->validated());
                return $this->apiResponse(false, "New User added successfully",  Response::HTTP_OK, $user);

    }

    /**
     * Display a listing of all the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //You dont need to check exist for all users 

            // return list of all added users
            $user = User::all();
            return $this->apiResponse(false, "All users fetched successfully",  Response::HTTP_OK, $user);
    }

    public function show(User $user)
    {
        
        return $this->apiResponse(false, "All users fetched successfully",  Response::HTTP_OK, $user);
    }


     /**
     * Update the specified User in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
            $userUpdate = $user->update($request->validated);
            return $this->apiResponse(false, "User data updated successfully",  Response::HTTP_OK, $userUpdate);
    }

      /**
     * Remove the specified User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy (User $user)
    {
        //the user model im passing as a parameter will chcek if it exist or not

            // delete specific user
            $user->delete();
            return $this->apiResponse(false, "User data deleted successfully",  Response::HTTP_OK);
    }
}
