  @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
  <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">Post</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee as $employees)
                    <tr>
                    <td><a href="">{{$employees->FirstName}}</a></td>
                    <td>{{$employees->created_at}}</td>
                     <td><img src="{{ Storage::disk('local')->url($employees->img)}}"/></td>
                    <td><a class="btn btn-outline-success" href="/editEmployee/{{$employees->id}}/">Edit</a>
                    <a  class="btn btn-outline-danger " href="/deleteEmployee/{{$employees->id}}">Delete</a>
                    <a  class="btn btn-outline-primary " href="http://127.0.0.1:8000/api/employee/{{$employees->id}}">View Deatails</a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
     

    </div>
</div>

@endsection