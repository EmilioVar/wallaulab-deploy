<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallaulab:makeUserRevisor {email}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Asigna el rol de revisor a un usuario';
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if(!$user) {
            $this->error('Usuario no encontrado');
            return;
        }
        $user->is_revisor = true;
        $user->save();
        $this->info("El usuario $user->name ya es un revisor");
    }
}
