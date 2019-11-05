<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h4>Data Resource BD</h4>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="{{route('home')}}">Home</a>
        </li>
        <li>
            <a href="{{route('menu.index')}}">Menu</a>
        </li>
        <li>
            <a href="{{route('page.index')}}">Page</a>
        </li>
        <li>
            <a href="{{route('sector.index')}}">Sector</a>
        </li>
        <li>
            <a href="{{route('company.index')}}">Company</a>
        </li>
        <li>
            <a href="{{route('announcment.index')}}">Announcment</a>
        </li>
        <li>
            <a href="{{route('subscriptionplan.index')}}">Subscription Plan</a>
        </li>
        <li>
            <a href="{{route('survey.index')}}">Survey</a>
        </li>
        <li>
            <a href="{{route('surveyquestion.index')}}">Survey Question</a>
        </li>
        <li>
            <a href="{{route('configuration.index')}}">Configuration</a>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Portfolio</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>
</nav>
