@extends('admin.app')
@section('content')
    <div class="wrapper">

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add  Vendor</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.vendors.index')}}">Vendor Table</a></li>

                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Vendor Form</h3>
                                </div>
                                <form action="{{route('admin.vendors.update',$vendor->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vendor Name</label>
                                            <input value="{{$vendor->name}}" name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Enter Name">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vendor Name</label>
                                            <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="" placeholder="Enter Name">
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Select Category</label>

                                            {{--                                        <select id="category_id" name="category_id[]" class="single-select" multiple>--}}
                                            <select name="categories[]" class="form-control" multiple id="categories" required>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <label class="form-label">Put Latitude</label>
                                        <div class="form-group">
                                            <input value="{{$vendor->lat}}" name="lat" type="number" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <label class="form-label">Put Longitude</label>
                                        <div class="form-group">
                                            <input  value="{{$vendor->lng}}" name="lng" type="number" class="form-control" id="">
                                        </div>
                                    </div>


                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <script>
        // Initialize Select2 for the category selection
        $(document).ready(function() {
            $('#categories').select2();
        });
    </script>
@endsection



