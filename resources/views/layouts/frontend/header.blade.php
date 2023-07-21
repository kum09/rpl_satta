<!DOCTYPE html>
<html lang="en">

<head>
    <title>RPL Satta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('public/assets/frontend/css/style.css')}}" />
</head>
<style>
    body {
        background-color: #f5f9d0 !important;
    }
</style>

@php  
        $page_url = Route::currentRouteName();
        if($page_url == 'frontend.rpl_satta_a'){ 
            $body_bg_color = "#f5f9d0 !important";
        }else if($page_url == 'frontend.rpl_satta_b'){ 
            $body_bg_color = "#eef2009e !important";
        }else if($page_url == 'frontend.rpl_satta_c'){ 
            $body_bg_color = "#e32ddb9e !important";
        }else if($page_url == 'frontend.rpl_satta_d'){ 
            $body_bg_color = "#222 !important";
        }else if($page_url == 'frontend.home'){ 
            $body_bg_color = "#eef2009e !important";
        }  

        if($page_url == 'frontend.monthly_result_a'){  
            $body_bg_color = "#f5f9d0 !important"; 
        }else if($page_url == 'frontend.monthly_result_b'){  
            $body_bg_color = "#eef2009e !important";  
        }else if($page_url == 'frontend.monthly_result_c'){ 
            $body_bg_color = "#eeaceb9e !important";  
        }else if($page_url == 'frontend.monthly_result_d'){  
            $body_bg_color = "#eef2009e !important";
        }  
 
        @endphp 




<body style="background-color:{{ $body_bg_color }};">