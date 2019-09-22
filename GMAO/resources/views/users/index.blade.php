@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-users"></i> Liste des utilisateurs</div>

                <div class="panel-body">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#AddUser"><i class="fa fa-plus" ></i> Ajouter</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nom de l'utilisateur</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="machine 1">
                </div>
                <div class="form-group">
                    
                </div>
                <div class="form-group">
                   
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description de l'equipement</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

