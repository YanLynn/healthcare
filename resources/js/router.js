import VueRouter from 'vue-router'
// Pages
import Home from './components/home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import Newsdetails from './components/Newsdetails';
import hospitalSearch from './components/hospitalSearch';
import JobApply from './components/JobApply';
import customerlist from './components/customerlist';
import JobSearchListComponent from './components/JobSearchListComponent';
import JobOfferComponent from './components/JobOfferComponent';
import job_details from './components/job_details';
import news_list from './components/news_list';
import create_news from './components/create_news';
import categorylist from './components/categorylist';
import createcategory from './components/createcategory';
import FacilitiesListComponent from './components/FacilitiesListComponent';
import CreateFacilityComponent  from './components/CreateFacilityComponent';
import custedit from './components/custedit';
import CustomerSearchListComponent from './components/CustomerSearchListComponent';
import map from './components/map';
import EditFacilityComponent from './components/EditFacilityComponent';
import editcategory from './components/editcategory';
import createcustomer from './components/CreateCustomer';
import joboffercreate from './components/JobOfferCreate';
import editPost from './components/editNewsPost';
import Profile from './components/Profile';
import hosProfile from './components/hosProfile';
import nusProfile from './components/nusProfile';
import JobOfferList from './components/JobOfferList';
import ProfilePublish from './components/ProfilePublish';
import advertisement from './components/advertisement';
import createmedicalacceptance from './components/createmedicalacceptance';
import medicalacceptancelist from './components/medicalacceptancelist';
import editmedicalacceptance from './components/editmedicalacceptance';
import userPasswordResetList from './components/userPasswordResetList';
import HospitalHistory from './components/HospitalHistory';
import favouriteHospital from './components/favouriteHospital';
import NursingHistory from './components/NursingHistory';
import HospitalProfile from './components/HospitalProfile';
import NursingProfile from './components/NursingProfile';
import VideoUpload from './components/VideoUpload';
import GoogleMap from './components/GoogleMap';
import type from './components/Type';
import typelist from './components/TypeList';
import advertisementlist from './components/advertisementlist';
import editadvertisement from './components/editadvertisement';
import comment from './components/Comment';
import commentlist from './components/commentlist';
import featurelist from './components/FeatureList';
import favouriteNursing from './components/favouriteNursing';
import passport from './components/passport';
import specialfeature from './components/CreateSpecialFeature';
//import hospitalfavouritemail from './components/hospitalfavouritemail';
import modal from './components/modal';
import nursingFavouriteMail from './components/nursingFavouriteMail';




// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
    }
  },
 
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  },
  // USER ROUTES
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      auth: true
    }
  },
  // ADMIN ROUTES
  {
    path: '/admin',
    name: 'admin.dashboard',
    component: AdminDashboard,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },

  {
    name: 'newdetails',
    path: '/newsdetails/:id',
    component: Newsdetails
},
   {
    name: 'hospital_search',
    path: '/hospital_search',
    component: hospitalSearch
   },
{
    name: 'jobapply',
    path: '/jobapply',
    component: JobApply
},
{
    name: 'customerlist',
    path: '/customerlist',
    component: customerlist,
    meta: { 
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
},
{
  name: 'customersearchlist',
  path: '/customersearchlist',
  component: CustomerSearchListComponent
},
{
    name: 'custedit',
    path: '/custsedit',
    component: custedit
  },
{
  name: 'jobsearchlist',
  path: '/jobsearchlist',
  component: JobSearchListComponent
},
{
  name: 'joboffer',
  path: '/joboffer',
  component: JobOfferComponent
},
{
    name: 'job_details',
    path: '/job_details/:id',
    component: job_details,

  },
  {
    name: 'news_list',
    path: '/news_list',
    component: news_list,
    meta:{
      auth:true
    }
  },
  {
    name: 'create_news',
    path: '/create_news',
    component: create_news,
    
  },
  {
    name: 'editPost',
    path: '/editPost',
    component: editPost,
    meta: { 
      auth: true
    }
  },
  {
    name: 'categorylist',
    path: '/categorylist',
    component: categorylist
},
{
  name: 'createcategory',
  path: '/createcategory',
  component: createcategory
},
{
  name: 'editcategory',
  path: '/editcategory',
  component: editcategory
},
{
name: 'facilitieslist',
path: '/facilitieslist',
component: FacilitiesListComponent
},
{
  name: 'createfacility',
  path: '/createfacility',
  component: CreateFacilityComponent
},

{
  name: 'editfacility',
  path: '/editfacility',
  component: EditFacilityComponent
},
{
  name:'createcustomer',
  path: '/createcustomer',
  component: createcustomer
},
{
  name : 'joboffercreate',
  path : '/joboffercreate',
  component : joboffercreate
},
{
  name: 'map',
  path: '/map',
  component: map
},
{
  name: 'profile',
  path: '/profile',
  component: Profile
},
{
  name: 'hos_profile',
  path: '/hos_profile',
  component: hosProfile
},
{
  name: 'nus_profile',
  path: '/nus_profile',
  component: nusProfile
},
{
  name: 'jobofferlist',
  path: '/jobofferlist',
  component: JobOfferList
},
{
  name: 'profilepublish',
  path: '/profilepublish',
  component: ProfilePublish
},
  {
  name: 'hospital_history',
  path: '/hospital_history',
  component: HospitalHistory
},
{
  name: 'createmedicalacceptance',
  path: '/createmedicalacceptance',
  component: createmedicalacceptance
},

{
  name: 'medicalacceptancelist',
  path: '/medicalacceptancelist',
  component: medicalacceptancelist
},

{
  name: 'editmedicalacceptance',
  path: '/editmedicalacceptance',
  component: editmedicalacceptance
},
{
  name: 'userPasswordResetList',
  path: '/userPasswordResetList',
  component: userPasswordResetList
},
{
    name: 'advertisement',
    path: '/advertisement',
    component: advertisement
  },

  {
    name: 'favouriteHospital',
    path: '/favouriteHospital',
    component: favouriteHospital
  },
  {
    name: 'favouriteNursing',
    path: '/favouriteNursing',
    component: favouriteNursing
  },
  {
    name:'type',
    path:'/type',
    component: type
  },
  {
    name:'typelist',
    path:'/typelist',
    component:typelist
  },

 {
     name: 'ads',
     path: '/ads',
     component: advertisementlist
 },
 {
     name: 'editadvertisement',
     path: '/editads',
    component: editadvertisement
},
{
  name: 'nursing_history',
  path: '/nursing_history',
  component: NursingHistory
},
{
  name: 'google_map',
  path: '/google_map',
  component: GoogleMap
},
{
  name: 'hospital_profile',
  path: '/hospital_profile',
  component: HospitalProfile
 },
{
  name: 'nursing_profile',
  path: '/nursing_profile',
  component: NursingProfile
 },  
{
name: 'videoupload',
path: '/videoupload',
component: VideoUpload
},
{
name: 'comment',
path: '/comment',
component: comment
},
{
name: 'commentlist',
path: '/commentlist',
component: commentlist
},
{
name: 'specialfeature',
path: '/specialfeature',
component: specialfeature
},
{
name: 'featurelist',
path: '/featurelist',
component: featurelist
},
{
name: 'nursingFavouriteMail',
path: '/nursingFavouriteMail',
component: nursingFavouriteMail
},
{
name: 'modal',
path: '/modal',
component: modal
},



]
const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})
export default router