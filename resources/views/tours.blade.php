@extends('layouts.app')
@section('content')

<div class="row d-flex justify-content-center mt-5" style="margin-left: 20px;">
    
        @if($data !== null)
            @foreach($data as $row)
            <div class="col-sm-4 mt-3">
            <div class="card">
            <img src="/images/{{$row->img}}" class="card-img-top" alt="..." style='width:auto; height:auto'>
                <div class="card-body">
                    <h5 class="card-title"> {{$row->name}}</h5>
                    <div class="row">
                        <div class="col">
                            {{$row->description}}
                        </div>
                    </div>
                    <div class="row mr-0">
                        <div class="col d-flex justify-content-start mr-0">
                            <ul class='list-unstyled  mt-2 mr-0'>
                                <li class="badge bg-secondary text-white " >{{$row->price}} ريال سعودي</li>
                            </ul>

                        </div>
                    </div>
                    <a href="{{route('book',['id'=>$row->id])}}" class="btn btn-primary">احجز الاّن</a>
                </div>
            </div>
            </div>
            @endforeach
            @endif
            </div>
            
    
</div>


@endsection