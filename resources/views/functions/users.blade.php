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
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Group</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td><a href="#">{{ $post->author->name }}</a></td>
                                <td>{{ $post->created_at->format('Y/m/d H:i') }}</td>
                                <td>
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-xs btn-primary" name="edit" data-toggle="modal"
                                            data-target=".bs-example-modal-lg">
                                        <span class="fa fa-edit"></span>Edit
                                    </button>
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                                         aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="box-header">
                                                            <h3 class="box-title">Input masks</h3>
                                                        </div>
                                                        <div class="box-body">
                                                            <!-- Date dd/mm/yyyy -->
                                                            <div class="form-group">
                                                                <label>Date masks:</label>

                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                           data-inputmask="'alias': 'dd/mm/yyyy'"
                                                                           data-mask="">
                                                                </div>
                                                                <!-- /.input group -->
                                                            </div>
                                                            <!-- /.form group -->

                                                            <!-- Date mm/dd/yyyy -->
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                           data-inputmask="'alias': 'mm/dd/yyyy'"
                                                                           data-mask="">
                                                                </div>
                                                                <!-- /.input group -->
                                                            </div>
                                                            <!-- /.form group -->

                                                            <!-- phone mask -->
                                                            <div class="form-group">
                                                                <label>US phone mask:</label>

                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-phone"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                           data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                                                           data-mask="">
                                                                </div>
                                                                <!-- /.input group -->
                                                            </div>
                                                            <!-- /.form group -->

                                                            <!-- phone mask -->
                                                            <div class="form-group">
                                                                <label>Intl US phone mask:</label>

                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-phone"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                           data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                                                           data-mask="">
                                                                </div>
                                                                <!-- /.input group -->
                                                            </div>
                                                            <!-- /.form group -->

                                                            <!-- IP mask -->
                                                            <div class="form-group">
                                                                <label>IP mask:</label>

                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-laptop"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                           data-inputmask="'alias': 'ip'" data-mask="">
                                                                </div>
                                                                <!-- /.input group -->
                                                            </div>
                                                            <!-- /.form group -->

                                                        </div>
                                                        <!-- /.box-body -->
                                                        <div class="box-footer">
                                                            <button type="submit" class="btn btn-default"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                            <button type="submit" class="btn btn-primary pull-right">
                                                                Okay
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /.box -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
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