@include('layouts.admin.head')
<body>
  <!-- container section start -->
  <section id="container" class="">

  @include('layouts.admin.header')
  @include('layouts.admin.sidebar')


<br>
<br>
<br>


<div class="container">
      <div class="row">


  <table class="table">
  <thead>
    <tr>
      <th scope="col">id_room</th>
      <th scope="col">name</th>
      <th scope="col">image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($room as $rooms)
    <tr>
      <td>{{$rooms->id_room}}</td>
      <td>{{$rooms->name}}</td>
      <td>
        <img src="{{asset('admin/img/'.$rooms->image)}}" alt="" style="width:100px">
      </td>
      <td>
        <a href="{{url('/admin/Room/edit/'.$rooms->id_room)}}" class="btn btn-success">Edit</a>
        <a href="{{url('/Admin/Room/delete/'.$rooms->id_room)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  </div>
</div>
</div>
      </section>
      @include('layouts.admin.footer')
    </section>
    <!--main content end-->
  </section>



</body>

</html>
