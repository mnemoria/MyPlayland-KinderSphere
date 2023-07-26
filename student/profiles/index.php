<?php include "../base-start.php" ?>

<link rel="stylesheet" href="styles.css">

<?php include "student_data.php" ?>

            <div class="container emp-profile">
            
                <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <?php if ($picture !== null) { ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($picture); ?>" alt="Profile Image">
                            <?php } else { ?>
                                <!-- <img src="../../img/undraw_profile_1.svg" alt="Default Profile Image"> -->
                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h4>
                                        <?php echo $lastname ?>, <?php echo $firstname ?>
                                    </h4>
                                    <h6>
                                        <?php echo $status ?>
                                    </h6>
                                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Class Info</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                        <input type="submit" class="btn btn-success btn-edit d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" type="submit" name="btnAddMore" value="Edit Profile"/>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Full Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $firstname;?> <?php echo $lastname; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sex</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $sex; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Birthdate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $birthdate; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $email; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $phone; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Guardian Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $parent_name; ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Learner Reference Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $lrn; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Class Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $class_level; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Class Section</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $class_name; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Teacher</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $t_firstname;?> <?php echo $t_lastname; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Teacher Contact</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $t_phone; ?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
<?php include "../base-end.php" ?>