@extends('layouts.bs5')

@section('content')
    <div id="app" class="row">
        <div class="col-md-4 d-none d-sm-block">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('images/logo.png') }}" class="img-fluid">
                </div>
                <div class="col-12">
                    <div id='map' style='width: 100%; height: 300px;'></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 p-4">
            <form action="{{ route('complains.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 rounded-3 shadow" style="background-color: rgb(243 243 243)">
                        <div class="row justify-content-md-center">
                            <div class="col-auto mt-5">
                                <h2 style="font-family: 'Dela Gothic One', cursive;">General Complain Form</h2>
                            </div>
                            <div class="col-12">
                            </div>
                            <div class="col-auto text-primary">
                                <p>Please fill up all required fields</p>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <p class="fs-3"><u>General Information</u></p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Gender</label>
                                <select class="form-control" name="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">Passport Number</label>
                                <input type="text" class="form-control" name="passport">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">IQAMA / National ID</label>
                                <input type="text" class="form-control" name="national_id">
                            </div>
                            <div class="col-12">
                                <p class="fs-3"><u>Contact Information</u></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Location</label>
                                <input type="text" class="form-control" name="location_ksa">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email_address">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact #1</label>
                                <input type="text" class="form-control" name="contact_number">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact #2</label>
                                <input type="text" class="form-control" name="contact_number2">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Person in case of emergency contact</label>
                                <input type="text" class="form-control" name="contact_person">
                            </div>
                            <div class="col-12">
                                <p class="fs-3"><u>Job Information</u></p>
                            </div>
                            <div class="col-md-12">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="occupation"
                                        value="Household Service Workers" checked="">
                                    <label class="form-check-label">
                                        House Service Workers (e.g. Domestic Worker, Driver, Gardener etc.)
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="occupation" value="Highly Skilled">
                                    <label class="form-check-label">
                                        Highly Skilled (e.g. Wielder, Plumber, Beautician, Office Worker, Assistant
                                        Nurse,
                                        Computer Technician etc.)
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="occupation" value="Low Skilled">
                                    <label class="form-check-label">
                                        Low Skilled (e.g. Construction Worker, Laborers, Cook and Waiter etc.)
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="occupation" value="Nurse">
                                    <label class="form-check-label">
                                        Nurse
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="occupation" value="Skilled Professional">
                                    <label class="form-check-label">
                                        Skilled Professional (e.g. Engineer, Doctor, Dentist, Architects, Accountants
                                        etc.)
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="occupation" value="Nurse">
                                    <label class="form-check-label">
                                        Sea-based
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="fs-3"><u>Employer Information</u></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Local Agency</label>
                                <input type="text" class="form-control" name="agency">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Abroad Agency</label>
                                <input type="text" class="form-control" name="host_agency">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Employer's IQAMA / National ID</label>
                                <input type="text" class="form-control" name="employer_national_id">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Employer Name</label>
                                <input type="text" class="form-control" name="employer_name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Employer Contact</label>
                                <input type="text" class="form-control" name="employer_contact">
                            </div>
                            <div class="col-12">
                                <p class="fs-3"><u>Complain Section / <i>Reklamo</i></u></p>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Please fill up below</label>
                                <textarea type="text" class="form-control" rows="8" name="complain"></textarea>
                            </div>
                            <div class="col-12">
                                <p class="fs-3"><u>Evidences</u></p>
                            </div>
                            <div class="col-auto">
                                <label class="form-label">Image #1</label>
                                <input class="form-control" type="file" name="image1">
                            </div>
                            <div class="col-auto">
                                <label class="form-label">Image #2</label>
                                <input class="form-control" type="file" name="image2">
                            </div>
                            <div class="col-auto">
                                <label class="form-label">Image #3</label>
                                <input class="form-control" type="file" name="image3">
                            </div>
                            <input class="form-control" name="actual_langitude" hidden>
                            <input class="form-control" name="actual_longitude" hidden>
                            <div class="col-12 mt-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoicmVuaWVyLXRyZW51ZWxhIiwiYSI6ImNrZHhya2l3aTE3OG0ycnBpOWxlYjV3czUifQ.4hVvT7_fiVshoSa9P3uAew';

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        }

        $('#cb-btn').on('click', function() {
            $('.loading').removeAttr('hidden', 'hidden');
        });

        function showPosition(position) {
            $('[name="actual_langitude"]').val(position.coords.latitude);
            $('[name="actual_longitude"]').val(position.coords.longitude);

            $('#cb-btn').removeAttr('disabled');

            $('.loading').attr('hidden', 'hidden');

            var map = new mapboxgl.Map({
                container: 'map',
                center: [position.coords.longitude, position.coords.latitude],
                zoom: 15,
                style: 'mapbox://styles/mapbox/satellite-streets-v10'
            });

            var marker = new mapboxgl.Marker()
                .setLngLat([position.coords.longitude, position.coords.latitude])
                .addTo(map);
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    swal.fire({
                        title: 'GPS Required (GPS ay kailangan)',
                        icon: 'info',
                        html: 'Please enable the GPS locator to continue<br>' +
                            '<i>Maari lamang buksan ang GPS upang magpatuloy</i>',
                        focusConfirm: false,
                        confirmButtonText: 'GPS has been enabled!<br><i>Bukas na ang GPS!</i>',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location = "/form"
                        }
                    });
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }

    </script>
@endsection
