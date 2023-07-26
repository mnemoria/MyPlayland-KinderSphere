<link rel="stylesheet" href="../css/styles.css">

<!-- Create Subject Modal -->
<div class="modal fade" id="EditSubject" tabindex="-1" role="dialog" aria-labelledby="SubjectModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Title -->
            <div class="modal-header">
                <h5 class="modal-title" style="color: #377557; font-weight: bold;">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Form -->
            <form id="form" class="p-2">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="update_subject_code">Subject Code</label>
                                <input type="text" name="subject_code" id="update_subject_code" class="form-control required" placeholder="e.g. PS"/>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="update_date_added">Date Added</label>
                                <input type="date" name="date_added" id="update_date_added" class="form-control required" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>                                   
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="update_subject_name">Subject Name</label>
                                <input type="text" name="subject_name" id="update_subject_name" class="form-control required" placeholder="e.g. Pagpapahalaga sa Sarili">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="course_name">Course</label>
                            <div class="dropdown">
                                <input type="text" name="course_name" id="update_courseInput" class="form-control required" placeholder="e.g. KA - Kagandahang Asal" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu" id="update_courseToggleButtons" aria-labelledby="dropdownMenuButton" style="width: 100%; max-height: 200px; overflow-y: auto;">
                                    <!-- courses go here -->
                                </div>
                                <!-- Hidden input field to store the selected course ID -->
                                <input type="hidden" id="update_course_id" name="course_id" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label><br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="Active" id="update_active"><label for="update_active" class="form-check-label">Active</label>
                                </div>
                                <div class="form-check form-check-inline ml-3">
                                    <input class="form-check-input" type="radio" name="status" value="Archive" id="update_archive"><label for="update_archive" class="form-check-label">Archive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="modal-footer">
                    <button type="submit" class="submit btn px-4" onclick="updateForm()">Update</button>
                    <button type="button" class="btn px-4" data-dismiss="modal" style="background-color: #A40000">Close</button>
                </div>

                <!-- Temporarily store ID -->
                <input type="hidden" id="hidden_data">
            </form>
        </div>
    </div>
</div>

<script src="subject.js"></script>