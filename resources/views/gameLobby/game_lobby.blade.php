<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="robots" content="index, follow" > 
        <meta name="keywords" id="page_keyword" content="老虎机,线上博奕,博彩,游戏,菠菜,彩金,百搭,白菜,老虎机,老虎機,斯洛,線上博弈,博彩,遊戲,菠菜,彩金,百搭,BC,Jackpot,Slot,Gambling,Online game,Game,HTML 5,H5,API,BONUS,WILD,พนัน,สล็อต,เกมส์,พนันออนไลน์,เกมส์สล็อตออนไลน์แจกฟรีโบนัส,ถอนได้ทันที" > 
        <meta name="description" content="PLAYSTAR, starting with slot games, has deeply occupied the market for more than 10 years and developed online slots based on players' demand. All of PS slot RNG is certified by GLI and BMM, and all slots are developed in HTML5 which has highly compatible to support different devices and browsers." > 
        <meta name="theme-color" content="#000000">
        <link rel="shortcut icon" href="../assets/images/favicon_1.ico"/>
        <link rel="bookmark" href="../assets/images/favicon_1.ico"/>
        <title>:: UFABET ::</title>

        <!-- Bootstrap -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <!-- Scroll Animation -->
        {{-- <link href="../assets/css/aos.min.css" rel="stylesheet"> --}}
        <!-- Flat Icon CSS -->
        {{-- <link href="../assets/css/svg.min.css" rel="stylesheet"> --}}
        <!-- Slick Slider CSS -->
        <link href="../assets/css/slick.min.css" rel="stylesheet">
        <!-- Responsive Menu css -->
        <link rel="stylesheet" href="../assets/css/responsivemenu.min.css">
        <!-- Typography CSS -->
        <link href="../assets/css/typography.min.css" rel="stylesheet">   
        <!-- Widget Css -->
        <link href="../assets/css/widget.min.css" rel="stylesheet">
        <!-- Short Code CSS -->
        <link href="../assets/css/shortcode.min.css" rel="stylesheet">
        <!-- Color CSS -->
        <link href="../assets/css/color.css" rel="stylesheet">
        <!-- Responsive CSS -->
        <link href="../assets/css/responsive.css" rel="stylesheet">
        <!-- Google Font Link -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700|Open+Sans|Ubuntu" rel="stylesheet">
        <!-- 自定義CSS -->
        <link href="../assets/css/new_style.css?v=060101" rel="stylesheet">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="../assets/css/animate.min.css">
        <!-- font-awesome CSS -->
        {{-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> --}}
        <!-- 雲端字體For Jackpot Num -->
        <link rel="stylesheet" href="https://use.typekit.net/gfv2mob.css">
        <!-- numberAnimate -->
        <link rel="stylesheet" href="../assets/css/numberAnimate.css">
        <!-- 跑馬燈輪播 -->
        <link rel="stylesheet" href="../assets/css/swiper.min.css">
        <!-- End Matomo Code -->

        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link rel="stylesheet" href="../assets/css/sidebar_style.css"><!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <script>
            // 使用者是通過返回上一頁進入該頁面; type判斷 -> 0: 通過連結訪問; 1: 通過刷新訪問; 2: 通過返回上一頁訪問; 
            if (window.performance.navigation.type === 2) {
                // 刷新本頁
                window.location.reload()
            }
        </script>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-49NC2Q9G6H"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-49NC2Q9G6H');
        </script>
    </head>
    <body class="crypton-vertion" style="overflow-x: hidden; width: 100%;">
        
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-2x fa-arrow-left" style="color: #FFF;"></i>
            </div>

            <div class="sidebar-header">
                <i class="fas fa-user-circle" style="font-size: 55px; color: #FFF;"></i>
                <p class="white_text" style="margin-top: 15px;">
                    {{ $member_id }}
                </p>
            </div>

            <ul class="list-unstyled components">
                <div id="reload_balance_btn" style="height: 20px; margin: 20px 0;">
                    <i class="fas fa-sync-alt" style="font-size: 20px; color: #FFF;"></i>
                </div>
                <p class="white_text">
                    <span class="balance">
                        {{ $host_currency . " " . $member_balance }}
                    </span>
                    <br />
                    <span class="gold_text">BALANCE</span>                    
                </p>
            </ul>
        </nav>

        <div class="menu-mobile mobile_frosted_glass" style="">
            <div class="mobile-logout" style="position: absolute; top: 25px; left: 25px;">
                <nav>
                    <div id="list_btn" style="width: 30px; height: 30px;">
                        <i class="fas fa-user-circle" style="color: #FFF; height: 30px; font-size: 30px;"></i>
                    </div>
                </nav>
            </div>
            
            <div class="mobile-logo">
                <img class="logo_img" src="../assets/images/web_img/UFAslot.png" alt="UFAslot">
            </div>

            <div class="mobile-logout" style="position: absolute; right: 25px; top: 25px;">
                <a href="javascript:;" onclick="logout()">
                    <img src="../assets/images/web_img/logout.svg">
                </a>
            </div>
        </div>

        <!-- Header Start -->     
        <header id="header" class="oscar-header-3">
            <div class="nav-outer">
                <div class="container posit-relative">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-6 col-xl-6">
                            <!-- Logo Start -->
                            <h1 class="logo">
                                <img class="logo_img" src="../assets/images/web_img/UFAslot.png" alt="UFAslot">
                            </h1>
                            <!-- /Logo End -->
                        </div>
                        <!-- 右上分頁列 -->
                        <div class="col-sm-6 col-md-8 col-lg-6 col-xl-6" style="line-height: 45px;">
                            <div class="menu-holder">
                                <span class="gold_text">PLAYER:</span>
                                <span class="white_text" style="margin-right: 18px;">
                                    {{ $member_id }}
                                </span>

                                <div id="reload_balance_btn_pc" style="margin-right: 14px; display: inline-block;">
                                    <i class="fas fa-sync-alt" style="font-size: 20px; color: #FFF;"></i>
                                </div>

                                <div style="background-image: url('../assets/images/web_img/balanceBg.jpg'); width: 276px; height: 45px; padding: 0 5px; display: inline-block;">
                                    <div style="text-align: center;">
                                        <span class="gold_text">BALANCE:</span>
                                        <span class="white_text balance">{{ $host_currency . " " . $member_balance }}</span>
                                    </div>
                                </div>
                                
                                <a href="javascript:;" onclick="logout()">
                                    <img src="../assets/images/web_img/logout.svg">
                                </a>

                                

                                
                            </div>
                        </div>
                        <!-- ./右上分頁列 -->
                    </div>
                </div>
            </div>
            <!-- /Navigation Outer Wrap End -->
        </header><!-- /Header End -->

        <!-- Main Wrapper Start-->
        <div class="main-wrapper" name="mian-wrapper">
            <!-- oscar Contant Wrapper Start-->  
            <div id="main-contant" class="main-contant">  
                
                <section class="mobile_section">
                    @if ($member_id != "" && is_numeric($jp_start) && $jp_start >= 0) {{-- 有jackpot才顯示 --}}
                    <div class="container jp_container">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mobile_jp_parent">
                            @if ($event_mode == 2 || $event_mode == 4) <!-- 紅包活動 -->
                                @if ($lang == 'th_th') <!-- 泰文語系 -->
                                    <img class="event_jp_img" src="../assets/images/web_img/event_th_th.png" alt="">
                                @else <!-- 非泰文語系 -->
                                    <img class="event_jp_img ang_pow" src="../assets/images/web_img/event_en.png" alt="">
                                @endif
                            @else <!-- 無活動期間 -->
                                <img class="jp_img" src="../assets/images/web_img/jackpot.png" alt="">
                            @endif
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right mobile_jp">
                            <div class="numberRun1" style="font-family: giza-five, serif; height: 90px;"></div>
                        </div>
                    </div>
                    <div class="jp_hit" style="">
                        @if(!empty($jp_hit_list))
                            <div class="swiper-container">
                                <div class="swiper-wrapper" style="height: 40px !important;">
                                    @foreach($jp_hit_list as $value)
                                    <div class="swiper-slide">
                                        {{ $lang == 'th_th' ? 'ขอแสดงความยินดีกับผู้เล่น!' : 'Congratulations! '}} <br>
                                        <span style="color: #ffeb3b;">{{$value['member_id']}}</span> {{ $lang == 'th_th' ? 'ได้รางวัลแจ็คพอต' : 'wins Jackpot'}} <span style="color: #ffeb3b;">{{$value['jackpot_win']}}</span>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>    
                        @else
                            {{-- UFA JACKPOT <br>
                            {{ $lang == 'th_th' ? 'เดิมพันเพิ่มเติม! ยิ่งได้เยอะ!' : 'Bet more! Get more!'}} --}}
                        @endif                       
                    </div>
                    @endif
                </section>

                <section id="featured">

                    <!-- 判斷有無遊戲 -->
                    @if(!empty($host_game_list) && $host_ext_id != "")

                        <div style="background-image: url('../assets/images/web_img/headerLine.jpg'); height: 6px;"></div>

                        <div class="featured-slider-section category-bg">
                            <div class="container container-padding filters-button-group" style="display: -webkit-flex; justify-content: center;">

                                <div class="category-card category-active" style="min-width: {{$category_card_width}}; text-align: center;">
                                    <a href="javascript:;" onclick="change_attr_mobile(this)" data-filter=".all" data-sort="all">
                                        <img src="../assets/images/web_img/all_h.png" class="category_img">
                                        <div class="text-center grey_text">All</div>
                                    </a>
                                </div>
                        
                                <div id="hot_tag" class="category-card" style="min-width: {{$category_card_width}}; text-align: center;">
                                    @if ($event_mode == 2 || $event_mode == 4) <!-- (紅包)活動期間 -->
                                        @if ($lang == 'th_th') <!-- 活動期間 泰文語系 -->
                                            <img class="event_tag" src="../assets/images/web_img/event_tag_th_th.png">
                                        @else <!-- 活動期間 非泰文語系 -->
                                            <img class="event_tag" src="../assets/images/web_img/event_tag_en.png">
                                        @endif
                                    @elseif($event_mode == 5) <!-- (刮刮樂)活動期間 -->
                                        @if ($lang == 'th_th') <!-- 活動期間 泰文語系 -->
                                            <img class="event_tag" src="../assets/images/web_img/event_tag2_th_th.png">
                                        @else <!-- 活動期間 非泰文語系 -->
                                            <img class="event_tag" src="../assets/images/web_img/event_tag2_en.png">
                                        @endif
                                    @endif
                                    <a href="javascript:;" onclick="change_attr_mobile(this)" data-filter=".hot" data-sort="hot">
                                        <img src="../assets/images/web_img/hot.png" class="category_img">
                                        <div class="text-center grey_text">Hot</div>
                                    </a>
                                </div>
                        
                                <div class="category-card" style="min-width: {{$category_card_width}}; text-align: center;">
                                    <a href="javascript:;" onclick="change_attr_mobile(this)" data-filter=".jp" data-sort="jp">
                                        <img src="../assets/images/web_img/jp.png" class="category_img">
                                        <div class="text-center grey_text">JP</div>
                                    </a>
                                </div>

                                @if ($fish_check)
                                <div class="category-card" style="min-width: {{$category_card_width}}; text-align: center;">
                                    {{-- <img class="event_tag" src="../assets/images/web_img/new-{{ $lang }}.png"> --}}
                                    <a href="javascript:;" onclick="change_attr_mobile(this)" data-filter=".fish" data-sort="fish">
                                        <img src="../assets/images/web_img/fish.png" class="category_img">
                                        <div class="text-center grey_text">Fish</div>
                                    </a>
                                </div>    
                                @endif
                                
                                @if ($bcrt_check)
                                <div class="category-card" style="min-width: {{$category_card_width}}; text-align: center;">
                                    <a href="javascript:;" onclick="change_attr_mobile(this)" data-filter=".card" data-sort="card">
                                        <img src="../assets/images/web_img/card.png" class="category_img">
                                        <div class="text-center grey_text">Card</div>
                                    </a>
                                </div>    
                                @endif
                                
                                @if ($arcade_check)
                                <div class="category-card" style="min-width: {{$category_card_width}}; text-align: center;">
                                    <a href="javascript:;" onclick="change_attr_mobile(this)" data-filter=".arcade" data-sort="arcade">
                                        <img src="../assets/images/web_img/arcade.png" class="category_img">
                                        <div class="text-center grey_text">Arcade</div>
                                    </a>
                                </div>    
                                @endif
                                
                            </div>
                        </div>

                        <div class="featured-slider-section card-mobile" id="featured" style="margin-bottom: 3em;">
                            <div class="container">
                                <div data-aos="fade-up" class="grid" style="position: relative; height: 60px;"> <!-- data-aos="套用動畫效果" -->
                                    <!-- 遊戲卡片 -->
                                    @for($i=0; $i < count($host_game_list); $i++)
                                        @if( explode('-', $host_game_list[$i]->game_id)[0] == 'PSB')
                                            @if ($host_game_list[$i]->subgame_id > 0 && $host_game_list[$i]->subgame_id < 7)
                                                <div class="card-padding col-xs-6 col-sm-4 game_col element-item {{ $host_game_list[$i]->class_tag }}">
                                                    <div class="card-bg">
                                                        <div class="game-img">
                                                            <a href="javascript:;" onclick="openGame(this)" data-gameid="{{ $host_game_list[$i]->game_id }}" data-subgame-id="{{ $host_game_list[$i]->subgame_id }}" data-host="{{ $host_ext_id }}">
                                                                @if (file_exists("assets/images/game_logo/".$host_game_list[$i]->game_id."-0-".$img_lang.".png"))
                                                                <img class="lazy" id="{{ $host_game_list[$i]->game_id }}_img" src="../assets/images/game_logo/{{ $host_game_list[$i]->game_id }}-0-{{ $img_lang }}.png" style="width:100%">
                                                                @else
                                                                <img class="lazy" id="{{ $host_game_list[$i]->game_id }}_img" src="../assets/images/game_logo/{{ $host_game_list[$i]->game_id }}-0-en-US.png" style="width:100%">
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif ($host_game_list[$i]->subgame_id > 6 && $host_game_list[$i]->subgame_id < 13)
                                                <div class="card-padding col-xs-6 col-sm-4 game_col element-item {{ $host_game_list[$i]->class_tag }}">
                                                    <div class="card-bg">
                                                        <div class="game-img">
                                                            <a href="javascript:;" onclick="openGame(this)" data-gameid="{{ $host_game_list[$i]->game_id }}" data-subgame-id="{{ $host_game_list[$i]->subgame_id }}" data-host="{{ $host_ext_id }}">
                                                                @if (file_exists("assets/images/game_logo/".$host_game_list[$i]->game_id."-1-th-TH.png"))
                                                                <img class="lazy" id="{{ $host_game_list[$i]->game_id }}_img" src="../assets/images/game_logo/{{ $host_game_list[$i]->game_id }}-1-{{ $img_lang }}.png" style="width:100%">
                                                                @else
                                                                <img class="lazy" id="{{ $host_game_list[$i]->game_id }}_img" src="../assets/images/game_logo/{{ $host_game_list[$i]->game_id }}-1-en-US.png" style="width:100%">
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div class="card-padding col-xs-6 col-sm-4 game_col element-item {{ $host_game_list[$i]->class_tag }}">
                                                <div class="card-bg">
                                                    <div class="game-img">
                                                        <!-- 角標判斷 -->
                                                        <?php
                                                            $tag_arr = explode(" ", $host_game_list[$i]->class_tag);
                                                        ?>
                                                        @if (in_array('hot', $tag_arr)) <!-- 活動紅包HOT 泰文語系 -->
                                                            @if ($event_mode == 2 || $event_mode == 4) <!-- 紅包活動 -->
                                                                @if ($lang == 'th_th') <!-- 泰文語系 -->
                                                                    <img class="event_tag game_event_tag hot_tag {{ (in_array('jp', $tag_arr) ? 'jp_tag' : '') }}" src="../assets/images/web_img/event_tag_th_th.png" alt="">
                                                                @else <!-- 非泰文語系 -->
                                                                    <img class="event_tag game_event_tag hot_tag {{ (in_array('jp', $tag_arr) ? 'jp_tag' : '') }}" src="../assets/images/web_img/event_tag_en.png" alt="">
                                                                @endif
                                                            @elseif ($event_mode == 5)
                                                                @if ($lang == 'th_th') <!-- 泰文語系 -->
                                                                    <img class="event_tag game_event_tag hot_tag {{ (in_array('jp', $tag_arr) ? 'jp_tag' : '') }}" src="../assets/images/web_img/event_tag2_th_th.png" alt="">
                                                                @else <!-- 非泰文語系 -->
                                                                    <img class="event_tag game_event_tag hot_tag {{ (in_array('jp', $tag_arr) ? 'jp_tag' : '') }}" src="../assets/images/web_img/event_tag2_en.png" alt="">
                                                                @endif
                                                            @else <!-- 無活動 -->
                                                                <img class="event_tag game_event_tag hot_tag" src="../assets/images/web_img/hot-{{ $lang }}.png" alt="">
                                                            @endif 
                                                        @elseif (in_array('jp', $tag_arr)) <!-- 彩金 -->
                                                            <img class="event_tag game_event_tag jp_tag {{ (in_array('hot', $tag_arr) ? 'hot_tag' : '') }}" src="../assets/images/web_img/jp-{{ $lang }}.png" alt="">
                                                        @elseif (in_array('new', $tag_arr))  <!-- 新遊戲 -->
                                                            <img class="event_tag game_event_tag new_tag" src="../assets/images/web_img/new-{{ $lang }}.png" alt="">
                                                        @endif
                                                        <!-- ./角標判斷 -->

                                                        <a href="javascript:;" onclick="openGame(this)" data-gameid="{{ $host_game_list[$i]->game_id }}" data-host="{{ $host_ext_id }}">
                                                            @if (file_exists("assets/images/game_logo/".$host_game_list[$i]->game_id."-".$img_lang.".png"))
                                                            <img class="lazy" id="{{ $host_game_list[$i]->game_id }}_img" src="../assets/images/game_logo/{{ $host_game_list[$i]->game_id }}-{{ $img_lang }}.png" style="width:100%">
                                                            @else
                                                            <img class="lazy" id="{{ $host_game_list[$i]->game_id }}_img" src="../assets/images/game_logo/{{ $host_game_list[$i]->game_id }}-en-US.png" style="width:100%">
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif 
                                    @endfor
                                </div>
                            </div>
                        </div>

                    @else <!-- 判斷有無遊戲 -->

                        <div class="featured-slider-section">
                            <div class="container attr-height attr-div-center text-center">
                                <p>Please Login</p>
                            </div>
                        </div>

                    @endif
                </section>
                <!-- Token Sale Section End -->
            </div><!--/Main Contant End-->
        </div><!-- /Main Wrapper End-->

        <footer class="osr-footer-2 dark-black" style="position: fixed; z-index: 60;">
            <div class="container text-center">
                <div class="footer-pc">
                    <div style="float: center;">
                        Copyright <? echo date('Y'); ?> © UFABET
                    </div>
                </div>
            </div><!-- / Container -->
        </footer><!-- / Footer 1 -->

        <!-- 反灰背景 -->
        <div class="overlay"></div>

        <!-- 廣告彈出視窗 -->
        <div class="event_overlay"></div>
        
        @if ($ad_show == 1)
        <div id="event_img">
            <!-- 關閉btn -->
            {{-- <div id="event_close_btn">
                <div class="close_circle">
                    <svg class="close_cross"" enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0">
                        <path d="m10.7 9.2-3.8-3.8 3.8-3.7c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0l-3.8 3.7-3.8-3.7c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l3.8 3.7-3.8 3.8c-.4.4-.4 1 0 1.4.2.2.5.3.7.3.3 0 .5-.1.7-.3l3.8-3.8 3.8 3.8c.2.2.4.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4z"></path>
                    </svg>
                </div>
            </div> --}}
            <img id="event">
            <img id="sub_event">
            <img id="comming_soon">
            <div style="height: 60px;"></div>
        </div>
        @endif
    </body>

    <!-- jQuery -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- Scroll Animation -->
    <script src="../assets/js/aos.min.js"></script>
    <!-- Onepage Nav Js -->
    <script src="../assets/js/jquery.nav.min.js"></script>
    <!-- CountDown Js -->
    <script src="../assets/js/waypoints-min.js"></script>
    <!-- Slick Slider -->
    <script src="../assets/js/slick.min.js"></script>
    <!-- Fontawesome Js -->
    <script src="../assets/js/fontawesome.min.js"></script>

    <!-- Custom Script for 過場動畫 -->
    <script src="../assets/js/custom.min.js"></script>
    <!-- isotope.pkgd for 分類過濾&排序布局(遊戲卡面呈現) -->
    <script src="../assets/js/isotope.pkgd.min.js"></script>
    <!-- Lazy for延遲載入 -->
    <script type="text/javascript" src="../assets/js/jquery.lazy.min.js"></script>
    <!-- bootstrapp-swipe-carousel for 支援手機滑動手勢(輪播) -->
    <script type="text/javascript" src="../assets/js/bootstrap-swipe-carousel.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145331723-1"></script>

    <script src="../assets/js/gScrollNumber-3d.js?{{time()}}"></script>

    <script src="../assets/js/numberAnimate.js"></script>

    <!-- 跑馬燈輪播使用 -->
    <script src="../assets/js/swiper.min.js"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <script type="text/javascript">
        var host_ext_id    = '{{ $host_ext_id }}';
        var access_token   = '{{ $access_token }}';
        var window_width   = window.screen.availWidth; // 視窗寬度
        var window_height  = window.screen.availHeight; // 視窗高度
        var num_width      = 0; // 滾輪文字寬度
        var num_font_size  = 0; // 滾輪文字大小
        var jp_start       = '{{ $jp_start }}'; // JP初始數值
        var login_type     = false; // 是否已登入
        var lang           = '{{ $lang }}'; // 語系
        var scrollNumber2; // 滾輪套件
        var member_id = '{{ $member_id }}';

        var event_mode  = '{{ $event_mode }}'; // 用於判斷當前時段是否需要更換JP圖片
        var ad_show     = '{{ $ad_show }}'; // 是否顯示廣告 0: 不顯示; 1: 顯示
        var ad_filename = '{{ $ad_filename }}'; // 廣告圖片名稱，圖片命名規則: (圖片名_m || 圖片名_pc)
        var ad_start    = '{{ $ad_start }}'; // 開始時間

        // 判斷是否已登入
        if (host_ext_id != '' && member_id != '') {
            login_type = true;
        }
        // 切換頁籤屬性
        function change_attr_mobile(obj)
        {
            // 重置分類Class
            $(obj).parent().parent().find("div").removeClass("category-active")
            // 重置分類img路徑
            var img_arr = [
                '../assets/images/web_img/all.png',
                '../assets/images/web_img/hot.png',
                '../assets/images/web_img/jp.png',
                '../assets/images/web_img/fish.png',
                '../assets/images/web_img/card.png',
                '../assets/images/web_img/arcade.png',
            ];
            for (let i = 0; i < 6; i++) {
                var img_selector = $(obj).parent().parent().find(".category_img")[i];
                $(img_selector).attr('src', img_arr[i]);
            }
            // ./重置分類img路徑
            // 更新被選擇的分類Class
            $(obj).parent().addClass("category-active");
            // 更新被選擇的分類img
            var img_name = $(obj).attr('data-sort');
            var highlight_img = '../assets/images/web_img/' + img_name + '_h.png';
            $(obj).find("img").attr('src', highlight_img);
            var tag_arr = [];
            tag_arr['all'] = '';

            var col = $(".game_col");
            for(let i = 0; i < col.length; i++){
                var class_tag = $(col[i]).attr('class');
                var class_arr = class_tag.split(" ");
                if (event_mode == 2 || event_mode == 4) { // (活動期間)
                    if (class_arr.indexOf('hot') > 0 && class_arr.indexOf('jp') > 0) { // 活動&&JP共存
                        if (img_name == 'all') { // ALL類別
                            $(col[i]).children().children().children().attr("src", "../assets/images/web_img/event_tag_"+(lang == 'th_th' ? 'th_th' : 'en')+".png")
                        } else if (img_name == 'hot') { // HOT類別
                            $(col[i]).children().children().children().attr("src", "../assets/images/web_img/event_tag_"+(lang == 'th_th' ? 'th_th' : 'en')+".png")
                        } else if (img_name == 'jp') { // JP類別
                            $(col[i]).children().children().children().attr("src", "../assets/images/web_img/jp-" + lang + ".png")
                        }
                    }
                } else if (event_mode == 5) { // (刮刮樂活動期間)
                    if (class_arr.indexOf('hot') > 0 && class_arr.indexOf('jp') > 0) { // 活動&&JP共存
                        if (img_name == 'all') { // ALL類別
                            $(col[i]).children().children().children().attr("src", "../assets/images/web_img/event_tag2_"+(lang == 'th_th' ? 'th_th' : 'en')+".png")
                        } else if (img_name == 'hot') { // HOT類別
                            $(col[i]).children().children().children().attr("src", "../assets/images/web_img/event_tag2_"+(lang == 'th_th' ? 'th_th' : 'en')+".png")
                        } else if (img_name == 'jp') { // JP類別
                            $(col[i]).children().children().children().attr("src", "../assets/images/web_img/jp-" + lang + ".png")
                        }
                    }
                } else {
                    if (class_arr.indexOf('hot') > 0 && class_arr.indexOf('jp') > 0) { // 活動&&JP共存(非活動期間)
                        if (img_name == 'all') { // ALL類別
                            $(col[i]).children().children().children().attr("src", "../assets/images/web_img/hot-" + lang + ".png")
                        } else if (img_name == 'hot') { // HOT類別
                            $(col[i]).children().children().children().attr("src", "../assets/images/web_img/hot-" + lang + ".png")
                        } else if (img_name == 'jp') { // JP類別
                            $(col[i]).children().children().children().attr("src", "../assets/images/web_img/jp-" + lang + ".png")
                        }
                    }
                }
            }
        }

        var swiperV = new Swiper('.swiper-container', {
            direction: 'vertical',
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
        });

        $(document).ready(function(){
            session_check();
            /*
                imagesLoaded
                是一款用于检测页面中的图片是否被加载的js插件
                imagesLoaded是非常有用的插件
                当你的页面中某幅图片没有被加载时
                默认会显示一个红叉或图片alt文本
                imagesLoaded可以将未加载的图片替换为你设置的图片。
                如果圖片還未加載完全，就執行初始化的話會造成元素重疊的狀況
            */
            var $grid = $('.grid').imagesLoaded( function() {
                $grid.isotope({
                    filter:'.all',
                    itemSelector: '.element-item',
                    // layoutMode: 'fitRows',
                    layoutMode: 'fitRows',
                    rowHeight: 50,
                });
            });

            // bind filter button Click 遊戲分類Click
            $('.filters-button-group a').on('click', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });

            // jp num 有Jackpot才啟用
            if (login_type && jp_start > 0) {
                jackpot_num(jp_start);
            }

            // 廣告彈窗相關Fun 有廣告且已登入才顯示
            if (ad_show == 1 && login_type) {
                var myDate = new Date();
                var year = myDate.getFullYear();
                var month = (myDate.getMonth()+1 < 10 ? '0' + (myDate.getMonth()+1) : myDate.getMonth()+1);
                var day = (myDate.getDate() < 10 ? '0'+myDate.getDate() : myDate.getDate());
                var now_time = year + '/'+ month + '/' + day;

                // 確認變數存在
                if (event_mode == 3) { // 活動暫停
                    localStorage.clear(); // 清空localStorge
                }
                if (localStorage.hasOwnProperty('date')) { // 變數存在
                    var stirage_time = localStorage.getItem('date').split("/");
                    for (let i=0; i<stirage_time.length; i++) {
                        if (stirage_time[i] < 10 && stirage_time[i].substring(0, 1) != 0) {
                            stirage_time[i] = '0' + stirage_time[i];
                        }
                    }
                    var new_stirage_time = stirage_time[0] + '/' + stirage_time[1] + '/' + stirage_time[2];
                    if (new_stirage_time < now_time) { // 取出值來跟當前日期比對
                        localStorage.setItem("date", now_time); // 寫入
                        ad_fun(); // 廣告圖顯示，未來會具有時效性
                        $('.event_overlay, #event_close_btn').show();
                    } else {
                        $("#event_img").hide();
                        setTimeout(function(){
                            if (event_mode >= 0 && !$("#event_img").is(':hidden')) {
                                $("#hot_tag a").click();
                            }
                        }, 1000);
                    }
                } else { // 變數不存在
                    localStorage.setItem("date", now_time); // 寫入localStorage
                    ad_fun(); // 廣告圖顯示，未來會具有時效性
                    $('.event_overlay, #event_close_btn').show();
                }
                // 寬度改變時重新設定廣告圖的偏移值
            }
            // ./廣告彈窗相關Fun

            // 避免角標擋住點擊事件
            $('.event_tag').on("click", function(){
                $(this).parent().find("a").click();
            });

            // 初始化
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            // 縮小&反灰處Click
            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            // 選單Click
            $('#list_btn').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

            // 重新整理餘額btn Click
            $("#reload_balance_btn, #reload_balance_btn_pc").on("click", function(){
                $("#reload_balance_btn, #reload_balance_btn_pc").addClass("fa-spin");
                
                $.ajax({
                    method: "GET",
                    url: '../json',
                    data: {
                        'method'      : 'reload_balance',
                        'host_ext_id' : host_ext_id,
                        'access_token': access_token,
                    },
                    dataType: 'json',
                    success: function(json) {
                        $("#reload_balance_btn, #reload_balance_btn_pc").removeClass("fa-spin");
                        let balance = json.balance;
                        if (balance != '') {
                            $('.balance').text('{{ $host_currency . " " }}' + balance);
                        }
                    },
                    error: function(xhr) {
                        
                    }
                });
            });
        });

        // 廣告圖fun
        function ad_fun()
        {
            var version = '{{ $version }}';
            var ad_img_height = 0;
            var ad_img_width  = 0;
            var top_offset    = 0;
            var left_offset   = 0;
            var display_time  = (event_mode == 2) ? 5000 : 8000; // 彈窗顯示時間; 活動中: 5秒; 暫停公告: 8秒;
            
            // 廣告圖更換
            if (window_width > 1023 && window_height > 768) { // PC
                // $("#event").attr('src', '../assets/images/banner/' + ad_filename + '_pc_' + (lang == 'zh_cn' || lang == 'zh_tw' ? 'en' : lang) + '.png?v=' + ad_start);
                $("#event").attr('src', '../assets/images/banner/' + ad_filename + '_pc_' + (lang == 'zh_cn' || lang == 'zh_tw' ? 'en' : lang) + '.gif?v=' + version);
                if (event_mode == 1 && lang == 'th_th') { // 泰文才顯示
                    $("#comming_soon").attr("src", '../assets/images/banner/coming_soon.png');
                } else if (event_mode == 2 && lang == 'th_th') { // 泰文才顯示
                    $("#sub_event").attr("src", '../assets/images/banner/event_btn.png');
                    // // 語系為泰語，且為活動開始階段
                    $("#sub_event").on('click', function(){
                        $(".event_overlay").click();
                        $("#hot_tag a").click();
                    });
                }
            } else { // Mobile
                // $("#event").attr('src', '../assets/images/banner/' + ad_filename + '_m_' + (lang == 'zh_cn' || lang == 'zh_tw' ? 'en' : lang) + '.png?v=' + ad_start);
                $("#event").attr('src', '../assets/images/banner/' + ad_filename + '_m_' + (lang == 'zh_cn' || lang == 'zh_tw' ? 'en' : lang) + '.gif?v=' + version);
                if (event_mode == 1 && lang == 'th_th') { // 泰文才顯示
                    $("#comming_soon").attr("src", '../assets/images/banner/coming_soon.png');
                } else if (event_mode == 2) {
                    $("#sub_event").attr("src", "");
                }
            }

            // 廣告圖顯示5秒後自動關閉
            setTimeout(function(){
                if (event_mode >= 0 && !$("#event_img").is(':hidden')) {
                    $("#event_img").click();
                    if (event_mode == 2) {
                        $("#hot_tag a").click();
                    }
                }
            }, display_time);

            // 廣告彈窗關閉 Click
            $('.event_overlay, #event_close_btn, #event_img').on('click', function(){
                $('.event_overlay, #event_img, #event_close_btn').fadeOut(300);
                if (event_mode == 2) {
                    $("#hot_tag a").click();
                }
            });
        }

        // 開啟遊戲
        function openGame(obj) 
        {
            // 驗證token
            $.ajax({
                method: "GET",
                url: '/json',
                data: {
                    'method'     : 'session_check',
                    'host_ext_id': '{{ $host_ext_id }}',
                    'access_token': '{{ $access_token }}'
                },
                dataType: 'json',
                success: function(json) {
                    if (json.msg == 'logout') {
                        logout();
                    } else {
                        var tmp_pick_lang = '{{ $img_lang }}';
                        var access_token = '{{ $access_token }}';
                        try {
                            if($(window).width() <= 1024) {
                                setTimeout(function(){
                                var host = $(obj).data("host");
                                var gameid = $(obj).data("gameid");
                                var subgame_id = $(obj).data("subgame-id");
                                var subgame_id_text = '';
                                if (subgame_id > 0) {
                                    subgame_id_text = '&subgame_id=' + subgame_id;
                                }
                                var wnd = window.open("about:blank", "_blank", "width=1280,height=720,menubar=no,toolbar=no,location=no,directories=no");
                                    // if (window.ga) {
                                        // wnd.location.replace("https://{{ $api_prefix }}.{{ $open_game_url }}" + "?game_id=" + gameid + "&host_id=" + host + "&lang=" + tmp_pick_lang + '&access_token=' + access_token + subgame_id_text);
                                    // } else {
                                        wnd.location.replace("https://{{ $api_prefix }}.{{ $open_game_url }}" + "?game_id=" + gameid + "&host_id=" + host + "&lang=" + tmp_pick_lang + '&access_token=' + access_token + subgame_id_text);
                                    // }  
                                }, 300);
                            } else {
                                var host = $(obj).data("host");
                                var gameid = $(obj).data("gameid");
                                var subgame_id = $(obj).data("subgame-id");
                                var subgame_id_text = '';
                                if (subgame_id > 0) {
                                    subgame_id_text = '&subgame_id=' + subgame_id;
                                }
                                var wnd = window.open("about:blank", "_blank", "width=1280,height=720,menubar=no,toolbar=no,location=no,directories=no");
                                // if (window.ga) {
                                    // wnd.location.replace("https://{{ $api_prefix }}.{{ $open_game_url }}" + "?game_id=" + gameid + "&host_id=" + host + "&lang=" + tmp_pick_lang + '&access_token=' + access_token + subgame_id_text);
                                // } else {
                                    wnd.location.replace("https://{{ $api_prefix }}.{{ $open_game_url }}" + "?game_id=" + gameid + "&host_id=" + host + "&lang=" + tmp_pick_lang + '&access_token=' + access_token + subgame_id_text);
                                // }                        
                            }
                        }
                        catch (e) {
                            // wnd.close();
                        }
                    }
                },
                error: function(xhr) {
                    
                }
            });
        }

        // 判斷是否支援觸控，視同手機||平板
        function isMobile()
        {
            try {
                document.createEvent("TouchEvent");
                return true;
            } catch(e) {
                return false;
            }
        }

        // Jackpot Num
        function jackpot_num(jp_start) 
        {
            //初始化
            var numRun1 = $(".numberRun1").numberAnimate({
                num: jp_start, // 起始值
                dot: 2, // 保留小數點後幾位
                speed: 2000, // 滾動時間
                symbol: "," // 千分位分隔字元
            });

            if (event_mode != 2 && event_mode != 4) {
                var nums1 = jp_start; // 初始值
                setInterval(function () { // 每3.5秒增加
                    var random_num = '0.' + Math.floor(Math.random() * 50); // 取隨機數(50內)
                    nums1 = Math.round((nums1 * 100 + random_num * 100)) / 100; // 隨機數與原數值相加(加減過程先轉回整數，加總後再轉回小數)
                    numRun1.resetData(nums1); // 覆蓋值
                }, 3500);
                basic_jp_fun(jp_start, numRun1); // 一般JP模式
            } else {
                $(window).resize(function() {
                    numRun1.resetData(jp_start)
                });
                event_jp_fun(jp_start, numRun1); // 活動模式
            }
        }

        // 一般滾動 10分鐘更新一次
        function basic_jp_fun(jp_start, numRun1)
        {
            setInterval(function(){ // 每10分鐘重新抓取Jackpot數值
                $.ajax({
                    method: "GET",
                    url: '../json',
                    data: {
                        'method'     : 'jackpot_info',
                        'host_ext_id': host_ext_id,
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        
                    },
                    success: function(json) {
                        nums1 = json.jp_num;
                        numRun1.resetData(nums1); // jp覆蓋值
                        var balance = json.balance;
                        $(".balance").text(balance);
                    },
                    error: function(xhr) {
                        
                    }
                });
            }, 600000);
        }

        // 活動模式 5分鐘更新一次 暫時不更新
        function event_jp_fun(jp_start, numRun1)
        {
            // setInterval(function(){
            //     $.ajax({
            //         method: "GET",
            //         url: '../get_songkran_info/' + host_ext_id,
            //         dataType: 'json',
            //         beforeSend: function() {
                        
            //         },
            //         success: function(json) {
            //             var new_jp_num = json.jp_win;
            //             if (new_jp_num > jp_start) { // 更新的數值大於舊值才滾動
            //                 jp_start = new_jp_num;
            //                 numRun1.resetData(jp_start); // 覆蓋值
            //             }
            //         },
            //         error: function(xhr) {
                        
            //         }
            //     });
            // }, 300000)
        }

        // session check
        function session_check()
        {
            setInterval(function(){
                $.ajax({
                    method: "GET",
                    url: '../json',
                    data: {
                        'method'     : 'session_check',
                        'host_ext_id': '{{ $host_ext_id }}',
                        'access_token': '{{ $access_token }}'
                    },
                    dataType: 'json',
                    success: function(json) {
                        if (json.msg == 'logout') {
                            logout();
                        }
                    },
                    error: function(xhr) {
                        
                    }
                });
            }, 300000)
        }

        // Jackpot Num 套件初始化 3D滾動版本
        // function jackpot_num(jp_start) 
        // {
        //     // 根據畫面寬度決定JP的數字大小與數字寬度
        //     if (window_width > 1023) {
        //         num_width = 47;
        //         num_font_size = 60;
        //     } else if (window_width > 767) {
        //         num_width = 40;
        //         num_font_size = 55;
        //     } else {
        //         num_width = 30;
        //         num_font_size = 40;
        //     }
        //     // 初始化
        //     scrollNumber2 = new gScrollNumber3D(".numberRun1", {
        //         width: num_width,
        //         color: "#F6D442",
        //         fontSize: num_font_size,
        //         autoSizeContainerWidth: false,
        //         event_mode: 0 // 0: 會有小數點後兩位; 1: 整數
        //     });
        //     scrollNumber2.run(jp_start);

        //     // Mobile模式時讓數字置中
        //     if (isMobile() && window_width < 1024) {
        //         var num_area_width = $('.g-num-item').length;
        //         var num_offset = (window_width - (num_area_width * num_width)) / 2;
        //         $('.numberRun1').css({ right: num_offset });
        //     }

        //     if (event_mode == 0) {
        //         basic_jp_fun(jp_start); // 一般JP模式
        //     } else {
        //         event_jp_fun(jp_start); // 活動模式
        //     }
        // }

        // // 一般JP模式 3D滾動
        // function basic_jp_fun(jp_start)
        // {
        //     setInterval(function () { // 每3.5秒增加隨機數
        //         var random_num = '0.' + Math.floor(Math.random() * 50); // 取隨機數(50內)
        //         jp_start = Math.round((jp_start * 100 + random_num * 100)) / 100; // 隨機數與原數值相加(加減過程先轉回整數，加總後再轉回小數)
        //         scrollNumber2.run(jp_start); // 覆蓋值
        //     }, 5000);

        //     setInterval(function(){ // 每10分鐘重新抓取Jackpot數值
        //         $.ajax({
        //             method: "POST",
        //             url: '../json',
        //             data: {
        //                 "_token"      : '{{ csrf_token() }}',
        //                 'method'      : 'jackpot_info',
        //                 'host_ext_id' : host_ext_id,
        //             },
        //             dataType: 'json',
        //             beforeSend: function() {
                        
        //             },
        //             success: function(json) {
        //                 nums1 = json;
        //                 scrollNumber2.run(nums1); // 覆蓋值
        //             },
        //             error: function(xhr) {
                        
        //             }
        //         });
        //     }, 600000);
        // }

        // // 活動模式，10秒取得一次資料 3D滾動
        // function event_jp_fun(jp_start)
        // {
        //     setTimeout(function(){
        //         $.ajax({
        //             method: "POST",
        //             url: '../json',
        //             data: {
        //                 "_token"      : '{{ csrf_token() }}',
        //                 'method'      : 'jackpot_info',
        //                 'host_ext_id' : host_ext_id,
        //             },
        //             dataType: 'json',
        //             beforeSend: function() {
                        
        //             },
        //             success: function(new_jp_num) {
        //                 if (new_jp_num > jp_start) { // 更新的數值大於舊值才滾動
        //                     jp_start = new_jp_num;
        //                     scrollNumber2.run(jp_start); // 覆蓋值
        //                 }
        //             },
        //             error: function(xhr) {
                        
        //             }
        //         });
        //     }, 10000)
        // }

        function logout()
        {
            window.location.href = '/logout';
        }
    </script>
</html>
