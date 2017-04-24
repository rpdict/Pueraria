@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{--{{ trans('adminlte_lang::message.home') }}--}}
    Roles
@endsection

@section('contentheader_title')
    Roles
    <button type="submit" class="btn btn-default btn-flat" name="add" data-toggle="modal"
            data-target=".bs-add-modal-lg"><i class="fa fa-plus"></i>
    </button>
    @include('functions.partials.createRole')
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
    <script>
        function moveselect(obj, target, all) {
            if (!all) all = 0;
            if (typeof(obj) != "object") obj = eval("document.all." + obj);
            target = eval("document.all." + target);
            if (all == 0) {
                while (obj.selectedIndex > -1) {
//                    alert(obj.selectedIndex);
                    mot = obj.options[obj.selectedIndex].text;
                    mov = obj.options[obj.selectedIndex].value;
                    obj.remove(obj.selectedIndex);
                    var newoption = document.createElement("OPTION");
                    newoption.text = mot;
                    newoption.value = mov;
                    target.add(newoption);
                }
            } else {
//                alert(obj.options.length);
                for (i = 0; i < obj.length; i++) {
                    mot = obj.options.text;
                    mov = obj.options.value;
                    var newoption = document.createElement("OPTION");
                    newoption.text = mot;
                    newoption.value = mov;
                    target.add(newoption);
                }
                obj.options.length = 0

            }

        }
    </script>
@endsection