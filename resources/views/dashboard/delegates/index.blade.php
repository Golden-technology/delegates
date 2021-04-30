@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">
                قائمة المناديب
                <button 
                class="btn btn-primary btn-sm left delegate"
                data-bs-toggle="modal"
                data-bs-target="#delegateModal">
                <i class="fa fa-plus"> اضافة</i>
                </button>
            </h3>
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
                        @foreach ($delegates as $delegate)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $delegate->name }}</td>
                                <td>{{ $delegate->phone }}</td>
                                <td>{{ $delegate->address }}</td>
                                <td>
                                    <a href="{{ route('delegates.show', $delegate->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> عرض</a>
                                    
                                    <button 
                                    class="btn btn-warning btn-sm delegate update"
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