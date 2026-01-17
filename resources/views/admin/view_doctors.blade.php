@extends('admin.maindesign')

@section('view_doctors')
<div class="container-fluid">

    <!-- Show delete message -->
    @if(session('doctor_deletemessage'))
        <div style="background:#ff6b6b; color:white; padding:10px 15px; border-radius:10px; text-align:center; margin-bottom:20px;">
            {{ session('doctor_deletemessage') }}
        </div>
    @endif

<!-- Cute Search Form -->
<form action="{{ route('view_doctors') }}" method="GET"
      style="display:flex; justify-content:center; align-items:center; gap:10px; margin-bottom:25px;">

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
        <input type="text"
               id="search"
               name="search"
               value="{{ $search ?? '' }}"
               placeholder="Type doctor name or specialty..."
               style="width:100%; padding:10px 40px 10px 15px;
                      border-radius:25px; border:1px solid #ddd;
                      box-shadow:0 2px 5px rgba(0,0,0,0.1); font-size:14px;">
        <span style="position:absolute; right:15px; top:50%;
                     transform:translateY(-50%);
                     pointer-events:none; color:#aaa; font-size:18px;">
            &#128269;
        </span>
    </div>

    <button type="submit"
        style="padding:10px 25px; background:#4da3dd; color:white;
               border-radius:25px; border:none; font-weight:bold;
               cursor:pointer; transition:0.3s;">
        SEARCH
    </button>

    <a href="{{ route('view_doctors') }}"
       style="padding:10px 25px; background:#FF4C4C; color:white;
              border-radius:25px; text-decoration:none; font-weight:bold;">
        RESET
    </a>
</form>


    <div class="row justify-content-center">
        <div class="col-12">

            <!-- Scrollable container -->
            <div style="overflow-x:auto; overflow-y:auto; max-height:600px;">

                <table class="table table-bordered table-striped text-center w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th>Doctor's Name</th>
                            <th>Phone Number</th>
                            <th>Specialty</th>
                            <th>Room Number</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->doctors_name }}</td>
                            <td>{{ $doctor->doctors_phone }}</td>
                            <td>{{ $doctor->specialty }}</td>
                            <td>{{ $doctor->room_number }}</td>
                            <td>
                                <img src="{{ asset('project_img/'.$doctor->doctor_image) }}" 
                                     alt="{{ $doctor->doctor_image }}" 
                                     width="100">
                            </td>
                            <td>
                                <div style="display:flex; gap:10px; justify-content:center;"></div>
                                    <a href="{{ route('update_doctor', $doctor->id) }}" 
                                       class="bg bg-primary" 
                                       style="display:inline-block; padding:10px 15px; border-radius:10px; background:#4da3dd; color:white; text-decoration:none;">
                                        Edit
                                    </a>
                                </div>
                            </td>
                            <td>
                                <!-- Buttons aligned horizontally -->
                                <div style="display:flex; gap:10px; justify-content:center;">
                                    
                                    <a href="{{ route('delete_doctor', $doctor->id) }}" 
                                       class="bg bg-danger" 
                                       style="display:inline-block; padding:10px 15px; border-radius:10px; background:#ff6b6b; color:white; text-decoration:none;"
                                       onclick="return confirm('Are you sure?')">
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- End scroll wrapper -->

        </div>
    </div>
</div>
@endsection
