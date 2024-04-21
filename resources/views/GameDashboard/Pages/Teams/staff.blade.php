<div class="staff_container">
    <table>
        <tr>
            <th>Name</th>
            <th>Profession</th>
            <th>Location</th>
        </tr>
        @foreach($team_data[1] as $staff)
            <tr>
                @switch($staff->profession)
                    @case(0)
                        @php $profession = "Scout" @endphp
                        @break;
                    @case(2)
                        @php $profession = "Coach" @endphp
                        @break;
                    @case(1)
                        @php $profession = "Physio" @endphp
                        @break;
                @endswitch
                <td>
                    <a href="{{ route("games.manage.staff.info", [$game['id'], $staff->name]) }}">
                        {{ $staff->name }}
                    </a>
                </td>
                <td>{{ $profession }}</td>
                <td>{{ $staff->location }}</td>
            </tr>
        @endforeach
    </table>
</div>

<style>
    .staff_container th{
        font-size: 20px;
    }
    .staff_container{
        color: white;
        overflow: hidden;
    }
    .staff_container table {
        width: 100%;
        margin-top: 30px;
        text-align: center;
    }
    .staff_container table td{
        padding: 7px 0;
        cursor: pointer;
    }
    .staff_container table td:hover{
        background-color: rgba(128, 128, 128, 0.3);
    }
</style>
