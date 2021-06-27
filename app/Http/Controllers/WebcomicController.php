<?php

namespace App\Http\Controllers;


use App\Models\Webcomic;
use Illuminate\Http\Request;

class WebcomicController extends Controller
{

    public function index()
    {
        return Webcomic::orderBy('name')
            ->get();
    }

    public function show($id)
    {
        return Webcomic::findOrFail($id)->with('sources');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:webcomics',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $webcomic = Webcomic::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'author' => $request->author ?? null,
//            'media_id' => $media,
        ]);

        return $webcomic;

    }
}
