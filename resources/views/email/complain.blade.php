<form class="row">
    <div class="form-group col-md-12 mt-2">
        <h3>General Information</h3>
        <hr>
    </div>
    <div class="form-group col-md-auto"><strong>First Name</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>{{ $full_details['first_name'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Middle Name</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>{{ $full_details['middle_name'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Last Name</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<em>{{ $full_details['last_name'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Gender</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>{{ $full_details['gender'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Passport Number</strong>&nbsp;&nbsp;<em>{{ $full_details['passport'] }}</em></div>
    <div class="form-group col-md-12 mt-2">
        <h3>Occupation</h3>
        <hr>
    </div>
    <div class="form-group col-md-auto"><strong>Current Position</strong>&nbsp; &nbsp;&nbsp;<em>{{ $full_details['occupation'] }}</em></div>
    <div class="form-group col-md-12 mt-2">
        <h3>Contact Information</h3>
        <hr>
    </div>
    <div class="form-group col-md-auto"><strong>E-mail or Facebook Name</strong>&nbsp;&nbsp;<em>{{ $full_details['email_address'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Primary Contact Number</strong>&nbsp;&nbsp;<em>{{ $full_details['contact_number'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Other Contact Number</strong>&nbsp; &nbsp; &nbsp;&nbsp;<em>{{ $full_details['contact_number2'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Location</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>{{ $full_details['location_ksa'] }}</em></div>
    <div class="form-group col-md-12 mt-2">
        <h3>Employer Information</h3>
        <hr>
    </div>
    <div class="form-group col-md-auto"><strong>Employer Name</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<em>{{ $full_details['employer_name'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Employer Contact Number</strong>&nbsp;&nbsp;<em>{{ $full_details['employer_contact'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Recruitment Agency in Philippines</strong> &nbsp;&nbsp;<em>{{ $full_details['agency'] }}</em></div>
    <div class="form-group col-md-12 mt-2">
        <h3>Complaint</h3>
        <hr>
    </div>
    <div class="form-group col-md-12 mt-2"><strong>Concerns of the sender</strong><br><em>{{ $full_details['complain'] }}</em></div>
    <div class="form-group col-md-12 mt-2">
        <h3>Sender&apos;s Coordinates</h3>
        <hr>
    </div>
    <div class="form-group col-md-auto"><strong>Latitude</strong>&nbsp; &nbsp; &nbsp; &nbsp;<em>{{ $full_details['actual_langitude'] }}</em></div>
    <div class="form-group col-md-auto"><strong>Longtitude</strong>&nbsp; <em>{{ $full_details['actual_longitude'] }}</em></div>
</form>
