<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/assets/admin/css/style.css')}}" />
     <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.8.13/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>

    <div class="main">
        <div class="left">
            <ul>
                <li class="menu-heading my-0">
                    <h3>
                        RPL
                    </h3>
                </li>
                <li class="active"><a data-toggle="tab" href="adminPanel.html"><i class="fa fa-home fa-lg"></i>
                        Overview</a>
                </li>
                <li><a data-toggle="tab" href="resultHisotry.html"><i class="fa fa-tachometer fa-lg"></i>Result
                    </a></li>
                <li>
                    <a data-toggle="tab" href="profile.html">
                        <i class="fa fa-street-view fa-lg"></i>
                        Profile
                    </a>
                </li>
            </ul>
        </div>

        <div class="sideNavleft" id="sidebar">
            <ul>
                <li class="menu-heading my-0">
                    <h3>
                        RPL
                    </h3>
                    <span class="closeBtn" id="closeBtn" onclick="closeNav()">X</span>
                </li>
                <li class="active"><a data-toggle="tab" href="adminPanel.html"><i class="fa fa-home fa-lg"></i>
                        Overview</a>
                </li>
                <li><a data-toggle="tab" href="#"><i class=" fa fa-clock-o fa-lg"></i> Time</a></li>
                <li><a data-toggle="tab" href="resultHisotry.html"><i class="fa fa-tachometer fa-lg"></i>Result
                        History</a></li>
                <li>
                    <a data-toggle="tab" href="profile.html">
                        <i class="fa fa-street-view fa-lg"></i>
                        Profile
                    </a>
                </li>
                <li><a data-toggle="tab" href="#"><i class="fa fa-line-chart fa-lg"></i> Setting</a></li>
                <li><a data-toggle="tab" href="#"><i class="fa fa-search fa-lg"></i> Browse</a></li>
            </ul>
        </div>
        <div class="right">
            <div class="tab-content">
                <div class="header">
                    <h4>Dashboard</h4>
                    <ul class="pull-right">
                        <li>
                            <div class="btn-group dropleft dropdown-user">
                                <img class="dropdown-toggle" style="width:40px;height: 40px;"
                                    src="{{url('public/assets/admin/img/bellcoloricon.png')}}" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                </img>
                            </div>
                        </li>
                        <li>
                            <span class="toggleOpenNav" onclick="openSideNav()">
                                <i class="fa-solid fa-bars"></i>
                            </span>
                        </li>
                        <li>{{Auth::user()->name}}</li>
                        <li><form method="POST" action="{{route('logout')}}">
                            @csrf
                     <input type="submit" value="Log Out">
                </form>
            </li>

                    </ul>
                </div>