<link rel="stylesheet" href="../css/styles.css">

<!-- Create Course Modal -->
<div class="modal fade" id="CreateStudent" tabindex="-1" role="dialog" aria-labelledby="StudentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Title -->
            <div class="modal-header">
                <h5 class="modal-title" style="color: #377557; font-weight: bold;">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Form -->
            <form id="form" class="p-2" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="classInput">Class Name</label>
                            <div class="dropdown">
                                <input type="text" name="classInput" id="classInput" class="form-control required" placeholder="Select one" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu" id="classToggleButtons" aria-labelledby="dropdownMenuButton" style="width: 100%; max-height: 100px; overflow-y: auto;">
                                    <!-- classes go here -->
                                </div>
                                <!-- Hidden input field to store the selected class ID-->
                                <input type="hidden" id="selected_class_id" name="class_id" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="profileImage">Profile Image</label>
                                <input type="file" id="profileImage" style="padding:5px 0 0 1px; height: 5vh;" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date_added">Date Enrolled</label>
                                <input type="date" name="date_added" id="date_added" class="form-control required" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" id="firstName" class="form-control required" placeholder="e.g. Samantha">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" id="lastName" class="form-control required" placeholder="e.g. Cruz">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <input type="text" name="sex" id="sex" class="form-control required" placeholder="e.g. Male">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control required" placeholder="e.g. Sam123@email.com">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control required" placeholder="********">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone" class="form-control required" placeholder="e.g. 09499545923">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-5">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="birthdate">Birthdate</label>
                                        <input type="date" name="birthdate" id="birthdate" class="form-control required">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="parentName">Parent/Guardian Name</label>
                                        <input type="text" name="parentName" id="parentName" class="form-control required" placeholder="e.g. Keisha Rey">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="enStatus">Enrollment Status</label>
                                        <select name="enStatus" id="enStatus" class="form-control required">
                                            <option value="" disabled selected>--- Select One ---</option>
                                            <option value="Enrolled">Enrolled</option>
                                            <option value="Transferred">Transferred</option>
                                            <option value="Graduated">Graduated</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="LRN">LRN</label>
                                        <input type="text" name="LRN" id="LRN" class="form-control required" placeholder="e.g. 501141600721">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" class="form-control" rows="5" placeholder="Enter address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="modal-footer">
                    <button type="submit" class="submit btn px-4" onclick="submitForm()">Submit</button>
                    <button type="button" class="btn px-4" data-dismiss="modal" style="background-color: #A40000">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>