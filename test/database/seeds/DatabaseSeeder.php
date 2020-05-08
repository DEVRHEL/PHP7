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
    	// php artisan db:seed
        //$this->call('AbTableSeeder');
        $this->call('ThanhViensTableSeeder');
    }
}

class AbTableSeeder extends Seeder
{
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('ab')->insert([
        	array('hoten'=>'DELL','sdt'=>'0903534848','email'=>'ahihi@gmail.com'),
        	array('hoten'=>'ASUS','sdt'=>'0903539999','email'=>'ahaha@gmail.com'),
        	array('hoten'=>'HP','sdt'=>'0903534748','email'=>'ahahaa@gmail.com'),
        	array('hoten'=>'ALIBABA','sdt'=>'0903599999','email'=>'ahahaaa@gmail.com'),
        ]);
    }
}

class DtTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('dt')->insert([
            array('thang'=>'7','doanhthu'=>'700000','id'=>'4'),
            array('thang'=>'8','doanhthu'=>'800000','id'=>'5'),
            array('thang'=>'9','doanhthu'=>'900000','id'=>'6'),
        ]);
    }
}
class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('images')->insert([
            ['name'=>'hinh1.img','product_id'=>'4'],
            ['name'=>'hinh2.img','product_id'=>'3'],
            ['name'=>'hinh3.img','product_id'=>'4'],
            ['name'=>'hinh4.img','product_id'=>'3'],
            ['name'=>'hinh5.img','product_id'=>'3'],
            ['name'=>'hinh6.img','product_id'=>'4'],
            ['name'=>'hinh7.img','product_id'=>'4'],
            ['name'=>'hinh8.img','product_id'=>'3'],
            ['name'=>'hinh9.img','product_id'=>'4'],
            ['name'=>'hinh10.img','product_id'=>'4'],

        ]);
    }
}
class CarsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars')->insert([
            ['name'=>'BMW','price'=>'30000'],
            ['name'=>'Audi','price'=>'40000'],
            ['name'=>'Honda','price'=>'34000'],
            ['name'=>'Suzuki','price'=>'44000'],
            ['name'=>'Porsche','price'=>'44400'],
            ['name'=>'Huyndai','price'=>'44444'],
        ]);
    }
}
class ColorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('colors')->insert([
            ['name'=>'red'],
            ['name'=>'blue'],
            ['name'=>'green'],
            ['name'=>'white'],
        ]);
    }
}
class CarscolorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cars_colors')->insert([
            ['cars_id'=>1,'colors_id'=>1],
            ['cars_id'=>2,'colors_id'=>1],
            ['cars_id'=>3,'colors_id'=>1],
            ['cars_id'=>4,'colors_id'=>2],
            ['cars_id'=>4,'colors_id'=>3],
            ['cars_id'=>4,'colors_id'=>4],
            ['cars_id'=>5,'colors_id'=>1],
        ]);
    }
}
class ThanhViensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('thanh_viens')->insert([
            ['user'=>'teo','pass'=>Hash::make(12345),'level'=>'1'],
            ['user'=>'ti','pass'=>Hash::make(12345),'level'=>'2'],
            ['user'=>'tuan','pass'=>bcrypt(12345),'level'=>'2'],
        ]);
    }
}
