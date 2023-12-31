<template>
    <div>
      
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-2 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>What news</h3>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="details.htmlnav-home" @click="categorySearch('')" role="tab" aria-controls="nav-home" aria-selected="true">All</a
                                        >
                                        <a
                                        class="nav-item nav-link"
                                        id="nav-profile-tab"
                                        data-toggle="tab"
                                        href="details.htmlnav-profile"
                                        role="tab"
                                        aria-controls="nav-profile"
                                        aria-selected="false"
                                        v-for="(category, index) in categoryLists" :key="index"
                                        @click="categorySearch(category.id)"
                                        >{{ category.title }}</a
                                        >
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                            <div class="col">
                                <div class="">  
                                    <div class="search-box input-group">
                                            <input type="text" class="form-control" v-model="searchKey" v-on:keyup.enter ="postSearch()" placeholder="Search" aria-describedby="button-addon2" />
                                            <button class="btn-md btn-dark rounded px-3" @click="postSearch()"><i class="fas fa-search special-tag"></i></button>
                                    </div>
                                    
                                </div>
                            </div>
                    </div>
              <div class="row">
                <div class="col-12">
                  <!-- Nav Card -->
                  <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div
                      class="tab-pane fade show active"
                      id="nav-home"
                      role="tabpanel"
                      aria-labelledby="nav-home-tab"
                    >
                      <div class="whats-news-caption">
                        <div class="my-5 mx-auto" v-if="tokenStatus == false"><h1 class="text-danger border border-dark px-5 py-2 text-center">You don't have Data for now, Please login!</h1></div>
                        <span v-else>
                            <div class="row">

                                <div v-if="postLists.length == 0" class="my-5 mx-auto">
                                    <h1 class="text-danger border border-dark px-5 py-2">There is no Data</h1>
                                </div>

                                <!-- post loop  -->
                                <div class="col-lg-6 col-md-6" v-else v-for="(post, index) in postLists" :key="index" >
                                    <div class="single-what-news mb-100" @click="detailPage(post.id)">
                                        <div class="what-img">
                                            <img
                                            :src="post.image"
                                            alt=""
                                            />
                                        </div>
                                        <div class="what-cap">
                                            <span class="color1">{{ moment(post.created_at).format("DD/MMM/YYYY HH:MM") }}</span>
                                            <h4>
                                            <a href="details.html">{{ post.title}}</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                        <!-- post loop  -->

                            </div>
                        </span>
                      </div>
                    </div>
                  </div>
                  <!-- End Nav Card -->
                </div>
              </div>
            </div>
			</div>
			</div>
        </section>
        <!-- Whats New End -->

    </div>
</template>


<script src="../js/HomePage.js"></script>



