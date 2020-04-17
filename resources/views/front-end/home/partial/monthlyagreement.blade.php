<div class="modal fade" id="monthlyexampleModal{{ $subscriptionplan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical 
                Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at 
                Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a 
                Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable 
                source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of
                 Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular 
                 during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
            <form  method="post" action="{{ route('subscribe.plan') }}">
                @csrf
                <input type="hidden" name="price" value="{{ $subscriptionplan->price_per_month }}">
                <input type="hidden" name="plan_id" value="{{ $subscriptionplan->id }}">
                <input type="hidden" name="type" value="monthly">
                <input type="hidden" name="user_limit" value="{{ $subscriptionplan->user_limit }}">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck2" @change="isShowButton()">
                    <label class="form-check-label" for="exampleCheck2">Check me out</label>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  