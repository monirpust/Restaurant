
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
                <form action="{{url('/updatechef', $chef->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name">Name</label>
                        <input style="color: blue;" type="text" name="name" value="{{$chef->name}}" required>
                    </div>
                    <div>
                        <label for="expertise">Expertise</label>
                        <input style="color: blue;" type="text" name="expertise" value="{{$chef->expertise}}" required>
                    </div>
                    <div>
                        <label for="image">Old Image</label>
                        <img height="250" width="200" src="/chefimage/{{$chef->image}}" alt="{{$chef->name}}">
                    </div>
                    <div>
                        <label for="image">New Image</label>
                        <input style="color: green;" type="file" name="image" placeholder="Upload an image">
                    </div>
                    <div style="color: black;">
                        <input type="submit" value="Update">
                    </div>
                </form>
          </div>
    </div>
  
      @include('backend.script')
  </body>
</html>