@extends('admin.app')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Vendors Tables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.vendors.create')}}">Add Vendor</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Vendor Table</h3>
                            </div>

                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>lat</th>
                                        <th>lng</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vendors as $vendor)
                                    <tr>
                                        <td>{{$vendor->name}}</td>
                                        <td>{{$vendor->lat}}</td>
                                        <td>{{$vendor->lng}}</td>
                                        <td>
                                            <img src="{{ asset($vendor->image) }}"  width="80" height="80">
{{--                                            <img src="{{asset($vendor->image)}}" style="width: 7%">--}}
                                        </td>
                                        <td>
                                            <form action="{{route('admin.vendors.destroy',$vendor->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <a style=" margin-right: 20px; color: #72afd2 !important;" href="{{route('admin.vendors.edit',$vendor->id)}}">Edit</a>
                                                <button
                                                    style="color: red;
                                                    background: #343a40;
                                                    transition: background 0.3s;"
                                                        type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
