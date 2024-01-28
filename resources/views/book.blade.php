@extends('layouts.app')
@section('content')

<div class="row d-flex justify-content-center mt-5" style="margin-left: 20px;">
    
        @if($data !== null)
            @foreach($data as $row)
            <div class="col-sm-4 mt-3">
            <div class="card" >
            <img src="/images/{{$row->img}}" class="card-img-top" alt="..." style='width:auto; height:auto'>
                <div class="card-body">
                    <h5 class="card-title"> حجز {{$row->name}}</h5>
                    <div class="row">
                        <div class="col">
                            {{$row->description}}
                        </div>
                    </div>
                    <div class="row">
                    <form action="{{route('AddToCart')}}" method="post">
        
                        @csrf
                        <div class="row text-center p-3">
                            <div class="col">
                                <input type="hidden" name="type" value="{{$row->type}}">
                                <input type="hidden" name="idC" value="{{$row->id}}">
                                <input type="hidden" id="price" value="{{$row->price}}">
                                <input type="hidden" name="totalPrice" id="totalPriceInput">
                                <label for="qty" class="p-2">عدد الأشخاص</label>
                                <input type="number" class="form-control form-control-sm " name="qty" id="qty" value="0" required oninput="calculateTotal()">
                            </div>
                            <div class="col">
                                <label for="date" class="p-2">التاريخ</label>
                                <input type="date" class=" " name="date" id="date" required>
                            </div>
                           
                            <div class="col">
                                
                            </div>
                    </div>
                    <div class="row mr-0">
                        <div class="col d-flex justify-content-start mr-0">
                            <ul class='list-unstyled  mt-2 mr-0'>
                                <li id="totalPrice" class="badge bg-secondary text-white">0 ريال سعودي</li>
                            </ul>

                        </div>
                    </div>
                    <button type = "submit" class="btn btn-primary mb-0">اضف للسلة</button> </form>
                </div>
            </div>
            </div>
            @endforeach
            @endif
            </div>
            
    
</div>

<script>
    function calculateTotal() {
        var qty = document.getElementById('qty').value;
        var rowPrice = document.getElementById('price').value;
        var totalPrice = rowPrice * qty;

        // Set the value of the hidden input field
        document.getElementById('totalPriceInput').value = totalPrice;

        // Display the calculated total price
        document.getElementById('totalPrice').innerHTML = totalPrice + " ريال سعودي";
    }

</script>

@endsection