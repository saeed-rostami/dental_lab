<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $chat = Chat::query()
//            ->create([
//               'user_id' => User::query()->first()->id,
//            ]);
       for ($i = 0; $i < 15; $i++) {
           ChatMessage::query()
               ->create([
                   'user_id' => User::query()->first()->id,
                   'message' => Str::random(36),
                   'is_read' => 1,

               ]);
       }
    }
}
