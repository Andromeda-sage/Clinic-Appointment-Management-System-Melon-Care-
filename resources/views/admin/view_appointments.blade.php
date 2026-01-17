@extends('admin.maindesign')

@section('view_appointments')

<div class="container-fluid">

    @if(session('doctor_deletemessage'))
        <div style="background:#ff6b6b; color:white; padding:10px 15px; border-radius:10px; text-align:center; margin-bottom:20px;">
            {{ session('doctor_deletemessage') }}
        </div>
    @endif

    <!-- Cute Search Form -->
    <form action="{{ route('view_appointment') }}" method="GET" style="display:flex; justify-content:center; align-items:center; gap:10px; margin-bottom:25px;">
        <label for="search" 
               style="
                   font-weight: bold; 
                   font-size: 16px; 
                   color: #4da3dd; 
                   text-shadow: 1px 1px 2px rgba(0,0,0,0.1); 
                   transition: 0.3s;
                   cursor: default;
               "
               onmouseover="this.style.color='#2a7bbd'; this.style.textShadow='2px 2px 4px rgba(0,0,0,0.2)';"
               onmouseout="this.style.color='#4da3dd'; this.style.textShadow='1px 1px 2px rgba(0,0,0,0.1)';">
           SEARCH:
        </label>

        <div style="position:relative; width:50%;">
            <input type="text" id="search" name="search" value="{{ $search ?? '' }}" placeholder="Search by name, IC, or doctor..." 
                   style="width:100%; padding:10px 40px 10px 15px; border-radius:25px; border:1px solid #ddd; box-shadow:0 2px 5px rgba(0,0,0,0.1); font-size:14px;">
            <span style="position:absolute; right:15px; top:50%; transform:translateY(-50%); pointer-events:none; color:#aaa; font-size:18px;">&#128269;</span>
        </div>

        <button type="submit" style="padding:10px 25px; background:#4da3dd; color:white; border-radius:25px; border:none; font-weight:bold; cursor:pointer; transition:0.3s;">
            SEARCH
        </button>

        <a href="{{ route('view_appointment') }}" 
           style="padding:10px 25px; background:#FF4C4C; color:white; border-radius:25px; text-decoration:none; font-weight:bold; transition:0.3s;">
            RESET
        </a>
    </form>

    <div class="row justify-content-center">
        <div class="col-12">

            <!-- ADD THIS WRAPPER -->
            <div style="overflow-x:auto; overflow-y:auto; max-height:600px;">

                <table class="table table-bordered table-striped text-center w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th>Full Name</th>
                            <th>IC Number</th>
                            <th>Speacialty Required</th>
                            <th>Booked Appointment Date</th>
                            <th>Assigned Doctor</th>
                            <th>Time Slot</th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->full_name }}</td>
                            <td>{{ $appointment->ic }}</td>
                            <td>{{ $appointment->doctor->specialty }}</td>
                            <td>{{ $appointment->appointment_date }}</td>
                            <td>{{ $appointment->doctor ? $appointment->doctor->doctors_name : 'Not assigned' }}</td>
                            <td>{{ $appointment->time_slot }}</td>

                            <td>
                                <div style="display:flex; gap:10px; justify-content:center;"></div>
                                    <a href="{{ route('create_appointment', $appointment->id) }}" 
                                       class="bg bg-primary" 
                                       style="display:inline-block; padding:10px 15px; border-radius:10px; background:#4da3dd; color:white; text-decoration:none;">
                                        Edit
                                    </a>
                                </div>
                            </td>
                            <td>
                                <!-- Buttons aligned horizontally -->
                                <div style="display:flex; gap:10px; justify-content:center;">
                                    
                                    <a href="{{ route('delete_appointment', $appointment->id) }}" 
                                       class="bg bg-danger" 
                                       style="display:inline-block; padding:10px 15px; border-radius:10px; background:#ff6b6b; color:white; text-decoration:none;"
                                       onclick="return confirm('Are you sure?')">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No appointments found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            <!-- END WRAPPER -->

        </div>
    </div>
</div>

@endsection
