@extends('layouts.admin.adminMaster')

@section('content')
    <h3>Events</h3>
    <br>
    <?php echo Session::get('message'); ?>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <th>#</th>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Event Time</th>
            <th>Event Location</th>
        </thead>
        <tbody>
            @forelse ($events as $event)
                <tr data-id="{{$event->id}}"
                    data-name="{{$event->name}}"
                    data-date="{{$event->date}}"
                    data-time="{{$event->time}}"
                    data-location="{{$event->location}}">

                    <td>
                        <a class="edit-event" data-toggle="modal" data-target="#edit-event" href="#"><i class="fa fa-pencil"></i></a>
                        <a class="delete-event" data-toggle="modal" data-target="#delete-event" href="#"><i class="fa fa-trash"></i></a>
                    </td>
                    <td>{{$event->name}}</td>
                    <td>{{date('M d Y', strtotime($event->date))}}</td>
                    <td>{{date('h:s:a', strtotime($event->time))}}</td>
                    <td>{{$event->location}}</td>
                </tr>
            @empty
                <td colspan="5">You have not added any events yet</td>
            @endforelse
        </tbody>
    </table>
    <button data-toggle="modal" data-target="#add-event" class="pull-right btn btn-success">Add Event</button>
    @include('admin.events.modals.add_event')
    @include('admin.events.modals.edit_event')
    @include('admin.events.modals.delete_event')
    <script>
        $(document).ready(function(){
            $('.edit-event').on('click', function(){
                var eventData = $(this).closest('tr').data();
                var form = $('#edit-event');

                for (var data in eventData) {
                    form.find('[name="' + data + '"]').val(eventData[data]);
                }
            });

            $('.delete-event').on('click', function(){
                var userData = $(this).closest('tr').data();
                var form = $('#delete-event');

                form.find('.event-name').text(userData['name']);
                form.find('form').attr('action', '/admin/events/delete/'+userData['id']);
            });
        });
    </script>
@stop