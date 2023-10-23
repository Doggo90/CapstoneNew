<x-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">



    <form action="https://corporate-ui-dashboard-laravel.creative-tim.com/laravel-examples/user-profile/update" method="POST">
        @csrf
        <input type="hidden" name="_token" value="HZGYCxXIZ0J8ILSHVTeGDzjDKks0D2FMt0aDQOhW"> <input type="hidden" name="_method" value="PUT">
        <div class="mt-5 mb-5 mt-lg-9 row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="card card-body" id="profile">
                    <img src="../../../assets/img/header-orange-purple.jpg" alt="pattern-lines" class="top-0 rounded-2 position-absolute start-0 w-100 h-100">
                    <div class="row z-index-2 justify-content-center align-items-center">
                        <div class="col-sm-auto col-4">
                            <div class="avatar avatar-xl position-relative">
                            <img src="../assets/img/team-2.jpg" alt="bruce" class="w-100 h-100 object-fit-cover border-radius-lg shadow-sm" id="preview">
                            </div>
                        </div>
                        <div class="col-sm-auto col-8 my-auto">
                            <div class="h-100">
                            <h5 class="mb-1 font-weight-bolder">
                            Alec Thompson
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                            CEO / Co-Founder
                            </p>
                            </div>
                        </div>
                        <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                            <div class="form-check form-switch ms-2">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked="" onchange="visible()">
                            </div>
                            <label class="text-white form-check-label mb-0">
                            <small id="profileVisibility">
                            Switch to invisible
                            </small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
            </div>
        </div>
        <div class="mb-5 row justify-content-center">
            <div class="col-lg-9 col-12 ">
                <div class="card " id="basic-info">
                    <div class="card-header">
                        <h5>Basic Info</h5>
                    </div>
                    <div class="pt-0 card-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="Alec Thompson" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="admin@corporateui.com" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" placeholder="Bucharest, Romania" value="" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" placeholder="0733456987" value="" class="form-control">
                        </div>
                    </div>
                    <div class="row p-2">
                        <label for="about">About me</label>
                        <textarea name="about" id="about" rows="5" class="form-control">Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).</textarea>
                    </div>
                        <button type="submit" class="mt-6 mb-0 btn btn-white btn-sm float-end">Save
                        changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</x-layout>
