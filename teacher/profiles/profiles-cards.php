<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Students</h6>
    </div>
    <div class="card-body">
    <div class="d-flex flex-wrap">

            <div class="col-lg-3">
                <div class="text-center card-box card shadow mb-4">
                    <div class="member-card pt-2 pb-2">
                        <div class="row d-flex justify-content-end pl-2 pr-2"><span class="badge badge-success">Enrolled</span></div>
                        <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <div class="mt-2">
                            <h4 class="font-weight-bold">
                                <?php echo $fetch_student['firstname']; ?>
                            </h4>
                            <p class="">
                                <span class="font-weight-bold <?php if ($sex == "Female") {
                                    echo 'text-female';
                                } else {
                                    echo 'text-male';
                                } ?>">
                                    <?php echo $sex ?> </span>
                                <span> | </span>
                                <span>
                                    <?php echo $fetch_student['birthdate']; ?>
                                </span>
                            </p>
                        </div>
                        <ul class="social-links list-inline">
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                    href="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                    href="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips"
                                    href="" data-original-title="Skype"><i class="fa fa-skype"></i></a>
                            </li>
                        </ul>
                        <button class="btn btn-primary btn-edit" data-email="<?php echo $fetch_student['email']; ?>">Edit</button>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mt-3">
                                        <h4>2563</h4>
                                        <p class="mb-0 text-muted">Wallets Balance</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-3">
                                        <h4>6952</h4>
                                        <p class="mb-0 text-muted">Income amounts</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-3">
                                        <h4>1125</h4>
                                        <p class="mb-0 text-muted">Total Transactions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <!-- end row -->
</div>