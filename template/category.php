<!-- Page content-->
      <!-- Page container-->
      <div class="container-fluid mt-5 pt-5 p-0">
        <div class="row g-0 mt-n3">
          <!-- Filters sidebar (Offcanvas on mobile)-->
          <aside class="col-lg-4 col-xl-3 border-top-lg border-end-lg shadow-sm px-3 px-xl-4 px-xxl-5 pt-lg-2">
            <div class="offcanvas-lg offcanvas-start" id="filters-sidebar">
              <div class="offcanvas-header d-flex d-lg-none align-items-center">
                <h2 class="h5 mb-0">Filters</h2>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#filters-sidebar"></button>
              </div>
              <div class="offcanvas-header d-block border-bottom pt-0 pt-lg-4 px-lg-0">
                <ul class="nav nav-tabs mb-0">
                  <li class="nav-item"><a class="nav-link active" href="real-estate-catalog-rent.html"><i class="fi-rent fs-base me-2"></i>For rent</a></li>
                  <li class="nav-item"><a class="nav-link" href="real-estate-catalog-sale.html"><i class="fi-home fs-base me-2"></i>For sale</a></li>
                </ul>
              </div>
              <div class="offcanvas-body py-lg-4">
                <div class="pb-4 mb-2">
                  <h3 class="h6">Location</h3>
                  <select class="form-select mb-2">
                    <option value="" disabled>Choose city</option>
                    <option value="Chicago">Chicago</option>
                    <option value="Dallas">Dallas</option>
                    <option value="Los Angeles">Los Angeles</option>
                    <option value="New York" selected>New York</option>
                    <option value="San Diego">San Diego</option>
                  </select>
                  <select class="form-select">
                    <option value="" selected disabled>Choose district</option>
                    <option value="Brooklyn">Brooklyn</option>
                    <option value="Manhattan">Manhattan</option>
                    <option value="Staten Island">Staten Island</option>
                    <option value="The Bronx">The Bronx</option>
                    <option value="Queens">Queens</option>
                  </select>
                </div>
                <div class="pb-4 mb-2">
                  <h3 class="h6">Property type</h3>
                  <div class="overflow-auto" data-simplebar data-simplebar-auto-hide="false" style="height: 11rem;">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="house">
                      <label class="form-check-label fs-sm" for="house">House</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="apartment" checked>
                      <label class="form-check-label fs-sm" for="apartment">Apartment</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="room">
                      <label class="form-check-label fs-sm" for="room">Room</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="office">
                      <label class="form-check-label fs-sm" for="office">Office</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="commercial">
                      <label class="form-check-label fs-sm" for="commercial">Commercial</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="land">
                      <label class="form-check-label fs-sm" for="land">Land</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="daily">
                      <label class="form-check-label fs-sm" for="daily">Daily rental</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="new-building">
                      <label class="form-check-label fs-sm" for="new-building">New building</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="parking-lot">
                      <label class="form-check-label fs-sm" for="parking-lot">Parking lot</label>
                    </div>
                  </div>
                </div>
                
                
                <!--          BUTTON OF FILTER
                <div class="border-top py-4">
                  <button class="btn btn-outline-primary" type="button"><i class="fi-rotate-right me-2"></i>Reset filters</button>
                </div>

				*****************************************************************************************
				*****************************************************************************************
				*****************************************************************************************
				*****************************************************************************************

				-->
              </div>
            </div>
          </aside>
          <!-- Page content-->
          <div class="col-lg-8 col-xl-9 position-relative overflow-hidden pb-5 pt-4 px-3 px-xl-4 px-xxl-5">
            <!-- Map popup-->
            <div class="map-popup invisible" id="map">
              <button class="btn btn-icon btn-light btn-sm shadow-sm rounded-circle" type="button" data-bs-toggle-class="invisible" data-bs-target="#map"><i class="fi-x fs-xs"></i></button>
              <div class="interactive-map" data-map-options-json="json/map-options-real-estate-rent.json"></div>
            </div>
            <!-- Breadcrumb-->
            <nav class="mb-3 pt-md-2" aria-label="Breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="real-estate-home-v1.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Property for rent</li>
              </ol>
            </nav>
            <!-- Title-->
            <div class="d-sm-flex align-items-center justify-content-between pb-3 pb-sm-4">
              <h1 class="h2 mb-sm-0">Property for rent</h1><a class="d-inline-block fw-bold text-decoration-none py-1" href="#" data-bs-toggle-class="invisible" data-bs-target="#map"><i class="fi-map me-2"></i>Map view</a>
            </div>
            <!-- Sorting-->
            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
              <div class="d-flex align-items-center flex-shrink-0">
                <label class="fs-sm me-2 pe-1 text-nowrap" for="sortby"><i class="fi-arrows-sort text-muted mt-n1 me-2"></i>Sort by:</label>
                <select class="form-select form-select-sm" id="sortby">
                  <option>Newest</option>
                  <option>Popularity</option>
                  <option>Low - High Price</option>
                  <option>High - Low Price</option>
                  <option>High rating</option>
                  <option>Average Rating</option>
                </select>
              </div>
              <hr class="d-none d-sm-block w-100 mx-4">
              <div class="d-none d-sm-flex align-items-center flex-shrink-0 text-muted"><i class="fi-check-circle me-2"></i><span class="fs-sm mt-n1">148 results</span></div>
            </div>
            <!-- Catalog grid-->
            <div class="row g-4 py-4">
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success mb-1">Verified</span><span class="d-table badge bg-info">New</span></div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/06.jpg" alt="Image"><img src="img/real-estate/catalog/06.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">3-bed Apartment | 67 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">3811 Ditmars Blvd Astoria, NY 11105</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$1,650</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">3<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-info">New</span></div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/07.jpg" alt="Image"><img src="img/real-estate/catalog/07.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Pine Apartments | 56 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">3811 Ditmars Blvd Astoria, NY 11105</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$2,000</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">4<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-info">New</span></div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/08.jpg" alt="Image"><img src="img/real-estate/catalog/08.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Greenpoint Rentals | 85 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">1510 Castle Hill Ave Bronx, NY 10462</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$1,350</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">0<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Verified</span></div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/09.jpg" alt="Image"><img src="img/real-estate/catalog/09.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Terra Nova Apartments | 85 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">21 India St Brooklyn, NY 11222</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$2,400</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">5<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success mb-1">Verified</span><span class="d-table badge bg-danger">Featured</span></div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/10.jpg" alt="Image"><img src="img/real-estate/catalog/10.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">O’Farrell Rooms | 40 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">460 E Fordham Rd Bronx, NY 10458</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>From $550</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">0<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-info">New</span></div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/11.jpg" alt="Image"><img src="img/real-estate/catalog/11.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Studio | 32 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">140-60 Beech Ave Flushing, NY 11355</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$680</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-danger">Featured</span></div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/12.jpg" alt="Image"><img src="img/real-estate/catalog/12.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Mason House | 150 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">557 Grand Concourse Bronx, NY 10451</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>From $4,000</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">3<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Verified</span></div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/13.jpg" alt="Image"><img src="img/real-estate/catalog/13.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Office | 320 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">159 20th Street Brooklyn, NY 11232</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$8,000</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">8<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/15.jpg" alt="Image"><img src="img/real-estate/catalog/15.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Lakewood Rentals | 90 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">5 Brewster Street Glen Cove, NY 11542</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$1,200</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">8<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/14.jpg" alt="Image"><img src="img/real-estate/catalog/14.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Crystal Apartment| 60 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">495 Henry St Brooklyn, NY 11231</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$1,350</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-danger">Featured</span></div>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/16.jpg" alt="Image"><img src="img/real-estate/catalog/16.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Family Home | 120 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">67-04 Myrtle Ave Glendale, NY 11385</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>From $4,500</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">4<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
              <!-- Item-->
              <div class="col-sm-6 col-xl-4">
                <div class="card shadow-sm card-hover border-0 h-100">
                  <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                    <div class="content-overlay end-0 top-0 pt-3 pe-3">
                      <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                    </div>
                    <div class="tns-carousel-inner"><img src="img/real-estate/catalog/17.jpg" alt="Image"><img src="img/real-estate/catalog/17.jpg" alt="Image"></div>
                  </div>
                  <div class="card-body position-relative pb-3">
                    <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                    <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Tiffany Studio | 35 sq.m</a></h3>
                    <p class="mb-2 fs-sm text-muted">3979 Albany Post Road Hyde Park, NY 12538</p>
                    <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$700</div>
                  </div>
                  <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
                </div>
              </div>
            </div>
            <!-- Pagination-->
            <nav class="border-top pb-md-4 pt-4 mt-2" aria-label="Pagination">
              <ul class="pagination mb-1">
                <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                <li class="page-item d-none d-sm-block">...</li>
                <li class="page-item d-none d-sm-block"><a class="page-link" href="#">8</a></li>
                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><i class="fi-chevron-right"></i></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </main>