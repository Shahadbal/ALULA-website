@extends('layouts.dashboard')

@section('content')

<div class="container">
    <div class="card text-dark card-has-bg click-col d-flex justify-content-center" style="background-image:url('/images/horse.jpg');">
         <img class="card-img d-none" src="/images/horse.jpg" height='80%'>
            <div class="card-img-overlay d-flex flex-column">
                <div class="card-body">
                    <h4 class="card-title mt-0 text-center">تعديل البيانات للجولات </h4>
                
                            <form action="{{route('updateT')}}" method='post'>
                
                                @csrf
                                <input type='hidden' name='id' value='{{$item->id}}'>
                                <input type='hidden' name='type' value='{{$item->type}}'>
                                <div class="row text-center p-3">
                                    <div class="col">
                                        <label for="name" class="p-2">تعديل اسم الجولة </label>
                                        <input type="text" class="form-control form-control-sm " name="name" id="name" value="{{$item -> name}}" required>
                                    </div>
                                    <div class="col">
                                        <label for="description" class="p-2">تعديل وصف الجولة </label>
                                        <input type="text" class="form-control form-control-sm " name="description" id="description" value="{{$item -> description}}" required>
                                    </div>
                            <div class="col">
                                <label for="price" class="p-2">تعديل سعر الجولة </label>
                                <input type="text" class="form-control form-control-sm " name="price" id="price" value="{{$item -> price}}" required>
                            </div>
                        </div>
                        <div class="row text-center p-3">
                            <div class="col">
                                <label for="img" class="p-2">تعديل صورة الجولة</label>
                                <input type="file" class="form-control form-control-sm " name="img" id="img" value="{{$item -> img}}" required>
                            </div>
                            <div class="col">
                                
                            </div>
                            <div class="col">
                                
                            </div>

                        </div>
                        <div class="row text-center p-3">
                        <div class="col">
                            </div>
                            <div class="col">
                            <button class="btn btn-primary mt-2" type="submit" onclick="submitForm()">حفظ</button>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                            </form>
                
                </div>
        
            </div>
        </div>
    </div>

<script>
function submitForm() {
        Swal.fire({
                title: "تم تعديل المجموعة بنجاح",
                icon: "success"
            });
            return true; // Allow form submission
        
    }
</script>


@endsection