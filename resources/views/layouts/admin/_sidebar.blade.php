<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/categories') }}">
                        <i class="nav-icon fa fa-book"></i> @lang('admin.layouts.aside_left.group.category')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/products') }}">
                    <i class="nav-icon fa fa-cutlery"></i> @lang('admin.layouts.aside_left.group.product')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/agents') }}">
                    <i class="nav-icon fa fa-fax"></i> @lang('admin.layouts.aside_left.group.agent')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/users') }}">
                    <i class="nav-icon fa fa-user-o"></i> @lang('admin.layouts.aside_left.group.user')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/contacts') }}">
                    <i class="nav-icon fa fa-address-card"></i> @lang('admin.layouts.aside_left.group.contact')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/companies') }}">
                    <i class="nav-icon fa fa-industry"></i> @lang('admin.layouts.aside_left.group.companies')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/configurations') }}">
                    <i class="nav-icon fa fa-cog"></i> @lang('admin.layouts.aside_left.group.configuration')
                </a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
