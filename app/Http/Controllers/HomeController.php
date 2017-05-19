<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $sts = Student::all();
        return view('welcome');
    }


}
