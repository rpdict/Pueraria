@extends('adminlte::layouts.app2')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.landingcontainer')
@endsection