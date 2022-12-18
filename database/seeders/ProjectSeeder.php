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
                'url' =>  'adfreezfast.ml',
                'slug' =>  'adfreezfast',
            ],
            [
                'category_id' => 2,
                'title' =>  'abinindharalun.ml',
                'url' =>  'abinindharalun.ml',
                'slug' =>  'abinindharalun',
            ],
            [
                'category_id' => 2,
                'title' =>  'akolcontelanculp.ml',
                'url' =>  'akolcontelanculp.ml',
                'slug' =>  'akolcontelanculp',
            ],
            [
                'category_id' => 2,
                'title' =>  'bahnrebjohn.ml',
                'url' =>  'bahnrebjohn.ml',
                'slug' =>  'bahnrebjohn',
            ],
            [
                'category_id' => 2,
                'title' =>  'caeburmuseni.ml',
                'url' =>  'caeburmuseni.ml',
                'slug' =>  'caeburmuseni',
            ],
            [
                'category_id' => 2,
                'title' =>  'ciomogufalasso.ml',
                'url' =>  'ciomogufalasso.ml',
                'slug' =>  'ciomogufalasso',
            ],
            [
                'category_id' => 2,
                'title' =>  'edwfinhigh.ml',
                'url' =>  'edwfinhigh.ml',
                'slug' =>  'edwfinhigh',
            ],
            [
                'category_id' => 2,
                'title' =>  'adorneymagbuining.ml',
                'url' =>  'adorneymagbuining.ml',
                'slug' =>  'adorneymagbuining',
            ],
            [
                'category_id' => 2,
                'title' =>  'carlale.ml',
                'url' =>  'carlale.ml',
                'slug' =>  'carlale',
            ],
            [
                'category_id' => 2,
                'title' =>  'fecmoca.ml',
                'url' =>  'fecmoca.ml',
                'slug' =>  'fecmoca',
            ],
        ]);
    }
}
