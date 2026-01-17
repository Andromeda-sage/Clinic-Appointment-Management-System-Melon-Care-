<!DOCTYPE html>
<html>
<head>
    <title>Appointment PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { color: #2d6ea8; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Appointment Details</h2>
    <table>
        <tr><th>Patient Name</th><td>{{ $patient->full_name }}</td></tr>
        <tr><th>Patient IC</th><td>{{ $patient->ic }}</td></tr>
        <tr><th>Doctor</th><td>{{ $appointment->doctor->doctors_name }}</td></tr>
        <tr><th>Date</th><td>{{ $appointment->appointment_date }}</td></tr>
        <tr><th>Time Slot</th><td>{{ $appointment->time_slot }}</td></tr>
    </table>
</body>
</html>
