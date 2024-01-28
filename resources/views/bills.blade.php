@extends('layouts.dashboard')
@section('content')
<div class="card mt-3 text-center">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الفاتورة</th>
                        <th >الاسم</th>
                        <th>العدد</th>
                        <th>تاريخ الفعالية</th>
                        <th >تاريخ الطلب</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr class="text-center">
                        <td>{{$row->email}}</td>
                        <td>{{$row->billNo}}</td>
                        <td>{{$row->typeName}}</td>
                        <td>{{$row->qty}}</td>
                        <td>{{$row->date}}</td>
                        <td>{{$row->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection