<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Для крошек
    public string $title = '';

    // Алиас раздела
    public string $sectionCode = '';

    public bool $showCatalogMenu = true;

    private array $breadcrumbs = [];
    protected array $params = [];

    /**
     * {@inheritdoc}
     */
    public function prepare($request)
    {
        $path = $request->path();
        /*if ($path == '/' || strpos($path, '/catalog') === 0) {
        	$this->showCatalogMenu = true;
        }*/ 

        return $this->params + [
            'title' => $this->title,
            'path' => $path,
            'breadcrumbs' => $this->makeBreadcrumbs($path),
            'catalogMenu' => $this->makeCatalogMenu(),
            'showCatalogMenu' => $this->showCatalogMenu,
            'sectionCode' => $this->sectionCode,
            'directions' => \App\Clients::$directions
        ];
    }

/*
    function addFilter($request, $class) {
        $data = $class::orderBy('id', 'asc');
        if ($id) {
            $data->where('direction', $id);
        }
        $totalCount = $data->count();
        $page = $request->input('page', 1) - 1;
        $onPage = $request->input('on-page', 5);
        $this->params ['total'] = $totalCount;
        $this->params ['page'] = $page;
        $this->params ['onPage'] = $onPage;
        $this->params ['countPages'] = ceil($totalCount / $onPage);

        $data->skip($page * $onPage)->take($onPage);
        $this->params ['data'] = $data->get();
    }
*/
    function addFilter($request, $class) {
        $data = $class::orderBy('id', 'asc');
        if ($id) {
            $data->where('direction', $id);
        }
        $onPage = $request->input('on-page', 5);
        if ($onPage > 5) {
            $this->params ['onPage'] = $onPage;
        }
        $this->params ['data'] = $data->paginate($onPage);
    }

    /**
     * {@inheritdoc}
     */
    function makeCatalogMenu()
    {
        $catalogMenu = [];
        $items = Category::all();
        foreach ($items as $item) {
            $catalogMenu [$item->id_parent][]= [
                'id' => $item->id,
                'alias_full' => $item->alias_full,
                'name' => $item->name,
                'alias' => $item->alias_full
            ];
        }
        return $catalogMenu;
    }

    /**
     * {@inheritdoc}
     */
    function makeBreadcrumbs($path)
    {
        if (!$this->title) {
            return [];
        }
        $breadcrumbs = [
            'Главная' => '/',
        ];
        if (!$this->breadcrumbs) {
            $breadcrumbs [$this->title] = $path;
        }

        foreach ($this->breadcrumbs as $item) {
        	$breadcrumbs [$item['text']] = $item['url'];
        }
        return $breadcrumbs;
    }

    /**
     * {@inheritdoc}
     */
    public function addBreadcrumb($text, $url='')
    {
        $this->breadcrumbs []= compact('text', 'url');
    }
}
