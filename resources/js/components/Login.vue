<template>
<div>

<!-- Modal -->
<div id="exampleModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header login-header">
      <button type="button" class="close" data-dismiss="modal">×</button>
      <h4 class="modal-title">Please Login</h4>
          </div>
          <div class="modal-body">
          <div class="container">
            <div class="card card-container">

                <form class="form-horizontal" role="form"  @submit.prevent="loginAttempt()" >

                      <div class="row">
                          <div class="col-md-3"></div>

                          <div class="col-md-6">
                              <h4>Input Your Credetials</h4>


                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-6">
                              <div class="form-group has-danger">
                                  <label class="sr-only" for="email">E-Mail Address</label>
                                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                      <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-envelope"></i></div>
                                      <input type="text" name="email" v-model="email"class="form-control" id="email"
                                             placeholder="you@example.com" required autofocus>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-control-feedback">
                                  <span class="text-danger align-middle">
                                      <i class="fa fa-close"></i> Example error message
                                  </span>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="sr-only" for="password">Password</label>
                                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                      <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                                      <input type="password" name="password" v-model="password" class="form-control" id="password"
                                             placeholder="Password" required>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-control-feedback">
                                  <span class="text-danger align-middle">
                                  <!-- Put password error message here -->
                                  </span>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-3"></div>
                          <div class="col-md-6" style="padding-top: .35rem">
                              <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                  <label class="form-check-label">
                                      <input class="form-check-input"  v-model="remember" name="remember"
                                             type="checkbox" >
                                      <span style="padding-bottom: .15rem">Remember me</span>
                                  </label>
                              </div>
                          </div>
                      </div>
                      <div class="row" style="padding-top: 1rem">
                          <div class="col-md-3"></div>
                          <div class="col-md-6">
                              <button type="submit" :disabled="!isValidLoginForm"   class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
                              <a class="btn btn-link" href="/password/reset">Forgot Your Password?</a>
                          </div>
                      </div>
                  </form>


            </div><!--card-container -->
        </div><!-- /container -->
        </div>
        <div class="modal-footer">

         <ul class="list-group alert alert-danger" v-if="errors.length > 0">
         <li class="list-group-item" v-for="error in errors" :key="errors.indexOf(error)">
         {{error}}
         </li>
         </ul>
        </div>
        </div>

    </div>
</div>
</div>
</template>

<script>
import axios from 'axios'
export default{
data(){
return{
email:'',
password:'',
remember:false,
errors:[]
}
},

methods:
{
ValidateEmail()
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
  {
    return (true)
  }
return(false)
},
loginAttempt(){
this.errors=[]
axios.post('http://localhost:8000/login',{
email:this.email,
password:this.password,
remember:this.remember
}).then(res=>
{
location.reload()
}).catch(error=>{
if(error.response.status==422)
{
this.errors.push('Invalid email or Password! try again')
}
else
{
this.errors.push('Oops! please refresh the page ninja')
}
})
}

      },
      computed:{
      isValidLoginForm()
       {
      return this.ValidateEmail() && this.password
      }
      }
    }
</script>
