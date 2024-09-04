<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    public function createUser(array $data): bool
    {
        return DB::query()->from('users')->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'created_at' => now(),
        ]);
    }
    public function updateUser(array $data): bool
    {
        return DB::query()->from('users')->where('id', auth()->user()->id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'updated_at' => now(),
        ]);
    }
    public function getUsers(): Collection
    {
        return DB::query()->from('users')->get();
    }
}
