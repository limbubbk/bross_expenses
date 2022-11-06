@extends('layouts.app')

@section('content')
<div class="container">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
  @if ($message = Session::get('delete'))
  <div class="alert alert-danger">
      <p>{{ $message }}</p>
  </div>
@endif
    {{-- <div class="row ">
        <div class="col  mb-4">
          <a href="{{ route('register') }}" class="m-2 float-end" > <button class="btn btn-success">Register</button></a>
        </div>
    </div> --}}
    <div class="row ">
     
        <div class="col-md-7 col-sm-3 mb-2">
            <div class="card">
              
              <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand">Expenses Records</a>
                  <form class="d-flex" action="{{route('search')}}" method="GET" >
                 
                    <input class="form-control me-2" type="text"  name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </nav>
              {{-- demo --}}
              
                <div class="card-body">
              
                 <table class="table">
                  <thead class="thead">
                    <tr>
                    
                      <th scope="col">Category</th>
                      <th>Description</th>
                      <th>Amount</th>
                      <th>User</th>
                      <th scope="col">Created At</th>
                      <th scope="col-2" class="text-center">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($expenses as $expense )
                    <tr>
                  
                      <td>{{$expense->category}}</td>
                      <td> <textarea class="from-control">{{$expense->description}}</textarea></td>
                      <td>{{$expense->amount}}</td>
                      <td>{{$expense->role_name}}</td>
                      
                      <td>{{$expense->extra_date}}</td>
                     <td>
                      {{-- <a href="http://" class="m-1"  data-toggle="tooltip" data-placement="top" title="View Details"><i class="bi bi-eye text-success"></i></a> --}}

                       <a href="{{route('expense.edit',$expense->id)}}" class="m-1"  data-toggle="tooltip" data-placement="top" title="Edit "><i class="bi bi-pencil-square text-info"></i></a>

                       <a href="{{route('expense.delete',$expense->id)}}"class="m-1"  data-toggle="tooltip" data-placement="top" title="Delete" Onclick="return ConfirmDelete();"><i class="bi bi-archive text-danger"></i></a>
                    
                     </td>
                    </tr>
                    @endforeach
                  </tbody>
                
           </table>
           
          
           @if ($expenses->links()->paginator->hasPages())
           <div class="mt-4 p-4 box has-text-centered">
               {{ $expenses->links() }}
           </div>
       @endif
                </div> 
            </div>
            <div class="">
           <center>
            <strong  class="fs-3 text-info">Total Amount :</strong >  <span  class="fs-3 text-danger ml-3">  Rs.</span> <label for="" class="fs-3 text-dark">
              {{$sum}}</label>
          </center>
        </div>
        </div>
    </div>
    <hr>

    {{-- calculation Part Start --}}
    
    <div class="row">
     
        <label for="" class="fs-1 text-danger">Search Bill Amount</label>
        <div class="col-3">
        <form action="">
         
            <label for="">Category</label> <label for="">
          <select class="form-select form-select-md mb-3" name="category" aria-label=".form-select-lg example">
                            
            @foreach ($categories as $category)
           
            <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
          </select>
        </label>
         
        </form>
      </div>

      <div class="col-3">  
        <form action="">
       
            <label for="">User</label>
            <label for="">
            <select class="form-select form-select-md mb-3" name="user"  aria-label=".form-select-lg example">
                                     
              <option value="Roshan ">Roshan </option>
              <option value="Bibek ">Bibek </option>
              <option value="Saroj ">Saroj </option>
           
            </select>
          </label>
       
        </form>
      </div>
      <div class="col-2">
        <button class="btn btn-danger">=</button>
      </div>
      <div class="col-2">
    <input class="form-control" placeholder="--------------------">
      </div>

    </div>

        {{-- calculation Part End --}}
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


<script type="text/javascript">
//Delete script
function ConfirmDelete() {
return confirm("Are you sure you want to delete the Selected Expense Data?");
}

//End Delete Script


</script>

<script>
  $(document).ready(function() {
      $(".alert").delay(3000).slideUp(300);
  });
  </script>
@endsection