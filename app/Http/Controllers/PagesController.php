<?php

namespace App\Http\Controllers;

use App\{User, Clients, News, Category, Projects, Product, Vacancy as Vac, Info};
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Validator, Auth, DB, Log};
use App\Http\Controllers\Controller;

use App\Mail\Vacancy;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function index(Request $request)
    {
        //Log::info('index page');
        //Log::error('test error', ['id' => 1]);
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }



    /**
     * {@inheritdoc}
     */
    public function about(Request $request)
    {
        $this->title = 'О компании';
        $this->sectionCode = 'about';
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function sitemap(Request $request)
    {
        $this->title = 'Карта сайта';
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function news(Request $request, $id='')
    {
        $this->title = 'Новости';
        $this->sectionCode = 'about';
        $this->addFilter($request, '\App\News', compact('id'));
        $this->params ['directionId'] = $id;
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function newsPage(Request $request, $alias)
    {
        $this->sectionCode = 'about';
        $this->params ['item'] = News::where('alias', $alias)->first();
        if (!$this->params ['item']) {
            abort(404);
        }
        $this->addBreadcrumb('Новости', '/news');
        $this->title = $this->params ['item']->name;
        $this->addBreadcrumb($this->params ['item']->name);
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function actions(Request $request, $id='')
    {
        $this->title = 'Акции';
        $this->addFilter($request, '\App\Actions', compact('id'));
        $this->sectionCode = 'about';
        $this->params ['directionId'] = $id;
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function contacts(Request $request, $id='')
    {

        if ($request->isMethod('post')) {
            $input = $request->all();
            $rules = [
                'rec' => 'regex:~\d+-\d+~is',
                'name' => 'required|min:2',
                'contacts' => 'required|min:6',
                'message' => 'required|min:10',
                'personal' => 'accepted',
                'captcha' => 'required|captcha',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $this->params ['messages'] = $validator->messages();
            }
        }

        $this->params ['id'] = $id;
        $this->title = 'Контакты';
        $this->showCatalogMenu = false;
        $this->sectionCode = 'contacts';
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function vacancies(Request $request)
    {
        $this->title = 'Вакансии';
        $this->params ['data'] = Vac::orderBy('id')->get();
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function vacancy(Request $request, $id)
    {
        $this->title = 'Отклик на вакансию';
        $this->addBreadcrumb('Вакансия '.$id);


        $this->params ['success'] = false;
        if ($request->isMethod('post')) {
            $input = $request->all();
            $rules = [
                'name' => 'required|min:2',
                'age' => 'required|integer|between:14,100',
                'addr' => 'required|min:5',
                'email' => 'required|email',
                'phone' => 'required|min:6',
                'exp' => 'required|min:2',
                'comp' => 'required|min:2',
                'langs' => 'required|min:2',
                'personal' => 'accepted',
                'personal' => 'accepted',
                'captcha' => 'required|captcha',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $this->params ['messages'] = $validator->messages();
            } else {
                Mail::to('andymc@inbox.ru')->send(new Vacancy($input));
                $this->params ['success']= true;
            }
        }

        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function projects(Request $request, $id='')
    {
        $this->title = 'Проекты';
        $this->sectionCode = 'about';
        $this->addFilter($request, '\App\Projects', compact('id'));
        $this->params ['directionId'] = $id;
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function info(Request $request)
    {
        $this->title = 'Полезная информация';
        //$this->sectionCode = 'about';
        $this->addFilter($request, '\App\Info', compact('id'));
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function infoPage(Request $request, $alias)
    {
        $this->params ['item'] = Info::where('alias', $alias)->first();
        if (!$this->params ['item']) {
            abort(404);
        }
        $this->addBreadcrumb('Полезная информация', '/info-list');
        $this->title = $this->params ['item']->name;
        $this->addBreadcrumb($this->params ['item']->name);
        return view('about/'.__FUNCTION__, $this->prepare($request));
    }







    /**
     * {@inheritdoc}
     */
    public function catalog(Request $request)
    {
        $this->title = 'Каталог товаров';
        $this->sectionCode = 'catalog';
        return view('catalog/index', $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function catalogSection(Request $request, $section='')
    {

        $this->title = 'Каталог товаров';
        $this->sectionCode = 'catalog';

        // Свойства текущей категории
        $category = Category::where('alias', $section)->first();
        $this->params ['section_name'] = $category->name;
        $this->params ['seo_txt'] = $category->seo_txt;
        $this->params ['content'] = $category->content;
        $this->params ['alias_full'] = $category->alias_full;
        if ($category->meta_title) {
            $this->params['meta_title'] = $category->meta_title;
        }
        if ($category->meta_description) {
            $this->params['meta_description'] = $category->meta_description;
        }

        // Стат по количеству
        $stat = [];
        $a = \Illuminate\Support\Facades\DB::select('SELECT count(*) as c, id_category FROM sod_product WHERE id_category IN (SELECT id FROM sod_category WHERE id_parent=?) GROUP BY 2 ', [$category->id]);
        foreach ($a as $k => $v) {
            $stat [$v->id_category] = $v->c;
        }

        // Подкатегории
        $model = Category::orderBy('id', 'asc');
        $model->where('id_parent', $category->id);
        $cats = $model->get()->toArray();
        foreach ($cats as $k => $v) {
            $model = Product::inRandomOrder();
            $model->where('id_category', $v['id']);
            $products = $model->skip(0)->take(10)->get();
            $cats [$k]['projects'] = $products;
            $cats [$k]['total'] = $stat[$v['id']];
        }
        $this->params ['categories'] = $cats;

        // Товары
        $model = Product::orderBy('id', 'asc');
        $model->where('id_category', $category->id);
        if ($model->count()) {
            $this->sectionCode = 'filter';
            $this->showCatalogMenu = false;
            $this->addFilter($request, '\App\Product', compact('category'));
        }

        // Крошки
        $this->categoryBreadcrumbs($category);
        $this->addBreadcrumb($this->params ['section_name']);

        return view('catalog/section', $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function orderAddToCart(Request $request, Product $product)
    {
        $cart = [];
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
        }
        if (!isset($cart [$product->id])) {
            $cart [$product->id]= $product->toArray();
            $cart [$product->id]['quantity']= 1;
        } else {
            $cart [$product->id]['quantity'] ++;
        }
        $total = $sum = 0;
        foreach ($cart as $k => $v) {
            $total += $v['quantity'];
            $sum += $v['quantity'] * $v['price'];
        }
        $request->session()->put('cart', $cart);
        $result = [
            'r' => 1,
            'q' => $cart [$product->id]['quantity'],
            'c' => $total,
            't' => number_format($sum, 2, '.', ' ')
        ];
        echo json_encode($result);
    }
    /**
     * {@inheritdoc}
     */
    public function productPage(Request $request, $alias)
    {
        $this->sectionCode = 'catalog';

        // Продукт
        $item = Product::where('alias', $alias)->first();
        $item->checkAndLoad();
        $this->params ['item'] = $item;
        if (!$item) {
            abort(404);
        }
        if ($item->name) {
            $this->params['meta_title'] = $item->name;
        }

        // Свойства
        $propValues = [];
        if ($item->props) {
            foreach ($item->props as $k => $v) {
                $propValues[$v->prop->group][$v->prop->name] = $v->value;
            }
        }
        $this->params ['propValues']= $propValues;

        // Похожие товары 4-5 из той же категории
        $this->params ['similars'] = Product::where('id_category', $item->id_category)->whereNotIn('id', [$item->id])->inRandomOrder()->skip(0)->take(5)->get();

        // Крошки
        $this->categoryBreadcrumbs($item->category);
        $this->addBreadcrumb($item->name);

        return view('catalog/product', $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    function categoryBreadcrumbs($category)
    {
        $this->params ['categorySelected']= [];
        $this->addBreadcrumb('Каталог', '/catalog');
        if ($category->id_parent) {
            $this->params ['categorySelected'][] = $category->id_parent;
            $topCategory = Category::find($category->id_parent);
            if ($topCategory->id_parent) {
                $this->params ['categorySelected'][] = $topCategory->id_parent;
                $topTopCategory = Category::find($topCategory->id_parent);
                $this->addBreadcrumb($topTopCategory->name, '/'.$topTopCategory->alias_full);
            }
            $this->addBreadcrumb($topCategory->name, '/'.$topCategory->alias_full);
        }
        if ($item->category) {
            $this->params ['categorySelected'][] = $category->id;
            $this->addBreadcrumb($category->name, '/'.$category->alias_full);
        }
    }
    /**
     * {@inheritdoc}
     */
    public function retail(Request $request)
    {
        $this->title = 'Розничная торговля';
        $this->sectionCode = 'retail';
        return view('catalog/retail', $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function discountProgramm(Request $request)
    {
        $this->title = 'Дисконтная программа';
        $this->sectionCode = 'retail';
        $this->addBreadcrumb('Розничная торговля', '/retail');
        $this->addBreadcrumb($this->title);
        return view('catalog/discount-programm', $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function retailPaymentDelivery(Request $request)
    {
        $this->title = ' Оплата и доставка';
        $this->sectionCode = 'retail';
        $this->addBreadcrumb('Розничная торговля', '/retail');
        $this->addBreadcrumb($this->title);
        return view('catalog/retail-payment-delivery', $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function certificates(Request $request)
    {
        $this->title = 'Подарочные сертификаты';
        $this->sectionCode = 'retail';
        $this->addBreadcrumb('Розничная торговля', '/retail');
        $this->addBreadcrumb($this->title);
        return view('catalog/certificates', $this->prepare($request));
    }






    /**
     * {@inheritdoc}
     */
    public function corporate(Request $request)
    {
        $this->title = 'Корпоративный отдел';
        $this->sectionCode = 'corporate';
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function clients(Request $request, $id='')
    {
        $this->title = 'Клиенты';
        if ($id) {
            $this->title .= ' - '.Clients::$directions[$id];
        }
        $this->sectionCode = 'about';
        $clients = Clients::orderBy('id', 'asc');
        if ($id) {
            $clients->where('direction', $id);
        }
        $this->params ['clients'] = $clients->get();
        $this->params ['directionId'] = $id;
        //$this->params ['directions'] = Clients::$directions;
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function forDealers(Request $request)
    {
        $this->title = 'Для дилеров';
        $this->sectionCode = 'corporate';
        $this->addBreadcrumb('Корпоративный отдел', '/corporate');
        $this->addBreadcrumb($this->title);
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function corpPaymentDelivery(Request $request)
    {
        $this->title = 'Доставка и оплата';
        $this->sectionCode = 'corporate';
        $this->addBreadcrumb('Корпоративный отдел', '/corporate');
        $this->addBreadcrumb($this->title);
        return view('pages/corp-payment-delivery', $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function statuses(Request $request)
    {
        $this->title = 'Статусы компании';
        $this->sectionCode = 'corporate';
        $this->addFilter($request, '\App\Statuses');
        $this->addBreadcrumb('Корпоративный отдел', '/corporate');
        $this->addBreadcrumb($this->title);
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function corporatePrice(Request $request)
    {
        $this->title = 'Прайс-листы';
        $this->sectionCode = 'corporate';
        $this->addBreadcrumb('Корпоративный отдел', '/corporate');
        $this->addBreadcrumb($this->title);
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }






  /**
     * {@inheritdoc}
     */
    public function c1(Request $request)
    {
        $this->title = 'Серв. центр';
        $this->showCatalogMenu = false;
        $this->sectionCode = '1c';
        return view('pages/1c', $this->prepare($request));
    }





  /**
     * {@inheritdoc}
     */
    public function security(Request $request)
    {
        $this->title = 'Серв. центр';
        $this->showCatalogMenu = false;
        $this->sectionCode = 'security';
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function securityServices(Request $request)
    {
        $this->title = 'Услуги';
        $this->sectionCode = 'security';
        $this->addBreadcrumb('Сети и системы безопасности ', '/security');
        $this->addBreadcrumb($this->title);
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function requestSecurity(Request $request)
    {
        $errors = [];
        if ($request->isMethod('post')) {
            $input = $request->all();
            $rules = [
                'name' => 'required|min:2',
                'phone' => 'required|min:6',
                'doc' => 'required|min:3',
                'personal' => 'accepted',
                'captcha' => 'required|captcha',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $this->params ['errors'] = $validator->messages();
            }
        }
        $this->title = 'Оформление заявки';
        $this->sectionCode = 'security';
        $this->addBreadcrumb('Сети и системы безопасности ', '/security');
        $this->addBreadcrumb($this->title);
        return view('form-security', $this->prepare($request));
    }




    /**
     * {@inheritdoc}
     */
    public function services(Request $request)
    {
        $this->title = 'Серв. центр';
        $this->showCatalogMenu = false;
        $this->sectionCode = 'services';
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }





    /**
     * {@inheritdoc}
     */
    public function subscriptionService(Request $request)
    {
        $this->title = 'Абон. обслуживание';
        $this->showCatalogMenu = false;
        $this->sectionCode = 'subscription-service';
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }
    /**
     * {@inheritdoc}
     */
    public function subscriptionServices(Request $request)
    {
        $this->title = 'Услуги';
        $this->sectionCode = 'subscription-service';
        $this->addBreadcrumb('Абонентское обслуживание', '/subscription-service');
        $this->addBreadcrumb($this->title);
        $this->showCatalogMenu = false;
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }
    public function subscriptionTariffs(Request $request)
    {
        $this->title = 'Тарифные планы';
        $this->sectionCode = 'subscription-service';
        $this->addBreadcrumb('Абонентское обслуживание', '/subscription-service');
        $this->addBreadcrumb($this->title);
        $this->showCatalogMenu = false;
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }
    public function subscriptionCalc(Request $request)
    {
        $this->title = 'Калькулятор';
        $this->sectionCode = 'subscription-service';
        $this->addBreadcrumb('Абонентское обслуживание', '/subscription-service');
        $this->addBreadcrumb($this->title);
        $this->showCatalogMenu = false;
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }





    /**
     * {@inheritdoc}
     */
    public function requestItemPrice(Request $request)
    {
        $errors = [];
        if ($request->isMethod('post')) {
            $input = $request->all();
            $rules = [
                'name' => 'required|min:2',
                'contacts' => 'required|min:6',
                'item' => 'required|min:3',
                'personal' => 'accepted',
                'captcha' => 'required|captcha',
            ];
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                $errors = $validator->messages();
            } else {
                $success = true;
            }
        }
        return view('form-item-price', compact('errors', 'success'));
    }


    /**
     * {@inheritdoc}
     */
    public function cabinet(Request $request)
    {
        $this->title = 'Мой профиль';
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }

}
