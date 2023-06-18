<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;

class News extends Model
{
    use HasFactory;
    use Sushi;

    /**
     * Model Rows
     *
     * @return void
     */
    public function getRows()
    {
        //API
        $news = Http::get('https://newsdata.io/api/1/news?apikey=' . config('app.news_api_key') . '&q=online%20scam&country=id,my,sg,gb')->json();

        $news = Arr::map($news['results'], function ($item) {

            if ($item['creator'] == null || $item['creator'][0] == '') {
                $item['creator'] = 'n/a';
            } else {
                $item['creator'] = $item['creator'][0];
            }

            return Arr::only(
                $item,
                [
                    'creator',
                    'title',
                    'description',
                    'link',
                    'image_url',
                    'pubDate',
                ]
            );
        });

        return $news;
    }
}
