<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Main;


class MainsTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $admin=new Main();
        $admin->name="admin";
        $admin->password=bcrypt("admin2019");
        $admin->save();
        
    }
}
