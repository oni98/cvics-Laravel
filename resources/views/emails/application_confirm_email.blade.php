<!DOCTYPE html>
<html>
<head>
    <title>{{@config('app.name')}}</title>
</head>
<body>
    <h1>Mail from {{@config('app.name')}} ( {{$application['code']}} )</h1>
    <br>
    <p>Dear Applicant {{$application['name']}},</p>
    <p>Your Application has been submitted successfully.</p>
    <p>Passport No: {{$application['passport']}}</p>
    <p>Application No: {{$application['code']}}</p>
    <br>
    <p>Thank you</p>
    <p>CVI Consultancy Services.</p>

</body>
</html>