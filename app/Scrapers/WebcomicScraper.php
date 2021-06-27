<?php

namespace App\Scrapers;


use App\Models\Source;
use App\Models\Strip;
use Illuminate\Support\Facades\Http;

abstract class WebcomicScraper
{
    protected string $title;

    protected string $description;

    /**
     * Main class must have function to get the Image URL
     * @param Source $source
     */
    abstract public function getImageUrl(Source $source);


    /**
     * Download the image
     *
     * @param $url
     * @param Source $source
     * @return string|null
     */
    public function downloadImage($url, Source $source)
    {
        $url = html_entity_decode($url);

        if($source->baseurl) {
            $url = $source->baseurl . $url;
        }

        $response = Http::withHeaders([
            'Referer' => $source->searchpage ?? $source->homepage,
        ])->get($url);

        if(!$response->successful()) {
            return null;
        }

        return $response;
    }

    /**
     * Checks if an image already exists
     *
     * @param $md5
     * @return bool
     */
    public function checkDuplicate($md5): bool
    {
        return (bool)Strip::where('image_hash', $md5)->count();
    }

    /**
     * Converts %Y, %M, %m, %D, %d to their date equivalents
     *
     * @param $string
     * @return string
     */
    protected function convertUrl($string): string
    {
        $string = str_replace('%Y', date('Y'), $string);
        $string = str_replace('%y', date('y'), $string);
        $string = str_replace('%m', date('m'), $string);
        $string = str_replace('%d', date('d'), $string);

        return $string;
    }

}
