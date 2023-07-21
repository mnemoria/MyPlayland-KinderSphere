<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Students</h6>
    </div>
    <div class="card-body">

        <!-- toast message -->
        <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" data-autohide="true" data-delay="5000" aria-atomic="true">
            <div class="d-flex justify-content-between">
                <div class="toast-body">
                    Toast message.
                </div>
                <button type="button" class="btn text-light " data-dismiss="toast" aria-label="Close">x</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="studentTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Sex</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Sex</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody id="studentTableBody">
                    <!-- Table rows will be populated dynamically using JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>



