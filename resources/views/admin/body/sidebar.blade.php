<nav class="sidebar">
    <div class="sidebar-header">
      <a href="{{route('admin.dashboard')}}" class="sidebar-brand">
        Cv<span>SU</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">web apps (to be added)</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Email</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/email/inbox.html" class="nav-link">Inbox</a>
              </li>
              <li class="nav-item">
                <a href="pages/email/read.html" class="nav-link">Read</a>
              </li>
              <li class="nav-item">
                <a href="pages/email/compose.html" class="nav-link">Compose</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="pages/apps/chat.html" class="nav-link">
            <i class="link-icon" data-feather="message-square"></i>
            <span class="link-title">Chat</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/apps/calendar.html" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Calendar</span>
          </a>
        </li>
        <li class="nav-item nav-category">Assigning Roles</li>
                {{--     ROLES SECTION         ROLES SECTION         ROLES SECTION         ROLES SECTION         ROLES SECTION    --}}
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button" aria-expanded="false" aria-controls="errorPages">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Roles</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="errorPages">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('admin.roles.manage')}}" class="nav-link">Manage Roles</a>
              </ul>
            </div>
          </li>
        <li class="nav-item nav-category">Posts</li>
        <li class="nav-item">
          {{--    ANNOUNCEMENTS SECTION         ANNOUNCEMENTS SECTION         ANNOUNCEMENTS SECTION         ANNOUNCEMENTS SECTION     --}}
          <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
            <i class="link-icon" data-feather="book"></i>
            <span class="link-title">Announcements</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="general-pages">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/general/blank-page.html" class="nav-link">Current</a>
              </li>
              <li class="nav-item">
                <a href="pages/general/blank-page.html" class="nav-link">Make New</a>
              </li>
            </ul>
          </div>
        </li>
        {{--    POSTS SECTION         POSTS SECTION         POSTS SECTION         POSTS SECTION         POSTS SECTION     --}}
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button" aria-expanded="false" aria-controls="authPages">
            <i class="link-icon" data-feather="unlock"></i>
            <span class="link-title">Posts</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="authPages">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('admin.posts.allposts')}}" class="nav-link">All Posts</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item nav-category">Manage</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#manage" role="button" aria-expanded="false" aria-controls="manage">
            <i class="link-icon" data-feather="unlock"></i>
            <span class="link-title">Manage Users</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="manage">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/auth/login.html" class="nav-link">Users/Students</a>
              </li>
              <li class="nav-item">
                <a href="pages/auth/login.html" class="nav-link">Teachers/Co-Admins</a>
              </li>
            </ul>
          </div>
        </li>

      </ul>
    </div>
  </nav>