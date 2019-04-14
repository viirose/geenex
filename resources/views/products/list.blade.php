@extends('../nav')

@section('content')
<div class="row top-pad"></div>
<!-- Products Section-->
    <section>
      <div class="container">
        <!-- wordPress installation-->
        <header class="section header mb-5">
          <h4><i class="fa fa-microchip" aria-hidden="true"></i> Products</h4>
          <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
        </header>
        <div class="row"> 
          <div class="col-lg-8">   
            <div id="accordion" class="faq accordion accordion-custom pb-5">
              <!-- product-->
              <div class="card">
                <div id="headingOne" class="card-header">
                  <h4 class="mb-0 accordion-heading">
                    <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="d-flex align-items-center">
                      <img src="img/1.jpg" class="rounded list-icon ">
                      <span>ELECTROMAGNETIC BRAKE QKS9/10, 80VDC</span>
                    </button>
                  </h4>
                </div>
                <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion" class="collapse">
                  <div class="card-body">
                      <div class="cent">
                        <img src="img/1.jpg" class="rounded img-fluid">
                      </div>
                      <ul class="list-unstyled pl-0 mt-4">
                        <li>Part for: SCHINDLER</li>
                        <li>Part No.: 169643</li>
                        <li>Availability: normal</li>
                        <li>Remark: </li>
                      </ul>
                  </div>
                </div>
              </div>

              <!-- product        -->
              <div class="card">
                <div id="headingTwo" class="card-header">
                  <h4 class="mb-0 accordion-heading">
                    <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="d-flex align-items-center collapsed">
                      <img src="img/2.jpg" class="rounded list-icon">
                      <span>ENCODER, GEN2</span></button>
                  </h4>
                </div>
                <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion" class="collapse">
                  <div class="card-body">
                    <img src="img/2.jpg" class="rounded img-fluid">
                    <ul class="list-unstyled pl-0 mt-4">
                        <li>Part for: OTIS</li>
                        <li>Part No.: AAA633AJ401</li>
                        <li>Availability: normal</li>
                        <li>Remark: </li>
                      </ul>
                    </div>
                </div>
              </div>
              <!-- product        -->
              <div class="card">
                <div id="headingThree" class="card-header">
                  <h4 class="mb-0 accordion-heading">
                    <button data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="d-flex align-items-center collapsed">
                      <img src="img/3.jpg" class="rounded list-icon">
                      <span>TEST PART 3 PCB, ADC DOOR CONTROL BOARD</span></button>
                  </h4>
                </div>
                <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion" class="collapse">
                  <div class="card-body">
                    <img src="img/3.jpg" class="rounded img-fluid">
                    <ul class="list-unstyled pl-0 mt-4">
                        <li>Part for: OTIS</li>
                        <li>Part No.: AAA633AJ401</li>
                        <li>Availability: normal</li>
                        <li>Remark: </li>
                      </ul>
                    </div>
                </div>
              </div>

              <!-- product            -->
              <div class="card">
                <div id="headingFour" class="card-header">
                  <h4 class="mb-0 accordion-heading">
                    <button data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="d-flex align-items-center collapsed"><i class="icon-stack-of-sheets"></i><span>Anim pariatur cliche reprehenderit?</span></button>
                  </h4>
                </div>
                <div id="collapseFour" aria-labelledby="headingFour" data-parent="#accordion" class="collapse">
                  <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                </div>
              </div>
            </div>
            <!-- troubleshooting-->
            <header class="section-header text-left mb-5 mt-5">
              <h2 class="mt-5">Troubleshooting</h2>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </header>
            <div id="accordion2" class="faq accordion accordion-custom">
              <!-- product-->
              <div class="card">
                <div id="headingOneAlt" class="card-header">
                  <h4 class="mb-0 accordion-heading">
                    <button data-toggle="collapse" data-target="#collapseOneAlt" aria-expanded="false" aria-controls="collapseOneAlt" class="d-flex align-items-center"><i class="icon-light-bulb"></i><span>Anim pariatur cliche reprehenderit?</span></button>
                  </h4>
                </div>
                <div id="collapseOneAlt" aria-labelledby="headingOneAlt" data-parent="#accordion2" class="collapse">
                  <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</div>
                </div>
              </div>
              <!-- product-->
              <div class="card">
                <div id="headingTwoAlt" class="card-header">
                  <h4 class="mb-0 accordion-heading">
                    <button data-toggle="collapse" data-target="#collapseTwoAlt" aria-expanded="true" aria-controls="collapseTwoAlt" class="d-flex align-items-center collapsed"><i class="icon-plug"></i><span> Wolf moon officia aute, non cupidatat?</span></button>
                  </h4>
                </div>
                <div id="collapseTwoAlt" aria-labelledby="headingTwoAlt" data-parent="#accordion2" class="collapse show">
                  <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</div>
                </div>
              </div>
              <!-- product-->
              <div class="card">
                <div id="headingThreeAlt" class="card-header">
                  <h4 class="mb-0 accordion-heading">
                    <button data-toggle="collapse" data-target="#collapseThreeAlt" aria-expanded="false" aria-controls="collapseThreeAlt" class="d-flex align-items-center collapsed"><i class="icon-shield-settings"></i><span>Food truck quinoa nesciunt?</span></button>
                  </h4>
                </div>
                <div id="collapseThreeAlt" aria-labelledby="headingThreeAlt" data-parent="#accordion2" class="collapse">
                  <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.</div>
                </div>
              </div>
              <!-- product-->
              <div class="card">
                <div id="headingFourAlt" class="card-header">
                  <h4 class="mb-0 accordion-heading">
                    <button data-toggle="collapse" data-target="#collapseFourAlt" aria-expanded="false" aria-controls="collapseFourAlt" class="d-flex align-items-center collapsed"><i class="icon-stack-of-sheets"></i><span>Anim pariatur cliche reprehenderit?</span></button>
                  </h4>
                </div>
                <div id="collapseFourAlt" aria-labelledby="headingFourAlt" data-parent="#accordion2" class="collapse">
                  <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo</div>
                </div>
              </div>
              <blockquote class="blockquote mb-5 text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</blockquote>
            </div>
          </div>
          <!-- sidebar-->
          <aside class="sidebar col-lg-4 mt-5 mt-lg-0">
            <div class="search mb-4">
              <form action="#" class="search-form">
                <div class="form-group">
                  <input type="search" name="search" placeholder="Search" class="form-control">
                  <button type="submit"> <i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>
            <div class="sidebar-widget mb-4">
              <h4 class="sidebar-widget-heading">product types</h4>
              <ul class="list-unstyled pl-0 mt-4">
                <li> <a href="#" class="categories-link"><i class="fa fa-cog" aria-hidden="true"></i> WordPress installation</a></li>
                <li><a href="#" class="categories-link"><i class="fa fa-plane" aria-hidden="true"></i> Troubleshooting</a></li>
                <li><a href="#" class="categories-link"><i class="fa fa-ship" aria-hidden="true"></i> Pricing &amp; Support</a></li>
                <li><a href="#" class="categories-link"><i class="fa fa-bell-o" aria-hidden="true"></i> Pricing &amp; Support</a></li>
                <li><a href="#" class="categories-link"><i class="fa fa-battery-quarter" aria-hidden="true"></i> Tips &amp; Tricks</a></li>
                <li><a href="#" class="categories-link"><i class="fa fa-tablet" aria-hidden="true"></i> Managing Files</a></li>
              </ul>
            </div>
            <div class="sidebar-widget">
              <h4 class="sidebar-widget-heading">search tags</h4>
              <ul class="list-inline pl-0 mt-4">
                <li class="list-inline-item mr-0"><a href="#" class="tag-link">Design</a></li>
                <li class="list-inline-item mr-0"><a href="#" class="tag-link">Window</a></li>
                <li class="list-inline-item mr-0"><a href="#" class="tag-link">Science</a></li>
                <li class="list-inline-item mr-0"><a href="#" class="tag-link">Mobile App</a></li>
                <li class="list-inline-item mr-0"><a href="#" class="tag-link">Ios</a></li>
                <li class="list-inline-item mr-0"><a href="#" class="tag-link">Super charge</a></li>
              </ul>
            </div>
          </aside>
        </div> 

      </div>

    </section>

@endsection