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
                <form action="{{url('/savefood', $food->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title">Title</label>
                        <input style="color: blue;" type="text" name="title" value="{{$food->title}}" required>
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input style="color: blue;" type="number" name="price" value="{{$food->price}}" required>
                    </div>
                  
                    <div>
                        <label for="description">Description</label>
                        <input style="color: blue;" type="text" name="description" value="{{$food->description}}" required>
                    </div>
                    <div>
                        <label for="image">Old Image</label>
                        <img height="250px" width="200px" src="/foodimage/{{$food->image}}" alt="{{$food->title}}">
                    </div>
                    <div>
                        <label for="image">Upload New Image</label>
                        <input style="color: green;" type="file" name="image" placeholder="Upload an image" required>
                    </div>
                    <div style="color: black;">
                        <input type="submit" value="Save">
                    </div>
                </form>

          </div>
    </div>
    @include('backend.script')
  </body>
</html>