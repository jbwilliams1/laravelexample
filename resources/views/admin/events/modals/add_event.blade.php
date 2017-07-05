<div id="add-event" class="modal fade" data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/events/add" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Event</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Event Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name"/>
                    </div>
                    <div class="form-group">
                        <label for="date">Event Date</label>
                        <input type="date" name="date" class="form-control" placeholder="Date"/>
                    </div>
                    <div class="form-group">
                        <label for="time">Event Time</label>
                        <input type="time" name="time" class="form-control" placeholder="Time"/>
                    </div>
                    <div class="form-group">
                        <label for="location">Event Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Location"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->