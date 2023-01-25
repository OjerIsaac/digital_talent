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
    public function create(UserRequest $request)
    {
        try {
            $data = $request->all();

            // check if user already exists in the database
            $userExists = User::where('email', $data['email'])->first();
            // dd($userExists);

            if($userExists) {
                return $this->apiResponse(true, "User already exists", Response::HTTP_CONFLICT);
            }
            else {
                // insert user data into database
                $user = User::create($data);
                return $this->apiResponse(false, "New User added successfully",  Response::HTTP_OK, $user);
            }
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display a listing of all the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch()
    {
        try {
            // check if any user exist
            $userExist = User::exists();
            if (!$userExist) {
                return $this->apiResponse(false, "User does not exists",  Response::HTTP_NOT_FOUND);
            };

            // return list of all added users
            $user = User::all();
            return $this->apiResponse(false, "All users fetched successfully",  Response::HTTP_OK, $user);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

     /**
     * Update the specified User in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        try {
            // check if user with ID exist
            $userExist = User::where('id', $id)->exists();
            if (!$userExist) {
                return $this->apiResponse(false, "No user with this ID exist on the user table",  Response::HTTP_NOT_FOUND);
            };

            $data = $request->all();

            // find user by id
            $user = User::find($id);

            // update specific user
            $userUpdate = $user->update($data);

            return $this->apiResponse(false, "User data updated successfully",  Response::HTTP_OK, $userUpdate);
        } catch (Exception $e) {
            return $this->apiResponse(true, $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
