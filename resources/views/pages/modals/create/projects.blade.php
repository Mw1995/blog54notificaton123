
<!-- Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  

  <div class="modal-dialog" role="document">
    

    <div class="modal-content">

      {!! Form::open([ 'method' =>'POST' ,'action' => 'projectController@store']) !!}
        {{ csrf_field() }}
      

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>        
        <h4 class="modal-title" id="myModalLabel">Add new Project</h4>
      </div>


      <div class="modal-body">

       @include('pages.forms.projectForm')


      </div>



      <div class="modal-footer">
          <button class="btn btn-cyan submitbutton" type="submit"><i class="fa fa-flash"></i>&nbsp;ADD</button>
      </div>



      {!! Form::close() !!}


      <div class="success">
        
      </div>



    </div>
  </div>
</div>