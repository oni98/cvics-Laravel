<!DOCTYPE html>
<html>
<head>
    <title>{{@config('app.name')}}</title>
</head>
<body>
    <h1>Mail from {{@config('app.name')}} ( {{$application['code']}} )</h1>
    <br>
    <p>A new Applicant "{{$application['name']}}" has applied.</p>
    <p>Passport No: {{$application['passport']}}</p>
    <p>Application No: {{$application['code']}}</p>

</body>
</html>