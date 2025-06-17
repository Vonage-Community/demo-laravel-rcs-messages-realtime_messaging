<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $conversation = Conversation::create([
            'uuid' => 'e2efbc00-b65e-4e47-8996-1de0043ed667',
            'user_id' => $user->id
        ]);
    }
}
