<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
  @include('backend.style')
  </head>
  <body>
    <div class="container-scroller">
    @include('backend.sidebar')

        <div style="position: relative; top:60px; right: -150px;">
            <table border="3px" bg-color="grey" >
                <tr>
                    <th style="padding: 30px">Name</th>
                    <th style="padding: 30px">Email</th>
                    <th style="padding: 30px">Action</th>
                </tr>
            @foreach ($users as $user)
                @if($user->usertype == '0')
                <tr align="center">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="{{url('/remove', $user->id)}}">Delete</a></td>
                </tr>
                @endif
            @endforeach
            </table>
        </div>
    </div>


    @include('backend.script')
  </body>
</html>