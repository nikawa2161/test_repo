<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    /**
     *  特徴一覧
     */
    public function index()
    {
        return view('admin.organization.feature');
    }
}
