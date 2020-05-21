<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('filename');
            $table->string('category');
            $table->integer('number');
            $table->timestamps();
        });

        //insert Admin account into users table
        DB::table('books')->insert(
            array(
                array(
                    'name'=>'مبادىء المحاسبة المالية',
                    'filename' => '',
                    'category'=>'ادارة الاعمال',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'إحصاء الأعمال 2',
                    'filename' => '',
                    'category'=>'ادارة الاعمال',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'مبادىء الاقتصاد الكلى',
                    'filename' => '',
                    'category'=>'ادارة الاعمال',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'اساسيات الكيمياء التحليلية',
                    'filename' => '',
                    'category'=>'كيمياء',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'كيمياء غير عضوية',
                    'filename' => '',
                    'category'=>'كيمياء',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'اطياف المركبات العضوية',
                    'filename' => '',
                    'category'=>'كيمياء',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'معادلات تفاضلية جزئية',
                    'filename' => '',
                    'category'=>'رياضيات',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'تفاضل وتكامل 2',
                    'filename' => '',
                    'category'=>'رياضيات',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'جبر خطى',
                    'filename' => '',
                    'category'=>'رياضيات',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'اسس الجغرافية البشرية',
                    'filename' => '',
                    'category'=>'جغرافيا',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'مبادىء الخرائط',
                    'filename' => '',
                    'category'=>'جغرافيا',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'الجغرافيا الاقتصادية',
                    'filename' => '',
                    'category'=>'جغرافيا',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'مقدمة فى الفيزياء',
                    'filename' => '',
                    'category'=>'التحضيرى',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'مقدمة فى الاحياء',
                    'filename' => '',
                    'category'=>'التحضيرى',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'مهارات اللغة الأنجليزية',
                    'filename' => '',
                    'category'=>'التحضيرى',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'تحليل نمذجة البرمجيات',
                    'filename' => '',
                    'category'=>'علوم حاسب',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'مقدمة فى هندسة البرمجيات',
                    'filename' => '',
                    'category'=>'علوم حاسب',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'شبكات الحاسب',
                    'filename' => '',
                    'category'=>'علوم حاسب',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'احياء دقيقة طبية',
                    'filename' => '',
                    'category'=>'احياء',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'علم المناعة',
                    'filename' => '',
                    'category'=>'احياء',
                    'number'=>random_int(1,20)
                ),
                array(
                    'name'=>'علم الطفيليات',
                    'filename' => '',
                    'category'=>'احياء',
                    'number'=>random_int(1,20)
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
        Schema::dropIfExists('books');
    }
}
