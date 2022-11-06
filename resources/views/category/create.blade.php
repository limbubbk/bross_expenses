@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  mt-5">

        <a href="{{route('home')}}"><button class="btn btn-dark mb-3">Back</button></a>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">Add Category
            </div>
            <div class="card-body">
        <form action="{{route('category.store')}}" method="POST">
            @csrf
           
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Category Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
             
            </div>
           
            
            <button type="submit" class="btn btn-primary col-12 ">Save</button>
  
          </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3 ">
        <div class="card">
            <div class="card-header">List of  Category
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead">
                      <tr>
                       
                        <th scope="col">Category Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($categories as $cat)
                      <tr>
                    
                        <td>{{$cat->name}}</td>
                        <td>{{$cat->created_at->diffForHumans();}}</td>
                        <td > 

                          <a href="{{route('category.edit',$cat->id)}}" class="m-1"  data-toggle="tooltip" data-placement="top" title="Edit "><i class="bi bi-pencil-square text-info"></i></a>
   
                          <a href="{{route('category.delete',$cat->id)}}"class="m-1"  data-toggle="tooltip" data-placement="top" title="Delete" Onclick="return ConfirmDelete();"><i class="bi bi-archive text-danger"></i></a></td>
                      
                        </td>
                        
                      </tr>
                      @endforeach
                    </tbody>
                  
             </table>
             
            
             @if ($categories->links()->paginator->hasPages())
             <div class="mt-4 p-4 box has-text-centered">
                 {{ $categories->links() }}
             </div>
         @endif
        
            </div>
        </div>
    </div>
    </div>
</div>
@endsection



@section('script')    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


<script type="text/javascript">
//Delete script
function ConfirmDelete() {
return confirm("Are you sure you want to delete the Selected Category Data?");
}

//End Delete Script


</script>

<script>
  $(document).ready(function() {
      $(".alert").delay(3000).slideUp(300);
  });
  </script>
@endsection