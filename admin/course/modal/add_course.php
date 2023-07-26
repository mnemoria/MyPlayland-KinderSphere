<link rel="stylesheet" href="../css/styles.css">

<!-- Create Course Modal -->
<div class="modal fade" id="CreateCourse" tabindex="-1" role="dialog" aria-labelledby="CourseModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Title -->
            <div class="modal-header">
                <h5 class="modal-title" style="color: #377557; font-weight: bold;">Add Course</h5>
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
                                <label for="course_code">Course Code</label>
                                <input type="text" name="course_code" id="course_code" class="form-control required" placeholder="e.g. M"/>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="course_name">Course Name</label>
                                <input type="text" name="course_name" id="course_name" class="form-control required" placeholder="e.g. Mathematics">
                            </div>
                        </div>
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