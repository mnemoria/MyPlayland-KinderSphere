<link rel="stylesheet" href="../css/styles.css">

<!-- Create Course Modal -->
<div class="modal fade" id="EditClass" tabindex="-1" role="dialog" aria-labelledby="ClassModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Title -->
            <div class="modal-header">
                <h5 class="modal-title" style="color: #377557; font-weight: bold;">Edit Class Details</h5>
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
                                <label for="update_className">Class Name</label>
                                <input type="text" name="update_className" id="update_className" class="form-control required" placeholder="e.g. Love">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="update_classLevel">Class Level</label>
                                <select name="update_classLevel" id="update_classLevel" class="form-control required">
                                    <option value="" disabled selected>--- Select One ---</option>
                                    <option value="Nursery">Nursery</option>
                                    <option value="Kindergarten 1">Kindergarten 1</option>
                                    <option value="Kindergarten 2">Kindergarten 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="update_teacherInput">Teacher</label>
                            <div class="dropdown">
                                <input type="text" name="update_teacherInput" id="update_teacherInput" class="form-control required" placeholder="Select one" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu" id="update_teacherToggleButtons" aria-labelledby="dropdownMenuButton" style="width: 100%; max-height: 100px; overflow-y: auto;">
                                    <!-- courses go here -->
                                </div>
                                <!-- Hidden input field to store the selected course ID -->
                                <input type="hidden" id="update_selected_teacher_id" name="teacher_id" required>
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
                    <button type="submit" class="update btn px-4" onclick="updateForm()">Update</button>
                    <button type="button" class="btn px-4" data-dismiss="modal" style="background-color: #A40000">Close</button>
                </div>
                
                <!-- Temporarily store ID -->
                <input type="hidden" id="hidden_data">
            </form>
        </div>
    </div>
</div>