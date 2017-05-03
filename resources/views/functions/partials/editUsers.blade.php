<div class="modal fade bs-edit-modal-lg{{ $user->id }}" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">

                    <form class="form-horizontal" method="post" action="{{ action('UsersController@update', ['id'=>$user->id]) }}">
                        {!! csrf_field() !!}
                        <div class="box-header">
                            <h3 class="box-title">Input masks</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="display_name" class="col-sm-2 control-label">Display Name</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" class="form-control" id="display_name" name="display_name" value="{{ $user->display_name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" class="form-control" id="description" name="description" value="{{ $user->description }}">
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