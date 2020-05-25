<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Services\RestoService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.Hom
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuService $service, RestoService $restoService)
    {
        $restoId =3;
        $menus = $service->getMenuWithCategory($restoId);
        $restos = Auth::user()->restaurants()->get();
        return view('home', compact('menus', 'restoId', 'restos'));
    }
}
