@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">قائمة الشركات</h3>
            {{-- <p class="text-muted">Add class <code>.table</code></p> --}}
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">الاسم</th>
                            <th class="border-top-0">العنوان</th>
                            <th class="border-top-0">خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->address }}</td>
                                <td>
                                    @permission('companies-read')
                                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> عرض</a>
                                    @endpermission

                                    @permission('companies-update')
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
                                    @endpermission
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