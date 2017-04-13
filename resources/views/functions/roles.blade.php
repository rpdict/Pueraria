@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{--{{ trans('adminlte_lang::message.home') }}--}}
    Roles
@endsection

@section('contentheader_title')
    Roles
@endsection

@section('main-content')
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Responsive Hover Table</h3>
                    <div class="box-tools">
                        <button type="submit" class="btn btn-default btn-flat" name="add" data-toggle="modal"
                                data-target=".bs-add-modal-lg"><i class="fa fa-plus"></i>
                        </button>
                        @include('functions.partials.createRole')
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Role</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td><a href="#">{{ $role->name }}</a></td>
                                <td>{{ $role->description }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td>
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-xs btn-primary" name="edit" data-toggle="modal"
                                            data-target=".bs-edit-modal-lg{{ $role->id }}"><span
                                                class="fa fa-edit"></span>Edit
                                    </button>
                                    @include('functions.partials.editRole')
                                    <button type="button" class="btn btn-xs btn-warning" name="edit" data-toggle="modal"
                                            data-target=".bs-permission-modal-lg{{ $role->id }}"><span
                                                class="fa fa-wrench"></span>Permission
                                    </button>
                                    @include('functions.partials.rolePermissions')
                                    <form class="operate" method="post" style="display: inline"
                                          action="{{ action('RolesController@removeRole', ['id'=>$role->id]) }}">
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