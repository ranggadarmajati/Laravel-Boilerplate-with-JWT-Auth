<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro( "success", function ( array $data, $code = 200 ) {
            $response = [
                "code" => $code
                , "descriptions" => isset( $data["message"] ) ? $data["message"] : "OK"
                , "contents" => isset( $data["contents"] ) ? $data["contents"] : ( object ) null
            ];

            return Response::json( $response, $code );
        });

        Response::macro( "error" , function ( array $data, $code = 400 ) {
            $response = [
                "code" => $code
                , "descriptions" => isset( $data["message"] ) ? $data["message"] : "Failed"
                , "contents" => isset( $data["contents"] ) ? $data["contents"] : ( object ) null
            ];

            return Response::json( $response, $code );
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
