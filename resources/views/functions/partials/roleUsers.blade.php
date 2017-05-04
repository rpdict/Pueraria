<div class="modal fade bs-permission-modal-lg{{ $user->id }}" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" action="{{ action('UsersController@userRoles', ['id'=>$user->id]) }}">
                        {!! csrf_field() !!}
                        <div class="box-header">
                            <h3 class="box-title">Input masks</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-10 col-md-5">
                                    <label class="control-label">待添加角色</label>
                                    <select id="D{{ $user->id }}" multiple="" style="height: 500px" class="form-control" ondblclick="moveselect('D{{ $user->id }}','SD{{ $user->id }}')">
                                        @foreach( $roles as $role )
                                            <option id='{{ $role->id }}'>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-10 col-md-2" style="margin-top: 100px">
                                    <input type="button" value="&lt;" name="B{{ $user->id }}" onclick="moveselect('SD{{ $user->id }}','D{{ $user->id }}')">
                                    <input type="button" value="&gt;" name="SB{{ $user->id }}" onclick="moveselect('D{{ $user->id }}','SD{{ $user->id }}')">
                                </div>
                                <div class="col-sm-10 col-md-5">
                                    <label class="control-label">已添加角色</label>
                                    <select id="SD{{ $user->id }}" multiple="" style="height: 500px" class="form-control" ondblclick="moveselect('SD{{ $user->id }}','D{{ $user->id }}')">
                                        @if($role_users = json_decode($role_users))
                                            @foreach( $role_users as $role_user )
                                                @if($role_user->pivot->user_id === $user->id)
                                                    <option value='{{ $role_user->name }}' id='{{ $role_user->id }}'>{{ $role_user->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    @foreach( $role_users as $role_user )
                                        @if($role_user->pivot->user_id === $user->id)
                                            <input hidden name="already_values[]" id='i{{ $role_user->id }}' value='{{ $role_user->id }}'>
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
