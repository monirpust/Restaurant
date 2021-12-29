
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
                <form action="{{url('/addchef')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name">Name</label>
                        <input style="color: blue;" type="text" name="name" placeholder="Chef name" required>
                    </div>
                    <div>
                        <label for="expertise">Expertise</label>
                        <input style="color: blue;" type="text" name="expertise" placeholder="Write Expertise of chef" required>
                    </div>
                    <div>
                        <label for="image">Image</label>
                        <input style="color: green;" type="file" name="image" placeholder="Upload an image" required>
                    </div>
                    <div style="color: black;">
                        <input type="submit" value="Save">
                    </div>
                </form>



                <div>
                    <table border="3px" style="background-color:black;" >
                        <tr>
                            <th style="padding: 30px">Name</th>
                            <th style="padding: 30px">Expertise</th>
                            <th style="padding: 30px">Image</th>
                            <th style="padding: 30px">Action</th>
                        </tr>
                        @foreach ($chef as $chef)
                            <tr align="center">
                                <td style="padding: 30px">{{$chef->name}}</td>
                                <td style="padding: 30px">{{$chef->expertise}}</td>
                                <td style="padding: 30px"><img height="200px" width="250px" src="/chefimage/{{$chef->image}}" alt="{{$chef->title}}"></td>
                                <td style="padding: 30px">
                                    <a href="{{url('removechef', $chef->id)}}">Delete</a>
                                    <a style="padding: 10px" href="{{url('editchef', $chef->id)}}">update</a>
                                </td>
                            </tr>                       
                        @endforeach
                    </table>
                </div>
          </div>
    </div>
  
      @include('backend.script')
  </body>
</html>