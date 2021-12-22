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
              <form action="{{url('/admin/Headers/create')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ข้อความ</label>
                    <input type="text" class="form-control" id="text" name="text" placeholder="ข้อความ">

                    @error('text')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                      @error('image')
                       <span class="text-danger">{{$message}}</span>
                      @enderror
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
      <th scope="col">status</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($header as $i)
      <tr>
        <td>{{$i->id_header}}</td>
        <td>{{$i->text}}</td>
        <td><img src="{{asset('admin/img/'.$i->image)}}" alt="" style="width:100px"></td>
        <td><input type="checkbox" data-id="{{ $i->id_header }}" name="status" class="js-switch" {{ $i->status == 'open' ? 'checked' : '' }}></td>
        <td>{{$i->created_at}}</td>
        <td>{{$i->updated_at}}</td>
        <td>
          <a href="{{url('/admin/Headers/edit/'.$i->id_header)}}" class="btn btn-success">Edit</a>
          <a href="{{url('/Admin/Headers/delete/'.$i->id_header)}}" class="btn btn-danger">Delete</a>
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

<script>

    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });


        $(document).ready(function(){
        $('.js-switch').change(function () {
            let status = $(this).prop('checked') === true ?  'open' : 'close' ;
            let Idi = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('header.update.status') }}',
                data: {'status': status, 'id_header': Idi},
                success: function (data) {
                    console.log(data.message);
                }
                });
            });
        });
    </script>

</html>
