@extends('layouts.adminLayout.admin_design')
@section('content')



    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" class="tip-bottom" data-original-title="Go to Home"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom" data-original-title="">Form elements</a> <a href="#" class="current">Common elements</a> </div>
            <h1>Common Form Elements</h1>

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
        </div>

        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add Product</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-product') }}" id="add_product" name="add_product" novalidate="novalidate">{{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label">Under Category</label>
                                    <div class="controls">
                                        <select id="category_id" name="category_id" class="form-control" style="width: 220px;">
                                            <?php echo $categories_dropdown ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Name :</label>
                                    <div class="controls">
                                        <input class="span11" name="product_name" id="product_name"  placeholder="product_name" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Code :</label>
                                    <div class="controls">
                                        <input class="span11" name="product_code" id="product_code" placeholder="product_code" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Color :</label>
                                    <div class="controls">
                                        <input class="span11" name="product_color" id="product_color" placeholder="product_color" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Price :</label>
                                    <div class="controls">
                                        <input class="span11" name="price" id="price" placeholder="price" type="text">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea name="description" id="description" ></textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Image :</label>
                                    <div class="controls">
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>


        </div></div>



@endsection
