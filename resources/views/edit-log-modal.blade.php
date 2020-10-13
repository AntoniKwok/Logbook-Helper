<div class="ui modal edit-logbook-modal">
    <div class="inner-edit-logbook-modal">
        <h2 class="header edit-logbook-header">Edit Log Book</h2>
        @if (isset($errors))
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach ($errors->all() as $error)
                    {{ $error }}</br>
                    @endforeach
                </div>
            @endif
        @endif

        <form action="{{ route('dashboard.updateLog') }}" method="post" id="edit-logbook-form">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input id='id' class='form-control' name='id' type="hidden" value="{{ old('date') }}" />

                    <div class="control-group">
                        <label class="control-label" for='date'>Date:</label>
                        <div class="controls"><input readonly id='date' class='form-control' name='date' type="date" value="{{ old('date') }}" /></div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='clock_in'>Clocked In:</label>
                        <div class="controls"><input id='clock_in' class='form-control' name='clock_in' type="time" value="{{ old('clock_in') }}" /></div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='clock_out'>Clocked Out:</label>
                        <div class="controls"><input id='clock_out' class='form-control' name='clock_out' type="time" value="{{ old('clock_in') }}" /></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="control-group">
                        <label class="control-label" for='activity'>Activity:</label>
                        <div class="controls"><input id='activity' class='form-control' name='activity' type="text" value="{{ old('activity') }}" /></div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for='description'>Description:</label>
                        <div class="controls"><textarea class='form-control' rows="5" id='description' name='description'>{{ old('description') }}</textarea></div>
                    </div>
                </div>
            </div>
            <div class="actions">
                <p><br><input type="submit" class="btn btn-xs btn-success approve" value="Submit"></p>
            </div>
        </form>
    </div>
</div>
