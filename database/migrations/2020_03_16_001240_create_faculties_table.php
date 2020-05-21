<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->timestamps();
        });

        DB::table('faculties')->insert(
            array(
                array(
                    'name'=>'ادارة الاعمال',
                    'image' => 'placeholder-image.png',
                ),
                array(
                    'name'=>'كيمياء',
                    'image' => 'placeholder-image.png',
                )
                ,array(
                    'name'=>'رياضيات',
                    'image' => 'placeholder-image.png',
                )
                ,array(
                    'name'=>'جغرافيا',
                    'image' => 'placeholder-image.png',
                )
                ,array(
                    'name'=>'التحضيرى',
                    'image' => 'placeholder-image.png',
                )
                ,array(
                    'name'=>'احياء',
                    'image' => 'placeholder-image.png',
                )
                ,array(
                    'name'=>'علوم حاسب',
                    'image' => 'placeholder-image.png',
                )
                ,array(
                    'name'=>'فيزياء',
                    'image' => 'placeholder-image.png',
                )
                
                
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
