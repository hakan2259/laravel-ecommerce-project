@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Subscriber List</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Subscriber List
                    <a href="" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal"
                       data-target="#modaldemo3">All Delete</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Subscribing Time</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sub as $key=>$row)
                            <tr>

                                <td><input type="checkbox" style="margin-right: 5px">{{$key +1}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{\Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                                <td>
                                    <a href="{{URL::to('delete/sub/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Coupon Add</h6>

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
                    <form action="{{route('store.coupon')}}" method="post">
                        @csrf
                        <div class="modal-body pd-20">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Code</label>
                                <input type="text" class="form-control" name="coupon" placeholder="Coupon Code">

                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Coupon Discount</label>
                                <input type="text" class="form-control" name="discount" placeholder="Coupon Discount">

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
