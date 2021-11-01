@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Experiences</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
        <td>id</td>
          <td>Title</td>
          <td>Description</td>
        </tr>
    </thead>
    <tbody>
        @foreach($experiences as $experience)
        <tr>
            <td>{{$experience->id}}</td>
            <td>{{$experience->title}}</td>
            <td>{{$experience->description}}</td>
            <td>
                <a href="{{ route('experiences.edit',$experience->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('experiences.destroy', $experience->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection