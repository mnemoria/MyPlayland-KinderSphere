
<div class="col-lg-3">
                <div class="text-center card-box card shadow mb-4">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><img
                                src=""
                                class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <div class="mt-2">
                            <h4 class="font-weight-bold">
                                <?php echo $fetch_student['name']; ?>
                            </h4>
                        </div>
                        <div class="attendance-inputs">
                            <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off"
                                checked>
                            <label class="btn btn-success badge " for="option1">Present</label>

                            <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                            <label class="btn btn-danger badge " for="option2">Absent</label>

                            <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                            <label class="btn btn-warning badge " for="option4">Late</label>
                        </div>
                    </div>
                </div>
            </div>