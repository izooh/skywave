<template>
<div>

<!-- Modal -->
<div id="callModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header login-header">
      <button type="button" class="close" data-dismiss="modal">×</button>
      <h4 class="modal-title">Update call Information</h4>
          </div>
          <div class="modal-body">
          <form>
          <div class="form-group">
          <label>Contact Type</label>
    <select  class="form-control" id="e1" v-model="selectbox1">
    <option value="">....</option>
        <option value="Right Party Contact">Right Party Contact</option>
        <option value="Third Party Contact">Third Party Contact</option>
        <option value="Temporary Not Contacted">Temporary Not Contacted</option>
    </select>
    </div>
    <br>
    <div class="form-group">
    <label>Contact Status</label>
    <select class="form-control" v-model="selectbox2">
        <option v-for="option in setOptions" v-bind:value="option.val">{{option.text}}</option>
    </select>
    </div>
    <br><br>
    <div class="form-group">
    <label>Non Payment Reason</label>
<select  class="form-control" v-model="reason">
  <option value="">....</option>
  <option value="Lost Job">Lost Job</option>
  <option value="Low Funds">Low Funds</option>
  <option value="Debtor Sick">Debtor Sick</option>
</select>
</div>
    <div class="form-group">
    <label>Promise To Pay Amount</label>
    <input type="text" class="form-control" id="PTP amount"  placeholder="PTP Amount" v-model="PTP_amount">

  </div>

    <span>selected: {{selectbox1}} {{selectbox2}} {{reason}} {{PTP_amount}}</span>
    </form>


        </div>
        <div class="modal-footer">
        <div class="col-md-6">
            <button type="submit"  class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update</button>
</div>
        </div>
        </div>

    </div>
</div>
</div>
</template>
<script>
export default{
data(){
return{
selectbox1:"",
selectbox2:"",
reason:"",
PTP_amount:""



}
},
computed: {
  setOptions: function(){
    if (this.selectbox1 === 'Right Party Contact'){
       var options = [{val: 'Promise to Pay', text: 'Promise To pay'},
                      {val: 'Negotiation in progress', text: 'Negotiation in progress'},
                      {val: 'Non commital', text: 'Non commital'},
                      {val: 'Inability To Pay', text: 'Inability To Pay'}
                      ]
    } else if (this.selectbox1 === 'Third Party Contact'){
       var options = [{val: 'Debtor Not Around', text: 'Debtor Not Around'},
                      {val: 'Debtor Dead', text: 'Debtor Dead'},
                      {val: 'Commited', text: 'Commited'},
                      ]
    } else if (this.selectbox1 === 'desert'){
       var options = [{val: 'tiramisu', text: 'Tiramisu'},
                      {val: 'icecream', text: 'Icecream'},
                      {val: 'espresso', text: 'Espresso'}]
    }
    return options
  }
}
}

</script>
