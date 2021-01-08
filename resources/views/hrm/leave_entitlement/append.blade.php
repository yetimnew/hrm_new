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
                <th class="m-1 b-1" width="3%">Edit</th>
                <th class="m-1 b-1" width="3%">Delete</th>
                {{-- @endcan --}}


            </tr>
        </thead>
        <tbody>
            <?php $no = 0 ?>
            {{-- {{dd($leave_entitlements)}} --}}
            @if ($leave_entitlements->count() > 0)
            @foreach ($leave_entitlements as $le)
            <tr>
                <input type="hidden" class="deleted_value_id" value="{{$le->id}}">
                <td class='p-1'>{{++$no}}</td>
                <td class='p-1'>{{$le->personal->fullname}}</td>
                <td class='p-1'>{{$le->no_of_days}}</td>
                <td class='p-1'>{{$le->days_used}}</td>
                <td class='p-1'>{{$le->leave_type->name}}</td>
                <td class='p-1'>{{$le->leave_period->name}}</td>
                <td class='p-1'>{{$le->note}}</td>

                {{-- @can('driver edit') --}}
                <td class='p-1 text-center' data-toggle="tooltip" data-placement="top"
                    title="edit">
                    <a href="{{route('leave_entitlement.edit', $le->id)}}"><i
                            class="fas fa-edit"></i></a>
                </td>
                <td class='p-1 text-center' data-toggle="tooltip" data-placement="top"
                    title="delete">
                    <button id="delete_leave_entitlement" class="delete_leave_entitlement red"> <i
                            class="fas fa-trash" aria-hidden="true"></i></button>
                </td>
                {{-- @endcan --}}
            </tr>
            @endforeach
            @else
            <tr>
                <td class='m-1 p-1 text-center' colspan="15">No Data Avilable</td>
            </tr>
            @endif

        </tbody>
    </table>
</div>
