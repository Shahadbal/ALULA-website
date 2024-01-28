@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">

                <div class="col">
        
                    <form action="{{route('saveSport')}}" method="post">
                    @csrf
                    <input type="hidden" name="type" value="sports">
                        <div class="row text-center p-3">
                            <div class="col">
                                <label for="name" class="p-2">ادخل اسم الفعالية الرياضية</label>
                                <input type="text" class="form-control form-control-sm " name="name" id="name"  required>
                            </div>
                            <div class="col">
                                <label for="description" class="p-2">ادخل وصف الفعالية الرياضية</label>
                                <input type="text" class="form-control form-control-sm " name="description" id="description" required>
                            </div>
                            <div class="col">
                                <label for="price" class="p-2">ادخل سعر الفعالية الرياضية</label>
                                <input type="text" class="form-control form-control-sm " name="price" id="price"  required>
                            </div>
                        </div>
                        <div class="row text-center p-3">
                            <div class="col">
                                <label for="img" class="p-2">ادخل صورة الفعالية الرياضية</label>
                                <input type="file" class="form-control form-control-sm " name="img" id="img"  required>
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

    <div class="card mt-3 text-center">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>رقم الفعالية</th>
                        <th>اسم الفعالية</th>
                        <th>النوع</th>
                        <th>الوصف</th>
                        <th>السعر</th>
                        <th colspan="2">الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr class="text-center">
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->type}}</td>
                        <td>{{$row->description}}</td>
                        <td>{{$row->price}}</td>
                        <td><a href="{{route('del',['x'=>$row])}}" style="text-decoration: none; color:black;" class="delete-link">  حذف  <i class="bi bi-trash text-danger p-2"></i></a></td> 
                        <td><a href="{{route('edit',['x'=>$row->id])}}" style="text-decoration: none; color:black;">تعديل<i class="bi bi-pencil-square text-success p-2"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
function submitForm() {
    Swal.fire({
        title: "تم إضافة المجموعة بنجاح",
        icon: "success"
    });
}

    document.querySelectorAll('.delete-link').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var href = this.getAttribute('href');
            // Show the confirmation dialog
            Swal.fire({
                title: "هل أنت متأكد؟",
                text: "لن تستطيع التراجع إذا أتممت عملية الحذف!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "نعم، احذف المجموعة",
                cancelButtonText: "إلغاء"
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, navigate to the delete route
                    window.location.href = href;
                }
            });
        });
    });
</script>
@endsection