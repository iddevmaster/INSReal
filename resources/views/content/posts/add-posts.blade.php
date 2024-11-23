@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')
@section('page-specific-css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
@endsection
@section('content')

    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5>Add Posts</h5>
            @if (session('error'))
                <div class="alert alert-danger">
                    <span><i class='bx bx-x'></i></span>{{ session('error') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="d-flex gap-4">
                    <div class="mb-3">
                        <label for="asset_type" class="form-label fs-6">ประเภท<span class="text-danger">*</span></label>
                        <select class="form-select" required name="asset_type" id="asset_type"
                            aria-label="Example select with button addon">
                            <option disabled selected>เลือกประเภท</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fs-6">ราคา<span class="text-danger">*</span> (บาท)</label>
                        <input type="number" class="form-control" required name="price" id="price"
                            placeholder="Price"  />
                    </div>
                    <div class="mb-3">
                        <label for="area_size" class="form-label fs-6">ขนาด<span class="text-danger">*</span> (ไร่ / งาน / ตารางวา)</label>
                        <div class="d-flex">
                            <input type="number" class="form-control" required min="0" name="area_size_rai" id="area_size1"
                                placeholder="ไร่"  />
                            <input type="number" class="form-control" min="0" max="4" required name="area_size_ngan" id="area_size2"
                                placeholder="งาน"  />
                            <input type="number" class="form-control" min="0" max="100" required name="area_size_tarangw" id="area_size3"
                                placeholder="ตร.ว."  />
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fs-6">ที่อยู่<span class="text-danger">*</span></label>
                    <div class="d-flex gap-2 mb-2">
                        <select class="form-select" required name="address_province" id="address-province">
                            <option disabled selected>เลือกจังหวัด</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name_th }}</option>
                            @endforeach
                        </select>
                        <select class="form-select" required name="address_amphure" id="address-amphure">
                            <option disabled selected>เลือกอำเภอ/เขต</option>
                        </select>
                        <select class="form-select" required name="address_tumbon" id="address-tumbon">
                            <option disabled selected>เลือกตำบล/แขวง</option>
                        </select>
                        <input type="text" class="form-control" maxlength="500" id="zip_code"
                            placeholder="รหัสไปรษณีย์" readonly />
                    </div>
                    <input type="text" class="form-control" required maxlength="500" name="address" id="address"
                        placeholder="บ้านเลขที่ / หมู่ / ซอย / ถนน" />
                </div>

                <div class="mb-3">
                    <label for="defaultFormControlInput" class="form-label fs-6">GoogleMap</label>
                    <input type="url" class="form-control" name="googlemap" id="googlemap"
                        placeholder="https://maps.app.goo.gl/" pattern="https://.*" />
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label fs-6">หัวเรื่อง<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" required maxlength="500" name="news_title"
                        id="title" placeholder="หัวเรื่อง" />
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fs-6">รายละเอียด</label>
                    <textarea id="description" name="news_desc" placeholder="รายละเอียดเพิ่มเติม"></textarea>
                </div>

                <div class="mb-5">
                    <label for="mediaFileUpload" class="form-label fs-6">ไฟล์ภาพ</label>
                    <input class="form-control filepond" type="file" id="mediaFileUpload" multiple
                        ata-max-file-size="5MB">
                </div>

                <div>
                    <button type="submit" class="btn btn-success">บันทึก</button>
                    <button type="button" class="btn btn-outline-danger">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
    <!--/ Hoverable Table rows -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        // upload file using Filepond
        const inputElement = document.getElementById('mediaFileUpload');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        FilePond.setOptions({
            server: {
                process: {
                    url: '/filepond/store',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                },
                // revert: '/posts/file-delete',
                revert: {
                    url: '/filepond/delete',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    onload: (response) => {
                        console.log("On load : ", response)
                    },
                    onerror: (response) => {
                        console.log("On error : ", response.data)
                    },
                    ondata: (formData) => {
                        console.log("From data : ", formData)
                    },
                },
            },
        });

        const pond = FilePond.create(inputElement, {
            allowMultiple: true,
            name: 'doc_files[]',
        });

        tinymce.init({
            selector: 'textarea#description',
            plugins: 'searchreplace autolink autosave save directionality visualblocks visualchars image link media template table charmap advlist lists wordcount charmap quickbars linkchecker emoticons',
            menubar: 'file edit view insert format tools table tc help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
            autosave_ask_before_unload: true,
            autosave_interval: '10s',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            importcss_append: true,
        });

        $(document).ready(function() {
            // เมื่อเลือกจังหวัด
            $('#address-province').change(function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: '/get-amphures/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#address-amphure').empty();
                            $('#address-tumbon').empty();
                            $('#zip_code').val('');

                            $('#address-amphure').append(
                                '<option disabled selected>เลือกอำเภอ/เขต</option>');
                            $('#address-tumbon').append(
                                '<option disabled selected>เลือกตำบล/แขวง</option>');

                            $.each(data, function(key, value) {
                                $('#address-amphure').append('<option value="' + value
                                    .id +
                                    '">' + value.name_th + '</option>');
                            });
                        }
                    });
                } else {
                    $('#address-amphure').empty();
                    $('#address-tumbon').empty();
                    $('#zip_code').val('');

                    $('#address-amphure').append('<option disabled selected>เลือกอำเภอ/เขต</option>');
                    $('#address-tumbon').append('<option disabled selected>เลือกตำบล/แขวง</option>');
                }
            });

            // เมื่อเลือกอำเภอ
            $('#address-amphure').change(function() {
                var amphureId = $(this).val();
                if (amphureId) {
                    $.ajax({
                        url: '/get-tumbon/' + amphureId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#address-tumbon').empty();
                            $('#zip_code').val('');

                            $('#address-tumbon').append(
                                '<option disabled selected>เลือกตำบล/แขวง</option>');

                            $.each(data, function(key, value) {
                                $('#address-tumbon').append('<option value="' + value
                                    .id +
                                    '" data-zip="' + value.zipcode + '">' + value
                                    .name_th + '</option>');
                            });
                        }
                    });
                } else {
                    $('#address-tumbon').empty();
                    $('#zip_code').val('');
                    $('#address-tumbon').append('<option disabled selected>เลือกตำบล/แขวง</option>');
                }
            });

            // เมื่อเลือกตำบล
            $('#address-tumbon').change(function() {
                var zipCode = $('option:selected', this).attr('data-zip');
                $('#zip_code').val(zipCode ? zipCode : '');
            });
        });

        $(document).ready(function() {
            // Select all input and select elements
            $('input, select').on('change', function() {
                if (this.validity.rangeOverflow) {
                    $(this).addClass('invalid');
                } else {
                    $(this).removeClass('invalid');
                }
            });
            $('input[type="number"]').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
    <style>
        .invalid {
            border-color: red;
        }
    </style>
@endsection
