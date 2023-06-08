<?php

namespace App\Filament\Resources\NewsResource\Pages;

use App\Filament\Resources\NewsResource;
use Filament\Resources\Pages\Page;
use App\Models\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsList extends Page
{
    protected static string $resource = NewsResource::class;

    protected static string $view = 'filament.resources.news-resource.pages.news-list';

    // public function displayNews(Request $request)
    // {
    //     $response = $this->determineMethodHandler($request);
    //     $apiModel = new Api();
    //     $response['news'] = $apiModel->fetchNewsFromSource($response['sourceId']);
    //     $response['newsSources'] = $this->fetchAllNewsSources();

    //     return view('welcome', $response);
    // }
    // /**
    //  * @param $request
    //  * @return mixed
    //  */
    // protected function determineMethodHandler($request)
    // {
    //     if ($request->isMethod('get')) {
    //         $response['sourceName'] = config('app.default_news_source');
    //         $response['sourceId'] = config('app.default_news_source_id');
    //     } else {
    //         $request->validate([
    //             'source' => 'required|string',
    //         ]);
    //         $split_input = explode(':', $request->source);
    //         $response['sourceId'] = trim($split_input[0]);
    //         $response['sourceName'] = trim($split_input[1]);
    //     }
    //     return $response;
    // }
    // /**
    //  * @return mixed
    //  */
    // public function fetchAllNewsSources()
    // {
    //     $response = Cache::remember('allNewsSources', 22 * 60, function () {
    //         $api = new Api;
    //         return $api->getAllSources();
    //     });
    //     return $response;
    // }
}
