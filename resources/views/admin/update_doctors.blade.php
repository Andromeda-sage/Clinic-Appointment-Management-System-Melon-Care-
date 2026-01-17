@extends('admin.maindesign')
<base href="/public">

@section('view_doctors')

<form action="{{ route('post_update_doctor', $doctor->id) }}"
      method="post"
      enctype="multipart/form-data"
      style="text-align:center;">
    @csrf

    @if(session('doctor_updatemessage'))
        <div style="background:#82c3ff; color:white; padding:10px 15px;
                    border-radius:10px; text-align:center; margin-bottom:20px;">
            {{ session('doctor_updatemessage') }}
        </div>
    @endif

    <!-- NAME -->
    <div style="margin-bottom:20px;">
        <input type="text" name="doctors_name"
               value="{{ $doctor->doctors_name }}"
               style="width:80%; padding:12px; border-radius:12px;
                      border:1px solid #7fb3d5; font-size:16px;">
    </div>

    <!-- PHONE -->
    <div style="margin-bottom:20px;">
        <input type="text" name="doctors_phone"
               value="{{ $doctor->doctors_phone }}"
               style="width:80%; padding:12px; border-radius:12px;
                      border:1px solid #7fb3d5; font-size:16px;">
    </div>

    <!-- SPECIALTY -->
    <div style="margin-bottom:20px;">
        <input type="text" name="specialty"
               value="{{ $doctor->specialty }}"
               style="width:80%; padding:12px; border-radius:12px;
                      border:1px solid #7fb3d5; font-size:16px;">
    </div>

    <!-- ROOM NUMBER -->
    <div style="margin-bottom:20px;">
        <input type="text" name="room_number"
               value="{{ $doctor->room_number }}"
               style="width:80%; padding:12px; border-radius:12px;
                      border:1px solid #7fb3d5; font-size:16px;">
    </div>

    <!-- OLD IMAGE -->
    <div style="margin-bottom:20px; width:80%; margin:auto;
                display:flex; align-items:center; gap:15px;">
        <label style="font-weight:500; color:#555; min-width:100px;">
            Old Image:
        </label>
        <img src="{{ asset('project_img/'.$doctor->doctor_image) }}"
             alt="{{ $doctor->doctor_image }}"
             width="150"
             style="border-radius:12px;
                    box-shadow:0 2px 6px rgba(0,0,0,0.15);">
    </div>

    <!-- IMAGE UPLOAD -->
    <div style="margin-bottom:30px; width:80%; margin:auto;
                display:flex; align-items:center; gap:10px;">

        <div id="file-name-box"
             style="flex:1; height:50px; border:2px dashed #7fb3d5;
                    border-radius:12px; display:flex; align-items:center;
                    padding:0 12px; background:white; color:#555;
                    overflow:hidden; white-space:nowrap;">
            Upload Image
        </div>

        <label style="background:#4da3dd; color:white; padding:0 20px;
                      border-radius:12px; cursor:pointer; height:50px;
                      display:flex; align-items:center;">
            Choose File
            <input type="file" name="doctor_image" hidden
                   onchange="updateFileName(event)">
        </label>
    </div>

    <!-- JS -->
    <script>
        function updateFileName(event) {
            const box = document.getElementById('file-name-box');
            box.textContent = event.target.files.length
                ? event.target.files[0].name
                : 'Upload Image';
        }
    </script>

    <!-- BUTTONS -->
    <div style="width:80%; margin:auto; display:flex;
                justify-content:center; gap:15px;">

        <!-- BACK (NO WARNING) -->
        <a href="{{ route('view_doctors') }}"
           style="background:#9e9e9e; color:white; padding:8px 20px;
                  border-radius:12px; font-size:16px;
                  text-decoration:none; cursor:pointer;
                  box-shadow:0 3px 6px rgba(0,0,0,0.2);">
            Back
        </a>

        <!-- UPDATE -->
        <input type="submit" value="Update Doctor"
               style="background:#4da3dd; color:white; padding:8px 20px;
                      border:none; border-radius:12px; font-size:16px;
                      cursor:pointer;
                      box-shadow:0 3px 6px rgba(0,0,0,0.2);">

        <!-- CANCEL (WITH WARNING) -->
        <a href="{{ route('view_doctors') }}"
           onclick="return confirm('Discard changes and go back?')"
           style="background:#FF4C4C; color:white; padding:8px 20px;
                  border-radius:12px; font-size:16px;
                  text-decoration:none; cursor:pointer;
                  box-shadow:0 3px 6px rgba(0,0,0,0.2);">
            Cancel
        </a>

    </div>

</form>

@endsection
