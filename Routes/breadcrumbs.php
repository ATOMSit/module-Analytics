<?php

// Home > Blog
Breadcrumbs::for('analytics.admin.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push(trans('analytics::breadcrumb_translation.analytics.admin.index'), route('analytics.admin.index'));
});