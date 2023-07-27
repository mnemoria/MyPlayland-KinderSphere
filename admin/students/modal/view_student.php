<link rel="stylesheet" href="../css/styles.css">

<style>
    span {
        margin-left: 5px;
    }
</style>

<!-- Create Course Modal -->
<div class="modal fade" id="ViewStudent" tabindex="-1" role="dialog" aria-labelledby="StudentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Title -->
            <div class="modal-header">
                <h5 class="modal-title" style="color: #377557; font-weight: bold;">Teacher Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Form -->
            <form id="form" class="p-2">
                <div class="modal-body">

                    <div class="row mt-2">
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <div id="view_image" class="img-fluid">
                                <img id="teacher_image" src="" class="rounded-circle" alt="Teacher Image" height="200">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label>Date Enrolled: </label><span id="view_date_added"></span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label>Name: </label><span id="view_name"></span>
                                </div>
                                <div class="col-md-6">
                                    <label>Sex: </label><span id="view_sex"></span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label>Birthdate: </label><span id="view_birthdate"></span>
                                </div>
                                <div class="col-md-6">
                                    <label>Parent Name: </label><span id="view_parentName"></span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label>LRN: </label><span id="view_LRN"></span>
                                </div>
                                <div class="col-md-6">
                                    <label>Enrollment Status: </label><span id="view_enStatus"></span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label>Email: </label><span id="view_email"></span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label>Phone Number: </label><span id="view_phone"></span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label>Address: </label><span id="view_address"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="modal-footer">
                    <button type="button" class="btn px-4" data-dismiss="modal" style="background-color: #A40000">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>