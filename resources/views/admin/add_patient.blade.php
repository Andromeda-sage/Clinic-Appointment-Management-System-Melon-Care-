@extends('admin.maindesign')
<base href="/public">

@section('add_patient')
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card shadow-sm mt-4">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">Add New Patient</h3>
            </div>
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('store_appointment') }}" method="post">
                    @csrf

                    <!-- Full Name -->
                    <div class="form-group mb-3">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" class="form-control rounded-pill" placeholder="Enter full name" value="{{ old('full_name') }}" required>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group mb-3">
                        <label for="email_address">Email Address</label>
                        <input type="email" name="email_address" class="form-control rounded-pill" placeholder="Enter email address" value="{{ old('email_address') }}" required>
                    </div>

                    <!-- Date -->
                    <div class="form-group mb-3">
                        <label for="submission_date">Date</label>
                        <input type="date" name="submission_date" class="form-control rounded-pill" value="{{ old('submission_date') }}" required>
                    </div>

                    <!-- Select Doctor (specialty) -->
<div class="form-group mb-3">
    <label for="specialty">Select Specialty</label>
    <select name="specialty" class="form-control rounded-pill" required>
        <option value="" disabled selected>Select Specialty</option>
        @foreach($doctors->unique('specialty') as $doctor)
            <option value="{{ $doctor->specialty }}"
                {{ old('specialty') == $doctor->specialty ? 'selected' : '' }}>
                {{ $doctor->specialty }}
            </option>
        @endforeach
    </select>
</div>


                    <!-- IC Number -->
                    <div class="form-group mb-3">
                        <label for="ic">IC Number</label>
                        <input type="text" name="ic" class="form-control rounded-pill" placeholder="Enter IC number" value="{{ old('ic') }}" required>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group mb-3">
                        <label for="number">Phone Number</label>
                        <input type="text" name="number" class="form-control rounded-pill" placeholder="Enter phone number" value="{{ old('number') }}" required>
                    </div>

                    <!-- Message -->
                    <div class="form-group mb-3">
                        <label for="message">Message (Optional)</label>
                        <textarea name="message" class="form-control rounded" rows="3" placeholder="Enter any notes">{{ old('message') }}</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">Add Patient</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
