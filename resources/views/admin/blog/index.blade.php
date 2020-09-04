@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Post Table</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Post List
                    <a href="{{route('add.blogpost')}}" class="btn btn-sm btn-warning" style="float: right;"
                    >Add New Post</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Post Title (English)</th>
                            <th class="wd-15p">Post Title (German)</th>
                            <th class="wd-15p">Post Category</th>
                            <th class="wd-15p">Post Image</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($post as $key=>$row)
                            <tr>

                                <td>{{$key +1}}</td>
                                <td>{{$row->post_title_en}}</td>
                                <td>{{$row->post_title_de}}</td>
                                <td>{{$row->category_name_en}}</td>
                                <td><img src="{{URL::to($row->post_image)}}" style="height: 50px; width: 50px;"></td>
                                <td>
                                    <a href="{{URL::to('edit/post/'.$row->id)}}"
                                       class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{URL::to('delete/post/'.$row->id)}}" class="btn btn-sm btn-danger"
                                       id="delete">Delete</a>
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->


        </div><!-- sl-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->

        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Blog Category Add</h6>

                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('store.blog.category')}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name English</label>
                                <input type="text" class="form-control" name="category_name_en"
                                       placeholder="Category Name English">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name Germany</label>
                                <input type="text" class="form-control" name="category_name_de"
                                       placeholder="Category Name Germany">

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close
                                </button>
                            </div>


                        </div>
                    </form>
                </div><!-- modal-dialog -->
            </div><!-- modal -->


@endsection
