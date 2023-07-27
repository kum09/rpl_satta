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
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <style>
        .log_out_button{
            padding: 5px 10px;
            border-radius: 5px;
        }

        @media (max-width: 576px){
            .right .header ul li{
                padding-left:0px;
            }
            .log_out_button{
                display:none;
            }
            .right .header{
                padding:15px;
            }
            .user_name_font{
                font-size: 0.9rem;
            }
            
        }
        .sideNavleft ul .menu-heading .closeBtn{
        cursor: pointer !important;
    }

    .navbar_icon_style{
        cursor: pointer;
    }
    
      
    .sideNavleft ul button {
    display: flex;
    align-items: center;
    color: white;
    padding: 10px 10px 10px 16px;
    font-size: 13px;
    font-weight: 600;
    width: 200px;
    border-bottom: 1px solid #4d44b5;
    
}
.sideNavleft ul button p{
    padding-left: 27px;
}


    </style>

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
                <li class="{{Request::route()->getName() == 'admin.dashboard_view' ? 'active':''}}"><a data-toggle="tab" href="{{route('admin.dashboard_view')}}"><i class="fa fa-home fa-lg"></i>
                Dashboard</a>
                </li>
                <li class="{{Request::route()->getName() == 'admin.result' ? 'active':''}}"><a data-toggle="tab" href="{{route('admin.result')}}"><i class="fa fa-tachometer fa-lg"></i>Result
                    </a></li>
                    <li class="{{Request::route()->getName() == 'admin.advertisement.index' ? 'active':''}}"> 
                    <a data-toggle="tab" href="{{route('admin.advertisement.index')}}">
                        <i class="fa fa-street-view fa-lg"></i>
                        Advertisement
                    </a>
                </li>
                <li class="{{Request::route()->getName() == 'admin.profile.index' ? 'active':''}}">
                    <a data-toggle="tab" href="{{route('admin.profile.index')}}">
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
                <li class="{{Request::route()->getName() == 'admin.dashboard_view' ? 'active':''}}"><a data-toggle="tab" href="{{route('admin.dashboard_view')}}"><i class="fa fa-home fa-lg"></i>
                        Dashboard</a>
                </li>
                <li class="{{Request::route()->getName() == 'admin.result' ? 'active':''}}"><a data-toggle="tab" href="{{route('admin.result')}}"><i class=" fa fa-clock-o fa-lg"></i> Result</a></li>
                
                 <li class="log_out_mobile_btn {{Request::route()->getName() == 'admin.advertisement.index' ? 'active':''}}"> 
                    <a data-toggle="tab" href="{{route('admin.advertisement.index')}}">
                        <i class="fa fa-street-view fa-lg"></i>
                        Advertisement
                    </a>
                </li>
                <li class="{{Request::route()->getName() == 'admin.profile.index' ? 'active':''}}">
                    <a data-toggle="tab" href="{{route('admin.profile.index')}}">
                        <i class="fa fa-street-view fa-lg"></i>
                        Profile
                    </a>
                </li>
               
                <li><form method="POST" action="{{route('logout')}}">
                            @csrf
                     <button type="submit" value="Log Out" ><i class="fa fa-sign-out fa-lg"></i>
                     <p>Log out</p></button>
                </form>
            </li>
               

            </ul>
        </div>
        <div class="right">
            <div class="tab-content">
                <div class="header">
                    <h4>Dashboard</h4>
                    <ul class="pull-right ">
                        <li>
                        <li class="user_name_font" >{{Auth::user()->name}}</li>
                            <div class="btn-group dropleft dropdown-user">
                                <img class="dropdown-toggle" style="width:40px;height: 40px;"
                                    src="{{url('public/assets/frontend/images')}}/bellcoloricon.png" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                </img>
                            </div>
                        </li>
                        <li>
                            <span class="toggleOpenNav" onclick="openSideNav()">
                                <i class="fa-solid fa-bars navbar_icon_style"></i>
                            </span>
                        </li>
                        <li><form method="POST" action="{{route('logout')}}">
                            @csrf
                     <input type="submit" value="Log Out" class="log_out_button">
                </form>
            </li>
                      

                    </ul>
                </div>