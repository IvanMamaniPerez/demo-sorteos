<?php

namespace App\Actions\Auth;

use App\Enums\UserTypeRegisterEnum;
use App\Exceptions\ActionException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $data
     */
    public function create(array $data): User
    {
        if (!isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
            throw new ActionException(message: 'Invalid data to create user');
        }

        $data['name']  = Str::lower($data['name']);
        $data['email'] = Str::lower($data['email']);

        $typesRegister = UserTypeRegisterEnum::cases();
        $typesRegister = array_map(fn($type) => $type->value, $typesRegister);

        Validator::make($data, [
            'name'          => ['required', 'string', 'max:255', 'unique:users,name'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'type_register' => ['required', 'string', 'in:' . implode(',', $typesRegister)],
            'terms'         => ['required', 'boolean'],
            'policy'        => ['required', 'boolean'],
        ])->validate();



        DB::beginTransaction();

        try {
            $user = User::create([
                'name'           => $data['name'],
                'email'          => $data['email'],
                'type_register'  => $data['type_register'],
                'password'       => Hash::make($data['password']),
                'acepted_terms'  => $data['terms'],
                'acepted_policy' => $data['policy'],
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new ActionException(message: 'Error in action create user', previous: $e);
        }

        return $user;
    }
}
