<div class="modal fade bs-add-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" action="{{ url("/auth/roles") }}">
                        {!! csrf_field() !!}
                        <div class="box-header">
                            <h3 class="box-title">Input masks</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="rolename" class="col-sm-2 control-label">RoleName</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" class="form-control" id="rolename" name="rolename">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10 col-md-8">
                                    <input type="text" class="form-control" id="description" name="description">
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