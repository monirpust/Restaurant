<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
  @include('backend.style')
  </head>
  <body>
    <div class="container-scroller">
      @include('backend.sidebar')
      <div style="position: relative; top:60px; right: -150px;">
              <div>
                  <table border="3px" style="background-color:black;" >
                      <tr>
                          <th style="padding: 30px">Name</th>
                          <th style="padding: 30px">Email</th>
                          <th style="padding: 30px">Phone</th>
                          <th style="padding: 30px">Date</th>
                          <th style="padding: 30px">Guest</th>
                          <th style="padding: 30px">Time</th>
                          <th style="padding: 30px">Message</th>
                      </tr>
                      @foreach ($data as $data)
                          <tr align="center">
                              <td style="padding: 30px">{{$data->name}}</td>
                              <td style="padding: 30px">{{$data->email}}</td>
                              <td style="padding: 30px">{{$data->phone}}</td>
                              <td style="padding: 30px">{{$data->date}}</td>
                              <td style="padding: 30px">{{$data->guest}}</td>
                              <td style="padding: 30px">{{$data->time}}</td>
                              <td style="padding: 30px">{{$data->message}}</td>
                              {{-- <td style="padding: 30px">
                                  <a href="{{url('removefood', $food->id)}}">Delete</a>
                                  <a style="padding: 10px" href="{{url('updatefood', $food->id)}}">update</a>
                              </td> --}}
                          </tr>                       
                      @endforeach
                  </table>
              </div>
        </div>
  </div>

    @include('backend.script')
  </body>
</html>