@extends('application.layouts.app')

@section('title')
    @lang('analytics::breadcrumb_translation.analytics.admin.index')
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('analytics.admin.index') }}
@endsection

@push('styles')

@endpush

@push('scripts')

@endpush

@section('content')
    @widget('AdvicesWidget', ['plugin' => 'analytics'])
    <div class="row">
        <div class="col-xl-8">
            @widget('Modules\Analytics\Widgets\GlobalWidget')
        </div>
        <div class="col-xl-4">
            <div class="row">
                <div class="col-xl-12">
                    @widget('Modules\Analytics\Widgets\TopSocialsMediasWidget')
                </div>
                <div class="col-xl-12">
                    @widget('Modules\Analytics\Widgets\TopBrowsersWidget')
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            @widget('Modules\Analytics\Widgets\UserTypesWidget')
        </div>
        <div class="col-xl-4">
            @widget('Modules\Analytics\Widgets\PrintSupportWidget')
        </div>
        <div class="col-xl-4">
            @widget('Modules\Analytics\Widgets\TopCountriesWidget')
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            @widget('Modules\Analytics\Widgets\TopPagesWidget')
        </div>
    </div>
@endsection
