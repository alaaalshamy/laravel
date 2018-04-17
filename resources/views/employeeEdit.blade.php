@extends('layouts.app')
@section('content')

<form method="get" action="/saveEdit/{{ $getEmployee->id}}" class="form my-2 my-lg-0" >
            <input type="text" placeholder="First Name" name="fName" value="{{ $getEmployee->FirstName}} "></br> </br>
            <input type="text" placeholder="Second Name" name="sName" value="{{ $getEmployee->SecondName}} "></br> </br>
            <input type="text" placeholder="Job Title" name="job"></br> </br>
            <input type="checkbox" name="active"/> <lable>Active</lable></br> </br>
            <lable>Location</lable></br> </br>
            <input type="file" /></br>
            <input type="submit" value="Add"/>
       
</form>
@endsection