<!-- Page content-->
      <!-- Review modal-->
      <div class="modal fade" id="modal-review" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header d-block position-relative border-0 pb-0 px-sm-5 px-4">
              <h3 class="modal-title mt-4 text-center">Leave a review</h3>
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 px-4">
              <form class="needs-validation" novalidate>
                <div class="mb-3">
                  <label class="form-label" for="review-name">Name <span class='text-danger'>*</span></label>
                  <input class="form-control" type="text" id="review-name" placeholder="Your name" required>
                  <div class="invalid-feedback">Please let us know your name.</div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="review-email">Email <span class='text-danger'>*</span></label>
                  <input class="form-control" type="email" id="review-email" placeholder="Your email address" required>
                  <div class="invalid-feedback">Please provide a valid email address.</div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="review-rating">Rating <span class='text-danger'>*</span></label>
                  <select class="form-control form-select" id="review-rating" required>
                    <option value="" selected disabled hidden>Choose rating</option>
                    <option value="5 stars">5 stars</option>
                    <option value="4 stars">4 stars</option>
                    <option value="3 stars">3 stars</option>
                    <option value="2 stars">2 stars</option>
                    <option value="1 star">1 star</option>
                  </select>
                  <div class="invalid-feedback">Please rate the property.</div>
                </div>
                <div class="mb-4">
                  <label class="form-label" for="review-text">Review <span class='text-danger'>*</span></label>
                  <textarea class="form-control" id="review-text" rows="5" placeholder="Your review message" required></textarea>
                  <div class="invalid-feedback">Please write your review.</div>
                </div>
                <button class="btn btn-primary d-block w-100 mb-4" type="submit">Submit a review</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Page header-->
      <section class="container pt-5 mt-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="real-estate-home-v1.html">Home</a></li>
            <li class="breadcrumb-item"><a href="real-estate-catalog-rent.html">Property for rent</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pine Apartments</li>
          </ol>
        </nav>
        <h1 class="h2 mb-2">Pine Apartments</h1>
        <p class="mb-2 pb-1 fs-lg">28 Jackson Ave Long Island City, NY 67234</p>
        <!-- Features + Sharing-->
        <div class="d-flex justify-content-between align-items-center">
          <ul class="d-flex mb-4 list-unstyled">
            <li class="me-3 pe-3 border-end"><b class="me-1">4</b><i class="fi-bed mt-n1 lead align-middle text-muted"></i></li>
            <li class="me-3 pe-3 border-end"><b class="me-1">2</b><i class="fi-bath mt-n1 lead align-middle text-muted"></i></li>
            <li class="me-3 pe-3 border-end"><b class="me-1">2</b><i class="fi-car mt-n1 lead align-middle text-muted"></i></li>
            <li><b>56 </b>sq.m</li>
          </ul>
          <div class="text-nowrap">
            <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" type="button" data-bs-toggle="tooltip" title="Add to Wishlist"><i class="fi-heart"></i></button>
            <div class="dropdown d-inline-block" data-bs-toggle="tooltip" title="Share">
              <button class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" type="button" data-bs-toggle="dropdown"><i class="fi-share"></i></button>
              <div class="dropdown-menu dropdown-menu-end my-1">
                <button class="dropdown-item" type="button"><i class="fi-facebook fs-base opacity-75 me-2"></i>Facebook</button>
                <button class="dropdown-item" type="button"><i class="fi-twitter fs-base opacity-75 me-2"></i>Twitter</button>
                <button class="dropdown-item" type="button"><i class="fi-instagram fs-base opacity-75 me-2"></i>Instagram</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Gallery-->
      <section class="container overflow-auto mb-4 pb-3" data-simplebar>
        <div class="row g-2 g-md-3 gallery" data-thumbnails="true" style="min-width: 30rem;">
          <div class="col-8"><a class="gallery-item rounded rounded-md-3" href="img/real-estate/single/01.jpg" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Bathroom&lt;/h6&gt;"><img src="img/real-estate/single/01.jpg" alt="Gallery thumbnail"></a></div>
          <div class="col-4"><a class="gallery-item rounded rounded-md-3 mb-2 mb-md-3" href="img/real-estate/single/02.jpg" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Bedroom&lt;/h6&gt;"><img src="img/real-estate/single/02.jpg" alt="Gallery thumbnail"></a><a class="gallery-item rounded rounded-md-3" href="img/real-estate/single/03.jpg" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Living room&lt;/h6&gt;"><img src="img/real-estate/single/03.jpg" alt="Gallery thumbnail"></a></div>
          <div class="col-12">
            <div class="row g-2 g-md-3">
              <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="img/real-estate/single/04.jpg" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Bedroom&lt;/h6&gt;"><img src="img/real-estate/single/th04.jpg" alt="Gallery thumbnail"></a></div>
              <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="img/real-estate/single/05.jpg" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Kitchen&lt;/h6&gt;"><img src="img/real-estate/single/th05.jpg" alt="Gallery thumbnail"></a></div>
              <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="img/real-estate/single/06.jpg" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Living room&lt;/h6&gt;"><img src="img/real-estate/single/th06.jpg" alt="Gallery thumbnail"></a></div>
              <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="img/real-estate/single/07.jpg" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Bathroom&lt;/h6&gt;"><img src="img/real-estate/single/th07.jpg" alt="Gallery thumbnail"></a></div>
              <div class="col"><a class="gallery-item more-item rounded-1 rounded-md-2" href="img/real-estate/single/08.jpg" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Bathroom&lt;/h6&gt;"><img src="img/real-estate/single/th08.jpg" alt="Gallery thumbnail"><span class="gallery-item-caption fs-base">+5 <span class='d-none d-md-inline'>photos</span></span></a></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Post content-->
      <section class="container mb-5 pb-1">
        <div class="row">
          <div class="col-md-7 mb-md-0 mb-4"><span class="badge bg-success me-2 mb-3">Verified</span><span class="badge bg-info me-2 mb-3">New</span>
            <h2 class="h3 mb-4 pb-4 border-bottom">$2,000<span class="d-inline-block ms-1 fs-base fw-normal text-body">/month</span></h2>
            <!-- Overview-->
            <div class="mb-4 pb-md-3">
              <h3 class="h4">Overview</h3>
              <p class="mb-1">Lorem tincidunt lectus vitae id vulputate diam quam. Imperdiet non scelerisque turpis sed etiam ultrices. Blandit mollis dignissim egestas consectetur porttitor. Vulputate dolor pretium, dignissim eu augue sit ut convallis. Lectus est, magna urna feugiat sed ultricies sed in lacinia. Fusce potenti sit id pharetra vel ornare. Vestibulum sed tellus ullamcorper arcu.</p>
              <div class="collapse" id="seeMoreOverview">
                <p class="mb-1">Asperiores eos molestias, aspernatur assumenda vel corporis ex, magni excepturi totam exercitationem quia inventore quod amet labore impedit quae distinctio? Officiis blanditiis consequatur alias, atque, sed est incidunt accusamus repudiandae tempora repellendus obcaecati delectus ducimus inventore tempore harum numquam autem eligendi culpa.</p>
              </div><a class="collapse-label collapsed" href="#seeMoreOverview" data-bs-toggle="collapse" data-bs-label-collapsed="Show more" data-bs-label-expanded="Show less" role="button" aria-expanded="false" aria-controls="seeMoreOverview"></a>
            </div>
            <!-- Property Details-->
            <div class="mb-4 pb-md-3">
              <h3 class="h4">Property Details</h3>
              <ul class="list-unstyled mb-0">
                <li><b>Type: </b>apartment</li>
                <li><b>Apartment area: </b>56 sq.m</li>
                <li><b>Built: </b>2015</li>
                <li><b>Bedrooms: </b>4</li>
                <li><b>Bathrooms: </b>2</li>
                <li><b>Parking places: </b>2</li>
                <li><b>Pets allowed: </b>cats only</li>
              </ul>
            </div>
            <!-- Amenities-->
            <div class="mb-4 pb-md-3">
              <h3 class="h4">Amenities</h3>
              <ul class="list-unstyled row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-1 mb-1 text-nowrap">
                <li class="col"><i class="fi-wifi mt-n1 me-2 fs-lg align-middle"></i>WiFi</li>
                <li class="col"><i class="fi-thermometer mt-n1 me-2 fs-lg align-middle"></i>Heating</li>
                <li class="col"><i class="fi-dish mt-n1 me-2 fs-lg align-middle"></i>Dishwasher</li>
                <li class="col"><i class="fi-parking mt-n1 me-2 fs-lg align-middle"></i>Parking place</li>
                <li class="col"><i class="fi-snowflake mt-n1 me-2 fs-lg align-middle"></i>Air conditioning</li>
                <li class="col"><i class="fi-iron mt-n1 me-2 fs-lg align-middle"></i>Iron</li>
                <li class="col"><i class="fi-tv mt-n1 me-2 fs-lg align-middle"></i>TV</li>
                <li class="col"><i class="fi-laundry mt-n1 me-2 fs-lg align-middle"></i>Laundry</li>
                <li class="col"><i class="fi-cctv mt-n1 me-2 fs-lg align-middle"></i>Security cameras</li>
              </ul>
              <div class="collapse" id="seeMoreAmenities">
                <ul class="list-unstyled row row-cols-lg-3 row-cols-md-2 row-cols-1 gy-1 mb-1 text-nowrap">
                  <li class="col"><i class="fi-no-smoke mt-n1 me-2 fs-lg align-middle"></i>No smocking</li>
                  <li class="col"><i class="fi-pet mt-n1 me-2 fs-lg align-middle"></i>Cats</li>
                  <li class="col"><i class="fi-swimming-pool mt-n1 me-2 fs-lg align-middle"></i>Swimming pool</li>
                  <li class="col"><i class="fi-double-bed mt-n1 me-2 fs-lg align-middle"></i>Double bed</li>
                  <li class="col"><i class="fi-bed mt-n1 me-2 fs-lg align-middle"></i>Single bed</li>
                </ul>
              </div><a class="collapse-label collapsed" href="#seeMoreAmenities" data-bs-toggle="collapse" data-bs-label-collapsed="Show more" data-bs-label-expanded="Show less" role="button" aria-expanded="false" aria-controls="seeMoreAmenities"></a>
            </div>
            <!-- Post meta-->
            <div class="mb-lg-5 mb-md-4 pb-lg-2 py-4 border-top">
              <ul class="d-flex mb-4 list-unstyled fs-sm">
                <li class="me-3 pe-3 border-end">Published: <b>Dec 9, 2020</b></li>
                <li class="me-3 pe-3 border-end">Ad number: <b>681013232</b></li>
                <li class="me-3 pe-3">Views: <b>48</b></li>
              </ul>
            </div>
            <!-- Reviews-->
            <div class="mb-4 pb-4 border-bottom">
              <h3 class="h4 pb-3"><i class="fi-star-filled mt-n1 me-2 lead align-middle text-warning"></i>4,9 (32 reviews)</h3>
              <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch justify-content-between"><a class="btn btn-outline-primary mb-sm-0 mb-3" href="#modal-review" data-bs-toggle="modal"><i class="fi-edit me-1"></i>Add review</a>
                <div class="d-flex align-items-center ms-sm-4">
                  <label class="me-2 pe-1 text-nowrap" for="reviews-sorting"><i class="fi-arrows-sort text-muted mt-n1 me-2"></i>Sort by:</label>
                  <select class="form-select" id="reviews-sorting">
                    <option>Newest</option>
                    <option>Oldest</option>
                    <option>Popular</option>
                    <option>High rating</option>
                    <option>Low rating</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- Review-->
            <div class="mb-4 pb-4 border-bottom">
              <div class="d-flex justify-content-between mb-3">
                <div class="d-flex align-items-center pe-2"><img class="rounded-circle me-1" src="img/avatars/03.jpg" width="48" alt="Avatar">
                  <div class="ps-2">
                    <h6 class="fs-base mb-0">Annette Black</h6><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                  </div>
                </div><span class="text-muted fs-sm">Jan 17, 2021</span>
              </div>
              <p>Elementum ut quam tincidunt egestas vitae elit, hendrerit. Ullamcorper nulla amet lobortis elit, nibh condimentum enim. Aliquam felis nisl tellus sodales lectus dictum tristique proin vitae. Odio fermentum viverra tortor quis.</p>
              <div class="d-flex align-items-center">
                <button class="btn-like" type="button"><i class="fi-like"></i><span>(3)</span></button>
                <div class="border-end me-1">&nbsp;</div>
                <button class="btn-dislike" type="button"><i class="fi-dislike"></i><span>(0)</span></button>
              </div>
            </div>
            <!-- Review-->
            <div class="mb-4 pb-4 border-bottom">
              <div class="d-flex justify-content-between mb-3">
                <div class="d-flex align-items-center pe-2"><img class="rounded-circle me-1" src="img/avatars/13.png" width="48" alt="Avatar">
                  <div class="ps-2">
                    <h6 class="fs-base mb-0">Darrell Steward</h6><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star"></i><i class="star-rating-icon fi-star"></i></span>
                  </div>
                </div><span class="text-muted fs-sm">Dec 1, 2020</span>
              </div>
              <p>Vel dictum nunc ut tristique. Egestas diam amet, ut proin hendrerit. Dui accumsan at phasellus tempus consequat dignissim.</p>
              <div class="d-flex align-items-center">
                <button class="btn-like" type="button"><i class="fi-like"></i><span>(0)</span></button>
                <div class="border-end me-1">&nbsp;</div>
                <button class="btn-dislike" type="button"><i class="fi-dislike"></i><span>(1)</span></button>
              </div>
            </div>
            <!-- Review-->
            <div class="mb-4 pb-4 border-bottom">
              <div class="d-flex justify-content-between mb-3">
                <div class="d-flex align-items-center pe-2"><img class="rounded-circle me-1" src="img/avatars/05.jpg" width="48" alt="Avatar">
                  <div class="ps-2">
                    <h6 class="fs-base mb-0">Floyd Miles</h6><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                  </div>
                </div><span class="text-muted fs-sm">Oct  28, 2020</span>
              </div>
              <p>Viverra nunc blandit sapien non imperdiet sit. Purus tempus elementum aliquam eu urna. A aenean duis non egestas at libero porttitor integer eget. Sed dictum lobortis laoreet gravida.</p>
              <div class="d-flex align-items-center">
                <button class="btn-like" type="button"><i class="fi-like"></i><span>(2)</span></button>
                <div class="border-end me-1">&nbsp;</div>
                <button class="btn-dislike" type="button"><i class="fi-dislike"></i><span>(1)</span></button>
              </div>
            </div>
            <!-- Review-->
            <div class="mb-4 pb-4 border-bottom">
              <div class="d-flex justify-content-between mb-3">
                <div class="d-flex align-items-center pe-2"><img class="rounded-circle me-1" src="img/avatars/04.jpg" width="48" alt="Avatar">
                  <div class="ps-2">
                    <h6 class="fs-base mb-0">Ralph Edwards</h6><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star"></i></span>
                  </div>
                </div><span class="text-muted fs-sm">Sep 14, 2020</span>
              </div>
              <p>Elementum nisl, egestas nam consectetur nisl, at pellentesque cras. Non sed ac vivamus dolor dignissim ut. Nisl sapien blandit pulvinar sagittis donec sociis ipsum arcu est. Tempus, rutrum morbi scelerisque tempor mi. Etiam urna, cras bibendum leo nec faucibus velit. Tempor lectus dignissim at auctor integer neque quam amet.</p>
              <div class="d-flex align-items-center">
                <button class="btn-like" type="button"><i class="fi-like"></i><span>(0)</span></button>
                <div class="border-end me-1">&nbsp;</div>
                <button class="btn-dislike" type="button"><i class="fi-dislike"></i><span>(0)</span></button>
              </div>
            </div>
            <!-- Pagination-->
            <nav class="mt-2 mb-4" aria-label="Reviews pagination">
              <ul class="pagination">
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
          <!-- Sidebar-->
          <aside class="col-lg-4 col-md-5 ms-lg-auto pb-1">
            <!-- Contact card-->
            <div class="card shadow-sm mb-4">
              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between"><a class="text-decoration-none" href="real-estate-vendor-properties.html"><img class="rounded-circle mb-2" src="img/avatars/22.jpg" width="60" alt="Avatar">
                    <h5 class="mb-1">Floyd Miles</h5>
                    <div class="mb-1"><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span><span class="ms-1 fs-sm text-muted">(45 reviews)</span>
                    </div>
                    <p class="text-body">Imperial Property Group Agent</p></a>
                  <div class="ms-4 flex-shrink-0"><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" href="#"><i class="fi-linkedin"></i></a></div>
                </div>
                <ul class="list-unstyled border-bottom mb-4 pb-4">
                  <li><a class="nav-link fw-normal p-0" href="tel:3025550107"><i class="fi-phone mt-n1 me-2 align-middle opacity-60"></i>(302) 555-0107</a></li>
                  <li><a class="nav-link fw-normal p-0" href="mailto:floyd_miles@email.com"><i class="fi-mail mt-n1 me-2 align-middle opacity-60"></i>floyd_miles@email.com</a></li>
                </ul>
                <!-- Contact form-->
                <form class="needs-validation" novalidate>
                  <div class="mb-3">
                    <input class="form-control" type="text" placeholder="Your name*" required>
                    <div class="invalid-feedback">Please enter your name!</div>
                  </div>
                  <div class="mb-3">
                    <input class="form-control" type="email" placeholder="Email*" required>
                    <div class="invalid-feedback">Please provide valid email address!</div>
                  </div>
                  <input class="form-control mb-3" type="tel" placeholder="Phone">
                  <div class="input-group mb-3">
                    <input class="form-control date-picker rounded pe-5" type="text" placeholder="Choose date" data-datepicker-options="{&quot;altInput&quot;: true, &quot;altFormat&quot;: &quot;F j, Y&quot;, &quot;dateFormat&quot;: &quot;Y-m-d&quot;}"><i class="fi-calendar position-absolute top-50 end-0 translate-middle-y me-3"></i>
                  </div>
                  <textarea class="form-control mb-3" rows="3" placeholder="Message" style="resize: none;"></textarea>
                  <div class="form-check mb-4">
                    <input class="form-check-input" id="form-submit" type="checkbox" checked>
                    <label class="form-check-label fs-sm" for="form-submit">Send news, tips and promos from Finder to my email.</label>
                  </div>
                  <button class="btn btn-lg btn-primary d-block w-100" type="submit">Send request</button>
                </form>
              </div>
            </div>
            <!-- Location (Map)-->
            <div class="pt-2">
              <div class="position-relative mb-2"><img class="rounded-3" src="img/real-estate/single/map.jpg" alt="Map">
                <div class="d-flex w-100 h-100 align-items-center justify-content-center position-absolute top-0 start-0"><a class="btn btn-primary stretched-link" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.6145424811048!2d-73.93999278406218!3d40.74850644331743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2592979d4827f%3A0x3a5d8b3cf779f3b6!2s28%20Jackson%20Ave%2C%20Long%20Island%20City%2C%20NY%2011101%2C%20USA!5e0!3m2!1sen!2sua!4v1618074552281!5m2!1sen!2sua" data-iframe="true" data-bs-toggle="lightbox"><i class="fi-route me-2"></i>Get directions</a></div>
              </div>
              <p class="mb-0 fs-sm text-center">28 Jackson Ave Long Island City, NY 67234</p>
            </div>
          </aside>
        </div>
      </section>
      <!-- Recently viewed-->
      <section class="container mb-5 pb-2 pb-lg-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h2 class="h3 mb-0">Recently viewed</h2><a class="btn btn-link fw-normal p-0" href="real-estate-catalog-rent.html">View all<i class="fi-arrow-long-right ms-2"></i></a>
        </div>
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
          <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">
            <!-- Item-->
            <div class="col">
              <div class="card shadow-sm card-hover border-0 h-100">
                <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                  <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success mb-1">Verified</span><span class="d-table badge bg-info">New</span></div>
                  <div class="content-overlay end-0 top-0 pt-3 pe-3">
                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                  </div><img src="img/real-estate/catalog/01.jpg" alt="Image">
                </div>
                <div class="card-body position-relative pb-3">
                  <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                  <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">3-bed Apartment | 67 sq.m</a></h3>
                  <p class="mb-2 fs-sm text-muted">3811 Ditmars Blvd Astoria, NY 11105</p>
                  <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$1,629</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">3<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
              </div>
            </div>
            <!-- Item-->
            <div class="col">
              <div class="card shadow-sm card-hover border-0 h-100">
                <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                  <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success mb-1">Verified</span><span class="d-table badge bg-danger">Featured</span></div>
                  <div class="content-overlay end-0 top-0 pt-3 pe-3">
                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                  </div><img src="img/real-estate/catalog/02.jpg" alt="Image">
                </div>
                <div class="card-body position-relative pb-3">
                  <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For sale</h4>
                  <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Family Home| 120 sq.m</a></h3>
                  <p class="mb-2 fs-sm text-muted">67-04 Myrtle Ave Glendale, NY 11385</p>
                  <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$84,000</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">4<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
              </div>
            </div>
            <!-- Item-->
            <div class="col">
              <div class="card shadow-sm card-hover border-0 h-100">
                <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                  <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Verified</span></div>
                  <div class="content-overlay end-0 top-0 pt-3 pe-3">
                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                  </div><img src="img/real-estate/catalog/03.jpg" alt="Image">
                </div>
                <div class="card-body position-relative pb-3">
                  <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For rent</h4>
                  <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Greenpoint Rentals | 85 sq.m</a></h3>
                  <p class="mb-2 fs-sm text-muted">1510 Castle Hill Ave Bronx, NY 10462</p>
                  <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$1,330</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
              </div>
            </div>
            <!-- Item-->
            <div class="col">
              <div class="card shadow-sm card-hover border-0 h-100">
                <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                  <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success mb-1">Verified</span><span class="d-table badge bg-info">New</span></div>
                  <div class="content-overlay end-0 top-0 pt-3 pe-3">
                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                  </div><img src="img/real-estate/catalog/04.jpg" alt="Image">
                </div>
                <div class="card-body position-relative pb-3">
                  <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For sale</h4>
                  <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Studio | 32 sq.m</a></h3>
                  <p class="mb-2 fs-sm text-muted">140-60 Beech Ave Flushing, NY 11355</p>
                  <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$65,000</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
              </div>
            </div>
            <!-- Item-->
            <div class="col">
              <div class="card shadow-sm card-hover border-0 h-100">
                <div class="card-img-top card-img-hover"><a class="img-overlay" href="real-estate-single-v1.html"></a>
                  <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success mb-1">Verified</span></div>
                  <div class="content-overlay end-0 top-0 pt-3 pe-3">
                    <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                  </div><img src="img/real-estate/catalog/05.jpg" alt="Image">
                </div>
                <div class="card-body position-relative pb-3">
                  <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">For sale</h4>
                  <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="real-estate-single-v1.html">Cottage | 120 sq.m</a></h3>
                  <p class="mb-2 fs-sm text-muted">42 Broadway New York, NY 10004</p>
                  <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>$184,000</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap"><span class="d-inline-block mx-1 px-2 fs-sm">4<i class="fi-bed ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">2<i class="fi-bath ms-1 mt-n1 fs-lg text-muted"></i></span><span class="d-inline-block mx-1 px-2 fs-sm">1<i class="fi-car ms-1 mt-n1 fs-lg text-muted"></i></span></div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>