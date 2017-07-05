<div id="delete-event" class="modal fade" data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/event/delete" method="get">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Remove Event</h4>
                </div>
                <div class="modal-body">
                        <p>Are you sure you want to remove the <span class="event-name"></span> event?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->