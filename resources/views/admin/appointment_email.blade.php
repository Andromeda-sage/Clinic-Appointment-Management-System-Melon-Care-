<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <h2>Hello {{ $appointment->full_name }},</h2>

    <p>Your appointment has been confirmed with the following details:</p>

    <ul>
        <li>Doctor: {{ $appointment->doctor->doctors_name ?? 'Not assigned' }}</li>
        <li>Date: {{ $appointment->appointment_date }}</li>
        <li>Time Slot: {{ $appointment->time_slot }}</li>
    </ul>

    <p>Thank you for choosing our service!</p>
</body>
</html>
