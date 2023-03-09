<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'password' => $this->passwordRules(),
        ])->validate();

        if(isset($input['avatar'])) {
            $uploadedFile = $input['avatar'];
            $path = Storage::url($uploadedFile->store('avatars', 'public'));
        } else {
            $path = null;
        }

        return User::create([
            'name' => $input['name'],
            'avatar' => $path,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
