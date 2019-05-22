<?php

namespace Modules\Analytics\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GenerateSidebarMenu
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $menu = \Menu::get('MyNavBar');
        $menu->add(trans('analytics::menu_translation.sidebar.level1.title0'), ['icon' => 'fas fa-chart-line', 'id' => 'analytics1'])->data('order', 3);
        $menu->add(trans('analytics::menu_translation.sidebar.level2.title0'), ['route' => 'analytics.admin.index', 'parent' => 'analytics1', 'id' => 'analytics11']);
        return $next($request);
    }
}
