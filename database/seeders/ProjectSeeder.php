<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::query()->insert([
            [
                'category_id' => 2,
                'title' =>  'adfreezfast.ml',
                'slug' =>  'adfreezfast',
            ],
            [
                'category_id' => 2,
                'title' =>  'abinindharalun.ml',
                'slug' =>  'abinindharalun',
            ],
            [
                'category_id' => 2,
                'title' =>  'akolcontelanculp.ml',
                'slug' =>  'akolcontelanculp',
            ],
            [
                'category_id' => 2,
                'title' =>  'bahnrebjohn.ml',
                'slug' =>  'bahnrebjohn',
            ],
            [
                'category_id' => 2,
                'title' =>  'caeburmuseni.ml',
                'slug' =>  'caeburmuseni',
            ],
            [
                'category_id' => 2,
                'title' =>  'ciomogufalasso.ml',
                'slug' =>  'ciomogufalasso',
            ],
            [
                'category_id' => 2,
                'title' =>  'edwfinhigh.ml',
                'slug' =>  'edwfinhigh',
            ],
            [
                'category_id' => 2,
                'title' =>  'adorneymagbuining.ml',
                'slug' =>  'adorneymagbuining',
            ],
            [
                'category_id' => 2,
                'title' =>  'carlale.ml',
                'slug' =>  'carlale',
            ],
            [
                'category_id' => 2,
                'title' =>  'fecmoca.ml',
                'slug' =>  'fecmoca',
            ],
        ]);
    }
}
