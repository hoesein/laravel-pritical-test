<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DynamicForm;

class DynamicFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DynamicForm::create([
            'input_name' => "Name",
            'input_type' => "text",
            'input_opt' => "",
        ]);

        DynamicForm::create([
            'input_name' => "Email",
            'input_type' => "email",
            'input_opt' => "",
        ]);

        DynamicForm::create([
            'input_name' => "Date of Birth",
            'input_type' => "date",
            'input_opt' => "",
        ]);

        DynamicForm::create([
            'input_name' => "Gender",
            'input_type' => "select",
            'input_opt' => "Male, Female",
        ]);

        DynamicForm::create([
            'input_name' => "Yourself",
            'input_type' => "textarea",
            'input_opt' => "",
        ]);
    }
}
