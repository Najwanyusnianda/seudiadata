<div class="scroll-wrapper sidebar-wrapper scrollbar scrollbar-inner" style="position: relative;">
    <div class="sidebar-wrapper scrollbar scrollbar-inner scroll-content"
        style="height: 826px; margin-bottom: 0px; margin-right: 0px; max-height: none;">
        <div class="sidebar-content">
            <!--
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>-->
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../../demo1/index.html">
                                    <span class="sub-item">Dashboard 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Kategori</h4>
                </li>
                <li class="nav-item {{Request::is('kemiskinan/*')? 'submenu active' :   
                (Request::is('ipm/*')? 'submenu active' :
                (Request::is('tk/*')? 'submenu active' :
                ''))}} ">
                    <a data-toggle="collapse" href="#sosial">
                        <i class="fas fa-layer-group"></i>
                        <p>Sosial Kependudukan</p>
                        <span class="caret"></span>
                    </a>
                `   <div class="collapse {{Request::is('kemiskinan/*')? 'show' :                 
                (Request::is('ipm/*')? 'show' :
                (Request::is('tk/*')? 'show' :
                ''))}} " id="sosial">
                        <ul class="nav nav-collapse ">
                            <li class="{{Request::is('kemiskinan/*')? 'active' : ''}}">
                            <a href="{{route('kemiskinan.index')}}">
                                    <span class="sub-item">Kemiskinan</span>
                                </a>
                            </li>
                            <li class="{{Request::is('ipm/*')? 'active' : ''}}">
                                <a href="{{route('ipm.index')}}">
                                        <span class="sub-item">IPM</span>
                                    </a>
                            </li>
                            <li class="{{Request::is('tk/*')? 'active' : ''}}">
                                <a href="{{route('tk.index')}}">
                                        <span class="sub-item">Tenaga Kerja</span>
                                    </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{Request::is('pdrb_lp/*')? 'submenu active' : ''}} ">
                    <a data-toggle="collapse" href="#ekonomi">
                        <i class="fas fa-layer-group"></i>
                        <p>Ekonomi dan Perdagangan</p>
                        <span class="caret"></span>
                    </a>
                `   <div class="collapse {{Request::is('pdrb_lp/*')? 'show' : ''}} " id="ekonomi">
                        <ul class="nav nav-collapse ">
                            <li class="{{Request::is('pdrb_lp/*')? 'active' : ''}}">
                            <a href="{{route('pdrb_lp.index')}}">
                                    <span class="sub-item">PDRB</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            
            </ul>
        </div>
    </div>
    <div class="scroll-element scroll-x">
        <div class="scroll-element_outer">
            <div class="scroll-element_size"></div>
            <div class="scroll-element_track"></div>
            <div class="scroll-bar ui-draggable ui-draggable-handle" style="width: 100px; left: 0px;"></div>
        </div>
    </div>
    <div class="scroll-element scroll-y">
        <div class="scroll-element_outer">
            <div class="scroll-element_size"></div>
            <div class="scroll-element_track"></div>
            <div class="scroll-bar ui-draggable ui-draggable-handle" style="height: 89px; top: 0px;"></div>
        </div>
    </div>
</div>