<?php

namespace Stanleykinkelaar\FilamentShop\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Chiiya\FilamentAccessControl\Enumerators\Feature;
use Chiiya\FilamentAccessControl\Enumerators\RoleName;
use Chiiya\FilamentAccessControl\Models\FilamentUser;

class FilamentShopUserCommand extends Command
{
    public $signature = 'filament-shop:user';

    public $description = 'Resources shop setup command';

    public function handle(): int
    {
        $firstname = $this->ask('Firstname');
        $lastname = $this->ask('Lastname');
        $email = $this->ask('Email');
        $password = $this->secret('Password');

        $values = [
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'password' => Hash::make($password),
        ];

        if (Feature::enabled(Feature::ACCOUNT_EXPIRY)) {
            $values = array_merge($values, [
                'expires_at' => now()->addMonths(6)->endOfDay(),
            ]);
        }

        $user = FilamentUser::query()->create($values);
        $user->assignRole(RoleName::SUPER_ADMIN);
        $user->save();

        $this->comment('All done, go have some fun at /admin');

        return self::SUCCESS;
    }
}
