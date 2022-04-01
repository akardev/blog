<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['Hakkımda','Projelerim'];
        $count=0;
        foreach($pages as $page)
        { $count++;
            DB::table('pages')->insert([
                'title' => $page,
                
                'slug' =>Str::slug($page,"-"),
                'content' => 'content lorem ipsum baris akar tina fenerbahce manchester united real madrid eylul
                              Integer auctor orci et sapien varius mattis. Mauris ac ornare lacus. Morbi convallis ullamcorper magna finibus semper. Vestibulum sed ipsum consequat, rutrum turpis vitae, condimentum massa. Aliquam ut elit tempus, mollis risus vitae, interdum eros. Cras sollicitudin lacinia dui.',
                'order' => $count,
                'created_at' => now(),
                'updated_at' => now()
               ]);
        }
    }
}
