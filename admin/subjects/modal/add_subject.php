<link rel="stylesheet" href="../css/styles.css">

<!-- Create Subject Modal -->
<div class="modal fade" id="CreateSubject" tabindex="-1" role="dialog" aria-labelledby="SubjectModal" aria-hidden="true">
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
                                <label for="subject_code">Subject Code</label>
                                <input type="text" name="subject_code" id="subject_code" class="form-control required" placeholder="e.g. PS"/>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_added">Date Added</label>
                                <input type="date" name="date_added" id="date_added" class="form-control required" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>                                   
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="subject_name">Subject Name</label>
                                <input type="text" name="subject_name" id="subject_name" class="form-control required" placeholder="e.g. Pagpapahalaga sa Sarili">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="course_name">Course</label>
                            <div class="dropdown">
                                <input type="text" name="course_name" id="courseInput" class="form-control required" placeholder="e.g. KA - Kagandahang Asal" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu" id="courseToggleButtons" aria-labelledby="dropdownMenuButton" style="width: 100%; max-height: 200px; overflow-y: auto;">
                                    <!-- courses go here -->
                                </div>
                                <!-- Hidden input field to store the selected course ID -->
                                <input type="hidden" id="selected_course_id" name="course_id" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="classLevel">Class Level</label>
                                <select name="classLevel" id="classLevel" class="form-control required">
                                    <option value="" disabled selected>--- Select One ---</option>
                                    <option value="Nursery">Nursery</option>
                                    <option value="Kindergarten 1">Kindergarten 1</option>
                                    <option value="Kindergarten 2">Kindergarten 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label><br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" value="Active" id="active"><label for="active" class="form-check-label">Active</label>
                                </div>
                                <div class="form-check form-check-inline ml-3">
                                    <input class="form-check-input" type="radio" name="status" value="Archive" id="archive"><label for="archive" class="form-check-label">Archive</label>
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

<script src="subjects.js"></script>