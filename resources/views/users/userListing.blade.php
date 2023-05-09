<!DOCTYPE html>
<html>


@include('layouts.scripts')

<body>
  <!-- Navigation Bar -->
  @include('layouts.navBar')
  
  <!-- Cards Grid -->
  <div class="container">
    <div class='jumbotron'>
    <div class="row">
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif
        <div class="col-md-10 col-md-offset-1">
            <h2>All Users</h2>
            <hr> 
            <table class="table table-hover data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Change Role</th>
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
          ajax: "{{ route('allUsers') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'role', name: 'role', render: function(data) {
                    return data.name;
                }},
              {data: 'actions', name: 'actions'},

          ]
      });
      
    });
</script>
  
  </html>
