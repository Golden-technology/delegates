@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title">
                قائمة المستخدمين
                <a 
                href="{{ route('users.create') }}"
                class="btn btn-primary btn-sm left">
                <i class="fa fa-plus"> اضافة</i>
                </a>
            </h3>
            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">الاسم</th>
                            <th class="border-top-0">رقم الهاتف</th>
                            <th class="border-top-0">خيارات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm text-white"><i class="fa fa-eye"></i> عرض</a> --}}                                    
                                    <a 
                                    class="btn btn-warning btn-sm user update"
                                    href="{{ route('users.edit', $user->id) }}"
                                    >
                                        <i class="fa fa-edit"></i> 
                                        تعديل
                                </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- @include('dashboard.modals.user') --}}
    </div>
</div>
@endsection