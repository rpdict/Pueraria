@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{--{{ trans('adminlte_lang::message.home') }}--}}
    Contacts
@endsection

@section('contentheader_title')
    Contacts
    <button type="submit" class="btn btn-default btn-flat" name="add" data-toggle="modal"
            data-target=".bs-add-modal-lg"><i class="fa fa-plus"></i>
    </button>
    @include('functions.partials.createContact')
@endsection

@section('main-content')
    <!-- Your Page Content Here -->
    <div class="row">
        @foreach ($contacts as $contact)
            <div class="col-md-4">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-yellow gradient-wrap">
                        <div class="widget-user-image">
                            <img crossorigin="anonymous" class="img-circle" src="{{ Gravatar::get($contact->email) }}" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">{{ $contact->name }}</h3>
                        <h5 class="widget-user-desc">{{ $contact->description }}</h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="#">Email <span
                                            class="pull-right badge bg-blue">{{ $contact->email }}</span></a></li>
                            <li><a href="#">TEL <span class="pull-right badge bg-aqua">{{ $contact->tel }}</span></a>
                            </li>
                            <li><a href="#">Address <span
                                            class="pull-right badge bg-green">{{ $contact->address }}</span></a>
                            </li>
                            {{--<li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>--}}
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
        @endforeach
    </div>
@endsection
@section('page-script')
@endsection