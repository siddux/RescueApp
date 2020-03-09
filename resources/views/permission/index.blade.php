@extends('layouts.app')

@section('title', __('permissions_roles.permissions'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Language for dates - OPEN -->
    @php
        \Date::setLocale(Session::get('locale'));
    @endphp
    <!-- Language for dates - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <h3 class="margin-bottom-sm text-center">
                    {{__('permissions_roles.permissions')." ".__('permissions_roles.list')}}
                </h3>
            </div>
            <div class="col-sm text-right">
                <!-- Add user button - OPEN -->
                @include('buttons.add_permission')
                <!-- Add user button - CLOSE -->
            </div>
        </div>

        <!-- Users table - OPEN -->
        <table class="table dt-responsive nowrap table-hover text-center"
        id="users" style="width: 100%">

            <!-- Table header - OPEN -->
            <thead>
                <tr>
                    <th scope="col"> {{__('permissions_roles.display_name')}}</th>
                    <th scope="col"> {{__('permissions_roles.slug')}} </th>
                    <th scope="col"> {{__('forms.description')}} </th>
                    <th scope="col"> {{ __('actions.actions') }} </th>
                </tr>
            </thead>
            <!-- Table header - CLOSE -->

            <!-- Table content - OPEN -->
            <tbody>            
              @foreach($permissions as $permission)
              <tr>
                <td>{{ $permission->display_name }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->description }}</td>
                <td>
                    <!-- Edit Permission button - OPEN -->
                    @include('buttons.edit_permission')
                    <!-- Edit Permission button - CLOSE -->
                    <!-- Edit Permission button - OPEN -->
                    @include('buttons.delete_permission')
                    <!-- Edit Permission button - CLOSE -->
                </td>
              </tr>
              @endforeach
            </tbody>

        </table>
        <!-- Users table - CLOSE -->

    </div>
    <!-- Content - CLOSE -->

@endsection

<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<!-- JS -->
<script>

    $(document).ready(function() {

        // settings tables
        $.extend( $.fn.dataTable.defaults, {
            "scrollX": true,
            "scrollY": true,
            "pagingType": "full_numbers",
            "responsive": true,
            "order": [ 0, "asc" ],
            "language": {
                "decimal":        "",
                "emptyTable":     "{{ __('tables.emptyTable') }}",
                "info":           "{{ __('tables.info') }}",
                "infoEmpty":      "{{ __('tables.infoEmpty') }}",
                "infoFiltered":   "{{ __('tables.infoFiltered') }}",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "{{ __('tables.lengthMenu') }}",
                "loadingRecords": "{{ __('tables.loadingRecords') }}",
                "processing":     "{{ __('tables.processing') }}",
                "search":         "{{ __('tables.search') }}",
                "zeroRecords":    "{{ __('tables.zeroRecords') }}",
                "paginate": {
                    "first":      "{{ __('tables.first') }}",
                    "last":       "{{ __('tables.last') }}",
                    "next":       "{{ __('tables.next') }}",
                    "previous":   "{{ __('tables.previous') }}",
                },
                "aria": {
                    "sortAscending":  "{{ __('tables.sortAscending') }}",
                    "sortDescending": "{{ __('tables.sortDescending') }}",
                }
            }
        });

        // initialize tables
        var users_table  = $('#users').DataTable();

    });

</script>