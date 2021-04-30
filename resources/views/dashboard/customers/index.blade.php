@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">
                قائمة العملاء
                @permission('customers-create')
                <button 
                class="btn btn-primary btn-sm left customer"
                data-bs-toggle="modal"
                data-bs-target="#customerModal">
                <i class="fa fa-plus"> اضافة</i>
                </button>
                @endpermission
            </h3>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">الاسم</th>
                            <th class="border-top-0">رقم الهاتف</th>
                            <th class="border-top-0">العنوان</th>
                            <th class="border-top-0">تم الاتفاق</th>
                            <th class="border-top-0">خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->status ? 'نعم' : 'لا' }}</td>
                                <td>
                                    @permission('customers-read')
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> عرض</a>
                                    @endpermission
                                    @permission('customers-update')
                                    <button 
                                    class="btn btn-warning btn-sm customer update"
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