@extends('dashboard.layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <form action="{{ route('orders.update', $order->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>العميل</label>
                            <select class="form-control" name="customer_id" required>
                                <option disabled selected value="">اختار العميل</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>نوع الطلب</label>
                            <select  class="form-control" name="type" required>
                                <option disabled selected value="">اختار نوع الطلب</option>
                                @foreach ($types as $type)
                                    <option {{ $order->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>الحالة</label>
                            <select  class="form-control" name="status" required>
                                <option disabled selected value="">اختار حالة الطلب</option>
                                @foreach ($status as $stat)
                                    <option {{ $order->status == $stat ? 'selected' : '' }}>  {{ $stat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>ملاحظات</label>
                            <textarea name="notes" cols="30" rows="5" class="form-control">{{ $order->notes }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> تعديل</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection