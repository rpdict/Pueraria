@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{--{{ trans('adminlte_lang::message.home') }}--}}
    用户
@endsection

@section('contentheader_title')
    用户
@endsection

@section('main-content')
    <!-- Your Page Content Here -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">用户表</h3>
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
                            <th>用户名</th>
                            <th>邮箱</th>
                            <th>创建日期</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($users as $user)

                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td><a href="#">{{ $user->email }}</a></td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <!-- Large modal -->
                                    {{--<button type="button" class="btn btn-xs btn-primary" name="edit" data-toggle="modal"--}}
                                            {{--data-target=".bs-edit-modal-lg{{ $user->id }}"><span--}}
                                                {{--class="fa fa-edit"></span>Edit--}}
                                    {{--</button>--}}
                                    {{--@include('functions.partials.editUsers')--}}
                                    <button type="button" class="btn btn-xs btn-warning" name="edit" data-toggle="modal"
                                            data-target=".bs-permission-modal-lg{{ $user->id }}"><span
                                                class="fa fa-wrench"></span>角色
                                    </button>
                                    @include('functions.partials.roleUsers')
                                    @if ($user->id != Auth::id())
                                        @if( $user->deleted_at )
                                            <form class="operate" method="post" style="display: inline"
                                                  action="{{ action('UsersController@show', ['id'=>$user->id]) }}">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-xs btn-success" name="on"><span
                                                            class="fa fa-check"></span>打开
                                                </button>
                                            </form>
                                        @else
                                            <form class="operate" method="post" style="display: inline"
                                                  action="{{ action('UsersController@destroy', ['id'=>$user->id]) }}">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-xs btn-danger" name="off"><span
                                                            class="fa fa-remove"></span>关闭
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        <button type="submit" class="btn btn-xs btn-danger disabled" name="off"><span
                                                    class="fa fa-remove"></span>关闭
                                        </button>
                                    @endif
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
                    //  alert(obj.selectedIndex);
                    mot = obj.options[obj.selectedIndex].text;
                    mov = obj.options[obj.selectedIndex].value;
                    moid = obj.options[obj.selectedIndex].id;
                    obj.remove(obj.selectedIndex);
                    if ($('#i'+moid).length>0) {
                        $('#i'+moid).remove();
                    }
                    var newoption = document.createElement("OPTION");
                    var newinput = $('<input hidden name="already_values[]" id="i' + moid + '" value="' + moid + '" />');
                    newoption.text = mot;
                    newoption.value = mov;
                    newoption.id = moid;
                    target.add(newoption);
//                    console.log(target.id[0]);
                    if (target.id[0] === 'S') {
                        $(target).append(newinput);
                    }
                }
            } else {
                alert(obj.options.length);
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