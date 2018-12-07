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
          <form role="form"  @submit.prevent="SendData()">
          <div class="form-group">
          <label>Contact Type</label>
    <select  class="form-control" id="e1" v-model="Contact_Type">
    <option value="">....</option>
        <option value="Right Party Contact">Right Party Contact</option>
        <option value="Third Party Contact">Third Party Contact</option>
        <option value="Temporary Not Contacted">Temporary Not Contacted</option>
    </select>
    </div>
    <br>
    <div class="form-group">
    <label>Contact Status</label>
    <select class="form-control" v-model="Contact_Status">
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
  <div class="form-group">
  <label>Promise To Pay Date</label>
  <input type="text" class="form-control" id="PTP Date"  placeholder="PTP Date" v-model="PTP_date">

</div>
<div class="form-group">
<label>Next Call Date</label>
<input type="text" class="form-control" id="Call Date"  placeholder="Next Call Date" v-model="Call_date">

</div>


    <span>selected: {{Contact_Type}} ,{{Contact_Status}} ,{{reason}} ,{{PTP_amount}}</span><br><hr>
    <button type="submit"  class="btn btn-primary"><i class="fa fa-paper-plane"></i> Update</button>
    </form>


        </div>
        <div class="modal-footer">
        <ul class="list-group alert alert-success" v-if='message'>
          <li class="list-group-item">{{message}}</li>
        </ul>
        <button type="button" class="cancel" data-dismiss="modal">Close</button>

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
Contact_Type:"",
Contact_Status:"",
reason:"",
PTP_amount:"",
PTP_date:"",
Call_date:"",
message:""




}
},
methods:
{
SendData(){
axios.post('http://localhost/skywave/public/call',{
Contact_Type:this.Contact_Type,
Contact_Status:this.Contact_Status,
reason:this.reason,
PTP_amount:this.PTP_amount,
PTP_date:this.PTP_date,
Call_date:this.Call_date
}).then(res=>{
console.log(res)
this.message='call details has been succefully updated'
}).catch(error=>{
console.log(error)
})
}
},

computed: {
  setOptions: function(){
    if (this.Contact_Type === 'Right Party Contact'){
       var options = [{val: 'Promise to Pay', text: 'Promise To pay'},
                      {val: 'Negotiation in progress', text: 'Negotiation in progress'},
                      {val: 'Non commital', text: 'Non commital'},
                      {val: 'Inability To Pay', text: 'Inability To Pay'},
                        {val: 'Debt Cleared', text: 'Debt Cleared'}
                      ]
    } else if (this.Contact_Type === 'Third Party Contact'){
       var options = [{val: 'Debtor Not Around', text: 'Debtor Not Around'},
                      {val: 'Debtor Dead', text: 'Debtor Dead'},
                      {val: 'New Line', text: 'New Line'},
                      {val: 'Debtor Sick', text: 'Debtor Sick'}
                      ]
    } else if (this.Contact_Type === 'Temporary Not Contacted'){
       var options = [{val: 'Ringing No Response', text: 'Ringing No Response'},
                      {val: 'Phone Switched Off', text: 'Phone Switched Off'},
                      {val: 'Hanged Up', text: 'Hanged Up'}]
    }
    return options
  }
}
}

</script>
