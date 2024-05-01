@extends('admin.layout.app')

@section('title','Assessment Level 2 | Jiu Jitsu')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Content Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Assessments /</a></li>
                        <li class="breadcrumb-item"><a href="">Assessment Level 2</a></li>
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
                        <h4 class="card-title">Assessment Level 2</h4>
                        <button class="btn btn-outline-dark" data-bs-toggle="modal"
                                data-bs-target="#addSubCategoryModal"
                                onclick="$('.error-message').html(''); $('#addChildAssessment')[0].reset();"><i
                                class="bx bx-plus me-2"></i>Add
                        </button>
                    </div>


                    <div class="table-responsive">
                        <table class="table mb-4" id="assessment2">

                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Parent Assessment</th>
                                <th>Thumbnail</th>
                                <th>Video</th>
                                <th>Youtube</th>
                                <th>Skill Point</th>
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

    <div class="modal fade" id="addSubCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sub Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addChildAssessment">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"/>
                                    <div class="error-title"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Sub Assessments</label>
                                    <select  class="form-control" name="sub_assessments" id="category">
                                        <option>Select Option</option>
                                        @foreach($sub_assessment as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-category"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" id="thumbnail"/>
                                    <div class="error-thumbnail"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="video" class="form-label">Video</label>
                                    <input type="file" id="videoInput" class="form-control" name="video"/>
                                    <div class="error-video"></div>
                                    <video id="videoPreview" width="250" height="250" controls style="display: none;"></video>
                                    <div class="progress" style="height: 20px; margin-top: 10px; display: none;">
                                        <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100">
                                            <span id="progressCount"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="youtube_link" class="form-label">Youtube Link</label>
                                    <input class="form-control" name="youtube_link" id="youtube_link"  type="text" placeholder="Youtube Link..."/>
                                    <div class="error-youtube-link"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="skill_point" class="form-label">Skill Point</label>
                                    <textarea rows="5" class="form-control" name="skill_point" id="skill_point" style="resize: none;"></textarea>
                                    <div class="error-skill-point"></div>
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
                                    <label for="order_number" class="form-label">Order Number</label>
                                    <input type="text" class="form-control" name="order_number" id="order_number"/>
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sub Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editChildAssessment">
                    @csrf
                    <input type="hidden" value="" name="id" id="edit_assessment_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="edit_title"/>
                                    <div class="error-title"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_assessment" class="form-label">Sub Assessments</label>
                                    <select  class="form-control" name="sub_assessments" id="edit_assessment">
                                        <option>Select Option</option>
                                        @foreach($sub_assessment as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="error-category"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" id="edit_thumbnail"/>
                                    <div class="error-thumbnail"></div>
                                    <div class="display-img"></div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="video" class="form-label">Video</label>
                                    <input type="file" id="videoInput" class="form-control" name="video"/>
                                    <div class="error-video"></div>
                                    <video id="videoPreview" width="250" height="250" controls style="display: none;"></video>
                                    <div class="progress" style="height: 20px; margin-top: 10px; display: none;">
                                        <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                             aria-valuemin="0" aria-valuemax="100">
                                            <span id="progressCount"></span>
                                        </div>
                                    </div>
                                    <div class="video_container"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_youtube_link" class="form-label">Youtube Link</label>
                                    <input class="form-control" name="youtube_link" id="edit_youtube_link"  type="text" placeholder="Youtube Link..."/>
                                    <div class="error-edit-youtube-link"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_skill_point" class="form-label">Skill Point</label>
                                    <textarea rows="5" class="form-control" name="skill_point" id="edit_skill_point" style="resize: none;"></textarea>
                                    <div class="error-skill-point"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_child_assessment_status" class="form-label">Status</label>
                                    <select class="form-control" name="status" id="edit_child_assessment_status">
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
                                    <input type="text" class="form-control" name="order_number" id="edit_order_number"/>
                                    <div class="error-edit-order-number"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="editSubmitForm" class="btn btn-primary">Save changes</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Child Assessment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteSubCategory">
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
        $('#videoInput').change(function() {
            const file = this.files[0];
            const videoPreview = $('#videoPreview')[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    videoPreview.src = event.target.result;
                    videoPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        $('#addChildAssessment').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#submitForm");
            const alert = $('.prompt');
            const modal = $('#addSubCategoryModal');
            let formData = new FormData($("#addChildAssessment")[0]);
            const progressBar = $('#progressBar');
            const progressDiv = $('.progress');
            const videoInput = $('#videoInput')[0];
            $.ajax({
                type: "POST",
                url: "{{ route('add_child_assessment_request') }}",
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                enctype: "multipart/form-data",
                xhr: function () {
                    const xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function (event) {
                        if (event.lengthComputable) {
                            const percent = Math.round((event.loaded / event.total) * 100);
                            progressBar.css('width', percent + '%').attr('aria-valuenow', percent);
                            $('#progressCount').text(percent + '%'); // Update progress count text
                        }
                    });
                    return xhr;

                },
                beforeSend: function () {
                    btn.prop('disabled', true);
                    btn.html('Processing');
                    $('.error-message').html('');
                    if (videoInput.files.length > 0) {
                        progressDiv.show();
                    }
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
                        progressDiv.hide();
                    } else {
                        btn.prop('disabled', false);
                        btn.html('Submit');
                        modal.modal('hide');
                        alert.show()
                        alert.html('<div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert"> <i class="bx bx-error-circle me-3 align-middle"></i> <strong>' + res.message + '</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                        setTimeout(function () {
                            alert.hide()
                        }, 2000);
                        progressDiv.hide();
                    }
                },
                error: function (e) {
                    btn.prop('disabled', false);
                    btn.html('Submit');
                    if (e.responseJSON.errors['title']) {
                        $('.error-title').html('<small class="error-message text-danger">' + e.responseJSON.errors['title'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['category']) {
                        $('.error-category').html('<small class="error-message text-danger">' + e.responseJSON.errors['category'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['video']) {
                        $('.error-video').html('<small class="error-message text-danger">' + e.responseJSON.errors['video'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['thumbnail']) {
                        $('.error-thumbnail').html('<small class="error-message text-danger">' + e.responseJSON.errors['thumbnail'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['skill_point']) {
                        $('.error-skill-point').html('<small class="error-message text-danger">' + e.responseJSON.errors['skill_point'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class="error-message text-danger">' + e.responseJSON.errors['status'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['order_number']) {
                        $('.error-order-number').html('<small class="error-message text-danger">' + e.responseJSON.errors['order_number'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['youtube_link']) {
                        $('.error-youtube-link').html('<small class="error-message text-danger">' + e.responseJSON.errors['youtube_link'][0] + '</small>');
                    }
                }
            });
        });

        function change_status(id, value) {
            const alert = $('.prompt');
            $.ajax({
                type: "POST",
                url: "{{ route('update_child_assessment_status_request') }}",
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

        function deleteUser(id) {
            $('#del_record_id').val(id)
        }

        $('#deleteSubCategory').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#delSubmitForm");
            const alert = $('.prompt');
            const modal = $('#deleteModal');
            let formData = new FormData($("#deleteSubCategory")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('delete_child_assessment_request') }}",
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

        function editRecord(id)
        {
            const videoDiv = $('.video_container');
            const imageDiv = $('.display-img');
            const errorDiv = $('.error-message');
            $.ajax({
                type: "POST",
                url: "{{ route('fetch_child_assessment_data') }}",
                dataType: 'json',
                data: {
                    id: id,
                    _token : "{{ csrf_token() }}"
                },
                beforeSend: function () {},
                success: function (res) {
                    if (res.success === true) {
                        let data = res.data;
                        console.log(data);
                        videoDiv.html('');
                        imageDiv.html('')
                        errorDiv.html('');
                        $('#edit_assessment_id').val(data.id);
                        $('#edit_assessment').val(data.sub_assessment_id);
                        $('#edit_title').val(data.title);
                        $('#edit_skill_point').val(data.skill_point);
                        let video_path = "{{ asset('video') }}".replace('video', data.video);
                        videoDiv.append('<video src="'+video_path+'" width="200" height="200" controls autoplay/>');
                        $('#edit_child_assessment_status').val(data.status);
                        let image_path = "{{ asset('image') }}".replace('image',data.thumbnail);
                        imageDiv.append('<img src="'+image_path+'" alt="image"/>');
                        $('#edit_order_number').val(data.order_number);
                        $('#edit_youtube_link').val(data.youtube_link);
                    } else {
                        console.log(res.data)
                    }
                },
                error: function (e) {
                    console.log(e)
                }
            });


        }

        $('#editChildAssessment').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#editSubmitForm");
            const alert = $('.prompt');
            const modal = $('#editModal');
            let formData = new FormData($("#editChildAssessment")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('edit_child_assessment_request') }}",
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                data: formData,
                enctype: "multipart/form-data",
                beforeSend: function () {
                    btn.prop('disabled', true);
                    btn.html('Processing');
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
                    if (e.responseJSON.errors['assessment']) {
                        $('.error-assessment').html('<small class="error-message text-danger">' + e.responseJSON.errors['assessment'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['thumbnail']) {
                        $('.error-thumbnail').html('<small class="error-message text-danger">' + e.responseJSON.errors['thumbnail'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class="error-message text-danger">' + e.responseJSON.errors['status'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['order_number']) {
                        $('.error-edit-order-number').html('<small class="error-message text-danger">' + e.responseJSON.errors['order_number'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['youtube_link']) {
                        $('.error-edit-youtube-link').html('<small class="error-message text-danger">' + e.responseJSON.errors['youtube_link'][0] + '</small>');
                    }
                }
            });
        });


        $('.dataTables_length').css('display','none');

        // Data Table
        $(document).ready(function () {
            $("#assessment2").DataTable({
                "processing": true,
                "serverSide": true,
                "paging": true,
                "bPaginate": true,
                "pageLength": 10,
                "bLengthChange": false,
                "lengthMenu": [
                    [5, 10, 20, 50],
                    ['5', '10', '20', '50']
                ],
                "ajax": {
                    "url": "{{route('get.assessment_level_2')}}",
                    "type": "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    }
                },
                'columns': [
                    {data: 'id', orderable: false},
                    {data: 'title', orderable: false},
                    {data: 'parent_assessment', orderable: false},
                    {data: 'thumbnail', orderable: false},
                    {data: 'video', orderable: false},
                    {data: 'youtube', orderable: false},
                    {data: 'skill_point', orderable: false},
                    {data: 'status', orderable: false},
                    {data: 'action', orderable: false},
                ],
            })
        });

    </script>
@endsection
