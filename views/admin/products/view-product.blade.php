@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Products</a> <a href="#" class="current">View Products</a> </div>
            <h1>View Products</h1>
        </div>

        @if(Session::has('flash_message_error'))

            <div class="alert alert-error alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{!! session('flash_message_error') !!}</strong>

            </div>

        @endif
        @if(Session::has('flash_message_success'))

            <div class="alert alert-success alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{!! session('flash_message_success') !!}</strong>

            </div>

        @endif
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                            <h5>Products</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Category Id</th>
                                    <th>Product Name</th>
                                    <th>Product Color</th>
                                    <th>Product Code</th>
                                    <th>Price</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $product)
                                    <tr class="odd gradeX">
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->categoty_id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->product_color }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td class="center">

                                       <td class="center"> <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                                            <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a id="delCat" href="{{ url('/admin/delete-product/'.$product->id) }}" class="btn btn-danger btn-mini">Delete</a></td>
                                        </td>
                                    </tr>
                                        <div id="myModal{{ $product->id }}" class="modal hide">
                                            <div class="modal-header">
                                                <button data-dismiss="modal" class="close" type="button">×</button>
                                                <h3>{{ $product->product_name }}</h3>
                                            </div>
                                            <div class="modal-body">
                                                <p><b>Product Id: </b>{{ $product->description }}</p>
                                                <p><b>Category Id: </b>{{ $product->category_id}}</p>
                                                <p><b>Product Code: </b>{{ $product->product_code}}</p>
                                                <p><b>Price: </b>{{ $product->product_color}}</p>
                                                <p><b>Description: </b>{{ $product->price}}</p>
                                            </div>
                                        </div>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--<div id="myModal2" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Alert modal</h3>
        </div>
        <div class="modal-body">
            <p><img src="images/gallery/imgbox3.jpg"/></p>
        </div>
        <div class="modal-footer"><a data-dismiss="modal" class="btn btn-inverse" href="#">Cancel</a> </div>
    </div>
    <div id="myAlert" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Alert modal</h3>
        </div>
        <div class="modal-body">
            <p>Lorem ipsum dolor sit amet...</p>
        </div>
        <div class="modal-footer"> <a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a> <a data-dismiss="modal" class="btn" href="#">Cancel</a> </div>
    </div>--}}


@endsection
