<!-- Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Student Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3 col-xl-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-3">
                            <img class="rounded-circle mt-3" width="150px"
                                src="https://img.freepik.com/free-icon/user_318-159711.jpg">
                            <span class="font-weight-bold mt-3">
                                <span id="studentName"></span> <span id="studentSurname"></span>
                            </span>
                            
                            <span class="text-black-50" id="studentID"></span>
                        </div>
                    </div>
                    <div class="col-md-9 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                                <input type="hidden" name="id" id="studentIDInput"> 
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Name</label><input id="studentNameInput"
                                        type="text" class="form-control" placeholder=""></div>
                                <div class="col-md-6"><label class="labels">Surname</label><input
                                        id="studentSurnameInput" type="text" class="form-control" value=""
                                        placeholder=""></div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-2"><label class="labels">Email</label><input
                                        id="studentEmailInput" type="email" class="form-control"
                                        placeholder="student@email.com"></div>
                                <div class="col-md-6 mt-2"><label class="labels">Contact Number</label><input
                                        id="studentPhoneInput" type="phone" class="form-control" value=""
                                        placeholder=""></div>
                            </div>

                            <div class="row ">
                                <div class="col-md-6 mt-2"><label class="labels">Sex</label>
                                    <select class="form-control"  id="studentSexInput">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-2"><label class="labels">Birthday</label>
                                    <input type="date" class="form-control" value="" id="studentBirthdateInput" placeholder="state">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12 mt-3"><label class="labels">Address</label><textarea
                                        id="studentAddressInput" type="text" class="form-control"
                                        placeholder="enter address line 1" value=""></textarea></div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChangesBtn" name="updateStudent" >Save changes</button>
            </div>
        </div>
    </div>
</div>
