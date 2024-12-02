@extends('layouts.app')
@section('content')
<div id="content" class="repots msters sttipge">
   <section id="floorplan">
      <div class="florplan recnt">
         <div class="container">
            <div class="flrpln clearfix">
               <div class="flrheds clearfix">
                  <div class="flrhed">
                     <h1>Emi Details</h1>
                  </div>
                  <div class="addbtn">
                     <a href="{{ route('emi-process') }}" >Process Data</a>
                  </div>
               </div>
               <div class="actvty7">
                  @if(!empty($emi_details))
                  <table class="actvtytbl blck">
    <thead>
        <tr>
            <th>Client Id</th>
            <!-- Dynamically generate month columns only if the month exists in the EMI details -->
            @foreach($months as $month)
                <!-- Check if any $emi has the month data -->
                @if($emi_details->contains(function ($emi) use ($month) {
                    return isset($emi->$month) && !is_null($emi->$month);
                }))
                    <th>{{ str_replace('_', ' ', $month) }}</th>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody class="row_position">
        @foreach($emi_details as $emi)
        <tr>
            <td>{{ $emi->client_id }}</td>
            <!-- Dynamically display EMI data for each month -->
            @foreach($months as $month)
                <!-- Check if the data for the month exists in $emi -->
                @if(isset($emi->$month) && !is_null($emi->$month))
                    <td>{{ number_format($emi->$month, 2) }}</td>
                @endif
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

                  @endif
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection
