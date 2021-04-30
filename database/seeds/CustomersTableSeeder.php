<?php

use Illuminate\Database\Seeder;
use App\Customer;
//use App\Department;
class CustomersTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $model = new Customer;$model->code='01';$model->name= '中之島';$model ->postal_code='2222';$model->address = '阿波座';$model->tel = '000111222';$model->save();
    }
}
