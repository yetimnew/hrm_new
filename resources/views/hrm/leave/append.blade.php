<div class="table-responsive text-nowrap">
    <table class="table-sm table table-bordered table-sm table-striped" id="personales">
        <thead>
            <tr>
                <th class="m-1 b-1" width="3%">ተ/ቁ</th>
                <th class="m-1 b-1">ሙሉ ስም</th>
                <th class="m-1 b-1"> የፍቃድ ብዛት</th>
                <th class="m-1 b-1"> የተጠቀመው ፍቃድ</th>
                <th class="m-1 b-1"> የፍቃድ ዓይነት</th>
                <th class="m-1 b-1"> በጀት ዓመት</th>
                <th class="m-1 b-1"> ምርመራ</th>



            </tr>
        </thead>
        <tbody>
            <?php $no = 0 ?>
            {{-- {{dd($leave)}} --}}
            @if ($leaves->count() > 0)
            @foreach ($leaves as $le)
            <tr>
                {{-- <input type="hidden" class="deleted_value_id" value="{{$le->id}}"> --}}
                <td class='p-1'>{{++$no}}</td>
                <td class='p-1'>{{$le->personal->fullname}}</td>
                <td class='p-1'>{{$le->no_of_days}}</td>
                <td class='p-1'>{{$le->days_used}}</td>
                <td class='p-1'>{{$le->leave_type->name}}</td>
                <td class='p-1'>{{$le->leave_period->name}}</td>
                <td class='p-1'>{{$le->note}}</td>

             </tr>
            @endforeach

            @else

            <tr>
                <td class='m-1 p-1 text-center' colspan="15">No Data Avilable</td>
            </tr>
            @endif

        </tbody>
    </table>
    @if ($emp_details->count() > 0)
    {{-- {{dd( $emp_details[0]->name)}} --}}
    @foreach ($emp_details as $el)
        <ul class="list-group">
            <li class="list-group-item ">Avilable date = {{$el->no_of_days}}</li>
            <li class="list-group-item ">Used date = {{$el->days_used}}</li>
            <li class="list-group-item ">Remaining date = {{$el->remaing_date}}</li>
        </ul>
    @endforeach

    @endif


</div>
