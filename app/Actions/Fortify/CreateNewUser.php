<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use App\Rules\HeplStudentRule;
use GuzzleHttp\Psr7\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            'firstname' => ['required', 'string', 'max:25'],
            'name' => ['required', 'string', 'max:25'],
            'picture' => ['required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
                new HeplStudentRule,
            ],
            'enabled' => ['nullable'],
            'group' => ['required', 'integer'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'firstname' => ucfirst(strtolower($input['firstname'])),
            'name' => ucfirst(strtolower($input['name'])),
            'picture' => $input['picture'],
            'slug' => strtolower($input['firstname'].$input['name']),
            'email' => $input['email'],
            'enabled' => 1,
            'group' => $input['group'],
            'password' => Hash::make($input['password']),
        ]);

        $user->roles()->attach((Role::where('name', 'Étudiant')->first())->id);

        return $user;
    }
}
