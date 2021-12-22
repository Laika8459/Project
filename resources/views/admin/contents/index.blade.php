@include('layouts.admin.head')
<body>
  <!-- container section start -->
  <section id="container" class="">

  @include('layouts.admin.header')
  @include('layouts.admin.sidebar')


  <div class="container">
  <div class="row mt-4">

  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('/admin/Contents/create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ข้อความ</label>
                    <input type="text" class="form-control" id="text" name="text" placeholder="ข้อความ">

                    @error('text')
                        <span class="text-danger">  {{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <div class="row mt-3">
                    @error('image')
                    <span class="text-danger">  {{$message}}</span>
                    @enderror
                  </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">text</th>
      <th scope="col">image</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($content as $i)
        <tr>
            <td>{{$i->id_content}}</td>
            <td>{{$i->text}}</td>
            <td><img src="{{asset('admin/img/'.$i->image)}}" alt="" style="width: 150px"></td>
            <td>{{$i->created_at}}</td>
            <td>{{$i->updated_at}}</td>
            <td>
            <a href="{{url('/admin/Contents/edit/'.$i->id_content)}}" class="btn btn-success">Edit</a>
            <a href="{{url('/Admin/Contents/delete/'.$i->id_content)}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
      @endforeach
  </tbody>
</table>
  </div>
</div>

      </section>
      @include('layouts.admin.footer')
    </section>
    <!--main content end-->
  </section>



</body>

</html>