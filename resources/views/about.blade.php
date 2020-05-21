@extends('layouts.app')

@section('content')
<style>
    body {
        padding-top: -2rem;
    }

    h3 {
        position: static;
    }

    .container {
        background: rgba(0, 0, 0, 0.6) !important;
        height: 100vh !important;
    }

</style>
<div class="container">
        <div class="about-us">

    <div class="jumbotron" style="text-align:right !important; color:white;">
            <h1 class="main-header center my-4">عنا</h1>
            <h3 class="my-4" style="">لماذا تَشارُك؟</h3>
            <p class="">يعانى أعلب الجامعيون من مشكلة نفاذ الكتب الجامعية وغلاء أسعارها وصعوبة ايجادها بأسهل واسرع الطرق
                الممكنة. ومن وجهو أخرى يعانى بعض الطلاب من مشكلة المعرفة الكاملة عن الدورات القائمة داخل الجامعة.</p>
            <br>
            <hr><br>
            <h3 class="my-4">عن منصة تشارك</h3>
            <p>تَشارُك هى منصة الكترونية تعمل فى جمع الكتب المستعملة بمكتبة الجامعة وعرضها على المنصة بطريقة مرنة
                ومنظمة, ايضا تدعم تبادل الملخصات بين الطلاب ونشر الدورات والاعلانات التى تخص الجامعة.</p>
        </div>
    </div>
</div>
@endsection
