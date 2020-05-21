<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longtext('description')->nullable();
            $table->string('image')->default('placeholder-image.png');
            $table->timestamps();
        });

        DB::table('news')->insert(
            array(
                array(
                    'title'=>'news1',
                    'image'=>'news1.jpg',

                    'description' => ' ',
                ),
                array(
                    'title'=>'news2',
                    'description' => ' ',
                    'image'=>'news2.jpg'
                ),
                array(
                    'title'=>'news3',
                    'description' => ' ',
                    'image'=>'news3.jpg'
                ),
                array(
                    'title'=>'news4',
                    'description' => ' ',
                    'image'=>'news4.jpg'
                ),
                array(
                    'title'=>'news5',
                    'description' => ' ',
                    'image'=>'news5.jpg'
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
        Schema::dropIfExists('news');
    }
}
