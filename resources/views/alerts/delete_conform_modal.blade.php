<div class="modal" tabindex="-1" role="dialog" id="conform_delete_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Can you sure to went to delete</p>

      </div>
      <div class="modal-footer">
        <form action="" id="delete_form" method="post">
          @csrf

          <input type="hidden" name="_method" value="delete">
         <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>