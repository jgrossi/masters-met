<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Met\Models\Area;

class AreasTableSeeder extends Seeder {

	public function run()
	{
        Area::truncate();

        Area::create(['name' => 'Arquitetura e Urbanismo']);
        Area::create(['name' => 'Ciência da Computação']);
        Area::create(['name' => 'Ciência da Informação']);
        Area::create(['name' => 'Ciências Biológicas (Genética)']);
        Area::create(['name' => 'Ciências Biológicas (Zoologia)']);
        Area::create(['name' => 'Enfermagem']);
        Area::create(['name' => 'Engenharia Civil']);
        Area::create(['name' => 'Engenharia Mecânica']);
        Area::create(['name' => 'Fonoaudiologia']);
        Area::create(['name' => 'Geologia']);
        Area::create(['name' => 'História']);
        Area::create(['name' => 'Letras']);
        Area::create(['name' => 'Medicina Veterinária']);
        Area::create(['name' => 'Música']);
        Area::create(['name' => 'Psicologia']);
        Area::create(['name' => 'Zootecnia']);

        foreach (Area::all() as $a) {
            $a->slug = str_slug($a->name);
            $a->save();
        }
	}

}
