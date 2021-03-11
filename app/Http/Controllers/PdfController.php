<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PdfService;

class PdfController extends Controller
{
    function generate(){
        return PdfService::fetch()->parse()->generate()->stream();
    }
}
