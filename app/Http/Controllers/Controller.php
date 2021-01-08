<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\{Category, Basket};

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

        $basket = Basket::countSum();

        return $this->params + [
            'title' => $this->title,
            'basket' => $basket,
            'path' => $path,
            'breadcrumbs' => $this->makeBreadcrumbs($path),
            'catalogMenu' => $this->makeCatalogMenu(),
            'showCatalogMenu' => $this->showCatalogMenu,
            'categorySelected' => [],
            'sectionCode' => $this->sectionCode,
            'directions' => \App\Clients::$directions
        ];
    }

    /**
     * {@inheritdoc}
     */
    function addFilter($request, $class, $where=[]) {
        if (method_exists($class, 'getData')) {
            $data = $class::getData($request);
        } else {
            $data = $class::orderBy('id', 'asc');
        }
        extract($where);
        if ($direction) {
            $data->where('direction', $direction);
        }
        if ($category) {
            $data->where('id_category', $category->id);
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
        $breadcrumbs = [
            'Главная' => '/',
        ];
        if (!$this->breadcrumbs && $this->title) {
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
