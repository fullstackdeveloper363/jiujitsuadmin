<?php $__env->startSection('title','About Us | Jiu Jitsu'); ?>

<?php $__env->startSection('content'); ?>
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
                        <h4 class="card-title">About Us</h4>
                        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addAboutUsModal"
                                onclick="$('.error-message').html(''); $('.display-img').html(''); $('#addAboutUs')[0].reset();"><i
                                class="bx bx-plus me-2"></i>Add
                        </button>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Icons</th>
                                <th>Our Mission</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($about_us->count() > 0): ?>
                                <?php $__currentLoopData = $about_us; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <?php if(!empty($item->icon)): ?>
                                                <?php $__currentLoopData = json_decode($item->icon); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(!empty($icon->icon_link) ? $icon->icon_link : 'javascript:void(0)'); ?>"><img class="display_icon" src="<?php echo e(asset('storage/'.$icon->icon_image)); ?>" alt="icon_image"/></a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td><?php echo e($item->mission); ?></td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                       onchange="change_status('<?php echo e($item->id); ?>','<?php echo e($item->status); ?>')"
                                                       type="checkbox" id="flexSwitchCheckDefault"
                                                       <?php echo e($item->status == 1 ? 'checked' : ''); ?> value="<?php echo e($item->status); ?>">
                                                <label class="form-check-label"
                                                       for="flexSwitchCheckDefault"><?php echo e($item->status == 1 ? 'Active' : 'InActive'); ?></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-sm btn-outline-success getAboutUs" data-id="<?php echo e($item->id); ?>"><i class="bx bx-edit"></i></button>
                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal"
                                                        onclick="deleteUser('<?php echo e($item->id); ?>')"><i
                                                        class="bx bx-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="89" class="text-center">
                                        No Record Found
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div><!--end col-->
    </div>


    <!--Add Modal -->
    <div class="modal fade" id="addAboutUsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add About Us</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addAboutUs">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="repeatable-fields">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Icon Image</label>
                                        <input class="form-control" name="icon_image[]" type="file">
                                        <div class="error-icon-image"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="form-label">Link</label>
                                        <input class="form-control" name="link[]" type="text">
                                        <div class="error-link"></div>
                                    </div>
                                </div>
                                <button type="button"  class="btn btn-success mb-3 add-field">Add More</button>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Mission</label>
                                    <textarea rows="5" class="form-control" name="mission" style="resize: none;"></textarea>
                                    <div class="error-mission"></div>
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
    <div class="modal fade" id="editAboutUsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit About Us</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAboutUs">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="record_id" id="edit_record_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="repeatable-fields">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Icon Image</label>
                                        <input class="form-control" name="icon_image[]" type="file">
                                        <div class="error-description"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="form-label">Link</label>
                                        <input class="form-control" name="link[]" type="text">
                                        <div class="error-link"></div>
                                    </div>
                                </div>
                                <button type="button"  class="btn btn-success mb-3 add-field">Add More</button>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_mission" class="form-label">Mission</label>
                                    <textarea rows="5" class="form-control" id="edit_mission" name="mission" style="resize: none;"></textarea>
                                    <div class="error-mission"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Privacy Policy</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deletePrivacyPolicy">
                    <?php echo csrf_field(); ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
    <script>
        $('#addAboutUs').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#submitForm");
            const alert = $('.prompt');
            const modal = $('#addAboutUsModal');
            let formData = new FormData($("#addAboutUs")[0]);
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('add_about_us_request')); ?>",
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
                    if (e.responseJSON.errors['icon_image']) {
                        $('.error-icon-image').html('<small class=" error-message text-danger">' + e.responseJSON.errors['icon_image'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['link']) {
                        $('.error-link').html('<small class=" error-message text-danger">' + e.responseJSON.errors['link'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['mission']) {
                        $('.error-mission').html('<small class=" error-message text-danger">' + e.responseJSON.errors['mission'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class=" error-message text-danger">' + e.responseJSON.errors['status'][0] + '</small>');
                    }
                }
            });
        });

        $(document).on('click', '.getAboutUs', function (e) {
            e.preventDefault();
            let id = $(this).attr('data-id');

            $.ajax({
                type: "POST",
                url: "<?php echo e(route('get_about_us_detail')); ?>",
                dataType: 'json',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function () {
                    // You can add loading or any other actions here
                },
                success: function (res) {
                    if (res.success === true) {
                        let data = res.data;

                        // Populate data into modal fields
                        $('#edit_record_id').val(data.id);
                        $('#edit_user_status').val(data.status);
                        $('#edit_mission').val(data.mission);

                        // Populate repeatable fields
                        $('.repeatable-fields').html(''); // Clear existing fields
                        if (data.icon) {
                            let decodedIconData = [];
                            if (typeof data.icon === 'string') {
                                decodedIconData.push(JSON.parse(data.icon));
                            } else if (Array.isArray(data.icon)) {
                                decodedIconData = data.icon.map(item => JSON.parse(item));
                            }

                            decodedIconData.forEach(function (item,index) {
                                let icon_image_path = '<?php echo e(asset('image')); ?>'.replace('image', 'storage/' + item[index].icon_image);
                                let fieldHtml = '<div class="mb-3">' +
                                    '<label for="description" class="form-label">Icon Image</label>' +
                                    '<input class="form-control" name="icon_image[]" type="file">' +
                                    '<div class="error-icon-image"></div>' +
                                    '<div class="display-img">' +
                                    '<img src="' + icon_image_path + '" alt="icon_img"/></div>' +
                                    '</div>' +
                                    '<div class="mb-3">' +
                                    '<label for="link" class="form-label">Link</label>' +
                                    '<input class="form-control" name="link[]" value="' + item[index].icon_link + '" type="text">' +
                                    '<div class="error-link"></div>' +
                                    '</div>';
                                $('.repeatable-fields').append(fieldHtml);
                            });
                        }

                        let myModal = new bootstrap.Modal(document.getElementById('editAboutUsModal'));
                        myModal.show();
                    } else {
                        console.log('error');
                    }
                },
                error: function (e) {
                    console.log('error');
                }
            });
        });

        $('#editAboutUs').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#editSubmitForm");
            const alert = $('.prompt');
            const modal = $('#editAboutUsModal');
            let formData = new FormData($("#editAboutUs")[0]);
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('edit_about_us_request')); ?>",
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
                    if (e.responseJSON.errors['icon_image']) {
                        $('.error-icon-image').html('<small class=" error-message text-danger">' + e.responseJSON.errors['icon_image'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['link']) {
                        $('.error-link').html('<small class=" error-message text-danger">' + e.responseJSON.errors['link'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['mission']) {
                        $('.error-mission').html('<small class=" error-message text-danger">' + e.responseJSON.errors['mission'][0] + '</small>');
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
                url: "<?php echo e(route('delete_about_us_request')); ?>",
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
                url: "<?php echo e(route('update_about_us_status')); ?>",
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

        $(document).ready(function () {
            $(".add-field").click(function () {
                let fieldHtml = '<div class="repeatable-field">' +
                    '<div class="mb-3">' +
                    '<label for="description" class="form-label">Icon Image</label>' +
                    '<input class="form-control" name="icon_image[]" type="file">' +
                    '<div class="error-description"></div>' +
                    '</div>' +
                    '<div class="mb-3">' +
                    '<label for="link" class="form-label">Link</label>' +
                    '<input class="form-control" name="link[]" type="text">' +
                    '<div class="error-link"></div>' +
                    '</div>' +
                    '<button type="button" class="btn btn-danger delete-field mb-3">Delete</button>' +
                    '</div>';

                $(".repeatable-fields").append(fieldHtml);
            });

            // Use event delegation for dynamically added elements
            $(".repeatable-fields").on("click", ".delete-field", function () {
                $(this).closest('.repeatable-field').remove();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apibeckdemo/public_html/jitsu/resources/views/admin/pages/cms/about_us/index.blade.php ENDPATH**/ ?>