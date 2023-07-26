<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Add New Student Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="addStudentForm">
                
                    <div class="row">
                        <div class="col-lg-3 col-xl-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-3">
                                <img id="addStudentImage" class="mt-3 object-fit-cover rounded-circle" width="150px" height="150px"
                                    src="https://img.freepik.com/free-icon/user_318-159711.jpg">
                                    <div>
                                        <label class="mt-3 btn btn-outline-primary" >
                                            <input type="file" id="fileInput" hidden>
                                            <i class="fa fa-photo"></i> Upload Photo
                                        </label>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-9 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">New Student Profile</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">ClassID</label><input required id="addClassIDInput"
                                            type="text" class="form-control" placeholder=""></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Name</label><input required id="addStudentNameInput"
                                            type="text" class="form-control" placeholder=""></div>
                                    <div class="col-md-6"><label class="labels">Surname</label><input required
                                            id="addStudentSurnameInput" type="text" class="form-control" value=""
                                            placeholder=""></div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6 mt-2"><label class="labels">Email</label><input required
                                            id="addStudentEmailInput" type="email" class="form-control"
                                            placeholder=""></div>
                                    <div class="col-md-6 mt-2"><label class="labels">Contact Number</label><input required
                                            id="addStudentPhoneInput" type="phone" class="form-control" value=""
                                            placeholder=""></div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6 mt-2"><label class="labels">Sex</label>
                                        <select class="form-control"  id="addStudentSexInput" required>
                                            <option selected disabled></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-2"><label class="labels">Birthday</label>
                                        <input required type="date" class="form-control" value="" id="addStudentBirthdateInput" placeholder="state">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 mt-3"><label class="labels">Address</label><textarea
                                            id="addStudentAddressInput" type="text" class="form-control"
                                            placeholder="" value=""></textarea></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addStudentBtn" name="addStudent" >Create Profile</button>
            </div>
        </div>
    </div>
</div>
