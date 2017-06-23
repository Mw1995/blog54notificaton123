


<div class="form-group">


    <div class="input-group">
 

      <div class="input-group-addon"> Name</div>
      {!!      Form::text('name',$value = null,['class'=>'form-control', 'placeholder'=>'Project Name'])      !!}
	
     </div>
	

</div>


<div class="form-group">


    <div class="input-group">


      <div class="input-group-addon">Creating Date</div>
       {!!      Form::date('dt_created',\Carbon\Carbon::now(),[ 'id'=>'datepicker','class'=>'form-control', 'placeholder'=>'creating date'])      !!}
  
     </div>
  

</div>



<div class="form-group">


    <div class="input-group">


      <div class="input-group-addon">Due Date</div>
       {!!      Form::date('dt_ended',\Carbon\Carbon::now(),[ 'id'=>'datepicker','class'=>'form-control', 'placeholder'=>'creating date'])      !!}
  
     </div>
  

</div>





<div class="form-group">


    <div class="input-group">


      <div class="input-group-addon">Description</div>
       {!!      Form::textarea('description',$value = null,['rows'=>'3','cols'=>'3'  , 'class'=>'form-control', 'placeholder'=>'description'])      !!}
	
     </div>
	

</div>











