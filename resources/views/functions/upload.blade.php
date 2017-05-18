@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{--{{ trans('adminlte_lang::message.home') }}--}}
    上传文件
@endsection

@section('contentheader_title')
    上传文件
    <button type="submit" class="btn btn-default btn-flat" name="add" data-toggle="modal"
            data-target=".bs-add-modal-lg"><i class="fa fa-plus"></i>
    </button>
    @include('functions.partials.uploadFile')
@endsection

@section('main-content')
    <!-- Your Page Content Here -->
    @if (session('exist'))
        <div class="alert alert-danger">
            {{ session('exist') }}
        </div>
    @elseif (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">上传文件表</h3>
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
                            <th>文件名</th>
                            <th>文件描述</th>
                            <th>文件大小</th>
                            <th>文件路径</th>
                            <th>创建日期</th>
                            <th>操作</th>
                        </tr>
                        @foreach ($uploads as $upload)
                            <tr>
                                <td>{{ $upload->id }}</td>
                                <td><a href="#">{{ $upload->name }}</a></td>
                                <td>{{ $upload->description }}</td>
                                <td name="size">{{ $upload->size }}</td>
                                <td>{{ $upload->path }}</td>
                                <td>{{ $upload->created_at }}</td>
                                <td>
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-xs btn-primary" name="edit" data-toggle="modal"
                                            data-target=".bs-edit-modal-lg{{ $upload->id }}"><span
                                                class="fa fa-edit"></span>编辑
                                    </button>
                                    @include('functions.partials.editUpload')
                                    <form class="operate" method="post" style="display: inline"
                                          action="{{ action('UploadController@destroy', ['id'=>$upload->id]) }}">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete"><span
                                                    class="fa fa-remove"></span>删除
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
        var sizeName = document.getElementsByName("size");
        for (var j = 0; j < sizeName.length; j++) {
            var size = sizeName[j].innerHTML;
            sizeName[j].innerHTML = bytesToSize(size);
        }

        function bytesToSize(bytes) {
            if (bytes === 0) return '0 B';

            var k = 1024;

            sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

            i = Math.floor(Math.log(bytes) / Math.log(k));

//            return (bytes / Math.pow(k, i)).toPrecision(4) + ' ' + sizes[i];
            //toPrecision(3) 后面保留一位小数，如1.0GB
            return (bytes / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i];
        }
    </script>
@endsection