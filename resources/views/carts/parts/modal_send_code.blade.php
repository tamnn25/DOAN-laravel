 <!-- Modal -->
 <div class="modal fade" id="modal-send-code" tabindex="-1" aria-labelledby="modal-send-code-label" aria-hidden="true">
    <div class="modal-dialog" >
      <div style="background-color: #124d3a8c;" class="modal-content">
        <div class="modal-header" style="background-color:white;text-align: center;">
          <h3  id="exampleModalLabel" >Send Code</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         @auth
         <div class="form-group p-2 mt-2 mb-2 border">
           <form action="{{ route('cart.send-verify-code') }}" method="POST" id="frm-send-verify-code">
             @csrf
             <strong><label for="" style="color:white;">Choose Method Send Code</label></strong><br>
             <input type="radio" name="code_type" value="1" id="send-code-type-1" checked><label for="send-code-type-1" style="color:white;"> Send Code to Mail</label><br>
             <input type="radio" name="code_type" value="2" id="send-code-type-2"><label for="send-code-type-2" style="color:white;"> Send Code to Phone</label><br>
             <button type="submit" class="btn btn-outline-primary" style="border-color: #28a745; ">Send Code</button>
           </form>
         </div>
         
         {{-- confirm send code --}}
         <div class="form-group  p-2 mt-2 mb-2 border">
           <form action="{{ route('cart.confirm-verify-code') }}" method="POST" id="frm-confirm-verify-code">
             @csrf
             <div class="form-group">
                <label for=""><strong style="color:white;">Code</strong></label>
                <input type="text" name="code" required>
             </div>
             <div class="form-group">
                <button class="btn btn-outline-primary" type="submit">Submit</button>
             </div>
          </form>
         </div>
         @endauth
 
         @guest
             <div class="account-info">
                <a class="btn btn-outline-primary" href="/login">Login</a>
                <a class="btn btn-outline-primary" href="/register">Regitser</a>
             </div>
         @endguest
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline-warning">Save changes</button>
        </div>
      </div>
    </div>
  </div>