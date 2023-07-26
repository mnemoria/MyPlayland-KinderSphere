<link rel="stylesheet" href="../css/styles.css">

<!-- Create Course Modal -->
<div class="modal fade" id="EditStudent" tabindex="-1" role="dialog" aria-labelledby="StudentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Title -->
            <div class="modal-header">
                <h5 class="modal-title" style="color: #377557; font-weight: bold;">Edit Student Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Form -->
            <form id="form" class="p-2" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="update_classInput">Class Name</label>
                            <div class="dropdown">
                                <input type="text" name="update_classInput" id="update_classInput" class="form-control required" placeholder="Select one" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu" id="update_classToggleButtons" aria-labelledby="dropdownMenuButton" style="width: 100%; max-height: 100px; overflow-y: auto;">
                                    <!-- classes go here -->
                                </div>
                                <!-- Hidden input field to store the selected class ID-->
                                <input type="hidden" id="update_selected_class_id" name="update_class_id" required>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="update_firstName">First Name</label>
                                <input type="text" name="update_firstName" id="update_firstName" class="form-control required" placeholder="e.g. Samantha">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_lastName">Last Name</label>
                                <input type="text" name="update_lastName" id="update_lastName" class="form-control required" placeholder="e.g. Cruz">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="update_date_added">Date Added</label>
                                <input type="date" name="update_date_added" id="update_date_added" class="form-control required" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="update_email">Email</label>
                                <input type="email" name="update_email" id="update_email" class="form-control required" placeholder="e.g. Sam123@email.com">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="update_phone">Phone Number</label>
                                <input type="text" name="update_phone" id="update_phone" class="form-control required" placeholder="e.g. 09499545923">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="update_sex">Sex</label>
                                <input type="text" name="update_sex" id="update_sex" class="form-control required" placeholder="e.g. Male">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-5">
                            <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_birthdate">Birthdate</label>
                                        <input type="date" name="update_birthdate" id="update_birthdate" class="form-control required">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_parentName">Parent/Guardian Name</label>
                                        <input type="text" name="update_parentName" id="update_parentName" class="form-control required" placeholder="e.g. Keisha Rey">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_enStatus">Enrollment Status</label>
                                        <select name="update_enStatus" id="update_enStatus" class="form-control required">
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
                                        <label for="update_LRN">LRN</label>
                                        <input type="text" name="update_LRN" id="update_LRN" class="form-control required" placeholder="e.g. 501141600721">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_address">Address</label>
                                        <textarea name="update_address" id="update_address" class="form-control" rows="5" placeholder="Enter address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="modal-footer">
                    <button type="submit" class="submit btn px-4" onclick="updateForm()">Submit</button>
                    <button type="button" class="btn px-4" data-dismiss="modal" style="background-color: #A40000">Close</button>
                </div>

                <!-- Temporarily store ID -->
                <input type="hidden" id="hidden_data">
            </form>
        </div>
    </div>
</div>