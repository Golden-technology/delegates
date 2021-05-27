@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <td>
                                <th class="border-top-0">الاسم</th>
                                <td>{{ $customer->name }}</td>
                            </td>
                            <td>
                                <th class="border-top-0">رقم الهاتف</th>
                                <td>{{ $customer->phone }}</td>
                            </td>
                            <td>
                                <th class="border-top-0">العنوان</th>
                                <td>{{ $customer->address }}</td>
                            </td>
                            <td>
                                <th class="border-top-0">خيارات</th>
                                <td>
                                    @permission('customers-update')
                                    <button 
                                    class="btn btn-warning btn-sm update customer"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#customerModal"
                                    data-name="{{ $customer->name }}"
                                    data-phone="{{ $customer->phone }}"
                                    data-address="{{ $customer->address }}"
                                    data-action="{{ route('customers.update', $customer->id) }}"
                                    >
                                        <i class="fa fa-edit"></i> 
                                        تعديل
                                    </button>
                                    @endpermission
                                </td>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="white-box">
            <h3 class="box-title">قائمة الطلبات</h3>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">اسم المندوب</th>
                            <th class="border-top-0">رقم الهاتف</th>
                            <th class="border-top-0">نوع الطلب</th>
                            <th class="border-top-0">الحالة</th>
                            <th class="border-top-0">تاريخ الانشاء</th>
                            <th class="border-top-0">خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer->orders as $order)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $order->delegate->name ?? '' }}</td>
                                <td>{{ $order->delegate->phone ?? '' }}</td>
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


        @include('dashboard.modals.customer')
    </div>
</div>
@endsection