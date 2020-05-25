<?php

namespace App\Services;

use App\Models\Menu;

class MenuService
{
    public function getMenuWithCategory($restoId)
    {
        return $categories = Menu::Where('resto_id', $restoId)
            ->get()
            ->groupBy('category.name');
    }
}
