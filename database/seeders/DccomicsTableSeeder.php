<?php

namespace Database\Seeders;

use App\Models\Dccomic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DccomicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // prendo i dati con il config dal file comics.php in database locale
        // e popolo la mia tabella in db
        $dccomics = config('comics');

        foreach ($dccomics as $dccomic) {
            $new_dccomic = new Dccomic();
            // $new_dccomic->title = $dccomic['title'];
            // $new_dccomic->description = $dccomic['description'];
            // $new_dccomic->thumb = $dccomic['thumb'];
            // $new_dccomic->price = $dccomic['price'];
            // $new_dccomic->series = $dccomic['series'];

            // prima aggiungo proprietà fillable al comic
            // massi assignment
            $new_dccomic->fill($dccomic);
            // salvo i dati nel db
            $new_dccomic->save();
        }
    }
}
