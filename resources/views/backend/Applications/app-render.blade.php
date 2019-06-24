@php 
    $i = 1;
@endphp
@forelse($applications as $application)
    @if(Auth::user()->can('view',  $application) || Auth::user()->hasRole('Admin'))
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $application->from_city->name_ru }}</td>
            <td>{{ $application->to_city->name_ru }}</td>
            <td>
                {{ $application->from_fio }}
                <span class="badge badge-dark"><b>{{ $application->from_phone }}</b></span>
            </td>
            <td>
                {{ $application->to_fio }}
                <span class="badge badge-dark"><b>{{ $application->to_phone }}</b></span>
            </td>
            <td>
                @if($application->cost_from_courier == null)
                    <span><i class="fa fa-minus-circle text-danger"></i></span>
                @else
                    <span><i class="fa fa-check-circle text-success"></i></span>
                @endif
            </td>
            <td>
                @if($application->cost_to_courier == null)
                    <span><i class="fa fa-minus-circle text-danger"></i></span>
                @else
                    <span><i class="fa fa-check-circle text-success"></i></span>
                @endif
            </td>
            <td data-toggle="modal" class="status-application" data-target="#statusModal" data-url="{{ route('applications.update', ['application' => $application]) }}" style="cursor: pointer">
                @if($application->status == 1)
                    <span class="badge badge-warning"><b>На исполнено</b></span>
                @elseif($application->status == 2)
                    <span class="badge badge-success"><b>Исполнено</b></span>
                @elseif($application->status == 3)
                    <span class="badge badge-danger"><b>Просрочка</b></span>
                @endif
            </td>
            <td>
                <b>{{ $application->operator->username }}</b>
            </td>
            <td>
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('applications.show', ['application' => $application]) }}" class="btn blue">
                        <i class="fa fa-print"></i>
                    </a>
                    @can('edit', $application)
                        <a href="{{ route('admin.first-step-edit', ['application' => $application]) }}" class="btn blue" >
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @role('Admin')
                        <a class="btn blue remove-application" data-toggle="modal" data-target="#myModal" data-url="{{ route('applications.destroy', ['application' => $application]) }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    @endrole
                </div>
            </td>
        </tr>
    @endif
@empty
    <tr>
        <td class="text-center" colspan="10">No records in here :(</td>
    </tr>
@endforelse