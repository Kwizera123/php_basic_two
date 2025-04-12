
<div class="row">
    <div class="col-md-3">
        
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="<?php $profile_image ?? 'uploads/dummy-profile.png'; ?>"
                         alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $username; ?></h3>

                <p class="text-muted text-center">Software Engineer</p> <!-- Adjust this if you store roles or titles -->

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Username</b> <a class="float-right"><?php echo $username; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right"><?php echo $user->email; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Phone</b> <a class="float-right"><?php echo $phone; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>First Name</b> <a class="float-right"><?php echo $first_name; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Last Name</b> <a class="float-right"><?php echo $last_name; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Birthday</b> <a class="float-right"><?php echo $birthday; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Organization</b> <a class="float-right"><?php echo $organization; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Location</b> <a class="float-right"><?php echo $location; ?></a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->

    <div class="col-md-9">

    <?php if(isset($_SESSION['error'])): ?>

        <div class="alert alert-danger">
            <?php echo $_SESSION['error']; ?>
            <?php unset ($_SESSION['error']); ?>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#settings" data-toggle="tab">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#password" data-toggle="tab">Password</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <!-- Timeline Tab -->
                    <div class="tab-pane" id="timeline">
                        <!-- The timeline -->
                        <div class="timeline timeline-inverse">
                            <div class="time-label">
                                <span class="bg-danger">10 Feb. 2014</span>
                            </div>
                            <div>
                                <i class="fas fa-envelope bg-primary"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                                    <div class="timeline-body">
                                        Sample email content from the support team about your request or inquiry.
                                    </div>
                                    <div class="timeline-footer">
                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-user bg-info"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                                    <h3 class="timeline-header"><a href="#">Sarah Young</a> accepted your friend request</h3>
                                </div>
                            </div>
                            <div>
                                <i class="fas fa-comments bg-warning"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                                    <div class="timeline-body">
                                        Sample comment or message from Jay White.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Settings Tab -->
                    <div class="tab-pane active" id="settings">
                        <form action="<?php echo base_url('/admin/user/update'); ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input disabled type="text" class="form-control" id="inputUsername" name="username" value="<?php echo $username; ?>" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputFirstName" name="first_name" value="<?php echo $first_name; ?>" placeholder="First Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputLastName" name="last_name" value="<?php echo $last_name; ?>" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $email; ?>" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="inputPhone" name="phone" value="<?php echo $phone; ?>" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputBirthday" class="col-sm-2 col-form-label">Birthday</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputBirthday" name="birthday" value="<?php echo $birthday; ?>" placeholder="Birthday">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputOrganization" class="col-sm-2 col-form-label">Organization</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputOrganization" name="organization" value="<?php echo $organization; ?>" placeholder="Organization">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputLocation" class="col-sm-2 col-form-label">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputLocation" name="location" value="<?php echo $location; ?>" placeholder="Location">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputProfileImage" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="inputProfileImage" name="profile_image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Password Tab -->
                    <div class="tab-pane" id="password">
                        <form action="#" method="POST" class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputNewPassword" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputNewPassword" name="new_password" placeholder="Enter new password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputConfirmPassword" name="confirm_password" placeholder="Confirm new password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
