<div class="deznav">
    <div class="deznav-scroll">
		<ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="nav-text">Inbox</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('message.all')}}">All Messages</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span class="nav-text">User Profile</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('user.profile')}}">User Profile</a></li>
                    <li><a href="{{ route('change.password')}}">Change password</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Home Content</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('homecontent.all')}}">All Home Content</a></li>
                    <li><a href="{{ route('homecontent.add')}}">Add HomeContent</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-smile-o"></i>
                    <span class="nav-text">Information</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('information.all')}}">All Information</a></li>
                    <li><a href="{{ route('information.add')}}">Add Information</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="fa fa-graduation-cap"></i>
                    <span class="nav-text">Education</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('education.all')}}">All Education</a></li>
                    <li><a href="{{ route('education.add')}}">Add Education</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
                    <span class="nav-text">Work</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('work.all')}}">All Works</a></li>
                    <li><a href="{{ route('work.add')}}">Add Work</a></li>
                </ul>
            </li>
           <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-003-diamond"></i>
                    <span class="nav-text">Portfolio</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('portfolio.all')}}">All Courses</a></li>
                    <li><a href="{{ route('portfolio.add')}}">Add Course</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-bar-chart"></i>
                    <span class="nav-text">Chart Content</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('chart.all')}}">All Chart Content</a></li>
                    <li><a href="{{ route('chart.add')}}">Add Chart Content</a></li>
                </ul>
            </li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-arrows"></i>
                    <span class="nav-text">Footer Content</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('footer.all')}}">All Footer Content</a></li>
                </ul>
            </li>

        </ul>
            
		<div class="copyright">
			<p>By <strong><a href="https://dev.asukamethod.com/" target="_blank">Asuka Watanabe</a> </strong> © 2022 All Rights Reserved</p>
		</div>
	</div>
</div>