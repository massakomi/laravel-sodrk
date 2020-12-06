<?php

namespace App\Http\Controllers;

use App\User;
use App\Clients;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Category;

class PagesController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function index(Request $request)
    {
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }





    /**
     * {@inheritdoc}
     */
    public function about(Request $request)
    {
        $this->title = 'О компании';
        $this->sectionCode = 'about';
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
        $this->params ['directions'] = Clients::$directions;
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }

    //@if (in_array($path, ['about', 'news', 'projects', 'actions', 'clients']))





    /**
     * {@inheritdoc}
     */
    public function vacancies(Request $request)
    {
        $this->title = 'Вакансии';
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }

    /**
     * {@inheritdoc}
     */
    public function vacancy(Request $request, $id)
    {
        $this->title = 'Отклик на вакансию';
        $this->addBreadcrumb('Вакансия '.$id);
        return view('pages/'.__FUNCTION__, $this->prepare($request));
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
    public function cabinet(Request $request)
    {
        $this->title = 'Мой профиль';
        return view('pages/'.__FUNCTION__, $this->prepare($request));
    }




    /**
     * {@inheritdoc}
     */
    public function contacts(Request $request)
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

        $this->title = 'Контакты';
        $this->showCatalogMenu = false;
        $this->sectionCode = 'contacts';
        return view('pages/'.__FUNCTION__, $this->prepare($request));
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
    public function catalog(Request $request)
    {
        $this->title = 'Каталог товаров';
        return view('catalog/index', $this->prepare($request));
    }



}
