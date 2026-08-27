  <aside id="sidebar" class="sidebar">

    <!-- start Logo -->
      <div class="logo-area">
          {{-- <a href="index.html" class="d-inline-flex"><img src="{{ asset('assets') }}/images/logo-icon.svg" alt=""
                  width="24"> --}}
              <span class="logo-text ms-2"> <img src="{{ asset('assets') }}/images/logo.svg" alt=""></span>
          </a>
      </div>
      <!-- End Logo -->
      <ul class="nav flex-column">
          <li class="px-4 py-2"><small class="nav-text">Principale</small></li>


          <li><a class="nav-link active" href="{{ route('theme.index') }}"><i class="ti ti-home"></i><span
                      class="nav-text">Tableau De Bord</span></a></li>


          <li>
              <a class="nav-link" href="{{ route('tasks.index') }}">
                  <i class="ti ti-list-check"></i>
                  <span class="nav-text">Mes tâches</span>
              </a>
          </li>


          <li><a class="nav-link" href="{{ route('theme.add') }}"><i class="ti ti-plus"></i><span
                      class="nav-text">Ajouter une tâche</span></a></li>


          {{-- <li><a class="nav-link" href="reports.html"><i class="ti ti-receipt"></i><span
                        class="nav-text">Reports</span></a>
            </li> --}}


          {{-- <li><a class="nav-link" href="404-error.html"><i class="ti ti-alert-circle"></i><span
                        class="nav-text">404 Error</span></a>
            </li> --}}


          {{-- <li><a class="nav-link" href="docs.html"><i class="ti ti-file-text"></i><span
                        class="nav-text">Docs</span></a></li> --}}


          {{-- <li class="px-4 pt-4 pb-2"><small class="nav-text">Account</small></li> --}}
          {{-- <li><a class="nav-link" href="signin.html"><i class="ti ti-logout"></i><span class="nav-text">Log
                        in</span></a>
            </li> --}}
          {{-- <li><a class="nav-link" href="signup.html"><i class="ti ti-user-plus"></i><span class="nav-text">Sign
                        up</span></a></li> --}}
      </ul>

  </aside>
