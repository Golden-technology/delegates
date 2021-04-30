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
                                <td>{{ $company->name }}</td>
                            </td>
                            <td>
                                <th class="border-top-0">العنوان</th>
                                <td>{{ $company->address }}</td>
                            </td>
                            <td>
                                <th class="border-top-0">خيارات</th>
                                <td>
                                    <button 
                                    class="btn btn-warning btn-sm company"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#companyModal"
                                    data-name="{{ $company->name }}"
                                    data-address="{{ $company->address }}"
                                    data-action="{{ route('companies.update', $company->id) }}"
                                    >
                                        <i class="fa fa-edit"></i> 
                                        تعديل
                                    </button>
                                </td>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="white-box">
            <h3 class="box-title">قائمة العملاء</h3>
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
                        @foreach ($company->customers as $customer)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> عرض</a>

                                    <button 
                                    class="btn btn-warning btn-sm customer"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#customerModal"
                                    data-name="{{ $customer->name }}"
                                    data-address="{{ $customer->address }}"
                                    data-action="{{ route('customers.update', $customer->id) }}"
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
        </div>

        <div class="white-box">
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
                        @foreach ($company->delegates as $delegate)
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
        </div>


        @include('dashboard.modals.company')
    </div>
</div>
@endsection