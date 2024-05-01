<?php $__env->startSection('title','Sub Assessment | Jiu Jitsu'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Content Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Assessments /</a></li>
                        <li class="breadcrumb-item"><a href="">Sub Assessment</a></li>
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
                        <h4 class="card-title">Sub Assessment</h4>
                        <button class="btn btn-outline-dark" data-bs-toggle="modal"
                                data-bs-target="#addSubCategoryModal"
                                onclick="$('.error-message').html(''); $('#addSubCategory')[0].reset();"><i
                                class="bx bx-plus me-2"></i>Add
                        </button>
                    </div>


                    <div class="table-responsive">
                        <table class="table mb-4" id="subAssessment">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Parent Assessment</th>
                                <th>Thumbnail</th>
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
    <div class="modal fade" id="addSubCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sub Assessment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addSubCategory">
                    <?php echo csrf_field(); ?>
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
                                    <label for="category" class="form-label">Assessment</label>
                                    <select  class="form-control" name="assessment" id="category">
                                        <option>Select Option</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="error-category"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="video" class="form-label">Thumbnail</label>
                                    <input type="file" id="videoInput" class="form-control" name="thumbnail"/>
                                    <div class="error-thumbnail"></div>
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

    <!--Edit Modal -->
    <div class="modal fade" id="editSubCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Sub Assessment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editSubCategory">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="assessment_id" value="" id="edit_category_id">
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
                                    <label for="edit_category" class="form-label">Assessment</label>
                                    <select  class="form-control" name="assessment" id="edit_category">
                                        <option>Select Option</option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="error-assessment"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="video" class="form-label">Thumbnail</label>
                                    <input type="file" id="videoInput" class="form-control" name="thumbnail"/>
                                    <div class="error-thumbnail"></div>
                                    <div class="image_container"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_sub_assessment_status" class="form-label">Status</label>
                                    <select class="form-control" name="status" id="edit_sub_assessment_status">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Sub Assessment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteSubCategory">
                    <?php echo csrf_field(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

    <script>

        $('#addSubCategory').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#submitForm");
            const alert = $('.prompt');
            const modal = $('#addSubCategoryModal');
            let formData = new FormData($("#addSubCategory")[0]);
            const progressBar = $('#progressBar');
            const progressDiv = $('.progress');
            const videoInput = $('#videoInput')[0];
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('add_sub_assessment_request')); ?>",
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
                    if (e.responseJSON.errors['assessment']) {
                        $('.error-category').html('<small class="error-message text-danger">' + e.responseJSON.errors['assessment'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['thumbnail']) {
                        $('.error-thumbnail').html('<small class="error-message text-danger">' + e.responseJSON.errors['thumbnail'][0] + '</small>');
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
                url: "<?php echo e(route('update_sub_assessment_status_request')); ?>",
                dataType: 'json',
                data: {
                    id: id,
                    value: value,
                    _token: '<?php echo e(csrf_token()); ?>'
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
                url: "<?php echo e(route('delete_sub_assessment_request')); ?>",
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

        function editRecord(id,assessment_id,title,image,status,order_number)
        {
            $('.error-message').html('');
            $('#edit_category_id').val(id);
            $('#edit_category').val(assessment_id);
            $('#edit_title').val(title);
            let image_path = "<?php echo e(asset('image')); ?>".replace('image',image);
            $('.image_container').append('<img src="'+image_path+'" id="edit_image_Preview" alt="image" class="avatar-md mt-2"/>');
            $('#edit_sub_assessment_status').val(status);
            $('#edit_order_number').val(order_number)
        }

        $('#editSubCategory').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#editSubmitForm");
            const alert = $('.prompt');
            const modal = $('#editSubCategoryModal');
            let formData = new FormData($("#editSubCategory")[0]);
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('edit_sub_assessment_request')); ?>",
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
                }
            });
        });

        // Data Table
        $(document).ready(function () {
            $("#subAssessment").DataTable({
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
                    "url": "<?php echo e(route('get.sub-assessment')); ?>",
                    "type": "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                    }
                },
                'columns': [
                    {data: 'id', orderable: false},
                    {data: 'title', orderable: false},
                    {data: 'parent_assessment', orderable: false},
                    {data: 'thumbnail', orderable: false},
                    {data: 'status', orderable: false},
                    {data: 'action', orderable: false},
                ],
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apibeckdemo/public_html/jitsu/resources/views/admin/pages/content_management/sub_assessment/index.blade.php ENDPATH**/ ?>