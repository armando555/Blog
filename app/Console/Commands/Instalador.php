<?php

namespace App\Console\Commands;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;

class Instalador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'instalador inicial del proyecto';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!$this->verificar()){
            $rol = $this->crearRolSuperAdmin();
            $usuario = $this->crearUsuarioSuperAdmin();
            $usuario->roles()->attach($rol);
            $this->info('The command was successful!');
        }else{
            $this->error('Something went wrong! ');
        }
        
        return 0;
    }
    private function crearRolSuperAdmin(){
        $rol = "Super Administrador";
        return Rol::create([
            'id' => 1,
            'name' => $rol,
            'slug' => Str::slug($rol,'_')
        ]);
    }
    private function crearUsuarioSuperAdmin(){
        return User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'armandosebas4@gmail.com',
            'password' => Hash::make('123'),
            'status' => 1
        ]);
    }
    private function verificar(){
        return Rol::find(1);
        
    }
}
