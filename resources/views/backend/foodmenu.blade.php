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
                <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="title">Title</label>
                        <input style="color: blue;" type="text" name="title" placeholder="Write food name" required>
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input style="color: blue;" type="number" name="price" placeholder="Write price of this food item" required>
                    </div>
                    <div>
                        <label for="image">Image</label>
                        <input style="color: green;" type="file" name="image" placeholder="Upload an image" required>
                    </div>
                    <div>
                        <label for="description">Description</label>
                        <input style="color: blue;" type="text" name="description" placeholder="Write a short detail about this item." required>
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