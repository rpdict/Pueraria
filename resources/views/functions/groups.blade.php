@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Responsive Hover Table</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 10px;">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default" name="add" data-toggle="modal"
                                        data-target=".bs-add-modal-lg"><i class="fa fa-plus"></i>
                                </button>
                                @include('functions.partials.createGroup')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="#">王者组</a></td>
                            <td>2016/12/13 05:02</td>
                            <td>
                                <!-- Large modal -->
                                <button type="button" class="btn btn-xs btn-primary" name="edit" data-toggle="modal"
                                        data-target=".bs-example-modal-lg">
                                    <span class="fa fa-edit"></span>Edit
                                </button>
                                @include('functions.partials.editGroup')
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset('/plugins/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/plugins/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('/plugins/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
    </script>
@endsection