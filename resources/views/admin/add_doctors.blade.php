@extends('admin.maindesign')
@section('add_doctors')

<div style="background-color:#d8ebf7; padding:40px; border-radius:20px; max-width:650px; margin:auto; margin-top:30px; box-shadow:0 4px 10px rgba(0,0,0,0.15);">

    <h2 style="text-align:center; font-size:32px; font-weight:800; color:#2d6ea8; margin-bottom:25px;">
        ADD NEW DOCTOR
    </h2>

    @if(session('doctor_addmessage'))
        <div style="background:#82c3ff; color:white; padding:10px 15px; border-radius:10px; text-align:center; margin-bottom:20px;">
            {{ session('doctor_addmessage') }}
        </div>
    @endif

    <form action="{{ route('post_add_doctors') }}" method="post" enctype="multipart/form-data" style="text-align:center;">
        @csrf

        <!-- NAME -->
        <div style="margin-bottom:20px;">
            <input type="text" name="doctors_name"
                placeholder="Enter Doctor's Name"
                style="width:80%; padding:12px; border-radius:12px; border:1px solid #7fb3d5; font-size:16px;">
        </div>

        <!-- PHONE -->
        <div style="margin-bottom:20px;">
            <input type="text" name="doctors_phone"
                placeholder="Enter Doctor's Phone Number"
                style="width:80%; padding:12px; border-radius:12px; border:1px solid #7fb3d5; font-size:16px;">
        </div>

        <!-- SPECIALTY -->
        <div style="margin-bottom:20px;">
            <input type="text" name="specialty"
                placeholder="Enter Doctor's Specialty"
                style="width:80%; padding:12px; border-radius:12px; border:1px solid #7fb3d5; font-size:16px;">
        </div>

        <!-- ROOM NUMBER -->
        <div style="margin-bottom:20px;">
            <input type="text" name="room_number"
                placeholder="Enter Doctor's Room Number"
                style="width:80%; padding:12px; border-radius:12px; border:1px solid #7fb3d5; font-size:16px;">
        </div>

        <!-- IMAGE UPLOAD -->
        <div style="margin-bottom:30px; width:80%; margin:auto; display:flex; align-items:center; gap:10px;">
            <!-- White dashed box -->
            <div id="file-name-box" style="flex:1; height:50px; border:2px dashed #7fb3d5; border-radius:12px; display:flex; align-items:center; justify-content:flex-start; padding:0 12px; background:white; font-weight:400; color:#555; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                Upload Image
            </div>
            <!-- Upload button -->
            <label style="background:#4da3dd; color:white; padding:0 20px; border-radius:12px; cursor:pointer; height:50px; display:flex; align-items:center; justify-content:center; margin-top:5px;">
                Choose File
                <input type="file" name="doctor_image" style="display:none;" onchange="updateFileName(event)">
            </label>
        </div>

        <!-- JavaScript to show file name -->
        <script>
            function updateFileName(event) {
                const input = event.target;
                const fileNameBox = document.getElementById('file-name-box');
                if (input.files.length > 0) {
                    fileNameBox.textContent = input.files[0].name;
                } else {
                    fileNameBox.textContent = 'Upload Image';
                }
            }
        </script>

        <!-- SUBMIT BUTTON aligned right -->
        <div style="width:80%; margin:auto; text-align:center;">
            <input type="submit" name="submit" value="Add Doctor"
                style="background:#4da3dd; color:white; padding:8px 20px; border:none; border-radius:12px;
                font-size:16px; cursor:pointer; font-weight:400; box-shadow:0 3px 6px rgba(0,0,0,0.2);">
        </div>


    </form>
</div>

@endsection
