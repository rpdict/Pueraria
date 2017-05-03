<div class="modal fade bs-permission-modal-lg{{ $role->id }}" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" action="{{ action('RolesController@rolePermissions', ['id'=>$role->id]) }}">
                        {!! csrf_field() !!}
                        <div class="box-header">
                            <h3 class="box-title">Input masks</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-10 col-md-5">
                                    <label class="control-label">待添加权限</label>
                                    <select id="D{{ $role->id }}" multiple="" style="height: 500px" class="form-control" ondblclick="moveselect('D{{ $role->id }}','SD{{ $role->id }}')">
                                        @foreach( $permissions as $permission )
                                            <option id='{{ $permission->id }}'>{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-10 col-md-2" style="margin-top: 100px">
                                    <input type="button" value="&lt;" name="B{{ $role->id }}" onclick="moveselect('SD{{ $role->id }}','D{{ $role->id }}')">
                                    <input type="button" value="&gt;" name="SB{{ $role->id }}" onclick="moveselect('D{{ $role->id }}','SD{{ $role->id }}')">
                                </div>
                                <div class="col-sm-10 col-md-5">
                                    <label class="control-label">已添加权限</label>
                                    <select id="SD{{ $role->id }}" multiple="" style="height: 500px" class="form-control" ondblclick="moveselect('SD{{ $role->id }}','D{{ $role->id }}')">
                                        @if($role_permissions = json_decode($role_permissions))
                                            @foreach( $role_permissions as $role_permission )
                                                @if($role_permission->pivot->role_id === $role->id)
                                                    <option value='{{ $role_permission->name }}' id='{{ $role_permission->id }}'>{{ $role_permission->name }}</option>
                                                    {{--<input hidden name="already_values[]" id='i{{ $role_permission->id }}' value='{{ $role_permission->id }}'>--}}
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    @foreach( $role_permissions as $role_permission )
                                        @if($role_permission->pivot->role_id === $role->id)
                                            {{--<option value='{{ $role_permission->name }}' id='{{ $role_permission->id }}'>{{ $role_permission->name }}</option>--}}
                                            <input hidden name="already_values[]" id='i{{ $role_permission->id }}' value='{{ $role_permission->id }}'>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right">Okay</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</div>
