@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="post" action="/addindex" class="form my-2 my-lg-0"  enctype="multipart/form-data">
        {{csrf_field()}}
            <input type="text" placeholder="First Name" name="fName"></br> </br>
            <input type="email" placeholder="Email" name="uEmail"></br> </br>
            <input type="password" placeholder="Password" name="uPass"></br> </br>
            <input type="text" placeholder="Second Name" name="sName"></br> </br>
            <input type="text" placeholder="Job Title" name="job"></br> </br>
            <input type="checkbox" name="active"/> <lable>Active</lable></br> </br>
            <input type="checkbox" name="admin"/> <lable>Admin</lable></br> </br>
            <input id="mapLable" name="location"/>
            <input type="button" value="Display Location" onclick="getmyposition();" class="btn btn-outline-success"  />
            </br> </br>
            <input type="file" name="img"/></br>
            <input type="submit" value="Add"/>
        </form>
        </br>

   <script>
        window.addEventListener('load', doitfirst);
        function doitfirst() {
            map = document.getElementById('map');
            mapLable = document.getElementById('mapLable');
        }
        function getmyposition() {
            // 1- check availaiblity of geolocation in navigator
            if(navigator.geolocation)
            {
                // get permission
                navigator.geolocation.getCurrentPosition(getposition, errorhandeler);
            }
            else
            {
                // geolocation not availaible
                map.innerText = 'Sorry , Update your brwoser and try Agian !!';
            }
        }
        function getposition(position) {
           
            // console.log(position);
            lat = position.coords.latitude;
            lon = position.coords.longitude;

            // 1- create LATLON google object
            mylocation = new google.maps.LatLng(lat, lon);
            // 2- create attributes for returned image
            myattributes = { zoom: 17, center: mylocation , mapTypeId: google.maps.MapTypeId.ROADMAP};
            var myimg = new Image();
            myimg.src = new google.maps.Map(map, myattributes);
            var maps = new google.maps.Map(map, myattributes);
            // TestMarker();
            map.appendChild(myimg);
               var marker = new google.maps.Marker({
                position:mylocation,
                  map: maps,
                  draggable: true,
                title:"Hello World!"
            });
              marker.addListener('drag', function() {
                   mapLable.value=marker.getPosition();
                });
      
         
       
         
            //latllon = lat + ' , ' + lon;
        //    map.innerText = latllon;
        }
        function errorhandeler(error)
        {
            switch(error.code)
            {
                case error.PERMISSION_DENIED:
                    map.innerText = 'PERMISSION_DENIED';
                    break;
                case error.POSITION_UNAVAILABLE:
                    map.innerText = 'POSITION_UNAVAILABLE';
                    break;
                case error.TIMEOUT:
                    map.innerText = 'TIMEOUT';
                    break;
                case error.UNKOWN_ERROR:
                    map.innerText = 'UNKOWN_ERROR';
                    break;
            }
        }


function TestMarker() {
    mylocation= new google.maps.LatLng(lat, lon);
    addMarker(mylocation);
}
    </script>
    <div id="map" style=" width:600px;
            height:600px;">

    </div>

        
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">Post</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="list">
                @foreach ($employee as $employees)
                    <tr>
                    <td id="list"><a href="">{{$employees->FirstName}}</a></td>
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