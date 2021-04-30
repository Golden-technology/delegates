@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            <div class="white-box">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="number" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="col-md-4"س>
                        <div class="form-group">
                            <label>كلمة المرور</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary">حفظ</button>
            </div>
            
            <div class="white-box">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                الادوار
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    @foreach ($roles as $role)
                                        <div class="col-md-4">
                                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"> {{ $role->display_name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="line-height: 2.5" class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                الصلاحيات
                            </button>
                        </h2>
                        <div style="padding-right: 10px" id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="row">
                                @foreach ($permissions as $permission)
                                <div class="col-md-4">
                                    <input type="checkbox" {{ in_array($permission->id, $user_permissions) ? 'checked' : '' }} name="permissions[]" value="{{ $permission->id }}"> {{ $permission->display_name }}
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>

    </div>
</div>
@endsection
