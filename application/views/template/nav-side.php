<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">

			<li>
				<a href="<?= site_url() ?>/user/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
			</li>

			<?php if($user['type'] == "Admin"): ?>
			<li>
				<a href="<?= site_url() ?>/user/list"><i class="fa fa-users"></i> Users</a>
			</li>
			<?php endif ?>

			<li>
				<a href="<?= site_url() ?>/customer/list"><i class="fa fa-globe"></i> Customers</a>
			</li>

			<li>
				<a href="<?= site_url() ?>/activity/list"><i class="fa fa-briefcase"></i> Activities</a>
			</li>
			
			<?php if($user['type'] == "Admin"): ?>
			<li>
				<a href="<?= site_url() ?>/faq"><i class="fa fa-question-circle"></i> FAQ</a>
			</li>
			<?php endif ?>

			<?php /*
			<li>
				<a href="ui-elements.html"><i class="fa fa-desktop"></i> UI Elements</a>
			</li>
			<li>
				<a href="chart.html"><i class="fa fa-bar-chart-o"></i> Charts</a>
			</li>
			<li>
				<a href="tab-panel.html"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
			</li>

			<li>
				<a href="table.html"><i class="fa fa-table"></i> Responsive Tables</a>
			</li>
			<li>
				<a href="form.html" class="active-menu"><i class="fa fa-edit"></i> Forms </a>
			</li>


			<li>
				<a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="#">Second Level Link</a>
					</li>
					<li>
						<a href="#">Second Level Link</a>
					</li>
					<li>
						<a href="#">Second Level Link<span class="fa arrow"></span></a>
						<ul class="nav nav-third-level">
							<li>
								<a href="#">Third Level Link</a>
							</li>
							<li>
								<a href="#">Third Level Link</a>
							</li>
							<li>
								<a href="#">Third Level Link</a>
							</li>

						</ul>

					</li>
				</ul>
			</li>

			
			<li>
				<a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
			</li>
			*/ ?>
		</ul>

	</div>

</nav>
<!-- /. NAV SIDE  -->
