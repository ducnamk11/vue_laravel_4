<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Rules\RestoCategoryValidate;
use App\Services\MenuService;

class MenuController extends Controller
{
    public function index($id)
    {
        $restoId = $id;
        $service = new MenuService();
        $menus = $service->getMenuWithCategory($restoId);
        return view('menus.menu-index', compact('menus', 'restoId'));
    }
    public function saveMenuItem(Request $request)
    {
        $postData = $this->validate($request, [
            'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'item' => 'required',
            'description' => 'required',
            'category' => ['required', new RestoCategoryValidate(request('restoId'))],
        ]);

        $category = Category::where('resto_id', $postData['restoId'])->where('name', $postData['category'])->first();

        $menu = Menu::create([
            'name' => $postData['item'],
            'price' => $postData['price'],
            'description' => $postData['description'],
            'resto_id' => $postData['restoId'],
            'category_id' => $category->id,
        ]);
        return response()->json($menu, 201);
    }
}
