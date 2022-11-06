@extends('layouts.app')

@section('content')
<div class="container">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
<div class="row">
<div class="col mb-3">
  <a href="{{route('home')}}" class="float-end btn btn-primary"> Back Home</a>
</div>
</div>
    <div class="row ">
    
        <div class="col-md-5  mb-4">
            <div class="card">
                <div class="card-header"><label for="" class="text-success"> Expenses Entry</label> <label class="float-end text-primary"> <a href="{{route('category.index')}}" class="nav-link"><button class="btn btn-success">Create Category</button></a></label></div>
                <div class="card-body">
                    <form action="{{route('expense.store')}}" method="POST">
                      @csrf
                        <div class="row">
                            <div class="col-md-6">
                          
                                <label for="exampleInputEmail1" class="form-label fs-5"> User</label>
                              <div class="mb-3">
                               
                                  <select class="form-select form-select-md mb-3" name="user"  aria-label=".form-select-lg example">
                                     
                                      <option value="Roshan ">Roshan </option>
                                      <option value="Bibek ">Bibek </option>
                                      <option value="Saroj ">Saroj </option>
                                   
                                    </select>
                                    
                                </div>
                              </div>
      
                            <div class="col-md-6">
                      
                        <label for="exampleInputEmail1" class="form-label fs-5">Category</label>
                        <div class="mb-3">                      
                    
                          <select class="form-select form-select-md mb-3" name="category" aria-label=".form-select-lg example">
                            
                            @foreach ($categories as $category)
                           
                            <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                        
                        </div>
                    </div>
                          
                         <div class="col-12">
                        
                          <label for="exampleInputEmail1" class="form-label fs-5">Description</label>
                        <div class="mb-3 form-floating">
                           
                            <textarea class="form-control" name="description"  ></textarea>
                            
                          </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fs-5">Amount</label>
                                <input type="number" class="form-control" name="amount" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                              </div>

                              
                         
                          <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fs-5">Date</label>
                            <input type="date" class="form-control"  name="date" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                      </form>

                </div>
               
            </div>
        </div>
        <div class="col-md-7 col-sm-3 mb-2">
            <div class="card">
              
              <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand text-success"> Searched Expenses Records</a>
                  <form class="d-flex" action="{{route('search')}}" method="GET" role="search">
                    @csrf
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
                  @if($expenses->isNotEmpty())
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
        
          
           {{-- @if ($expenses->links()->paginator->hasPages())
           <div class="mt-4 p-4 box has-text-centered">
               {{ $expenses->links() }}
           </div>
       @endif
                  --}}
               
                </div>
                @else 
                  <div>
                    <h5 class="text-danger">No posts found</h5>
                 </div>
                @endif
              
            </div>
        </div>
    </div>
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