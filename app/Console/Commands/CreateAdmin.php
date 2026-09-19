<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create';
    protected $description = 'Create a new administrator using a hidden password prompt';

    public function handle(): int
    {
        $name = $this->ask('Administrator name');
        $email = $this->ask('Administrator email');
        $password = $this->secret('Password (at least 12 characters)');
        $password_confirmation = $this->secret('Confirm password');
        $validator = Validator::make(compact('name', 'email', 'password', 'password_confirmation'), [
            'name' => 'required|string|max:100', 'email' => 'required|email|max:150|unique:users,email',
            'password' => 'required|string|min:12|confirmed',
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) $this->error($error);
            return self::FAILURE;
        }
        $user = new User(compact('name', 'email', 'password'));
        $user->is_admin = true;
        $user->save();
        $this->info('Administrator created. Sign in at /admin/login.');
        return self::SUCCESS;
    }
}
