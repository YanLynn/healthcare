<template>
<!--navigation bar-->
<nav class="navbar navbar-expand-lg navbar-dark main-header" id="nav">
  <a class="navbar-brand" href="#">
      <img src="/images/trust_growth.png" alt="">
 </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto col-lg-2 pad-free">
          <!--UNLOGGED-->
          <li class="nav-item btn login-register-btn col-lg-6 p-lr-0" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                  <router-link  :to="{ name : route.path }" :key="key">
                      {{route.name}}
                  </router-link>
              <!-- <a class="nav-link pad-free" href="{{ route('login') }}">{{ __('事業者 ログイン') }}</a> -->
          </li>
          <!--LOGGED USER-->
          <li v-if="$auth.check(1)" v-for="(route, key) in routes.user" v-bind:key="route.path" class="nav-item btn login-register-btn col-lg-6 p-lr-0">
                <router-link  :to="{ name : route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>
            <!--LOGGED ADMIN-->
            <li v-if="$auth.check(2)" v-for="(route, key) in routes.admin" v-bind:key="route.path" class="nav-item btn login-register-btn col-lg-6 p-lr-0">
                <router-link  :to="{ name : route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>
            <!--LOGOUT-->
            <li v-if="$auth.check()" class="nav-item btn login-register-btn col-lg-6 p-lr-0">
                <a href="#" @click.prevent="$auth.logout()">Logout</a>
            </li>
    </ul>
    <ul class="navbar-nav pad-free pc">
        <li class="fav-item fav-color btn all-btn m-r-10">
            <i class="fa fa-star m-r-5"> </i>&nbsp; 検討リスト
            <p style="display:flex; color:#fff;margin:5px;line-height:1.2em;">
            <span style="padding-right: 11px;">2件<br>病院</span>
            <span style="border-left: 1px solid #fff;padding-left: 11px;">5件<br>介護</span>
            </p>
        </li>
        <li class="fav-item history-color btn all-btn m-r-10" >
            <i class="fa fa-bookmark m-r-5"></i>&nbsp; 最近見た施設<!-- <span class="list">10</span>件<br>最近見た施設  -->
            <p style="display:flex; color:#fff;margin:5px;line-height:1.2em;">
                <span style="padding-right: 11px;">10件<br>病院</span>
                <span style="border-left: 1px solid #fff;padding-left: 11px;">9件<br>介護</span>
            </p>
        </li>
    </ul>
  </div>
  </nav>
  <!--end navigation bar-->

</template>
<script>
  export default {
    data() {
      return {
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Register',
              path: 'register'
            },
            {
              name: 'Login',
              path: 'login'
            }
          ],
          // LOGGED USER
          user: [
            {
              name: 'Dashboard',
              path: 'dashboard'
            }
          ],
          // LOGGED ADMIN
          admin: [
            {
              name: 'Dashboard',
              path: 'admin.dashboard'
            }
          ],
        
        }
      }
    },
    mounted() {

    },

  }
</script>