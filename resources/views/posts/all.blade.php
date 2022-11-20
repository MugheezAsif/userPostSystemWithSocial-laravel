

<x-layout>
    <x-navcard class="bg-dark">
  
    </x-navcard>
      <section>
          <main id="main">
  
              <!-- ======= Breadcrumbs Section ======= -->
              <section class="breadcrumbs">
                <div class="container">
          
                  <div class="d-flex justify-content-between align-items-center">
                    <h2>All Post</h2>
                    <ol>
                      <li><a href="/">Home</a></li>
                      <li>Posts</li>
                    </ol>
                  </div>
          
                </div>
              </section><!-- Breadcrumbs Section -->


              <section id="portfolio" class="section-bg">
                <div class="container" data-aos="fade-up">
            
                <header class="section-header">
                    <h3 class="section-title">All Posts</h3>
                </header>
            
                <div class="row" data-aos="fade-up" data-aos-delay="100"">
                  <div class=" col-lg-12">
                      <ul id="portfolio-flters">
                          <li data-filter="*" class="filter-active"> <a style="color: black" href="/posts/all/?tag=">All</a></li>
                          <li data-filter=".filter-app"> <a style="color: black" href="/posts/all/?tag=laravel">Laravel</a></li>
                          <li data-filter=".filter-card"> <a style="color: black" href="/posts/all/?tag=ruby">Ruby</a> </li>
                          <li data-filter=".filter-web"> <a style="color: black" href="/posts/all/?tag=javascript">Javascript</a></li>
                      </ul>
                  </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            
                    @unless (count($posts) == 0)
                        @foreach ($posts as $post)
                            <x-post-card :post=$post/>
                        @endforeach
                    @else
                        <p>Sorry No Posts Yet</p>    
                    @endunless
                
            
            
                </div>
            
                </div>
            </section><!-- End Portfolio Section -->
          </main>
      </section>
</x-layout>