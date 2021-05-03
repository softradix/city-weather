<table class="weather_report">
    <tr>
        <td colspan="2">
            <h1>{{ $result['name'] ?? '' }}</h1>
        </td>
    </tr>
    <tr>
        <td>
            @if(isset($result['weather'][0]['icon']))
            <img src="http://openweathermap.org/img/w/{{ $result['weather'][0]['icon'] }}.png" class="img_weather">
            @else
            <img src="http://openweathermap.org/img/w/04d.png" alt="">
            @endif
        </td>
        <td>
            <h2>Temperature: {{ $result['main']['temp'] ?? '' }} Fahrenheit</h2>
            Feels Like: {{ $result['main']['feels_like'] ?? '' }} Fahrenheit<br>
            Humidity: {{ $result['main']['humidity'] ?? '' }} %<br>
            Min: {{ $result['main']['temp_min'] ?? '' }} Fahrenheit<br>
            Max: {{ $result['main']['temp_max'] ?? '' }} Fahrenheit<br>
            Wind Speed: {{ $result['wind']['speed'] ?? '' }} miles/hour<br>
        </td>
    </tr>
</table>