<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{

    /**
    *
    *
    * @param  int  $id
    * @return Response
    */
    public function category()
    {

        $item = new Category;

        $items = Category::all();


        return view('get', [
            'item' => $item,
            'items' => $items,
            'btnText' => 'Сохранить'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function categoryAdd(Request $request)
    {

        $input = $request->all();
        $id = $request->input('id');

        $editMode = false;
        if ($id) {
        	$item = Category::find($id);
            $editMode = true;
        } else {
	        $item = new Category;
        }

        // Проверка основных данных
        $rules = [
            'name' => 'required|min:3',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            echo json_encode($messages = $validator->messages());
            exit;
        }

        // Все хорошо, создаем объект
        if ($item->id) {
        	$item->fill($input);
            $item->save();
        } else {
            $item = Category::create($input);
        }

        echo json_encode(['id' => $item->id]);
    }

    /**
     * {@inheritdoc}
     */
    public function test()
    {
        $results = DB::select('select * from dns_category');

        return view('test', ['results' => $results]);
    }

}












