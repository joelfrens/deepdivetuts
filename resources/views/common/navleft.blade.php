<!-- Nav left bar -->
<div class="nav-left-wrapper nav-left-wrapper-thin">
	<nav class="nav-left" id="theme-accordion">
		<ul class="no-bullets">
			<li class="nav-left-item">
				<a class="no-link main-link" href="{{ url('admin/home') }}">
					<span class="nav-left-icon inline-block">
						<i class="fa fa-home" aria-hidden="true"></i>
					</span>
					<span class="inline-block nav-left-text">
						Dashboard
					</span>
				</a>
			</li>
			<li class="nav-left-item">
				<a class="no-link main-link accordion-link" href="#pages-block">
					<span class="nav-left-icon inline-block">
						<i class="fa fa-file page-icon" aria-hidden="true"></i>
					</span>
					<span class="inline-block nav-left-text">Pages</span>
					<span class="inline-block nav-left-chevron-wrapper">
						<i class="fa fa-chevron-right nav-chevron-right" aria-hidden="true"></i>
					</span>
				</a>
				<ul id="pages-block" class="accordion-collapse">
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/pages/create') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">Add new</span>
						</a>
					</li>
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/pages') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-list" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">List all</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-left-item">
				<a class="no-link main-link accordion-link" href="#categories-block">
					<span class="nav-left-icon inline-block">
						<i class="fa fa-sitemap cat-icon" aria-hidden="true"></i>
					</span>
					<span class="inline-block nav-left-text">Categories</span>
					<span class="inline-block nav-left-chevron-wrapper">
						<i class="fa fa-chevron-right nav-chevron-right" aria-hidden="true"></i>
					</span>
				</a>
				<ul id="categories-block" class="accordion-collapse">
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/categories/create') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">Add new</span>
						</a>
					</li>
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/categories') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-list" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">List all</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-left-item">
				<a class="no-link main-link accordion-link" href="#articles-block">
					<span class="nav-left-icon inline-block">
						<i class="fa fa-newspaper-o" aria-hidden="true"></i>
					</span>
					<span class="inline-block nav-left-text">Articles</span>
					<span class="inline-block nav-left-chevron-wrapper">
						<i class="fa fa-chevron-right nav-chevron-right" aria-hidden="true"></i>
					</span>
				</a>
				<ul id="articles-block" class="accordion-collapse">
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/articles/create') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">Add new</span>
						</a>
					</li>
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/articles') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-list" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">List All</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-left-item">
				<a class="no-link main-link accordion-link" href="#tags-block">
					<span class="nav-left-icon inline-block">
						<i class="fa fa-tags" aria-hidden="true"></i>
					</span>
					<span class="inline-block nav-left-text">Tags</span>
					<span class="inline-block nav-left-chevron-wrapper">
						<i class="fa fa-chevron-right nav-chevron-right" aria-hidden="true"></i>
					</span>
				</a>
				<ul id="tags-block" class="accordion-collapse">
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/tags') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-list" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">Manage All</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-left-item">
				<a class="no-link main-link accordion-link" href="#subscriptions-block">
					<span class="nav-left-icon inline-block">
						<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
					</span>
					<span class="inline-block nav-left-text">Subscriptions</span>
					<span class="inline-block nav-left-chevron-wrapper">
						<i class="fa fa-chevron-right nav-chevron-right" aria-hidden="true"></i>
					</span>
				</a>
				<ul id="subscriptions-block" class="accordion-collapse">
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/subscriptions/create') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">Add new</span>
						</a>
					</li>
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/subscriptions') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-list" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">List All</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-left-item">
				<a class="no-link main-link accordion-link" href="#settings-block">
					<span class="nav-left-icon inline-block">
						<i class="fa fa-cog" aria-hidden="true"></i>
					</span>
					<span class="inline-block nav-left-text">Settings</span>
					<span class="inline-block nav-left-chevron-wrapper">
						<i class="fa fa-chevron-right nav-chevron-right" aria-hidden="true"></i>
					</span>
				</a>
				<ul id="settings-block" class="accordion-collapse">
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/settings/create') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">Add new</span>
						</a>
					</li>
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/settings') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-list" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">List All</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-left-item">
				<a class="no-link main-link accordion-link" href="#menus-block">
					<span class="nav-left-icon inline-block">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</span>
					<span class="inline-block nav-left-text">Menus</span>
					<span class="inline-block nav-left-chevron-wrapper">
						<i class="fa fa-chevron-right nav-chevron-right" aria-hidden="true"></i>
					</span>
				</a>
				<ul id="menus-block" class="accordion-collapse">
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/menus/create') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-plus" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">Add new</span>
						</a>
					</li>
					<li class="nav-left-subitem">
						<a class="no-link sub-link" href="{{ url('admin/menus') }}">
							<span class="nav-left-icon inline-block">
								<i class="fa fa-list" aria-hidden="true"></i>
							</span>
							<span class="inline-block nav-left-link">List All</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<!-- Nav left bar -->