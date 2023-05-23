<x-dashboard :title="$title">
@include('partials._topBar')
@include('partials._sideBar')

@section('datatable-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
<br><br>
<div class="container mt-4">
    <h3>Server side datatable Using Ajax Laravel Pacakage Yajra </h3>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#AddBookModal">
        Add book
      </button>
      <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#noteModal">
        Add Note
      </button>
    <table class="table table-bordered data-table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div class="modal fade " id="AddBookModal" tabindex="-1" role="dialog" aria-labelledby="AddBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHeading">Create Book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @include('alerts.create-modal')
        <div class="modal-body">
            <div class="alert-danger"></div>
                <form id="bookForm" name="bookForm" class="form-horizontal ">
                   <input type="hidden" name="book_id" id="book_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-12">
                            <input type="text" id="title" name="title" class="form-control"  placeholder="Enter Title" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Author</label>
                        <div class="col-sm-12">
                            <input type="text" id="author" name="author "class="form-control" placeholder="Enter author">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="saveBtn" name="saveBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

          </div>
        </div>
      </div>
      {{-- Model 1 --}}
      <div class="modal fade " id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalHeading">Create Note</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            @include('alerts.create-modal')
             <div class="modal-body">
                    <div class="alert-danger"></div>
                        <form id="bookForm" name="bookForm" class="form-horizontal ">
                        <input type="hidden" name="book_id" id="book_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" id="title" name="title" class="form-control"  placeholder="Enter Title" maxlength="50" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Author</label>
                                <div class="col-sm-12">
                                    <input type="text" id="author" name="author "class="form-control" placeholder="Enter author">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="saveBtn" name="saveBtn" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
              </div>
            </div>
          </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/alerts.js') }}"></script>

<script>
    // Server Side Datatable 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.books') }}",
        columns: [
            {data: 'title', name: 'title'},
            {data: 'author', name: 'author'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     // End Server Side Datatable 

    // /*******//  Insert Ajax Form /*******/
    $('#saveBtn').click(function (e) {
    e.preventDefault();
    var saveBtn = $(this); // Store the save button reference
    saveBtn.html('Saving...');

    $.ajax({
        url: "{{ route('book.store') }}",
        type: "POST",
        dataType: 'json',
        data: $('#bookForm').serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            var show = $('.modal').hasClass('show');
            if (show) {
                // Perform actions when the modal is open
                console.log("Clicked on modal");
            } else {
                console.log("Modal is closed");
            }
            $('#bookForm').trigger("reset");
            table.draw();
        },
        error: function (data) {
            // Handle error response if needed
        },
        complete: function () {
            saveBtn.html('Save Changes'); // Restore the save button text
        }
    });
});
    //*******/ End Ajax Form /*******/

     //*******/  Edit Ajax Form /*******/
   $('body').on('click', '.editBook', function () {
    var book_id = $(this).data('id');
    $.get("{{ url('admin/books/') }}/" + book_id + '/edit', function (data) {
        $('#modelHeading').html("Edit Book");
        $('#saveBtn').val("edit-book");
        $('#AddBookModal').modal('show');
        $('#book_id').val(data.id);
        $('#title').val(data.title);
        $('#author').val(data.author);
    });
});
     //*******/End Edit Ajax Form /*******/

      //*******/  Delete Ajax Form /*******/
        $('body').on('click', '.deleteBook', function () {
        var book_id = $(this).data("id");
        if(confirm("Are You sure want to delete !"))
        {
        $.ajax({
        type: "DELETE",
        url: "{{ url('admin/books/delete') }}"+'/'+book_id,
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
        alertDanger("Book is deleted");
        table.draw();
        },
        error: function (data) {
        console.log('Error:', data);
        }
        });
        }
        });
       //*******/End Delete Ajax Form /*******/
</script>
</x-dashboard>