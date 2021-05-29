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
                                <td>{{ $delegate->name }}</td>
                            </td>
                            <td>
                                <th class="border-top-0">رقم الهاتف</th>
                                <td>{{ $delegate->phone }}</td>
                            </td>
                            <td>
                                <th class="border-top-0">العنوان</th>
                                <td>{{ $delegate->address }}</td>
                            </td>
                            <td>
                                <th class="border-top-0">خيارات</th>
                                <td>
                                    @permission('delegates-update')
                                        <button 
                                        class="btn btn-warning btn-sm update delegate"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#delegateModal"
                                        data-name="{{ $delegate->name }}"
                                        data-phone="{{ $delegate->phone }}"
                                        data-address="{{ $delegate->address }}"
                                        data-action="{{ route('delegates.update', $delegate->id) }}"
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
                            <th class="border-top-0">اخر زيارة</th>
                            <th class="border-top-0">خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($delegate->orders as $order)
                            <tr class="{{ getClass($order->status) }}">
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


        @include('dashboard.modals.delegate')
    </div>
</div>
@endsection