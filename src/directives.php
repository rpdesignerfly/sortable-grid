<?php
/**
 * @see       https://github.com/rpdesignerfly/sortable-grid
 * @copyright Copyright (c) 2018 Ricardo Pereira Dias (https://rpdesignerfly.github.io)
 * @license   https://github.com/rpdesignerfly/sortable-grid/blob/master/license.md
 */

declare(strict_types=1);

use Illuminate\Support\Str;

// Para Mais informações sobre a criação de diretivas:
// https://laravel.com/docs/5.5/blade#extending-blade
// https://scotch.io/tutorials/all-about-writing-custom-blade-directives

\Blade::directive('sg_perpage', function ($expression) {

    $view = config('sortablegrid.views.perpage');

    $open = "?php";
    $close = "?";

    return "<{$open} echo view('$view')->render(); {$close}>";
});

\Blade::directive('sg_search', function ($expression) {

    $view = config('sortablegrid.views.search');

    $open = "?php";
    $close = "?";

    return "<{$open} echo view('$view')->render(); {$close}>";
});

\Blade::directive('sg_info', function ($expression) {

    $view = config('sortablegrid.views.info');

    $open = "?php";
    $close = "?";

    return "<{$open} echo view('$view')->render(); {$close}>";
});

\Blade::directive('sg_pagination', function ($expression) {

    $pagination = session('sg.pagination');

    $open = "?php";
    $close = "?";

    return "<{$open} echo '$pagination'; {$close}>";
});

// @sg_table
//     <tr>
//         ... linhas da tabela
//     </tr>
// @end_sg_table

\Blade::directive('sg_table', function ($expression) {

    $view = config('sortablegrid.views.open');

    $open = "?php";
    $close = "?";

    return "<{$open} echo view('$view')->render(); {$close}>";
});

\Blade::directive('end_sg_table', function ($expression) {

    $view = config('sortablegrid.views.close');

    $open = "?php";
    $close = "?";

    return "<{$open} echo view('$view')->render(); {$close}>";
});

\Blade::directive('sg_flush', function ($expression) {

    session()->forget('sg.fields');
    session()->forget('sg.searchable');
    session()->forget('sg.orderly');
    session()->forget('sg.order_field');
    session()->forget('sg.order_direction');
    session()->forget('sg.total_registers');
    session()->forget('sg.first_item');
    session()->forget('sg.last_item');
    session()->forget('sg.last_page');
    session()->forget('sg.invalid_page');
    session()->forget('sg.pagination');
    session()->forget('sg.perpage');

});
