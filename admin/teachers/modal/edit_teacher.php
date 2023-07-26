<link rel="stylesheet" href="../css/styles.css">

<!-- Create Course Modal -->
<div class="modal fade" id="EditTeacher" tabindex="-1" role="dialog" aria-labelledby="TeacherModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Title -->
            <div class="modal-header">
                <h5 class="modal-title" style="color: #377557; font-weight: bold;">Edit Teacher Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Form -->
            <form id="form" class="p-2">
                <div class="modal-body">

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
                                        <label for="update_maritalStatus">Marital Status</label>
                                        <select name="update_maritalStatus" id="update_maritalStatus" class="form-control required">
                                            <option value="" disabled selected>--- Select One ---</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Divorced">Separated</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_emStatus">Employment Status</label>
                                        <select name="update_emStatus" id="update_emStatus" class="form-control required">
                                            <option value="" disabled selected>--- Select One ---</option>
                                            <option value="Full-time">Full-time</option>
                                            <option value="Part-time">Part-time</option>
                                            <option value="Archive">Archive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update_teacherNo">ID Number</label>
                                        <input type="text" name="update_teacherNo" id="update_teacherNo" class="form-control required" placeholder="e.g. 0012345">
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