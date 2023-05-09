<!DOCTYPE html>
<html>


@include('layouts.scripts')

<body>
  <!-- Navigation Bar -->
  @include('layouts.navBar')
  <div class='container'>
    <div class='jumbotron'>
        <div class="row">
          @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
          @endif
          <div class="col-md-6">
            <p>All Comments</p>
          </div>
        </div>
      </div>
      
  </div>
  <!-- Cards Grid -->
  <div class="container">
    <div class='jumbotron'>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>body</th>
                        <th>Author</th>
                        <th>Post</th>
                        <th>Dated</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

    
  </body>
  <script type="text/javascript">
    $(function () {
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('comments.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'body', name: 'body'},
              {data: 'user.name', name: 'user.name'},
              {data: 'title', name: 'title'},
              {data: 'dated', name: 'dated'},
              {data: 'delete', name: 'delete'},
          ]
      });
      
    });
</script>
  </html>
