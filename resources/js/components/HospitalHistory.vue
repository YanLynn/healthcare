<template>
    <div>
        <div class="col-12 scrolldiv2 pb-3 tab-content" id="hospital">
            <div class="col-12 pl-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link to="/">ホーム</router-link>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">病院の歴史</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12">
                <div class="col-md-12 fav-his-header">
                    <svg x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                            <path d="M0,172v-172h172v172z" fill="none"></path>
                            <g fill="#c40000">
                                <path d="M86,15.0472l-78.83333,70.9528h21.5v64.5h59.44694c-1.3545,-4.54367 -2.11361,-9.3525 -2.11361,-14.33333h-43v-63.14225l43,-38.6888l57.61328,51.66439h21.22006zM136.19466,100.24935c-19.78717,0 -35.83333,16.04617 -35.83333,35.83333c0,19.78717 16.04617,35.83333 35.83333,35.83333c19.78717,0 35.83333,-16.04617 35.83333,-35.83333c0,-19.78717 -16.04617,-35.83333 -35.83333,-35.83333zM150.89193,119.24382l10.02213,10.03613l-28.30274,28.30274l-21.13606,-21.13607l10.02213,-10.03613l11.11393,11.11393z"></path>
                            </g>
                        </g>
                    </svg>
                    &nbsp;<span class="font-weight-bold"> 最近見た施設リスト</span>
                    &nbsp; <span class="job_count">{{his_hos}} 件</span>
                </div>
            </div>
            <div class="col-12 m-t-20" id="fav-history-page">
                <div class="row justify-content-lg-center">
                    <div class="card-carousel-wrapper">

                        <div class="nav-box" @click="moveCarousel(-1)" :disabled="atHeadOfList">
                            <div class="nav-content mr-2">
                                <div class="card-carousel--nav__left"></div>
                            </div>
                        </div>
                        <div class="card-carousel">
                            <div class="card-carousel--overflow-container">
                                <div class="card-carousel-cards col-3" :style="{ transform: 'translateX' + '(' + currentOffset + 'px' + ')'}">
                                    <div class="card-carousel--card">
                                        <div class="card-carousel--card--footer">

                                            <table class="table table-bordered">
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div class="profile_img_wrap">
                                                             <img class="profile_img" v-bind:src="'/upload/hospital_profile/' + hos_profile.logo" alt style="width: 250px"  @error="imgUrlAlt"/>
                                                        </div>
                                                       
                                                        <router-link :to="{name: 'profile', params: {cusid:hos_profile.customer_id, type: 'hospital'}}" class="pseudolink">{{hos_profile.name}}</router-link>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div class="profile_wd">
                                                            <button class="btn btn-danger all-btn hos-btn m-t-8 m-b-3" @click="deleteLocalSto(hos_profile.id)">最近見た施設リストから削除</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id" style="word-wrap: break-word;">
                                                        <div class="profile_wd"> <a :href="hos_profile.website" target="_blank">{{hos_profile.website}}</a></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                        <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                            <dl>
                                                                <dt class="text-left">診療時間</dt>
                                                            </dl>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr class="first-row">
                                                                        <th>日付</th>
                                                                        <th>午前</th>
                                                                        <th>午後</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="second-row text-center">月</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.mon}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.mon}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">火</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.tue}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.tue}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">水</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.wed}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.wed}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">木</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.thu}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.thu}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">金</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.fri}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.fri}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">土</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.sat}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.sat}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">日</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.sun}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.sun}}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <dl>
                                                            <dt class="text-left">住所</dt>
                                                            <dd class="profile_wd text-left m-l-10">{{hos_profile.township_name}} {{hos_profile.city_name}}</dd>
                                                        </dl>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <dl>
                                                            <dt class="text-left">交通アクセス</dt>
                                                            <dd class="profile_wd text-left m-l-10" v-html="hos_profile.access"></dd>
                                                        </dl>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <dl>
                                                            <dt class="text-left">電話番号</dt>
                                                            <dd class="profile_wd text-left m-l-10">{{hos_profile.phone}}</dd>
                                                        </dl>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div class="profile_wd text-left m-l-10">
                                                            <ul class="fac_container">
                                                                <h6 style="text-align:left;font-weight:bold;">特長</h6>
                                                                <li v-for="feature in hos_profile.special" :key="feature.id">{{ feature.short_name }}</li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <dl>
                                                            <dt class="text-left">診療科目</dt>
                                                            <dd v-for="sub in hos_profile.sub" :key="sub.id" class="profile_wd text-left m-l-10">{{sub.name}}</dd>
                                                        </dl>
                                                    </td>
                                                </tr>
                                                <tr>
                                                        <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                            <dl>
                                                                <dt class="text-left">専門医</dt>
                                                                <dd v-if="hos_profile.specialist != null">{{hos_profile.specialist}}</dd>
                                                                <dd v-else>-</dd>
                                                            </dl>
                                                        </td>
                                                    </tr>
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <dl>
                                                            <dt class="text-left">医療部</dt>
                                                            <dd class="profile_wd text-left m-l-10">{{hos_profile.medical_department}}</dd>
                                                        </dl>
                                                    </td>
                                                </tr>
                                                
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-box" @click="moveCarousel(1)" :disabled="atEndOfList">
                            <div class="nav-content ml-2">
                            <div class="card-carousel--nav__right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {

        data() {
                return {
                    his_hos:'',
                    hos_profiles: [],
                    specialfeature: [],
                    local_sto: "",
                    type: 'nursing',
                    specialfeature: [],
                    currentOffset: 0,
                    windowSize: 5,
                    paginationFactor: 267,
                };
            },
            computed: {
                atEndOfList() {
                        return this.currentOffset <= (this.paginationFactor * -1) * (this.hos_profiles.length - this.windowSize);
                    },
                    atHeadOfList() {
                        return this.currentOffset === 0;
                    },
            },
            created() {
                this.local_sto = localStorage.getItem("hospital_history");
                this.getAllCustomer(this.local_sto);
                if(this.local_sto){
                    this.his_hos = this.local_sto.split(",").length;
                }
            },
            methods: {

                moveCarousel(direction) {
                        // Find a more elegant way to express the :style. consider using props to make it truly generic
                        if (direction === 1 && !this.atEndOfList) {
                            this.currentOffset -= this.paginationFactor;
                        } else if (direction === -1 && !this.atHeadOfList) {
                            this.currentOffset += this.paginationFactor;
                        }
                    },
                    // changeRoute(){
                    //     this.$router.push({name:'home', params: {page:'subtab2'}});
                    // },
                    getAllCustomer: function(local_storage) {
                        this.axios
                            .post("/hospital_history/" + local_storage)
                            .then(response => {
                                console.log(response);
                                this.hos_profiles = response.data;
                            });
                    },
                    deleteLocalSto: function(id) {

                            this.$swal({
                            title: "確認",
                            text: "削除よろしいでしょうか",
                            type: "warning",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#dc3545",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "削除",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                        }).then(response => { 
                            var l_sto = this.local_sto;
                            var l_sto_arr = l_sto.split(",");
                            var rm_id = id.toString();
                            var index = l_sto_arr.indexOf(rm_id);
                            if (index > -1) {
                                l_sto_arr.splice(index, 1);
                                $("#hos-his-local").html(l_sto_arr.length);
                                if(l_sto_arr.length == 0){
                                    $('.his-hospital-link-box>a').css({'cursor':'not-allowed','pointer-events':'none'})
                                }
                                else{
                                    $('.his-hospital-link-box>a').css({'cursor':'pointer','pointer-events':'auto'})
                                }
                                var new_local = l_sto_arr.toString();
                                localStorage.setItem('hospital_history', new_local);
                                this.local_sto = localStorage.getItem("hospital_history");
                                // this.$swal({
                                // title: "削除された",
                                // text: "ファイルが削除されました。",
                                // type: "success",
                                // width: 350,
                                // height: 200,
                                // confirmButtonText: "はい",
                                // confirmButtonColor: "#dc3545"
                                // });
                                if (this.local_sto) {
                                    this.getAllCustomer(this.local_sto);
                                } else {
                                    // window.location.reload();
                                    this.$router.push({
                                        name: 'hospital_search',
                                        // params: {
                                        //     page: 'subtab3'
                                        // }
                                    });
                                }
                            }
                         });
                           
                            
                            if(this.local_sto){
                            this.his_hos = this.local_sto.split(",").length;
                            }
                     

                    },
                imgUrlAlt(event) {
                event.target.src = "images/noimage.jpg"
            }
            }
    };
</script>
<style>
    .first-row {
        color: #fff;
        background-color: #a2a7a1;
        border-bottom: 1px solid #ccc;
        border-right: 1px solid #ccc;
        text-align: center;
        padding: 10px;
        font-size: 100%;
    }

    .second-row {
        background-color: #eff7ec;
    }
</style>
