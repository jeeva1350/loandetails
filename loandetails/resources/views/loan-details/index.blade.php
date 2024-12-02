@extends('layouts.app')
@section('content')
<div id="content" class="repots msters sttipge">
   <section id="floorplan">
      <div class="florplan recnt">
         <div class="container">
            <div class="flrpln clearfix">
               <div class="flrheds clearfix">
                  <div class="flrhed">
                     <h1>Loan Details</h1>
                  </div>
                  <div class="addbtn"><a href="{{route('loan-details.create')}}">Add</a></div>
               </div>
               <div class="actvty7">
                  <table class="actvtytbl blck" >
                     <thead>
                        <tr>
                           <th>Client Id</th>
                           <th>Number of Payments</th>
                           <th>First Payment Date</th>
                           <th>Last Payment Date</th>
                           <th>Loan Amount</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody class="row_position">
                        @foreach($loan_details as $loan)
                        <tr>
                           <td>{{$loan->client_id}}</td>
                           <td>{{$loan->num_of_payment}}</td>
                           <td>{{$loan->first_payment_date}}</td>
                           <td>{{$loan->last_payment_date}}</td>
                           <td>{{$loan->loan_amount}}</td>
                           <td>
                              <div class="actv7">
                                 <a href="{{route('loan-details.show',$loan->id) }}" class="edit">Edit</a>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection

