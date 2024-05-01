<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboards</span>
                    </a>
                </li>





                <li>
                    <a href="{{ route('users') }}" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-dashboards">Users</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ui-elements">Content Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-list-ol"></i>
                                <span key="t-ui-elements">Assessments</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('main_assessment') }}" key="t-alerts">Main Assessment</a></li>
                                <li><a href="{{ route('sub_assessments') }}" key="t-alerts">Sub Assessments</a></li>
                                <li><a href="{{ route('child_assessments') }}" key="t-alerts">Assessments Level 2</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-tone"></i>
                        <span key="t-ui-elements">CMS</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('privacy_policy') }}" key="t-alerts">Privacy Policy</a></li>
                        <li><a href="{{ route('term_and_condition') }}" key="t-alerts">Terms & Condition</a></li>
                        <li><a href="{{ route('about_us') }}" key="t-alerts">About Us</a></li>
                        <li><a href="{{ route('social_media') }}" key="t-alerts">Social Meida</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('belt_ranks') }}" class="waves-effect">
                        <i class="bx bx-burst-hover"></i>
                        <span key="t-dashboards">Belt Ranks</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
