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
                          <th style="padding: 30px">Customer Name</th>
                          <th style="padding: 30px">Phone</th>
                          <th style="padding: 30px">Address</th>
                          <th style="padding: 30px">Food Name</th>
                          <th style="padding: 30px">Unit Price</th>
                          <th style="padding: 30px">Quantity</th>
                          <th style="padding: 30px">Total Amount</th>
                      </tr>
                      @foreach ($orders as $order)
                          <tr align="center">
                              <td style="padding: 30px">{{$order->name}}</td>
                              <td style="padding: 30px">{{$order->phone}}</td>
                              <td style="padding: 30px">{{$order->address}}</td>
                              <td style="padding: 30px">{{$order->foodname}}</td>
                              <td style="padding: 30px">${{$order->price}}</td>
                              <td style="padding: 30px">{{$order->quantity}}</td>
                              <td style="padding: 30px">${{$order->quantity * $order->price}}</td>
                          </tr>                       
                      @endforeach
                  </table>
              </div>
        </div>
  </div>

    @include('backend.script')
  </body>
</html>