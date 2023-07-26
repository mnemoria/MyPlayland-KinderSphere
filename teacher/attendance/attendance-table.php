<link rel="stylesheet" href="attendances.css">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="pl-2 pr-2 row d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-success">Class II-A</h6>
            <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
            <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
            <input id="datepicker" width="276" />
        </div>
    </div>
    <div class="card-body">

        <div class="m-3">
            <div><small><span class="font-weight-bold">Total Students:</span>36</small></div>
            <div><small><span class="font-weight-bold">Total Students:</span> 36</small></div>
            <div><small><span class="font-weight-bold">Total Students:</span> 36</small></div>
            <div><small><span class="font-weight-bold">Total Students:</span> 36</small></div>
        </div>

        <!-- toast message -->
        <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
            data-autohide="true" data-delay="5000" aria-atomic="true">
            <div class="d-flex justify-content-between">
                <div class="toast-body">
                    Toast message.
                </div>
                <button type="button" class="btn text-light " data-dismiss="toast" aria-label="Close">x</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="attendanceTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Attendance Status 
                            <!-- <div class="h5 mb-0 mr-3 font-weight-bold badge badge-danger text-light" id="UnmarkedStat"> Unmarked: 0 </div> -->
                            </th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Attendance Status</th>
                        <th>Remarks</th>
                    </tr>
                </tfoot>
                <tbody id="attendanceTableBody">
                    <!-- Will be filled using Jvascript -->
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Save button or auto-save feature -->
<!-- <button id="">Save Attendance</button> -->

<!-- Summary or Report Section -->
<div>
    <h2>Attendance Summary</h2>
    <p>Overall Attendance Percentage: 90%</p>
    <!-- Add other relevant attendance statistics here -->
</div>


