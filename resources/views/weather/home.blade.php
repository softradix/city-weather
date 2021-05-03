@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form_wrap">
                
                <fieldset>
                    <legend>Discover the City Weather</legend>
                </fieldset>
                <div class="inner-form">
                    <div class="input-field first-wrap">
                    <input id="city_name" name="city_name" type="text" placeholder="Enter city name..." />
                    <span class="city_err"></span>
                    </div>
                    <!-- <div class="input-field second-wrap">
                    <input id="location" type="text" placeholder="location" />
                    </div> -->
                    <div class="input-field third-wrap">
                    <button class="btn-search" type="button">Weather Report</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="result_wrap">
                <div class="loader_block hide">
                    <img src="{{ url('images/loader.gif') }}">
                </div>
                <div class="result_weather">

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    $('.btn-search').on('click', function() {
        var city_name = $('#city_name').val();
        if($.trim(city_name) == "") {
            $('.city_err').text('Empty string not allowed.');
            $('#city_name').val('');
            return false;
        }   else {
            $('.city_err').text('');
            $('.result_weather').html("");
            $('.loader_block').fadeIn();
            url = "{{ route('weather_report') }}";
            $.ajax({
                type: 'POST',
                url: url,
                data: { "city_name" : city_name, "_token" : "{{ csrf_token() }}" },
                dataType: "html",
                success: function(res) {
                    $('.loader_block').fadeOut();
                    $('.result_weather').html(res);
                }
            });
        }
    });
</script>
@endsection