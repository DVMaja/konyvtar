<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //auto-increment, primary key, id a neve, bigint típusú
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            //pl visszahoz nál eleinte null értékű, mert eleinte még nincs hozzá infó
            $table->string('password');
            $table->boolean('permission')->default(1);
            //0: könyvtáros, 1: felhasználó
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => "Könyvtáros", 
            'email' => 'konyvtaros@gmail.com', 
            'password' => Hash::make('Aa123'),
            'permission' => 0
        ]);

        User::create([
            'name' => "Gizi", 
            'email' => 'gizi@gmail.com', 
            'password' => Hash::make('Aa1234')
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
