@extends('admin.layout.app')

@section('title','Term & Condition | Jiu Jitsu')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">CMS</h4>
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
                        <h4 class="card-title">Term & Condition</h4>
                        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addTermConditionModal"
                                onclick="$('.error-message').html(''); $('#addTermCondition')[0].reset();"><i
                                class="bx bx-plus me-2"></i>Add
                        </button>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Detail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($term_condition->count() > 0)
                                @foreach($term_condition as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index+1 }}</th>
                                        <td>{!! $item->detail !!}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                       onchange="change_status('{{ $item->id }}','{{ $item->status }}')"
                                                       type="checkbox" id="flexSwitchCheckDefault"
                                                       {{ $item->status == 1 ? 'checked' : '' }} value="{{ $item->status }}">
                                                <label class="form-check-label"
                                                       for="flexSwitchCheckDefault">{{ $item->status == 1 ? 'Active' : 'InActive' }}</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editPrivacyPolicyModal"
                                                        onclick="editRecord('{{$item->id}}','{{addslashes($item->detail)}}','{{ $item->status }}')"><i class="bx bx-edit"></i></button>
                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        onclick="deleteUser('{{ $item->id }}')"><i
                                                        class="bx bx-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="89" class="text-center">
                                        No Record Found
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div><!--end col-->
    </div>


    <!--Add Modal -->
    <div class="modal fade" id="addTermConditionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Term & Condition</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addTermCondition">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea rows="5" class="form-control" name="description" id="editor"></textarea>
                                    <div class="error-description"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
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
    <div class="modal fade" id="editPrivacyPolicyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Term & Condition</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editPrivacyPolicy">
                    @csrf
                    <input type="hidden" name="record_id" id="edit_record" value="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea rows="5" class="form-control" name="description" id="edit_editor"></textarea>
                                    <div class="error-description"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_user_status" class="form-label">Status</label>
                                    <select class="form-control" name="status" id="edit_user_status">
                                        <option value="">Select Option</option>
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                    <div class="error-status"></div>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Term & Condition</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deletePrivacyPolicy">
                    @csrf
                    <input type="hidden" name="record_id" id="del_record_id">
                    <div class="modal-body">
                        Are you sure you want to delete this record
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
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
            })
            .catch(error => {
            });


        $('#addTermCondition').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#submitForm");
            const alert = $('.prompt');
            const modal = $('#addTermConditionModal');
            let formData = new FormData($("#addTermCondition")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('add_term_condition_request') }}",
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
                    if (e.responseJSON.errors['description']) {
                        $('.error-description').html('<small class=" error-message text-danger">' + e.responseJSON.errors['description'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class=" error-message text-danger">' + e.responseJSON.errors['status'][0] + '</small>');
                    }
                }
            });
        });

        // Edit
        let EditEditor;
        ClassicEditor
            .create( document.querySelector( '#edit_editor' ) )
            .then( editor => {
                EditEditor = editor;
            } )
            .catch( error => {
            } );
        function editRecord(id,detail,status)
        {
            $('#edit_record').val(id);
            EditEditor.setData(detail);
            $('#edit_user_status').val(status);
        }

        $('#editPrivacyPolicy').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#editSubmitForm");
            const alert = $('.prompt');
            const modal = $('#editPrivacyPolicyModal');
            let formData = new FormData($("#editPrivacyPolicy")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('edit_term_condition_request') }}",
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

                    if (e.responseJSON.errors['description']) {
                        $('.error-description').html('<small class=" error-message text-danger">' + e.responseJSON.errors['description'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class=" error-message text-danger">' + e.responseJSON.errors['status'][0] + '</small>');
                    }
                }
            });
        });

        function deleteUser(id) {
            $('#del_record_id').val(id)
        }

        $('#deletePrivacyPolicy').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#delSubmitForm");
            const alert = $('.prompt');
            const modal = $('#deleteModal');
            let formData = new FormData($("#deletePrivacyPolicy")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('delete_term_condition_request') }}",
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

        function change_status(id, value) {
            const alert = $('.prompt');
            $.ajax({
                type: "POST",
                url: "{{ route('update_term_condition_status') }}",
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

    </script>
@endsection
