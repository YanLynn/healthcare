<template>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h4 class="page-header header">施設更新</h4>
            </div>
            <div class="col-md-12">
              <form @submit.prevent="updateFacility">
                <div class="form-group">
                  <label>
                    施設の種類:
                    <span class="error">*</span>
                  </label>
                  <input type="text" class="form-control" v-model="facility.description" placeholder="施設の種類を入力してください。"/>
                  <span v-if="errors.description" class="error">{{errors.description}}</span>
                </div>

                <div class="form-group ">   
                    <button class="btn main-bg-color white all-btn" @click="clickValidation()" > 更新する </button>
                    <router-link to="/facilitieslist" class="btn btn-danger all-btn">キャンセル</router-link>                                             
                    <!-- <router-link to="/facilitieslist" class="btn news-post-btn all-btn">更新</router-link>                                -->
                </div>
              </form>
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
      errors: {
        description:'',
      },
      facility: {
        description: ""
      }
    };
  },
  created() {
    this.axios
      .get(`/facility/edit/${this.$route.params.id}`)
      .then(response => {
        this.facility = response.data;
      });
  },

  methods: {
    updateFacility() {
       if( `${this.$route.params.id}` && this.errors.description == null ){
          this.axios.post(`/facility/update/${this.$route.params.id}`, this.facility).then(response => {
          this.description = "";
          this.$swal({
                      position: 'top-end',
                      type: 'success',
                      title: '更新されました。',
                      // showConfirmButton: false,
                      // timer: 1500,
                      confirmButtonText: "はい",
                      confirmButtonColor: "#6cb2eb",
                      width: 250,
                      height: 200,

                    })
          // alert("Successfully Updated!");
          this.$router.push({ name: "facilitieslist" });
        }).catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
      
       }
    },
    clickValidation(){
      if(this.facility.description){
        this.$swal({
                            title: "確認",
                            text: "更新よろしいでしょうか。",
                            type: "success",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#6cb2eb",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "更新",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                        }).then(response => { 
                        
                          this.errors.description = null;
                            this.updateFacility();
                        })
              } else {
                        this.errors.description = " 施設の種類が必須です。";
              }
               if (
                        !this.errors.description
                        
                    ) {
                        this.updateFacility();
                    }
    }
  }
};
</script>


