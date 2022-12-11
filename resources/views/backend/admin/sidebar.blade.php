<style type="text/css">
  .user-panel .info {
    display: inline-block;
    padding: 5px 5px 5px 51px;
  }
  [class*=sidebar-dark-] .sidebar a {
    color: white;
  }

  [class*=sidebar-dark] .user-panel {
    border-bottom: 1px solid #fff;
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
    color: #fff;
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
    background-color: #7c10f2ba;
    color: #f4f6f9;
    border-radius: 10px;
}
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar_common">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><span>Hellow! {{ Auth::user()->name }}</span></a></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item menu-open ">
              <a href="{{ route('admin.dashboard') }}" class="nav-link {{(request()->route()->getName()=='admin.dashboard')?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link
              {{(request()->route()->getName()=='menu.index')?'active':''}}
              {{(request()->route()->getName()=='submenu.index')?'active':''}}
              {{(request()->route()->getName()=='section.index')?'active':''}}
              ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Menu Section
                    <i class="right fas fa-angle-right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
              <li class="nav-item">
                  <a href="{{ route('menu.index') }}" class="nav-link  {{(request()->route()->getName()=='menu.index')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Menu Control <span class="badge badge-danger right">{{ DB::table('menus')->count() }}</span></p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('submenu.index') }}" class="nav-link  {{(request()->route()->getName()=='submenu.index')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sub Menu Control <span class="badge badge-danger right">{{ DB::table('submenus')->count() }}</span></p>
                  </a>
              </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link
              {{(request()->route()->getName()=='slider.index')?'active':''}}
              ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Slider Section
                    <i class="right fas fa-angle-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                  <a href="{{ route('slider.index') }}" class="nav-link  {{(request()->route()->getName()=='slider.index')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Slider  <span class="badge badge-danger right">{{ DB::table('sliders')->count() }}</span></p>
                  </a>
              </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link
              {{(request()->route()->getName()=='about.index')?'active':''}}
              ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>About Section
                    <i class="right fas fa-angle-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                  <a href="{{ route('about.index') }}" class="nav-link  {{(request()->route()->getName()=='about.index')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage About  <span class="badge badge-danger right">{{ DB::table('abouts')->count() }}</span></p>
                  </a>
              </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link
                {{(request()->route()->getName()=='services.index')?'active':''}}
              ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Services Section
                    <i class="right fas fa-angle-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                  <a href="{{ route('services.index') }}" class="nav-link {{(request()->route()->getName()=='services.index')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Services  <span class="badge badge-danger right">{{ DB::table('services')->count() }}</span></p>
                  </a>
              </li>
              </ul>
            </li>
            <li class="nav-item">

              <a href="#" class="nav-link
                {{(request()->route()->getName()=='project.index')?'active':''}}">


                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Project Section
                    <i class="right fas fa-angle-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                  <a href="{{ route('project.index') }}" class="nav-link {{(request()->route()->getName()=='project.index')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Project  <span class="badge badge-danger right">{{ DB::table('projects')->count() }}</span></p>
                  </a>
              </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link
              {{(request()->route()->getName()=='team.index')?'active':''}}">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Team Section
                    <i class="right fas fa-angle-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                  <a href="{{ route('team.index') }}" class="nav-link {{(request()->route()->getName()=='team.index')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Team <span class="badge badge-danger right">{{ DB::table('teams')->count() }}</span></p>
                  </a>
              </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link
              {{(request()->route()->getName()=='testimonial.index')?'active':''}}
              ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Testimonial Section
                    <i class="right fas fa-angle-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                  <a href="{{ route('testimonial.index') }}" class="nav-link {{(request()->route()->getName()=='testimonial.index')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Testimonial  <span class="badge badge-danger right">{{ DB::table('testimonials')->count() }}</span></p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link
                {{(request()->route()->getName()=='choose.index')?'active':''}}

                ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Choose Section
                    <i class="right fas fa-angle-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                  <a href="{{ route('choose.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Choose <span class="badge badge-danger right">6</span></p>
                  </a>
              </li>
              </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link
                {{(request()->route()->getName()=='logo.index')?'active':''}}

                ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Logo Section
                    <i class="right fas fa-angle-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                  <a href="{{ route('logo.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Logo <span class="badge badge-danger right">6</span></p>
                  </a>
              </li>
              </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link
                {{(request()->route()->getName()=='blog.index')?'active':''}}

                ">
                  <i class="nav-icon fab fa-edge-legacy"></i>
                  <p>Blog Section
                    <i class="right fas fa-angle-right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                  <a href="{{ route('blog.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Blog <span class="badge badge-danger right">6</span></p>
                  </a>
              </li>
              </ul>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link
            {{(request()->route()->getName()=='setting.index')?'active':''}}
            {{(request()->route()->getName()=='seo.index')?'active':''}}
            {{(request()->route()->getName()=='page.index')?'active':''}}
            {(request()->route()->getName()=='my.profile')?'active':''}}
            {(request()->route()->getName()=='message.index')?'active':''}}
            {(request()->route()->getName()=='subscribe.index')?'active':''}}
            {{(request()->route()->getName()=='password.change')?'active':''}}"
            >
            <i class="nav-icon fas fa-copy"></i>
              <p>
                Advance Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
              <li class="nav-item">
                <a href="{{ route('setting.index') }}" class="nav-link {{(request()->route()->getName()=='setting.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Setting <span class="badge badge-danger right">{{ DB::table('settings')->count() }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('seo.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Seo <span class="badge badge-danger right">{{ DB::table('seos')->count() }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('my.profile') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Profile<span class="badge badge-danger right">1</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('password.change') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Password Change<span class="badge badge-danger right">1</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Page<span class="badge badge-danger right">{{ DB::table('pages')->count() }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('message.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Message<span class="badge badge-danger right">{{ DB::table('emails')->count() }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('subscribe.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Subscribe<span class="badge badge-danger right">{{ DB::table('subscribes')->count() }}</span></p>
                </a>
              </li>
            </ul>
          </li>


            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                      @csrf
                <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                this.closest('form').submit();">
                               <i class="nav-icon fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>
              </form>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
