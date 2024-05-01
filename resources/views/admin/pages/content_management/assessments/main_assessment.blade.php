@extends('admin.layout.app')

@section('title','Main Assessment | Jiu Jitsu')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Content Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Assessments /</a></li>
                        <li class="breadcrumb-item"><a href="">Main Assessment</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="prompt"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 align-items-center">
                        <h4 class="card-title">Main Assessments</h4>
                        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addMainCategoryModal"
                                onclick="$('.error-message').html(''); $('#addMainCategory')[0].reset();"><i
                                class="bx bx-plus me-2"></i>Add
                        </button>
                    </div>


                    <div class="table-responsive">
                        <table class="table mb-4" id="mainAssessment">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div><!--end col-->
    </div>


    <!--Add Modal -->
    <div class="modal fade" id="addMainCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Main Assessment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addMainCategory">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" />
                                    <div class="error-title"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail" />
                                    <div class="error-thumbnail"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="user_status" class="form-label">Type</label>
                                    <select class="form-control" name="type" id="user_status">
                                        <option value="">Select Option</option>
                                        <option value="top">Top</option>
                                        <option value="bottom">Bottom</option>
                                    </select>
                                    <div class="error-type"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="user_status" class="form-label">Status</label>
                                    <select class="form-control" name="status" id="user_status">
                                        <option value="">Select Option</option>
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                    <div class="error-status"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Order Number</label>
                                    <input type="text" class="form-control" name="order_number" id="title" />
                                    <div class="error-order-number"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="submitForm" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Modal -->
    <div class="modal fade" id="editMainCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Main Assessment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editMainCategory">
                    @csrf
                    <input type="hidden" name="category_id" value="" id="edit_category_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="edit_title" />
                                    <div class="error-title"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" id="edit_thumbnail" />
                                    <div class="display"></div>
                                    <div class="error-thumbnail"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_assessment_type" class="form-label">Type</label>
                                    <select class="form-control" name="type" id="edit_assessment_type">
                                        <option value="">Select Option</option>
                                        <option value="top">Top</option>
                                        <option value="bottom">Bottom</option>
                                    </select>
                                    <div class="error-type"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_category_status" class="form-label">Status</label>
                                    <select class="form-control" name="status" id="edit_category_status">
                                        <option value="">Select Option</option>
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                    <div class="error-status"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_order_number" class="form-label">Order Number</label>
                                    <input type="text" class="form-control" name="order_number" id="edit_order_number" />
                                    <div class="error-edit-order-number"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="submitForm" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Main Assessment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteMainCategory">
                    @csrf
                    <input type="hidden" name="record_id" id="del_record_id">
                    <div class="modal-body">
                        Are you sure you want to delete this assessment ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="delSubmitForm" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $('#addMainCategory').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#submitForm");
            const alert = $('.prompt');
            const modal = $('#addMainCategoryModal');
            let formData = new FormData($("#addMainCategory")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('add_main_assessment_request') }}",
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                enctype: "multipart/form-data",
                beforeSend: function () {
                    btn.prop('disabled', true);
                    btn.html('Processing');
                    $('.error-message').html('');
                },
                success: function (res) {
                    if (res.success === true) {
                        btn.prop('disabled', false);
                        btn.html('Submit');
                        modal.modal('hide');
                        alert.show();
                        alert.html('<div class="alert alert-primary alert-border-left alert-dismissible fade show" role="alert"> <i class="bx bx-check-circle me-3 align-middle"></i> <strong>' + res.message + '</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                        setTimeout(function () {
                            alert.hide();
                        }, 2000);
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Submit');
                        modal.modal('hide');
                        alert.show()
                        alert.html('<div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert"> <i class="bx bx-error-circle me-3 align-middle"></i> <strong>' + res.message + '</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                        setTimeout(function () {
                            alert.hide()
                        }, 2000);

                    }
                },
                error: function (e) {
                    btn.prop('disabled', false);
                    btn.html('Submit');
                    if (e.responseJSON.errors['title']) {
                        $('.error-title').html('<small class="error-message text-danger">' + e.responseJSON.errors['title'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['thumbnail']) {
                        $('.error-thumbnail').html('<small class="error-message text-danger">' + e.responseJSON.errors['thumbnail'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['type']) {
                        $('.error-type').html('<small class="error-message text-danger">' + e.responseJSON.errors['type'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class="error-message text-danger">' + e.responseJSON.errors['status'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['order_number']) {
                        $('.error-order-number').html('<small class="error-message text-danger">' + e.responseJSON.errors['order_number'][0] + '</small>');
                    }
                }
            });
        });

        function change_status(id, value) {
            const alert = $('.prompt');
            $.ajax({
                type: "POST",
                url: "{{ route('update_main_assessment_status') }}",
                dataType: 'json',
                data: {
                    id: id,
                    value: value,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function () {
                    $('.error-message').html('');
                },
                success: function (res) {
                    if (res.success === true) {
                        alert.show();
                        alert.html('<div class="alert alert-primary alert-border-left alert-dismissible fade show" role="alert"> <i class="bx bx-check-circle me-3 align-middle"></i> <strong>' + res.message + '</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                        setTimeout(function () {
                            alert.hide();
                        }, 2000);
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        alert.show()
                        alert.html('<div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert"> <i class="bx bx-error-circle me-3 align-middle"></i> <strong>' + res.message + '</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                        setTimeout(function () {
                            alert.hide()
                        }, 2000);

                    }
                },
                error: function (e) {
                }
            });
        }

        function editRecord(id,title,thumbnail,status,type,or_no)
        {
            $('.error-message').html('');
            $('#edit_category_id').val(id);
            $('#edit_title').val(title);
            $('.display').html('');
            let thumbnail_path = "{{asset('image')}}".replace('image',thumbnail);
            $('.display').append('<img src="'+thumbnail_path+'" alt="thumbnail" class="img-thumbnail mt-2"/>');
            $('#edit_category_status').val(status);
            $('#edit_assessment_type').val(type);
            $('#edit_order_number').val(or_no);
        }

        $('#editMainCategory').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#editSubmitForm");
            const alert = $('.prompt');
            const modal = $('#editMainCategoryModal');
            let formData = new FormData($("#editMainCategory")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('edit_main_assessment_request') }}",
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                enctype: "multipart/form-data",
                beforeSend: function () {
                    btn.prop('disabled', true);
                    btn.html('Processing');
                    $('.error-message').html('');
                },
                success: function (res) {
                    if (res.success === true) {
                        btn.prop('disabled', false);
                        btn.html('Submit');
                        modal.modal('hide');
                        alert.show();
                        alert.html('<div class="alert alert-primary alert-border-left alert-dismissible fade show" role="alert"> <i class="bx bx-check-circle me-3 align-middle"></i> <strong>' + res.message + '</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                        setTimeout(function () {
                            alert.hide();
                        }, 2000);
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Submit');
                        modal.modal('hide');
                        alert.show()
                        alert.html('<div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert"> <i class="bx bx-error-circle me-3 align-middle"></i> <strong>' + res.message + '</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                        setTimeout(function () {
                            alert.hide()
                        }, 2000);

                    }
                },
                error: function (e) {
                    btn.prop('disabled', false);
                    btn.html('Submit');
                    if (e.responseJSON.errors['title']) {
                        $('.error-title').html('<small class="error-message text-danger">' + e.responseJSON.errors['title'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['thumbnail']) {
                        $('.error-thumbnail').html('<small class="error-message text-danger">' + e.responseJSON.errors['thumbnail'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class="error-message text-danger">' + e.responseJSON.errors['status'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['type']) {
                        $('.error-type').html('<small class="error-message text-danger">' + e.responseJSON.errors['type'][0] + '</small>');
                    }
                }
            });
        });

        function deleteUser(id) {
            $('#del_record_id').val(id)
        }

        $('#deleteMainCategory').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#delSubmitForm");
            const alert = $('.prompt');
            const modal = $('#deleteModal');
            let formData = new FormData($("#deleteMainCategory")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('delete_main_assessment_request') }}",
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                beforeSend: function () {
                    btn.prop('disabled', true);
                    btn.html('Processing');
                    $('.error-message').html('');
                },
                success: function (res) {
                    if (res.success === true) {
                        btn.prop('disabled', false);
                        btn.html('Submit');
                        modal.modal('hide');
                        alert.show();
                        alert.html('<div class="alert alert-primary alert-border-left alert-dismissible fade show" role="alert"> <i class="bx bx-check-circle me-3 align-middle"></i> <strong>' + res.message + '</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                        setTimeout(function () {
                            alert.hide();
                        }, 2000);
                        setTimeout(function () {
                            window.location.reload();
                        }, 3000);
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Submit');
                        modal.modal('hide');
                        alert.show()
                        alert.html('<div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert"> <i class="bx bx-error-circle me-3 align-middle"></i> <strong>' + res.message + '</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                        setTimeout(function () {
                            alert.hide()
                        }, 2000);

                    }
                },
                error: function (e) {
                    btn.prop('disabled', false);
                    btn.html('Submit');
                }
            });
        });


        // Data Table
        $(document).ready(function () {
            $("#mainAssessment").DataTable({
                "processing": true,
                "serverSide": true,
                "paging": true,
                "bPaginate": true,
                "bLengthChange": false,
                "pageLength": 10,
                "lengthMenu": [
                    [5, 10, 20, 50],
                    ['5', '10', '20', '50']
                ],
                "ajax": {
                    "url": "{{route('get.assessment')}}",
                    "type": "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    }
                },
                'columns': [
                    {data: 'id', orderable: false},
                    {data: 'title', orderable: false},
                    {data: 'thumbnail', orderable: false},
                    {data: 'type', orderable: false},
                    {data: 'status', orderable: false},
                    {data: 'action', orderable: false},
                ],
            })
        });
    </script>
@endsection
