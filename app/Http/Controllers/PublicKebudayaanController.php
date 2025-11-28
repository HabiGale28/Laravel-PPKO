<?php
namespace App\Http\Controllers;
use App\Models\Kebudayaan;
use Illuminate\View\View;

class PublicKebudayaanController extends Controller
{
    public function index(): View
    {
        $kebudayaan = Kebudayaan::latest()->get();
        return view('kebudayaan.index', compact('kebudayaan'));
    }
}