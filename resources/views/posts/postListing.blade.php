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
            <p>All Posts</p>
          </div>
          <div class="col-md-6 text-right">
            <a href="{{route('posts.create')}}" class="btn btn-primary btn-sm">Add New Post</a>
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
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Views</th>
                        <th>Comments</th>
                        <th>View</th>
                        <th>Edit</th>
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
          ajax: "{{ route('posts.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'title', name: 'title'},
              {data: 'user', name: 'user', render: function(data) {
                    return data.name;
                }},
              {data: 'price', name: 'price'},
              {data: 'views', name: 'views'},
              {data: 'comments', name: 'comments'},
              {data: 'view', name: 'view'},
              {data: 'edit', name: 'edit'},
              {data: 'delete', name: 'delete'},


          ]
      });
      
    });
</script>
  </html>
