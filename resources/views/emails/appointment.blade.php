<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Appointment Confirmed</h2>

    <p>Dear {{ $appointment->full_name }},</p>

    <p>Your appointment has been confirmed with the details below:</p>

    <ul>
        <li><strong>Doctor:</strong> {{ $appointment->doctor->doctors_name }}</li>
        <li><strong>Date:</strong> {{ $appointment->appointment_date }}</li>
        <li><strong>Time:</strong> {{ $appointment->time_slot }}</li>
        <li><strong>Status:</strong> {{ $appointment->status }}</li>
    </ul>

    <p>Thank you.</p>
</body>
</html>
