@extends('layouts.app')
  @section('content')
  <h1>Transactions</h1>
  <nav aria-label="...">
    <ul class="pagination pagination-lg" style="float:right;">
      <li>
        <button type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-chevron-left" ></span>
          <a href="<?php echo $_SERVER['PHP_SELF'].'?month='.($month == 1 ? 12 : $month -1).'&year='.($month == 1 ? $year - 1 : $year); ?>">Last Month</a>
        </button>
      </li>
      <li>
        <button type="button" class="btn btn-default">
          <a href="<?php echo $_SERVER['PHP_SELF'].'?month='.($month == 12 ? 1 : 1 + $month).'&year='.($month == 12 ? 1 + $year : $year); ?>">Next  Month</a>
          <span class="glyphicon glyphicon-chevron-right" ></span>
        </button>
      </li>
    </ul>
  </nav>

  <table class="table table-striped table-bordered">
    <tr>
      <td>Guest Name</td>

      @if($date < 31)
        <?php
          $date = $date;
        ?>
      @endif

        @for($day= 1; $day <= 31; $day++)
        <?php
        $d =  strtotime("$year-$month-$day");
        echo "<td = id '".date('y-m-d', $d)."'>"
                .date('Md', $d) ."<br>". date('D', $d)
            ."</td>";
        $id = date('y-m-d', $d);

        ?>
        @endfor
        <td><b> Total </b></td>
      </tr>

    @foreach ($guests as $guest)
    <tr>
      <td><strong>{{$guest->last_name}}&nbsp;&nbsp;{{$guest->first_name}}</strong></td>

      @if($date < 31)
        <?php
          $date = $date;
          $total = array();
        ?>
      @endif
        @for($day= 1; $day <= 31; $day++)
          <?php
          $d =  strtotime("$year-$month-$day");
          echo "<td> B/D  </td>"; // (will show the transaction of the guest) echo "<td = id '".date('y-m-d', $d)."'>"."</td>"; //-previous code
          ?>

        @endfor
        <td> total transaction </td> <!-- will show the total transaction of the guest for the whole month -->
    </tr>
    @endforeach
  </table>
@stop
