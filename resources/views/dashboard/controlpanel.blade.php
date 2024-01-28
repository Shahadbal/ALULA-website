@extends('layouts.dashboard')
@section('content')
<div class="row d-flex justify-content-center mb-5" style="margin-left: 20px;">
    <div class="col-sm-4">
        <div class="card">
        <img src="/images/horse.jpg" class="card-img-top" alt="..." style='width:353px; height:205px;'>
            <div class="card-body">
                <h5 class="card-title"> الفعاليات الرياضية</h5>
                <a href="{{route('GetSports')}}" class="btn btn-primary">تصفّح</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
        <img src="/images/visitor-approaching-double-arch.jpg" class="card-img-top" alt="..." style='idth:353px; height:205px;'>
            <div class="card-body">
                <h5 class="card-title">المغامرات</h5>
                <a href="{{route('GetAdventure')}}" class="btn btn-primary">تصفّح</a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
        <img src="/images/AdobeStock_313453911.jpeg" class="card-img-top" alt="..." style='idth:353px; height:205px;'>
            <div class="card-body">
                <h5 class="card-title"> الجولات</h5>
                <a href="{{route('GetTours')}}" class="btn btn-primary">تصفّح</a>
            </div>
        </div>
    </div>
    
</div>
@endsection