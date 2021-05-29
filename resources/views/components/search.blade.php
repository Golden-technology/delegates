<div>
    <div class="white-box">
        <form action="#" method="get">
            <div class="container">
                <div class="row">
                    @if($types)
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="type" class="form-control">
                                    <option value="all">اختار نوع الطلب</option>
                                    @foreach($types as $type)
                                        <option {{ request()->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if($status)
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <option value="all">اختار حالة الطلب</option>
                                    @foreach($status as $st)
                                        <option {{ request()->status == $st ? 'selected' : '' }}>{{ $st }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if($customers)
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="customer" class="form-control">
                                    <option value="all">اختار العميل</option>
                                    @foreach($customers as $customer)
                                        <option {{ request()->customer == $customer->id ? 'selected' : '' }} value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if($delegates)
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="delegate" class="form-control">
                                    <option value="all">اختار المندوب</option>
                                    @foreach($delegates as $delegate)
                                        <option {{ request()->delegate == $delegate->id ? 'selected' : '' }} value="{{ $delegate->id }}">{{ $delegate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if($date)
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label>من</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="date" name="from" class="form-control" value="{{ request()->from }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1">
                                        <label>الى</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="date" name="to" class="form-control" value="{{ request()->to }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> بحث</button>
            </div>
        </form>
    </div>
</div>

{{--
    0996274513 
--}}
