@extends('layouts.app')
@section('content')
<div id="content">
   <section id="edit">
      <div class="edits">
         <div class="container">
            <div class="edit7">
               <div class="edits7 clearfix">
                  <div class="flrhed">
                     <h1>+Add Loan Details</h1>
                  </div>
               </div>
               <form action="{{route('loan-details.new')}}" method="post" id="form" files="true" enctype="multipart/form-data">
                  <input type="hidden" name="auth_id" value="{{ Auth::user()->id }}"/>
                  @csrf
                  @if(!empty($item))
                  <input type="hidden" name="item_id" value="{{ $item->id }}"/>
                  @endif
                  <div class="fodcontd">
                     <div class="lnkks">
                        <ul class="fodcateg">
                           <li class="selts"><a href="" data-sects="0">Loan Details</a></li>
                        </ul>
                     </div>
                     <div class="bakrest ptops">
                        <div class="fods">
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Client Id</label>
                                 <div class="edtfld2">
                                    <input type="text" class="txt7bx form-control" name="client_id" placeholder="Client Id" value="{{ !empty($item) ? $item->client_id : ''}}" required>
                                 </div>
                              </div>
                           </div>
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Number of payment</label>
                                 <div class="edtfld2">
                                    <input type="text" class="txt7bx form-control" name="num_of_payment" placeholder="Number of payment" value="{{ !empty($item) ? $item->num_of_payment : ''}}" required>
                                 </div>
                              </div>
                           </div>
                           
                              <div class="edtro">
                                 <div class="edtclm">
                                    <label for="" class="lbl">First Payment Date</label>
                                    <div class="edtfld2">
                                       <input type="date" class="txt7bx form-control" name="first_payment_date" placeholder="First Payment Date" value="{{ !empty($item) ? $item->first_payment_date : ''}}" required>
                                    </div>
                                 </div>
                              </div>
                              <div class="edtro">
                                 <div class="edtclm">
                                    <label for="" class="lbl">Last Payment Date</label>
                                    <div class="edtfld2">
                                       <input type="date" class="txt7bx form-control" name="last_payment_date" placeholder="Last Payment Date" value="{{ !empty($item) ? $item->last_payment_date : ''}}" required>
                                    </div>
                                 </div>
                              </div>
                           <div class="edtro">
                              <div class="edtclm">
                                 <label for="" class="lbl">Loan Amount</label>
                                 <div class="edtfld2">
                                    <input type="text" class="txt7bx form-control" name="loan_amount" placeholder="Loan Amount" value="{{ !empty($item) ? $item->loan_amount : ''}}" required>
                                 </div>
                              </div>
                           </div>
                                 
                        </div>
                        
                        </div>
                        
                        <div class="edtro fodsout">
                           <div class="edtclm3">
                              <div class="edtbtns clearfix">
                                 <div class="amtantn">
                                    <input type="submit" class="smits7" value="submit">
                                 </div>
                                 <a href="{{route('loan-details') }}" class="back7">back</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>
=
<script src="{{ asset('js/vendor/jquery-3.7.0.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{ asset('js/jquery.validate.min.js')}}"></script>

<script>
   $(document).ready(function() {
       $('#form').validate({
           rules: {
               name: {
                   required: true
               }
           }
       });
   });
   $('input[name="status"]').on("change", function() {
       if ($(this).is(':checked')) {
           $(this).val("1");
       } else {
           $(this).val("0");
       }
   });
   
   
</script>
<script>
   $(".fodcateg > li > a").click(function(e) {
       e.preventDefault();
       $('.fodcateg > li').siblings().removeClass('selts');
       $(this).parent().addClass("selts");
       $('.fods').hide();
       $('.bakrest > div:eq(' + Number($(this).data('sects')) + ')').show();
   });
   function readURL(input, targetId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#' + targetId).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
   }
   $(document).ready(function() {
    $(".chosen-select").chosen({ width: "100%" }).on('chosen:ready change', adjustHeight);

    function adjustHeight() {
        var count = $(".chosen-select").val() ? $(".chosen-select").val().length : 0;
        var newHeight = Math.min(count * 5 + 38, count > 15 ? 1000 : 100);
        $(".chosen-container-multi .chosen-choices").css('height', newHeight + 'px');
    }

    $(".chosen-select").trigger("chosen:updated");
    adjustHeight();
});
</script>

@endsection