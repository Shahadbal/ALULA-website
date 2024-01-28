@extends('layouts.app')

@section('content')
<style>
    body {
            overflow-x: hidden;
        }
    #video-background {
            width: 100%;
            height: 90%;
            object-fit: cover;
            z-index: -1;
            left:0;
            right:0;

        }

        .overlay {
            position: absolute;
            top: 25px;
            left: 0;
            width: 100%;
            height: 90%;
            background-color: rgba(0, 0, 0, 0.3); /* Adjust the alpha value for transparency */
            z-index: 0;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            text-align: center;
            color: #fff;
        }
        .main{
            margin-right:10px;
        }
</style>
<div class="row">
    <div class="col-sm-12">
    <picture class="hero-header__image  ">
         <!-- Video Background -->
    <video id="video-background" autoplay muted loop>
        <!-- Provide the path to your video file -->
        <source src="/images/AdobeStock_314739106.mp4" type="video/mp4">
        
    </video>
    <div class="overlay"></div>
    <!-- Content with Title -->
    <div class="content">
        <h1 class="display-4">أهلًا وسهلًا بكم في العلا</h1>
        <!-- Additional content can be added here -->
    </div>
    </div>
</div>
<br>
<div class="main row d-flex justify-content-center mb-5" style="margin-left: 10px;">
    <div class="col-sm-4" >
        <div class="card">
        <img src="/images/horse.jpg" class="card-img-top" alt="..." style='width:auto; height:auto;'>
            <div class="card-body">
                <h5 class="card-title"> الفعاليات الرياضية</h5>
                <a href="{{route('spor')}}" class="btn btn-primary">تصفّح</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
        <img src="/images/visitor-approaching-double-arch.jpg" class="card-img-top" alt="..." style='width:auto; height:240px;'>
            <div class="card-body">
                <h5 class="card-title">المغامرات</h5>
                <a href="{{route('adv')}}" class="btn btn-primary">تصفّح</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
        <img src="/images/AdobeStock_313453911.jpeg" class="card-img-top" alt="..." style='width:auto; height:240px;'>
            <div class="card-body">
                <h5 class="card-title"> الجولات</h5>
                <a href="{{route('tour')}}" class="btn btn-primary">تصفّح</a>
            </div>
        </div>
    </div>
</div>

@endsection