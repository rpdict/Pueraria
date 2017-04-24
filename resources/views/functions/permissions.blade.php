@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{--{{ trans('adminlte_lang::message.home') }}--}}
    Permissions
@endsection

@section('contentheader_title')
    Permissions
    <button type="submit" class="btn btn-default btn-flat" name="add" data-toggle="modal"
            data-target=".bs-add-modal-lg"><i class="fa fa-plus"></i>
    </button>
    @include('functions.partials.createPermissions')
@endsection

@section('main-content')
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Responsive Hover Table</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
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
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td><a href="#">{{ $permission->name }}</a></td>
                                <td>{{ $permission->display_name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-xs btn-primary" name="edit" data-toggle="modal"
                                            data-target=".bs-edit-modal-lg{{ $permission->id }}"><span
                                                class="fa fa-edit"></span>Edit
                                    </button>
                                    @include('functions.partials.editPermissions')
                                    <form class="operate" method="post" style="display: inline"
                                          action="{{ action('PermissionsController@removePermission', ['id'=>$permission->id]) }}">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete"><span
                                                    class="fa fa-remove"></span>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
    {{--<script src="{{ asset('/plugins/jquery.inputmask.js') }}"></script>--}}
    {{--<script src="{{ asset('/plugins/jquery.inputmask.date.extensions.js') }}"></script>--}}
    {{--<script src="{{ asset('/plugins/jquery.inputmask.extensions.js') }}" type="text/javascript"></script>--}}
    {{--<script type="text/javascript">--}}
    {{--//Datemask dd/mm/yyyy--}}
    {{--$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});--}}
    {{--//Datemask2 mm/dd/yyyy--}}
    {{--$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});--}}
    {{--//Money Euro--}}
    {{--$("[data-mask]").inputmask();--}}
    {{--</script>--}}
@endsection