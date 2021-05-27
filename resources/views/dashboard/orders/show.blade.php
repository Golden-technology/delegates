@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <td>
                                            <th class="border-top-0">اسم العميل</th>
                                            <td>{{ $order->customer->name }}</td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <th class="border-top-0">رقم الهاتف</th>
                                            <td>{{ $order->customer->phone }}</td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <th class="border-top-0">العنوان</th>
                                            <td>{{ $order->customer->address }}</td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <th class="border-top-0">نوع الطلب</th>
                                            <td>{{ $order->type }}</td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <th class="border-top-0">حالة الطلب</th>
                                            <td>{{ $order->status }}</td>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <table class="table text-nowrap">
                            <tr>
                                <th>ملاحظات</th>
                            </tr>
                            <tr>
                                <td>{{ $order->notes }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        {{-- <div class="white-box">
            <h3 class="box-title">قائمة المناديب</h3>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">الاسم</th>
                            <th class="border-top-0">رقم الهاتف</th>
                            <th class="border-top-0">العنوان</th>
                            <th class="border-top-0">خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($delegate->delegates as $delegate)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $delegate->name }}</td>
                                <td>{{ $delegate->phone }}</td>
                                <td>{{ $delegate->address }}</td>
                                <td>
                                    <a href="{{ route('delegates.show', $delegate->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> عرض</a>
                                    
                                    <button 
                                    class="btn btn-warning btn-sm delegate"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#delegateModal"
                                    data-name="{{ $delegate->name }}"
                                    data-address="{{ $delegate->address }}"
                                    data-action="{{ route('delegates.update', $delegate->id) }}"
                                    >
                                        <i class="fa fa-edit"></i> 
                                        تعديل
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}


        @include('dashboard.modals.delegate')
    </div>
</div>
@endsection