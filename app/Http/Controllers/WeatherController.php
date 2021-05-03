<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
class WeatherController extends Controller
{
    protected $api_key;
    public function __construct() {
        $this->api_key = env('WEATHER_API_KEY');
    }

    public function find_weather(Request $request) {
        if(trim($request->city_name) == "") {
            return response()->json([
                'code' => 302,
                'message' => 'Empty string received'
            ]);
        }
        
        $city_name = $request->city_name;
        $minutes = Carbon::now()->addMinutes(240); // 4 hrs
        
        $result_json = Cache::remember($city_name, $minutes, function() use($city_name) {
            $api_url = "https://api.openweathermap.org/data/2.5/weather?q=" . $city_name . "&appid=" . $this->api_key . '&units=Imperial';
            $client = new Client();

            try {
                $response = $client->request('GET', $api_url);
            } catch (ClientException $e) {
                $error_html = "<div class='no_data_report'>No Data Found... Please try with correct city name.</div>";
                echo $error_html;
                die;
            }

            $json = $response->getBody()->getContents();
            return $json;
        });
        
        $result = json_decode($result_json, true);
        $report_view = view('weather.sections.report', compact('result'))->render();
        echo $report_view;
    }
}
