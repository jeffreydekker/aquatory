<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function bulkEmailPage() {
        return view('bulk-email-page');
    }
}
