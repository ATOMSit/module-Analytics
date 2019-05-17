<?php

// Home > Blog
Breadcrumbs::for('analytics.admin.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('Audience de votre site', route('analytics.admin.index'));
});