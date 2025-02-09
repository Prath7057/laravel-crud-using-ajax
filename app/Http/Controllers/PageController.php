<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Load any page dynamically
    public function loadPage($page)
    {
        $allowedPages = ['form', 'form1', 'dashboard'];

        if (!in_array($page, $allowedPages)) {
            return response()->json(['error' => 'Page not found'], 404);
        }

        return response()->json([
            'html' => view("components.$page")->render(),
            'title' => config("titles.$page", "Laravel | Ajax")
        ]);
    }

    // Handle first form submission and load form1
    public function submitForm(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        return response()->json([
            'html' => view("components.form1")->render(),
            'title' => "Laravel | Ajax | Form1"
        ]);
    }

    // Handle second form submission and load dashboard
    public function submitForm1(Request $request)
    {
        return response()->json([
            'html' => view("components.dashboard", ['username' => $request->username])->render(),
            'title' => "Laravel | Ajax | Dashboard"
        ]);
    }
}
