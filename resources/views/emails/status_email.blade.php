<!DOCTYPE html>
<html>
<head>
    <title>{{@config('app.name')}}</title>
</head>
<body>
    <h1>Mail from {{@config('app.name')}}</h1>
    <p>Dear Applicant {{$details['application']['name']}},</p>
    <p>Your Application status has been changed to "{{ $details['status'] }}"</p>
   
    <p>Thank you</p>
    <p>CVI Consultancy Services.</p>
</body>
</html>