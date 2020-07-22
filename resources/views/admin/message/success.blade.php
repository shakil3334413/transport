@if(session()->has('success'))
     <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none'">
              <i class="far fa-window-close"></i>
           </button>
        <span>{{session('success')}}</span>
    </div>
 @endif
