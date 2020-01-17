@extends('layouts.app')

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Lazada Remittance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/upload" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="upload_user_id" value="{{ Auth::user()->id }}" />
          <input type="text" class="form-control" name="upload_name" placeholder="Enter File Name..." />
          <br />
          <input type="file" name="upload_file" />
          @csrf
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload File</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="container">
  <div class="col-md-24">
    <div class="card">
      @if (!isset(Auth::user()->name))
        <script>window.location="/login"</script>
      @endif
      <div class="card-header">
      Lazada Remittance

        <div class="float-right">
          @if (Auth::user()->id === 1)
            <div class="row">
              <div class="col-6">
                <a href="{{ route('register') }}"><button type="button" class="btn btn-secondary">
                  <i class="fas fa-plus"></i> Register
                </button></a>
              </div>
              <div class="col-6">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-plus"></i> Upload File
                </button>
              </div>
            </div>
          @else
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Upload File
          </button>
          @endif
        </div>
      </div>
      <form action="" method="POST">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
              <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Name..." />
            </div>
            <div class="col-sm-6">
              <input type="date" class="form-control" aria-describedby="emailHelp" />
            </div>
          </div>
          <br />
          <Button type="button" class="btn btn-primary btn-block"><i class="fas fa-search"></i> Filter</Button>
          <br />
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">File</th>
                <th scope="col">Date</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
              @if(count($remittance) > 1)
                @foreach($remittance as $row)
                <tr>
                  <th scope="row">{{$row->id}}</th>
                  <td>{{$row->file_name}}</td>
                  <td>{{$row->created_at}}</td>
                  <td><a href="{{ route('downloadfile', $row->id) }}"><Button type="button" class="btn btn-secondary btn-sm"><i class="fas fa-download"></i> Download</Button></a></td>
                </tr>
                @endforeach
              @else
                <p>No Remittance Data.</p>
              @endif
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
