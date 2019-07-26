<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $users= factory(App\User::class,50)->create();

        // Rango
        $desde=15;
        $hasta=65;

        //Llenar la tabla personasEncuestaRes
        for($i=$desde;$i<=$hasta;$i++){
            $p= new App\personaEncuestaRes;
            for($x=1; $x<18; $x++){
                $f= factory(App\personaEncuestaRes::class)->make();
                $name='p'.$x;
                $p->$name= $f->p;
            }
            $p->owner_id= $i;
            $p->answered=1;
            $p->save();
        }

        // Llenar la tabla procesos
        for($i=$desde;$i<=$hasta;$i++){
            $p= new App\procesoEncuestaRes;
            for($x=1; $x<=26; $x++){
                $f= factory(App\personaEncuestaRes::class)->make();
                $name='p'.$x;
                $p->$name= $f->p;
            }
            $p->owner_id= $i;
            $p->answered=1;
            $p->save();
        }

        // Llenar la tabla practica
        for($i=$desde;$i<=$hasta;$i++){
            $p= new App\practicaEncuestaRes;
            for($x=1; $x<=21; $x++){
                $f= factory(App\personaEncuestaRes::class)->make();
                $name='p'.$x;
                $p->$name= $f->p;
            }
            $p->owner_id= $i;
            $p->answered=1;
            $p->save();
        }

        // Llenar la tabla producto
        for($i=$desde;$i<=$hasta;$i++){
            $p= new App\productoEncuestaRes;
            for($x=1; $x<=7; $x++){
                $f= factory(App\personaEncuestaRes::class)->make();
                $name='p'.$x;
                $p->$name= $f->p;
            }
            $p->owner_id= $i;
            $p->answered=1;
            $p->save();
        }

        // Llenar la tabla acambio
        for($i=$desde;$i<=$hasta;$i++){
            $p= new App\aCambioEncuestaRes;
            for($x=1; $x<=8; $x++){
                $f= factory(App\personaEncuestaRes::class)->make();
                $name='p'.$x;
                $p->$name= $f->p;
            }
            $p->owner_id= $i;
            $p->answered=1;
            $p->save();
        }
    }
}
