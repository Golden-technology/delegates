@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">
                قائمة الطلبات
                @permission('orders-create')
                <a 
                href="{{ route('orders.create') }}"
                class="btn btn-primary btn-sm left">
                <i class="fa fa-plus"> اضافة</i>
                </a>
                @endpermission
            </h3>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">اسم العميل</th>
                            <th class="border-top-0">رقم الهاتف</th>
                            <th class="border-top-0">نوع الطلب</th>
                            <th class="border-top-0">الحالة</th>
                            <th class="border-top-0">تاريخ الانشاء</th>
                            <th class="border-top-0">خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $order->customer->name }}</td>
                                <td>{{ $order->customer->phone }}</td>
                                <td>{{ $order->type }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @permission('orders-read')
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> عرض</a>
                                    @endpermission
                                    @permission('orders-update')
                                    <a 
                                    href="{{ route('orders.edit', $order->id) }}"
                                    class="btn btn-warning btn-sm "
                                    >
                                        <i class="fa fa-edit"></i> 
                                        تعديل
                                    </a>
                                    @endpermission
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection