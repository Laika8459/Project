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

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">address</th>
                                <th scope="col">phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $User)
                            <tr>
                                <td>{{$User->id}}</td>
                                <td>{{$User->name}}</td>
                                <td>{{$User->email}}</td>
                                <td>{{$User->address}}</td>
                                <td>{{$User->phone}}</td>
                                <td>
                                    <a href="{{url('/admin/User/edit/'.$User->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{Url('/Admin/User/delete/'.$User->id)}}" class="btn btn-danger">Delete</a>
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
