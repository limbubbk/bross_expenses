@extends('layouts.app')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid">
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
    <div class="row justify-content-center ">
        <div class="col-md-6  mb-4">
            <div class="card">
                <div class="card-header"><label for="" class="text-success fs-3">Update Expenses Entry</label> <label class="float-end text-primary"> <a href="{{route('home')}}" class="nav-link"><button class="btn btn-primary">Back</button></a></label></div>
                <div class="card-body">
                    <form action="{{route('expense.update',$demo->id)}}" method="POST">
                      @csrf
                        <div class="row">
                            <div class="col-md-6">
                          
                                <label for="exampleInputEmail1" class="form-label fs-5"> User : {{$demo->role_name}}</label>
                              <div class="mb-3">
                               
                                  <select class="form-select form-select-md mb-3" name="user"  aria-label=".form-select-lg example" >
                                     
                                      <option value=" {{$demo->role_name}}"> {{$demo->role_name}} </option>
                                      <option value="Roshan ">Roshan </option>
                                      <option value="Bibek ">Bibek </option>
                                      <option value="Saroj ">Saroj </option>
                                   
                                    </select>
                                    
                                </div>
                              </div>
      
                            <div class="col-md-6">
                      
                        <label for="exampleInputEmail1" class="form-label fs-5">Category : {{$demo->category}}</label>
                        <div class="mb-3">                      
                        
                          <select class="form-select form-select-md mb-3" 
                           name="category" aria-label=".form-select-lg example">
                           <option> {{$demo->category}} </option>
                           <hr>
                            @foreach ($categories as $category)
                           
                            <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                        
                        </div>
                    </div>
                          
                         <div class="col-12">
                        
                          <label for="exampleInputEmail1" class="form-label fs-5">Description</label>
                        <div class="mb-3 form-floating">
                           
                            <textarea class="form-control" name="description"  >{{$demo->description}}</textarea>
                            
                          </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleInputEmail1"  class="form-label fs-5">Amount</label>
                                <input type="number" value="{{$demo->amount}}" class="form-control" name="amount" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                              </div>

                              
                         
                          <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fs-5">Date : {{$demo->extra_date}}</label>
                            <input type="date" class="form-control" value="{{$demo->extra_date}}" name="date" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                      </form>

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