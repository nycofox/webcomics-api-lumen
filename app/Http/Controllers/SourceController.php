<?php

namespace App\Http\Controllers;


use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{

    /**
     * Returns a source, with webcomic
     *
     * @param $source
     * @return mixed
     */
    public function show($source)
    {
        return Source::whereId($source)->with('webcomic')->first();
    }

    /**
     * Stores a new source in the database
     *
     * @param Request $request
     */
    public function store(Request $request)
    {

    }

    /**
     * Updates an existing source
     *
     * @param $source
     * @param Request $request
     */
    public function update($source, Request $request)
    {

    }

    /**
     * Deletes a source from the database
     * Note: it will be soft-deleted
     *
     * @param $webcomic
     */
    public function destroy($webcomic)
    {

    }
}
