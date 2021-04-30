<div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyModalLabel">تعديل بيانات شركة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST">
                
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">اسم الشركة:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">العنوان:</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
<script>
    $('.company').click(function () {
        $('#companyModal form').attr('action', $(this).data('action'))
        $('#companyModal form input[name="name"]').val($(this).data('name'))
        $('#companyModal form input[name="address"]').val($(this).data('address'))
    })
</script>
@endpush