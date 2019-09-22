@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fas fa-boxes"></i> Liste des equipements</div>

                <div class="panel-body">
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#AddEquipement"><i class="fa fa-plus" ></i> Ajouter</a>
                <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
                   <hr>
                   <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="..." class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        </div>
                    </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="AddEquipement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un equipement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nom de l'equipement</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="machine 1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Marque de l'equipement</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="SAMSUNG">
                
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Modele de l'equipement</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="LR20">
                
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description de l'equipement</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Photo de l'equipement</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" >
                
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Fiche de documentation</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" >
                
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

