 @extends('theme.master')



 @section('content')
     <!-- Start MAIN CONTENT -->
   


             <div class="row ">
                 <div class="col-12">
                     <div class="mb-6">
                         <h1 class="fs-3 mb-1">Dashboard</h1>
                         <p>Your main content goes here…</p>
                     </div>
                 </div>
             </div>


             <div class="row g-3 mb-3">
                 <div class="col-lg-3 col-12">

                     <div class="card p-4  bg-primary bg-opacity-10 border border-primary border-opacity-25 rounded-2">

                         <div class="d-flex gap-3 ">
                             <div class="icon-shape icon-md bg-primary text-white rounded-2">
                                 <i class="ti ti-report-analytics fs-4"></i>
                             </div>
                             <div>
                                 <h2 class="mb-3 fs-6">Total Sales</h2>
                                 <h3 class="fw-bold mb-0">$25,000</h3>
                                 <p class="text-primary mb-0 small">+5% since last month</p>
                             </div>
                         </div>
                     </div>


                 </div>
                 <div class="col-lg-3 col-12">

                     <div class="card p-4  bg-success bg-opacity-10 border border-success border-opacity-25 rounded-2">

                         <div class="d-flex gap-3 ">
                             <div class="icon-shape icon-md bg-success text-white rounded-2">
                                 <i class="ti ti-repeat fs-4"></i>
                             </div>
                             <div>
                                 <h2 class="mb-3 fs-6">Total Purchase</h2>
                                 <h3 class="fw-bold mb-0">$18,000</h3>
                                 <p class="text-success mb-0 small">+22% since last month</p>
                             </div>
                         </div>
                     </div>


                 </div>
                 <div class="col-lg-3 col-12">

                     <div class="card p-4  bg-info bg-opacity-10 border border-info border-opacity-25 rounded-2">

                         <div class="d-flex gap-3 ">
                             <div class="icon-shape icon-md bg-info text-white rounded-2">
                                 <i class="ti ti-currency-dollar fs-4"></i>
                             </div>
                             <div>
                                 <h2 class="mb-3 fs-6">Total Expenses</h2>
                                 <h3 class="fw-bold mb-0">$9,000</h3>
                                 <p class="text-info mb-0 small">+10% since last month</p>
                             </div>
                         </div>
                     </div>


                 </div>
                 <div class="col-lg-3 col-12">

                     <div class="card p-4  bg-warning bg-opacity-10 border border-warning border-opacity-25 rounded-2">

                         <div class="d-flex gap-3 ">
                             <div class="icon-shape icon-md bg-warning text-white rounded-2">
                                 <i class="ti ti-notes fs-4"></i>
                             </div>
                             <div>
                                 <h2 class="mb-3 fs-6">Invoice Due</h2>
                                 <h3 class="fw-bold mb-0">$25,000</h3>
                                 <p class="text-warning mb-0 small">+35% since last month</p>
                             </div>
                         </div>
                     </div>


                 </div>

             </div>



             <div class="row g-3 mb-3">




                 <div class="col-12 col-lg-6">
                     <div class="card">

                         <div class="card-body p-4">
                             <h3 class="h6">Customers Overview</h3>
                             <div class="row align-items-center">
                                 <div class="col-sm-6">
                                     <div id="customerChart">

                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="row">
                                         <div class="col-6 border-end">
                                             <div class="text-center ">
                                                 <h2 class="mb-1">5.5K</h2>
                                                 <p class="text-success mb-2">First Time</p>
                                                 <span class="badge bg-success"><i
                                                         class="ti ti-arrow-up-left me-1"></i>25%</span>
                                             </div>
                                         </div>
                                         <div class="col-6">
                                             <div class="text-center">
                                                 <h2 class="mb-1">3.5K</h2>
                                                 <p class="text-warning mb-2">Return</p>
                                                 <span class="badge bg-success badge-xs d-inline-flex align-items-center"><i
                                                         class="ti ti-arrow-up-left me-1"></i>21%</span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>


                             </div>
                             <div class="row text-center border-top mt-4 pt-4">
                                 <div class="col-4 border-end">
                                     <h3 class="fw-bold mb-2">6987</h3>
                                     <small class="text-secondary">Suppliers</small>
                                 </div>
                                 <div class="col-4 border-end">
                                     <h3 class="fw-bold mb-2">4896</h3>
                                     <small class="text-secondary">Customers</small>
                                 </div>
                                 <div class="col-4">
                                     <h3 class="fw-bold mb-2">487</h3>
                                     <small class="text-secondary">Orders</small>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
            
            
             <div class="row g-3">

             </div>


           


             <!-- Footer -->
             @include('theme.partials.footer')

     
     <!-- End MAIN CONTENT -->
 @endsection
