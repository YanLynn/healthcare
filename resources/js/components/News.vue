<template>
    <layout>
        <div class="m-lr-0 justify-content-md-center">
            <div class="row">
                <div class="col-12 p-r-0">
                    <div class="col-12 p-r-0">
                        <!-- <form class="col-lg-12 mb-2 pad-free"> -->
                            <div class="row col-md-12 m-0 p-r-0">
                                <div class="col-md-6">
                                    <div class="col-md-2 float-right">
                                        <!-- <span class="btn btn my-2 col-md-12 my-sm-0 danger-bg-color btn-danger" v-if="status == 1" @click="clearSearch()">X</span> -->
                                    </div>
                                </div>
                                <div class="col-md-6 p-l-0 m-b-15">
                                    <div class="row ">
                                        <div class="col-md-9">
                                            <span class="btn btn my-2 col-md-12 my-sm-0 danger-bg-color btn-danger cross-btn" v-if="status == 1" @click="clearSearch()">X</span>
                                            <input type="text" placeholder="ニュース検索" aria-label="ニュース検索" class="form-control col-lg mr-sm-3 d-flex p-2 form-control" id="search-word" v-bind:value="search_word">
                                        </div>
                                        <div class="col-md-3 p-r-20">
                                            <span class="btn btn my-2 col-md-12 my-sm-0 all-btn secondary-bg-color btn-secondary" @click="searchCategory()"><i class="fas fa-search"></i> 検索</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <!-- </form>                                       -->
                        <div class="row" v-if="status == '0'">
                            <div class="card col-md-6 d-none d-sm-block p-l-0" style="border:0px!important;">
                                <div class="card-header tab-card-header">
                                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                        <li v-for="cat in cats" :key="cat.id" class="nav-item nav-line" id="category-id" v-bind:value="cat.id" v-on:click="getPostByCatID(cat.id);getLatestPostByCatID(cat.id);">
                                            <a class="nav-link" href="#two" v-if = "cats[0].id != cat.id" id="one-tab" data-toggle="tab" role="tab" aria-controls="One" aria-selected="true" >
                                            {{ cat.name }}</a>

                                            <a class="nav-link active nav-line" href="#two" v-if = "cats[0].id == cat.id" id="one-tab" data-toggle="tab" role="tab" aria-controls="One" aria-selected="true" >
                                            {{ cat.name }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content tab-content2 scroll2" id="myTabContent">
                                    <div class="tab-pane fade show active p-1" id="one" role="tabpanel" aria-labelledby="one-tab">
                                        <div class="row">
                                            <div class="active-users col-md-6">
                                                <router-link :to="'/newsdetails/'+latest_post.id">
                                                 <clazy-load class="wrapper-0" @load="log"  src="images/noimage.jpg" :key="latest_post.id">
                                                    <transition name="fade">
                                                        <img v-bind:src="'/upload/news/' + latest_post.photo" class="source-img img-responsive"  @error="imgUrlAlt">
                                                    </transition>
                                                    <transition name="fade" slot="placeholder">
                                                        <div class="preloader">
                                                            <div class="circle">
                                                            <div class="circle-inner"></div>
                                                            </div>
                                                        </div>
                                                    </transition>
                                                 </clazy-load>
                                                    <p class="source-title" v-if="latest_post.title" aria-label="">{{ latest_post.title }}</p>
                                                    <p class="source-subtitle" v-if="latest_post.created_at">
                                                      <img v-if="latest_post.created_at" alt="" src="/images/5.png" class="source-img" @error="imgUrlAlt">{{ latest_post.created_at }}
                                                    </p>
                                                </router-link>
                                            </div>
                                            <div class="col-md-6 news-wrapper">
                                                <ul class="list-group list-group-flush all-item" v-for="post in posts" :key="post.id">
                                                    <li  class="list-group-item" style="padding:6px 0px 4px 0px!important;"  v-if = "posts[0].id != post.id">
                                                        <router-link :to="{name:'newdetails', params: {id:post.id}}">
                                                            <img src="/images/4.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right" @error="imgUrlAlt">
                                                            <span class="source-img-small d-inline-block text-truncate">{{ post.title }} </span>
                                                        </router-link>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pad-free">
                                <div class="col-md-12 m-lr-0 pad-free" v-if="status =='0'">
                                    <!-- <div class="row col-md-12 text-center"><h4 class="h_4 next-title" style="border-left: 5px solid orange;">関連ニュース</h4></div> -->
                                    <div class="row col-md-12 p-l-0 m-0">
                                        <div class="col-sm-6 m-b-8 p-l-0" v-for="latest_post_all_cat in latest_post_all_cats.slice(0, 2)" :key="latest_post_all_cat.id">
                                            <div class="col-md-12 row m-0 pad-free">
                                                <div class="hovereffect fit-image">
                                                <clazy-load class="wrapper-1" @load="log"  src="images/noimage.jpg" :key="latest_post_all_cat.id">
                                                    <transition name="fade">
                                                        <img :src="'/upload/news/' + latest_post_all_cat.photo " class="img-responsive fit-image" @error="imgUrlAlt">
                                                    </transition>
                                                    <!-- <img class="img-responsive fit-image" :src="'/upload/news/' + latest_post_all_cat.photo " alt="" @error="imgUrlAlt"> -->
                                                    <transition name="fade" slot="placeholder">
                                                    <div class="preloader">
                                                        <div class="circle">
                                                        <div class="circle-inner"></div>
                                                        </div>
                                                    </div>
                                                    </transition>
                                                </clazy-load>
                                                    <div class="overlay">
                                                        <router-link class="btn btn-sm all-btn secondary-bg-color m-t-20" :to="'/newsdetails/'+ latest_post_all_cat.id">詳細</router-link>
                                                    </div>
                                                    <div class="info">
                                                        <div class="col-12" style="border:none;">
                                                            <p class=" p_3">
                                                                {{ latest_post_all_cat.main_point }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12 p-l-0 m-0">
                                        <div class="col-md-6 m-b-8 p-l-0" v-for="item in latest_post_all_cats.slice(2, 6)"  :key="item.id">
                                            <div class="col-md-12 row adslist-card news-3-card m-0">
                                                <div class="col-md-4 img-box">
                                                    <router-link :to="'/newsdetails/'+item.id">
                                                        <clazy-load class="wrapper-4" @load="log" src="images/noimage.jpg" :key="item.id">
                                                            <transition name="fade">
                                                                <img :src="'/upload/news/' + item.photo"  class="fit-image-0"  @error="imgUrlAlt">
                                                            </transition>
                                                            <!-- <img v-bind:src="'/upload/news/' + item.photo" class="fit-image" style="height:5rem;width:6rem" @error="imgUrlAlt"> -->
                                                            <transition name="fade" slot="placeholder">
                                                                <div class="preloader">
                                                                    <div class="circle">
                                                                    <div class="circle-inner"></div>
                                                                    </div>
                                                                </div>
                                                            </transition>
                                                        </clazy-load>
                                                    </router-link>
                                                </div>

                                                <div class="col-md-8 txt-box">
                                                    <router-link :to="'/newsdetails/'+item.id">
                                                        <p> {{item.main_point}} </p>
                                                    </router-link>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div v-else>
                                <NewsSearchListComponent :first_search_word="first_search_word"></NewsSearchListComponent>
                        </div> -->
                    </div>
                    <div class="col-md-12 m-lr-0 p-r-0" v-if="status == '0'">
                        <!-- <div class="row col-md-12 text-center"><h4 class="h_4 next-title" style="border-left: 5px solid orange;">関連ニュース</h4></div> -->
                        <div class="row col-md-12 pad-free m-0">
                            <div class="col-md-3 m-b-8 p-l-0" v-for="item in latest_post_all_cats.slice(6, 14)"  :key="item.id">
                                <div class="col-md-12 row adslist-card news-3-card m-0">
                                    <div class="col-md-4 img-box">
                                        <router-link :to="'/newsdetails/'+item.id">
                                        <clazy-load class="wrapper-4" @load="log"  src="images/noimage.jpg" :key="item.id">
                                            <!-- <img v-bind:src="'/upload/news/' + item.photo" class="fit-image" style="height:5rem;width:6rem" @error="imgUrlAlt"> -->
                                            <transition name="fade">
                                                <img v-bind:src="'/upload/news/' + item.photo" class="fit-image-0" @error="imgUrlAlt">
                                            </transition>
                                            <transition name="fade" slot="placeholder">
                                                <div class="preloader">
                                                    <div class="circle">
                                                    <div class="circle-inner"></div>
                                                    </div>
                                                </div>
                                            </transition>
                                        </clazy-load>
                                        </router-link>
                                    </div>

                                    <div class="col-md-8 txt-box">
                                        <router-link :to="'/newsdetails/'+item.id">
                                            <p> {{item.main_point}} </p>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-3  col-md-3 mt-2" v-for="latest_post_all_cat in latest_post_all_cats" :key="latest_post_all_cat.id">
                                    <div class="hovereffect fit-image">
                                            <img class="img-responsive fit-image" :src="'/upload/news/' + latest_post_all_cat.photo " alt="" @error="imgUrlAlt">
                                            <div class="overlay">
                                                    <router-link class="btn btn-sm all-btn secondary-bg-color m-t-20" :to="'/newsdetails/'+ latest_post_all_cat.id">詳細</router-link>
                                            </div>
                                            <div class="info">
                                                    <div class="row">
                                                            <div class="col-12">
                                                                    <p class=" p_3">
                                                                            {{ latest_post_all_cat.main_point }}
                                                                    </p>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <div>
            <div class="col-md-12 category_box" :class="'bordertop-color'+index" v-for="(group,name,index) in post_groups" :key="index">
                <h4 class="category_news_title" :class="'h-color'+index"><span>{{name}}</span> <label style="float: right; color: #999; font-size: 14px;">新着ニュース一覧</label></h4>
                <div class="row m-lr-0" v-if="group[0].pattern == 1">
                    <div class="col-md-3 p-lr-0">
                        <router-link :to="'/newsdetails/'+group[0].pid">
                            <div class="col-12 single-news-box">
                                <clazy-load class="wrapper-3" @load="log" src="images/noimage.jpg" :key="index" >
                                    <transition name="fade">
                                        <img :src="'/upload/news/' + group[0].photo"  @error="imgUrlAlt">
                                    </transition>
                                    <p> {{group[0].main_point}} </p>
                                    <transition name="fade" slot="placeholder">
                                    <div class="preloader">
                                        <div class="circle">
                                        <div class="circle-inner"></div>
                                        </div>
                                    </div>
                                    </transition>
                                </clazy-load>
                            </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 p-r-0">
                        <router-link v-for="(item,index) in group.slice(1, 4)" :key="index" :to="'/newsdetails/'+item.pid">
                            <div class="col-md-12 row m-b-10 adslist-card m-lr-0 news-3-card">
                                <div class="col-md-4 img-box">
                                    <clazy-load class="wrapper-4" @load="log" src="images/noimage.jpg" :key="index" >
                                        <!-- <img v-bind:src="'/upload/news/' + item.photo" class="fit-image" style="height:5rem;width:6rem" @error="imgUrlAlt"> -->
                                        <transition name="fade">
                                            <img :src="'/upload/news/' + item.photo" class="fit-image-0"  @error="imgUrlAlt">
                                        </transition>
                                        <transition name="fade" slot="placeholder">
                                        <div class="preloader">
                                            <div class="circle">
                                            <div class="circle-inner"></div>
                                            </div>
                                        </div>
                                        </transition>
                                    </clazy-load>
                                </div>

                                <div class="col-md-8 txt-box">
                                    <p> {{item.main_point}} </p>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 p-r-0">
                        <router-link v-for="(item,index) in group.slice(4,12)" :key="index" :to="'/newsdetails/'+item.pid" style="color:#333;">
                            <p class="text-truncate news-list-display">
                                <i class="fas fa-building"></i> {{item.main_point}}
                            </p>
                        </router-link>
                    </div>
                    <div class="col-md-3 p-r-0">
                        <router-link v-for="(item,index) in group.slice(12, 15)" :key="index" :to="'/newsdetails/'+item.pid">
                            <div class="col-md-12 row m-b-10 adslist-card m-lr-0 news-3-card">
                                <div class="col-md-4 img-box">
                                    <clazy-load class="wrapper-4" @load="log" src="images/noimage.jpg" :key="index" >
                                        <transition name="fade">
                                            <img v-bind:src="'/upload/news/' + item.photo" class="fit-image-0"  @error="imgUrlAlt">
                                        </transition>
                                        <transition name="fade" slot="placeholder">
                                        <div class="preloader">
                                            <div class="circle">
                                            <div class="circle-inner"></div>
                                            </div>
                                        </div>
                                        </transition>
                                    </clazy-load>
                                </div>

                                <div class="col-md-8 txt-box">
                                    <p> {{item.main_point}} </p>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
                <div class="row m-lr-0" v-if="group[0].pattern == 2">
                    <div class="col-md-3 p-lr-0">
                        <router-link v-for="(item,index) in group.slice(0, 3)" :key="index" :to="'/newsdetails/'+item.pid">
                            <div class="col-md-12 row m-b-10 adslist-card m-lr-0 news-3-card">
                                <div class="col-md-4 img-box">
                                    <clazy-load class="wrapper-4" @load="log" src="images/noimage.jpg" :key="index">
                                        <transition name="fade">
                                            <img v-bind:src="'/upload/news/' + item.photo" class="fit-image-0" @error="imgUrlAlt">
                                        </transition>
                                        <transition name="fade" slot="placeholder">
                                            <div class="preloader">
                                                <div class="circle">
                                                <div class="circle-inner"></div>
                                                </div>
                                            </div>
                                        </transition>
                                    </clazy-load>
                                </div>

                                <div class="col-md-8 txt-box">
                                    <p> {{item.main_point}} </p>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 p-r-0">
                        <router-link v-for="(item,index) in group.slice(3, 11)" :key="index" :to="'/newsdetails/'+item.pid" style="color:#333;">
                            <p class="text-truncate news-list-display">
                                <i class="fas fa-building"></i> {{item.main_point}}
                            </p>
                        </router-link>
                    </div>
                    <div class="col-md-3 p-r-0">
                        <router-link v-for="(item,index) in group.slice(11, 14)" :key="index" :to="'/newsdetails/'+item.pid">
                            <div class="col-md-12 row m-b-10 adslist-card m-lr-0 news-3-card">
                                <div class="col-md-4 img-box">
                                    <clazy-load class="wrapper-4" @load="log" src="images/noimage.jpg" :key="index">
                                        <transition name="fade">
                                            <img v-bind:src="'/upload/news/' + item.photo" class="fit-image-0" @error="imgUrlAlt">
                                        </transition>
                                        <transition name="fade" slot="placeholder">
                                            <div class="preloader">
                                                <div class="circle">
                                                <div class="circle-inner"></div>
                                                </div>
                                            </div>
                                        </transition>
                                    </clazy-load>
                                </div>

                                <div class="col-md-8 txt-box">
                                    <p> {{item.main_point}} </p>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 p-r-0">
                        <router-link v-for="(item,index) in group.slice(14, 22)" :key="index" :to="'/newsdetails/'+item.pid" style="color:#333;">
                            <p class="text-truncate news-list-display">
                                <i class="fas fa-building"></i> {{item.main_point}}
                            </p>
                        </router-link>
                    </div>
                </div>
                <div class="row m-lr-0" v-if="group[0].pattern == 3">
                    <div class="col-md-3 p-lr-0">
                        <router-link :to="'/newsdetails/'+group[0].pid">
                            <div class="col-12 single-news-box">
                                <clazy-load class="wrapper-3" @load="log" src="images/noimage.jpg" :key="index">
                                    <transition name="fade">
                                        <img v-bind:src="'/upload/news/' + group[0].photo" class="fit-image" @error="imgUrlAlt">
                                    </transition>
                                    <transition name="fade" slot="placeholder">
                                        <div class="preloader">
                                            <div class="circle">
                                            <div class="circle-inner"></div>
                                            </div>
                                        </div>
                                    </transition>
                                    <p>{{group[0].main_point}}</p>
                                </clazy-load>
                            </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 p-r-0">
                        <router-link v-for="(item,index) in group.slice(1, 4)" :key="index" :to="'/newsdetails/'+item.pid">
                            <div class="col-md-12 row m-b-10 adslist-card m-lr-0 news-3-card">
                                <div class="col-md-4 img-box">
                                    <clazy-load class="wrapper-4" @load="log" src="images/noimage.jpg" :key="index">
                                    <transition name="fade">
                                        <img v-bind:src="'/upload/news/' + item.photo" class="fit-image-0" @error="imgUrlAlt">
                                    </transition>
                                    <transition name="fade" slot="placeholder">
                                        <div class="preloader">
                                            <div class="circle">
                                            <div class="circle-inner"></div>
                                            </div>
                                        </div>
                                    </transition>
                                    </clazy-load>
                                </div>

                                <div class="col-md-8 txt-box">
                                    <p> {{item.main_point}} </p>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 p-r-0">
                        <router-link v-for="(item,index) in group.slice(4, 7)" :key="index" :to="'/newsdetails/'+item.pid">
                            <div class="col-md-12 row m-b-10 adslist-card m-lr-0 news-3-card">
                                <div class="col-md-4 img-box">
                                    <clazy-load class="wrapper-4" @load="log" src="images/noimage.jpg" :key="index">
                                    <transition name="fade">
                                        <img v-bind:src="'/upload/news/' + item.photo" class="fit-image-0" @error="imgUrlAlt">
                                    </transition>
                                    <transition name="fade" slot="placeholder">
                                        <div class="preloader">
                                            <div class="circle">
                                            <div class="circle-inner"></div>
                                            </div>
                                        </div>
                                    </transition>
                                    </clazy-load>
                                </div>

                                <div class="col-md-8 txt-box">
                                    <p> {{item.main_point}} </p>
                                </div>
                            </div>
                        </router-link>
                    </div>
                    <div class="col-md-3 p-r-0">
                        <router-link :to="'/newsdetails/'+group[7].pid" v-if="group[7]">
                            <div class="col-12 single-news-box">
                                <clazy-load class="wrapper-3" @load="log" src="images/noimage.jpg" :key="index">
                                    <transition name="fade">
                                        <img v-bind:src="'/upload/news/' + group[7].photo" class="fit-image" @error="imgUrlAlt">
                                    </transition>
                                    <transition name="fade" slot="placeholder">
                                        <div class="preloader">
                                            <div class="circle">
                                            <div class="circle-inner"></div>
                                            </div>
                                        </div>
                                    </transition>
                                    <p>{{group[7].main_point}}</p>
                                </clazy-load>
                            </div>
                        </router-link>
                    </div>
                </div>

                <!-- Old design -->
                    <!-- <div class="col-md-3 p-l-0" v-for="(item,i) in group" :key="i">
                            <div class="col-md-12 row m-b-10 adslist-card m-lr-0" style="background-color: #eee;box-shadow: 0 0 2px #bfb9b9;">
                                <div class="col-md-4 img-box">
                                    <router-link :to="'/newsdetails/'+item.pid">
                                        <img v-bind:src="'/upload/news/' + item.photo" class="fit-image" style="height:5rem;width:6rem" @error="imgUrlAlt">
                                    </router-link>
                                </div>

                                <div class="col-md-8 txt-box">
                                    <router-link :to="'/newsdetails/'+item.pid">
                                        <p> {{item.main_point}} </p>
                                    </router-link>
                                </div>
                            </div>
                    </div>-->
                <!-- Old design end -->
            </div>
        </div>
        <!-- </div>
        </div>
    </div>
    </div> -->
    <!-- <div v-else>
    <NewsSearchListComponent></NewsSearchListComponent>
    </div> -->
    </layout>
</template>

<script>
    import layout from '../components/home.vue'
    import News from './News.vue'
    import hospitalSearch from './hospitalSearch.vue'
    import nursingSearch from './nursingSearch.vue'
    import jobSearch from './jobSearch.vue'
    import asidebar from './aside.vue'
    import NewsSearchListComponent from './NewsSearchListComponent.vue'

    export default {
        components: {
            News,
            hospitalSearch,
            nursingSearch,
            NewsSearchListComponent,
            jobSearch,
            asidebar,
            layout
        },

      async mounted() {
       
            $('#navtab').removeClass('news-tabColor hospital-tabColor nursing-tabColor job-tabColor');
            $('#navtab').addClass('news-tabColor');
            $('.tab-content').removeClass('news-borderColor job-borderColor nursing-borderColor hospital-borderColor');
            $('#upper-tab').addClass('news-borderColor');
            this.getAllCat();
            this.getLatestPostsByCatID();
            this.getPostByCatID();
            this.getLatestPostByCatID();
            this.getLatestPostFromAllCat();
        },
    data() {
        return {
            cats: [],
            posts: [],
            latest_post: [],
            latest_post_all_cats: [],
            search_posts:[],
            tmp_arr:[],
            categoryId: 1,
            index:[0,3],
            second_index:[1,2],
            third_index:[4,5],
            tmp_title:[],
            title_arr:[],
            tmp_photo:[],
            photo_arr:[],
            tmp_post_id:[],
            id_arr:[],
            post_groups : [],
            status:'0',
            search_word:null,
            first_search_word:'',
            pattern:[]
        }
    },
    created() {

        var today = new Date();
        var month =(String) (today.getMonth()+1);
        var date = (String) (today.getDate());

        if(month.length == 1)
        {
                month = '0' + today.getMonth();
        }

        if(date.length == 1 )
        {
                date = '0' + today.getDate();
        }
        var todaydate = today.getFullYear()+'-'+ month +'-'+ date;

        if(localStorage.getItem('date') == null)
        {

              localStorage.setItem('date',todaydate);
              this.getCategoryRandomValue();
        }
        else{
            // console.log(localStorage.getItem('date'));

              var localdate = localStorage.getItem('date');
    // console.log(localdate);
    // console.log(todaydate > localdate)
              if(todaydate > localdate)
              {
                  localStorage.setItem('date',todaydate);
                  this.getCategoryRandomValue();
              }

        }



    //     this.categoryId();
    },
    methods: {

            log() {
                // console.log()
            },
            getAllCat: function() {
                this.axios
                    .get('/home')
                    .then(response => {
                        // console.log(response);
                        this.cats = response.data;
                    });
            },
            groupBy(array, key) {
                const result = {}
                array.forEach(item => {
                    if (!result[item[key]]) {
                        result[item[key]] = []
                    }
                    result[item[key]].push(item)
                })
                return result
            },
            getLatestPostsByCatID: function() {

                if (this.search_word == null || this.search_word == '' || this.search_word == 'null') {
                    var searchword = 'all_news_search';
                } else {
                    var searchword = this.search_word;
                }
                // console.log(searchword);
                this.axios
                .get('/get_latest_posts_by_catId/'+searchword)
                .then(response => {
                    // console.log(response);
                    this.post_groups = this.groupBy(response.data, 'name');
                    // console.log(this.post_groups)

                });
            },

            getPostByCatID: function(catId = 1) {
                if ($('#search-word').val() != null) {
                    var search_word = $('#search-word').val();
                } else {
                    var search_word = null;
                }

                if (catId !== undefined) {
                    var cat_id = catId;
                } else {
                    var cat_id = 1;
                }

                let fd = new FormData();
                fd.append('search_word', search_word);
                fd.append('category_id', cat_id);

                $('.search-item').css('display', 'none');
                this.categoryId = cat_id;
                this.axios.post("/posts", fd)
                    .then(response => {
                        this.posts = response.data;
                    });
            },

            getCategoryRandomValue(){

            this.axios.get("/get_cat_random") .then(response => {
                });
            },

            getLatestPostByCatID: function(catId) {
                if ($('#search-word').val()) {
                    var search_word = $('#search-word').val();
                } else {
                    var search_word = null;
                }
                if (catId) {
                    var cat_id = catId;
                } else {
                    var cat_id = 1;
                }
                let fd = new FormData();
                fd.append('search_word', search_word)
                fd.append('category_id', cat_id)

                $('.search-item').css('display', 'none');
                this.categoryId = cat_id;
                this.axios.post("/get_latest_post" , fd)
                .then(response => {
                    this.latest_post = response.data;

                    // console.log(this.pattern);
                });
            },
            getLatestPostFromAllCat: function() {
                this.axios
                    .get('/get_latest_post_all_cat')
                    .then(response => {
                        this.latest_post_all_cats = response.data;
                    });
            },

            searchCategory() {
                if ($('#search-word').val() == null || $('#search-word').val() == '' || $('#search-word').val() == 'null') {

                    this.clearSearch();
                     console.log('null');
                } else {
                    this.status = 1;
                    this.search_word = $('#search-word').val();
                    this.getLatestPostsByCatID();
                }

            },

            clearSearch() {
                this.status = 0;
                this.search_word = '';
                this.getLatestPostsByCatID();
            },

            imgUrlAlt(event) {
                console.log(event.target)
                event.target.src = "images/noimage.jpg"
            },
            
        }
    }
 </script>
<style>
.news-list-display{
    /* border: 1px solid #f7f7f7; */
    padding: 5px 10px;
    margin-bottom: 4px;
    background: #f7f7f7;
    /* box-shadow: 0px 0px 1px #ddd; */
    border:solid #f3efef;
    border-width: 0 .1rem .1rem 0;
}
.news-3-card {
    background-color: #f7f7f7;
    /* box-shadow: 0 0 2px #ddd; */
    border:solid #f3efef;
    border-width: 0 .1rem .1rem 0;
}
.news-3-card .img-box{
    padding-left: 10px;
}
.single-news-box {
    background: #f7f7f7;
    height: 96%;
    padding: 10px;
    /* box-shadow: 0px 0px 2px #ddd; */
    border:solid #f3efef;
    border-width: 0 .1rem .1rem 0;
}

.news-tabColor .nav-link {
        background: #75b777 !important;
        color: #fff;
        border-right: 1px solid #fff;
    }
.news-borderColor {
        border: 1px solid #75b777 !important;
    }
    .tab-pane{
        padding: 10px;
    }
</style>
