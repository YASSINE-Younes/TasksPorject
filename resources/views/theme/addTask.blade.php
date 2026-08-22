  @extends('theme.master')



  @section('content')
      <!-- Start MAIN CONTENT -->

      <div class="row">
          <div class="col-12">
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                  <div class="">
                      <h1 class="fs-3 mb-1">Ajouter une tâche</h1>
                      {{-- <p class="mb-0">Manage your inventory items</p> --}}
                  </div>

                  <!-- Button Right -->
                  <div>
                      <a href="inventory.html" class="btn btn-primary">Go to Inventory List</a>
                  </div>


              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body p-4">


                      <!-- Form -->
                      <form id="addTaskForm">




                          <!-- Start Title -->
                          <div class="mb-3">
                              <label for="TaskName" class="form-label">Title </label>
                              <input type="text" class="form-control" id="TaskName"
                                  placeholder="Saisir le nom de la tâche" required>
                          </div>
                          <!-- End Title -->


                          <!-- Start Description -->
                          <div class="mb-3">
                              <label for="description" class="form-label">Description</label>

                              <textarea class="form-control" id="description" rows="4" placeholder="Saisir la description de la tâche" required></textarea>



                          </div>

                          <!-- End Description -->






                          <div class="row">


                              <!-- Start image task-->
                              <div class="col-md-6 mb-3">
                                  <label for="TaskImage" class="form-label">Task Image</label>
                                  <input type="file" class="form-control" id="TaskImage" accept="image/*">
                              </div>
                              <!-- End image task-->


                              <!-- Start  Priorité-->

                              <div class="col-md-6 mb-3">
                                  <label for="prioritySelect" class="form-label">Priorité</label>
                                  <select class="form-select" id="prioritySelect" required>
                                      <option value="">Select Priorité</option>
                                      <option value="low">low</option>
                                      <option value="medium">medium</option>
                                      <option value="high">high</option>
                                  </select>
                              </div>
                              <!-- End  Priorité-->

                          </div>

                          <!-- Start Due Date -->
                          <div class="mb-3">
                              <label for="date_due" class="form-label">Date Due </label>
                              <input type="date" class="form-control" id="date_due" required>
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
