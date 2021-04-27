<?php

use Illuminate\Database\Seeder;
use App\Customer;
use App\Department;
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
        $model = new Customer;$model->company_name= '中之島';$model->first_name = '阿波座';$model->last_name = '本町';$model->save();
    }
}
