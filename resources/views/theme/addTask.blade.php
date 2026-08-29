  @extends('theme.master')

@section('title', 'Ajouter une tâche')

  @section('content')
      <!-- Start MAIN CONTENT -->

      <div class="row">
          <div class="col-12">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                  <div class="">
                      <h1 class="fs-3 mb-1">Ajouter une tâche</h1>

                  </div>

                  <!-- Button Right -->
                  <div>
                      <a href="{{ route('theme.dashboard') }}" class="btn btn-primary">Aller au tableau de bord</a>
                  </div>


              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body p-4">



                      <!-- ++++++++ Start Message ajouter avec succees +++++++++++ -->
                      @if (session('task-status'))
                          <div class="alert alert-success">
                              {{ session('task-status') }}
                          </div>
                      @endif
                      <!-- ++++++++ END Message ajouter avec succees +++++++++++ -->


                      <!-- Form -->
                      <form method="POST" action="{{ route('tasks.store') }}" id="addTaskForm"
                          enctype="multipart/form-data">
                          @csrf



                          <!-- Start Title -->
                          <div class="mb-3">
                              <label for="TaskTitle" class="form-label">Title </label>

                              <input name ="title" type="text" class="form-control" id="TaskTitle"
                                  placeholder="Saisir le titre de la tâche" value="{{ old('title') }}">

                              <!-- Start Message Erreur TITLE VALIDATION -->
                              @error('title')
                                  <span class="text-danger small">{{ $message }}</span>
                              @enderror
                              <!-- Start Message Erreur TITLE VALIDATION -->


                          </div>
                          <!-- End Title -->


                          <!-- Start Description -->
                          <div class="mb-3">
                              <label for="description" class="form-label">Description</label>

                              <textarea name ="description" class="form-control" id="description" rows="4"
                                  placeholder="Saisir la description de la tâche">{{ old('description') }}</textarea>

                              <!-- Start Message Erreur description VALIDATION -->
                              @error('description')
                                  <span class="text-danger small">{{ $message }}</span>
                              @enderror
                              <!-- Start Message Erreur description VALIDATION -->


                          </div>

                          <!-- End Description -->






                          <div class="row">


                              <!-- Start image task-->
                              <div class="col-md-6 mb-3">
                                  <label for="TaskImage" class="form-label">Task Image</label>

                                  <input name ="image" type="file" class="form-control" id="TaskImage" accept="image/*">

                                  <!-- Start Message Erreur image VALIDATION -->
                                  @error('image')
                                      <span class="text-danger small">{{ $message }}</span>
                                  @enderror
                                  <!-- Start Message Erreur image VALIDATION -->

                              </div>
                              <!-- End image task-->


                              <!-- Start  Priorité-->

                              <div class="col-md-6 mb-3">
                                  <label for="prioritySelect" class="form-label">Priorité</label>
                                
                                  <select name ="priority" class="form-select" id="prioritySelect">
                                      <option value="">Select Priorité</option>
                                      <option value="low" @selected(old('priority') === 'low')>low</option>
                                      <option value="medium" @selected(old('priority') === 'medium')>medium</option>
                                      <option value="high" @selected(old('priority') === 'high')>high</option>
                                  </select>

                                  <!-- Start Message Erreur priority VALIDATION -->
                                  @error('priority')
                                      <span class="text-danger small">{{ $message }}</span>
                                  @enderror
                                  <!-- Start Message Erreur priority VALIDATION -->


                              </div>
                              <!-- End  Priorité-->

                          </div>

                          <!-- Start Due Date -->
                          <div class="mb-3">
                              <label for="date_due" class="form-label">Date Due </label>

                              <input name ="due_date" value = "{{ old('due_date') }}" type="date" class="form-control"
                                  id="date_due" >

                              <!-- Start Message Erreur due_date VALIDATION -->
                              @error('due_date')
                                  <span class="text-danger small">{{ $message }}</span>
                              @enderror
                              <!-- Start Message Erreur due_date VALIDATION -->

                          </div>
                          <!-- end Due Date -->


                          <div class="d-flex gap-2">
                              <button type="submit" class="btn btn-primary">Ajouter</button>
                              <button type="reset" class="btn btn-secondary">Vider</button>
                          </div>

                      </form>
                      <!-- end Form -->
                  </div>
              </div>


          </div>

      </div>

      <!-- Footer -->
      @include('theme.partials.footer')



      <!-- End MAIN CONTENT -->
  @endsection
