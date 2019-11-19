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