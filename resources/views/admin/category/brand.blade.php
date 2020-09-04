@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Brand</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Brand List
                    <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                       data-target="#modaldemo3">Add New</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Brand name</th>
                            <th class="wd-15p">Brand logo</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $key=>$row)
                            <tr>

                                <td>{{$key +1}}</td>
                                <td>{{$row->brand_name}}</td>
                                <td><img src="{{URL::to($row->brand_logo)}}" width="80px" height="70px"></td>
                                <td>
                                    <a href="{{URL::to('edit/brand/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{URL::to('delete/brand/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Brand Add</h6>

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
                    <form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body pd-20">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" placeholder="Brand">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Brand Logo</label>
                                <input type="file" class="form-control" name="brand_logo">

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
