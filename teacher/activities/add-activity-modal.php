<!-- Modal -->
<div class="modal fade" id="addActModal" tabindex="-1" role="dialog" aria-labelledby="addActivityModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered" role="document"> <!-- Use .modal-lg class here -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Add New Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="addActivityForm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-center">New Activity</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <div class="col-md-12"><label class="labels">Date</label><input required type="date"
                                            class="form-control" value="" id="addDateInput" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <div class="col-md-12"><label class="labels">Subjects</label>
                                            <select class="form-control" id="addSubjectInput" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="col-md-12"><label class="labels">Add Total Points</label><input required type="text"
                                            class="form-control" value="" id="addTotalPtsInput" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <div class="col-md-12"><label class="labels">Activity Number:</label><input required id="addActNumInput"
                                                type="text" class="form-control" placeholder=""></div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="col-md-12"><label class="labels">Activity Name:</label><input required id="addActNameInput"
                                                type="text" class="form-control" value="" placeholder=""></div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Add Activity Description</label><textarea
                                            id="addActDescInput" type="text" class="form-control" placeholder=""
                                            value=""></textarea></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="createNewActBtn" name="addActivity" >Save</button>
            </div>
        </div>
    </div>
</div>
