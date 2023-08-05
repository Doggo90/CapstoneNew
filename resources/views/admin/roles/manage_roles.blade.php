@extends('admin.admin_dashboard')
@section('admin')
{{-- <div class="col-md-12 col-xl-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
                        <h6 class="card-title">Hoverable Table</h6>
                        <p class="text-muted mb-3">Add class <code>.table-hover</code></p>
                        <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Edit Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>Mark</td>
                                            <td>Otto@gmail.com</td>
                                            <td>09564863552</td>
                                            <td>User</td>
                                            <td><a href="#"><span class="badge bg-dark">Edit</span></a></td>

                                        </tr>
                                    </tbody>
                                </table>
                        </div>
      </div>
    </div>
</div> --}}

<!-- Plugin css for this page -->
<link rel="stylesheet" href="{{ asset( 'backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css' )}}">
<!-- End plugin css for this page -->
<div class="page-content">

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h6 class="card-title">Data Table</h6>
            <div class="table-responsive">
            <div id="dataTableExample_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTableExample_length"><label>Show <select name="dataTableExample_length" aria-controls="dataTableExample" class="form-select form-select-sm"><option value="10">10</option><option value="30">30</option><option value="50">50</option><option value="-1">All</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTableExample_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search" aria-controls="dataTableExample"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="dataTableExample" class="table dataTable no-footer" aria-describedby="dataTableExample_info">
                <thead>
                <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 271.484px;">Name</th><th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 419.578px;">Position</th><th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 206.688px;">Office</th><th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 94.1719px;">Age</th><th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 190.984px;">Start date</th><th class="sorting" tabindex="0" aria-controls="dataTableExample" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 142.531px;">Salary</th></tr>
                </thead>
                <tbody>
                
                
                <tr class="odd">
                    <td class="sorting_1">Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                </tr><tr class="even">
                    <td class="sorting_1">Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                </tr><tr class="odd">
                    <td class="sorting_1">Bradley Greer</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>41</td>
                    <td>2012/10/13</td>
                    <td>$132,000</td>
                </tr><tr class="even">
                    <td class="sorting_1">Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td>$372,000</td>
                </tr><tr class="odd">
                    <td class="sorting_1">Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                </tr><tr class="even">
                    <td class="sorting_1">Charde Marshall</td>
                    <td>Regional Director</td>
                    <td>San Francisco</td>
                    <td>36</td>
                    <td>2008/10/16</td>
                    <td>$470,600</td>
                </tr><tr class="odd">
                    <td class="sorting_1">Colleen Hurst</td>
                    <td>Javascript Developer</td>
                    <td>San Francisco</td>
                    <td>39</td>
                    <td>2009/09/15</td>
                    <td>$205,500</td>
                </tr><tr class="even">
                    <td class="sorting_1">Dai Rios</td>
                    <td>Personnel Lead</td>
                    <td>Edinburgh</td>
                    <td>35</td>
                    <td>2012/09/26</td>
                    <td>$217,500</td>
                </tr><tr class="odd">
                    <td class="sorting_1">Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                </tr><tr class="even">
                    <td class="sorting_1">Gloria Little</td>
                    <td>Systems Administrator</td>
                    <td>New York</td>
                    <td>59</td>
                    <td>2009/04/10</td>
                    <td>$237,500</td>
                </tr></tbody>
            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTableExample_info" role="status" aria-live="polite">Showing 1 to 10 of 22 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTableExample_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTableExample_previous"><a href="#" aria-controls="dataTableExample" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTableExample" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTableExample" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTableExample" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item next" id="dataTableExample_next"><a href="#" aria-controls="dataTableExample" data-dt-idx="4" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
        </div>
        </div>
    </div>

</div>
    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <!-- End plugin js for this page -->

@endsection