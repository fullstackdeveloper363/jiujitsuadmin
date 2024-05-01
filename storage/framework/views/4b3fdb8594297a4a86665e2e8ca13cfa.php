<?php $__env->startSection('title','Users | Jiu Jitsu'); ?>

<?php $__env->startSection('custom-css'); ?>
    <style>
        .display-img{
            height: 100px;
            width: 100px;
        }

        .display-img img{
            margin-top: 10px;
            object-fit: contain;
            border-radius: 10px;
            width: 100%;
            height: 100%;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
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
                        <h4 class="card-title">All Users</h4>
                        <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#userModal"
                                onclick="$('.error-message').html(''); $('#addUser')[0].reset();"><i
                                class="bx bx-plus me-2"></i>Add User
                        </button>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Training Affiliation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($users->count() > 0): ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td><?php echo e(!empty($item->name) ? $item->name : 'No Data'); ?></td>
                                        <td><?php echo e(!empty($item->email) ? $item->email : 'No Data'); ?></td>
                                        <td><?php echo e(!empty($item->gender) ? $item->gender : 'No Data'); ?></td>
                                        <td><?php echo e(!empty($item->training_affiliation) ? $item->training_affiliation : 'No Data'); ?></td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input"
                                                       onchange="change_status('<?php echo e($item->id); ?>','<?php echo e($item->status); ?>')"
                                                       type="checkbox" id="flexSwitchCheckDefault"
                                                       <?php echo e($item->status == 1 ? 'checked' : ''); ?> value="<?php echo e($item->status); ?>">
                                                <label class="form-check-label"
                                                       for="flexSwitchCheckDefault"><?php echo e($item->status == 1 ? 'Active' : 'In Active'); ?></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="<?php echo e(route('view-user-details',$item->id)); ?>" class="btn btn-sm btn-outline-warning" ><i class="bx bxs-eyedropper"></i></a>
                                                <button class="btn btn-sm btn-outline-success getUserDetail" data-bs-toggle="modal" data-bs-target="#editModal"
                                                        data-id="<?php echo e($item->id); ?>"><i class="bx bx-edit"></i></button>
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
                                    <td colspan="9" class="text-center">
                                        No Record Found
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-3 mb-3">
                                    <?php echo e($users->links('vendor.pagination.bootstrap-4')); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--end col-->
    </div>

    <!--Add Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addUser">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" name="name" id="name" type="text">
                                    <div class="error-name"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" name="email" id="email" type="email">
                                    <div class="error-email"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <h5 class="font-size-14">Gender</h5>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="gender"
                                               id="formRadios1" value="male">
                                        <label class="form-check-label" for="formRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender"
                                               id="formRadios2" value="female">
                                        <label class="form-check-label" for="formRadios2">
                                            Female
                                        </label>
                                    </div>
                                    <div class="error-gender"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="affiliations" class="form-label">Training Affiliations</label>
                                    <input class="form-control" name="affiliations" id="affiliations" type="text">
                                    <div class="error-affiliations"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="belt_rank" class="form-label">Belt Rank</label>
                                    <select class="form-control" name="belt" id="belt_rank">
                                        <option value="">Select Option</option>
                                        <option value="White Belt">White Belt</option>
                                        <option value="Blue Belt">Blue Belt</option>
                                        <option value="Purple Belt">Purple Belt</option>
                                        <option value="Brown Belt">Brown Belt</option>
                                        <option value="Black Belt">Black Belt</option>
                                        <option value="Coral Belt">Coral Belt</option>
                                        <option value="Red Belt">Red Belt</option>
                                    </select>
                                    <div class="error-belt"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="competition_count" class="form-label">Competition Count</label>
                                    <select class="form-control" name="competition_count" id="competition_count">
                                        <option value="">Select Option</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Silver">Silver</option>
                                        <option value="Bronze">Bronze</option>
                                        <option value="Diamond">Diamond</option>
                                        <option value="No Place">No Place</option>
                                    </select>
                                    <div class="error-competition-count"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="profile_image" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" name="profile_image"
                                           data-allow-reorder="true" data-max-file-size="3MB">
                                    <div class="error-image"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <div class="error-password"></div>
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

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea rows="5" style="resize: none;" class="form-control" name="description" id="description"></textarea>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteUser">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="modal-body">
                        Are you sure you want to delete this user
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="delSubmitForm" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editUser">
                    <input type="hidden" value="" name="user_id" id="edit_user_id">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Name</label>
                                    <input class="form-control" name="name" id="edit_name" type="text">
                                    <div class="error-name"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_email" class="form-label">Email</label>
                                    <input class="form-control" name="email" id="edit_email" type="email">
                                    <div class="error-email"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <h5 class="font-size-14">Gender</h5>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="gender"
                                               id="edit_gender_radio" value="male">
                                        <label class="form-check-label" for="edit_gender_radio">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender"
                                               id="edit_gender_radio2" value="female">
                                        <label class="form-check-label" for="edit_gender_radio2">
                                            Female
                                        </label>
                                    </div>
                                    <div class="error-gender"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_affiliations" class="form-label">Training Affiliations</label>
                                    <input class="form-control" name="affiliations" id="edit_affiliations" type="text">
                                    <div class="error-affiliations"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_belt_rank" class="form-label">Belt Rank</label>
                                    <select class="form-control" name="belt" id="edit_belt_rank">
                                        <option value="">Select Option</option>
                                        <option value="White Belt">White Belt</option>
                                        <option value="Blue Belt">Blue Belt</option>
                                        <option value="Purple Belt">Purple Belt</option>
                                        <option value="Brown Belt">Brown Belt</option>
                                        <option value="Black Belt">Black Belt</option>
                                        <option value="Coral Belt">Coral Belt</option>
                                        <option value="Red Belt">Red Belt</option>
                                    </select>
                                    <div class="error-belt"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_competition_count" class="form-label">Competition Count</label>
                                    <select class="form-control" name="competition_count" id="edit_competition_count">
                                        <option value="">Select Option</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Silver">Silver</option>
                                        <option value="Bronze">Bronze</option>
                                        <option value="Diamond">Diamond</option>
                                        <option value="No Place">No Place</option>
                                    </select>
                                    <div class="error-competition-count"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="edit_profile_image" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" name="profile_image">
                                    <div class="display-img"></div>
                                    <div class="error-image"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <div class="error-password"></div>
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
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="edit_description" class="form-label">Description</label>
                                    <textarea rows="5" style="resize: none;" class="form-control" name="description" id="edit_description"></textarea>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

    <script>
        $('#addUser').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#submitForm");
            const alert = $('.prompt');
            const modal = $('#userModal');
            let formData = new FormData($("#addUser")[0]);
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('add_user_request')); ?>",
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
                    if (e.responseJSON.errors['name']) {
                        $('.error-name').html('<small class=" error-message text-danger">' + e.responseJSON.errors['name'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['email']) {
                        $('.error-email').html('<small class=" error-message text-danger">' + e.responseJSON.errors['email'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['gender']) {
                        $('.error-gender').html('<small class=" error-message text-danger">' + e.responseJSON.errors['gender'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['affiliations']) {
                        $('.error-affiliations').html('<small class=" error-message text-danger">' + e.responseJSON.errors['affiliations'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['belt']) {
                        $('.error-belt').html('<small class=" error-message text-danger">' + e.responseJSON.errors['belt'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['competition_count']) {
                        $('.error-competition-count').html('<small class=" error-message text-danger">' + e.responseJSON.errors['competition_count'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['profile_image']) {
                        $('.error-image').html('<small class=" error-message text-danger">' + e.responseJSON.errors['profile_image'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['password']) {
                        $('.error-password').html('<small class=" error-message text-danger">' + e.responseJSON.errors['password'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class=" error-message text-danger">' + e.responseJSON.errors['status'][0] + '</small>');
                    }
                }
            });
        });

        function deleteUser(id) {
            $('#user_id').val(id)
        }

        $('#deleteUser').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#delSubmitForm");
            const alert = $('.prompt');
            const modal = $('#deleteModal');
            let formData = new FormData($("#deleteUser")[0]);
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('delete_user_request')); ?>",
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
                url: "<?php echo e(route('update_user_status')); ?>",
                dataType: 'json',
                data: {
                    user_id: id,
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

        $('.getUserDetail').on('click', function (e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('get_user_detail')); ?>",
                dataType: 'json',
                data: {
                    user_id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function () {
                    $('.error-message').html('');
                },
                success: function (res) {
                    if (res.success === true) {
                        $('#edit_user_id').val(res.data.id);
                        $('#edit_name').val(res.data.name);
                        $('#edit_email').val(res.data.email);
                        if(res.data.gender === 'male')
                        {
                            $('#edit_gender_radio').attr('checked',true);
                        }
                        else
                        {
                            $('#edit_gender_radio2').attr('checked',true);
                        }
                        $('#edit_affiliations').val(res.data.training_affiliation);
                        $('#edit_belt_rank').val(res.data.belt_rank);
                        $('#edit_competition_count').val(res.data.competition_count);

                        if(res.data.profile_image !== '')
                        {
                            let image_path = "<?php echo e(asset('images')); ?>".replace('images',res.data.profile_image)
                            $('.display-img').html(`<img src="${image_path}" />`)
                        }
                        else
                        {
                            $('.display-img').html('No Image Uploaded');
                        }
                        $('#edit_user_status').val(res.data.status);
                        $('#edit_description').text(res.data.description)



                    } else {

                    }
                },
                error: function (e) {
                }
            });
        });

        $('#editUser').on('submit', function (e) {
            e.preventDefault();
            const btn = $("#editSubmitForm");
            const alert = $('.prompt');
            const modal = $('#editModal');
            let formData = new FormData($("#editUser")[0]);
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('edit_user_request')); ?>",
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
                    if (e.responseJSON.errors['name']) {
                        $('.error-name').html('<small class=" error-message text-danger">' + e.responseJSON.errors['name'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['email']) {
                        $('.error-email').html('<small class=" error-message text-danger">' + e.responseJSON.errors['email'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['gender']) {
                        $('.error-gender').html('<small class=" error-message text-danger">' + e.responseJSON.errors['gender'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['affiliations']) {
                        $('.error-affiliations').html('<small class=" error-message text-danger">' + e.responseJSON.errors['affiliations'][0] + '</small>');
                    }

                    if (e.responseJSON.errors['belt']) {
                        $('.error-belt').html('<small class=" error-message text-danger">' + e.responseJSON.errors['belt'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['competition_count']) {
                        $('.error-competition-count').html('<small class=" error-message text-danger">' + e.responseJSON.errors['competition_count'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['profile_image']) {
                        $('.error-image').html('<small class=" error-message text-danger">' + e.responseJSON.errors['profile_image'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['password']) {
                        $('.error-password').html('<small class=" error-message text-danger">' + e.responseJSON.errors['password'][0] + '</small>');
                    }
                    if (e.responseJSON.errors['status']) {
                        $('.error-status').html('<small class=" error-message text-danger">' + e.responseJSON.errors['status'][0] + '</small>');
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apibeckdemo/public_html/jitsu/resources/views/admin/pages/users/index.blade.php ENDPATH**/ ?>