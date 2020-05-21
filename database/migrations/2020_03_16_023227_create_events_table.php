<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('cover_image');
            $table->date('event_date');
            $table->timestamps();
        });

        //insert events
        DB::table('events')->insert(
            array(
                array(
                    'title'=>'دورة 1',
                    'cover_image' => 'event1.jpg',
                    'event_date'=>'2020-12-12'
                ),
                array(
                    'title'=>'دورة 1',
                    'cover_image' => 'event2.jpg',
                    'event_date'=>'2020-12-12'
                ),
                array(
                    'title'=>'دورة 1',
                    'cover_image' => 'event3.jpg',
                    'event_date'=>'2020-12-12'
                ),
                array(
                    'title'=>'دورة 1',
                    'cover_image' => 'event4.jpg',
                    'event_date'=>'2020-12-12'
                ),
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
        Schema::dropIfExists('events');
    }
}
