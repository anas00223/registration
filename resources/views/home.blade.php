<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<img src="/smile.png" alt="" width="200vw" height="200vw">

@if(session()->has('name'))
    <p >Hello, {{ session('name') }}</p>
@endif
<style>
    body{
     
        background-color:black;
        display:grid;
        justify-content:center;
        align-items:center;
       
    }
    p{
        font-size:8vw;
        color:white;
    }
</style>
</body>
</html>