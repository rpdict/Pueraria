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

                                <div class="col-sm-10 col-md-6">
                                    <label class="control-label">待添加权限</label>
                                    <select name="D{{ $role->id }}" multiple="" style="height: 500px" class="form-control" ondblclick="moveselect(this,'DS{{ $role->id }}')">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                                {{--<div class="col-sm-10 col-md-2" style="margin-top: 100px">--}}
                                    {{--<input type="button" value="&lt;" name="B{{ $role->id }}" onclick="moveselect('DS{{ $role->id }}','D{{ $role->id }}')">--}}
                                    {{--<input type="button" value="&gt;" name="BS{{ $role->id }}" onclick="moveselect('D{{ $role->id }}','DS{{ $role->id }}')">--}}
                                {{--</div>--}}
                                <div class="col-sm-10 col-md-6">
                                    <label class="control-label">已添加权限</label>
                                    <select name="DS{{ $role->id }}" multiple="" style="height: 500px" class="form-control" ondblclick="moveselect(this,'D{{ $role->id }}')">
                                        <option>option 6</option>
                                        <option>option 7</option>
                                        <option>option 8</option>
                                        <option>option 9</option>
                                        <option>option 0</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

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