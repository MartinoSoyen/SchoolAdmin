@extends('layouts.home')
@section('contenu')

<div id="content">
    <div class="panel">
      <div class="panel-body">
         <h2 class="col-md-offset-6">Enseignants</h2>
      </div>
    </div>
    <form id="customization">
      <input type="hidden" name="_token" id="csrfenseignant" value="{{Session::token()}}">

      <fieldset>
          <div class="form-group">
            <label for="matiere">Matière</label>
            <select class="form-control" required="required" id="matiere">
              @foreach($matieres as $matiere)
            <option value="{{ $classe->id }}">{{ $matiere->libellematiere }}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nomenseignant">Nom</label>
            <input type="text" class="form-control" id="nomenseignant" name="nomenseignant" required="required">
          </div>

          <div class="form-group">
            <label for="prenomenseignant">Prénoms</label>
            <input type="text" class="form-control" name="prenomenseignant" id="prenomeleve" required="required">
          </div>

          <div class="form-group">
            <label for="datenaissanceenseignant">Date de naissance</label>
            <input type="date" class="form-control" name="datenaissanceenseignant" id="datenaissance" required="required">
          </div>

          <div class="form-group">
            <label for="sexe">Sexe</label>
            <select class="form-control" required="required" name="sexe" id="sexe">
            <option>M</option>
            <option>F</option>
            </select>
          </div>

          <div id="mesBouttons" class="justify-content-center">
            <!-- <input type="" class="btn btn-primary" id="envoyer"> -->
            <button class="btn btn-info" type="" onclick="submitenseignant(event)">Enregistrer</button>
            <button class="btn btn-danger" type="reset">Annuler</button>
        </div>
        <br>
        <style>
          #customization{
            margin-left: 20px;
            margin-right: 20px;
          }
          #mesBouttons{
            margin-left:70px;
            margin-bottom:10px;
          }
          #envoyer{
            margin-right:10px;
            }
        </style>
      </fieldset>
    </form>
    <!-- </form> -->
</div>

<script type="text/javascript">

 function submitenseignant(e) {
  e.preventDefault();
      var nomenseignant = $('#nomenseignant').val();
      var prenomenseignant = $('#prenomenseignant').val();
      var datenaissanceenseignant = $('#datenaissanceenseignant').val();
      var sexe = $('#sexe').val();

      if(nomenseignant == "" || prenomenseignant == "" || datenaissanceenseignant == "" || sexe == "")
        $.alert("Veuillez renseigner tous les champs avant l'enregistrement", {
            autoClose:true,
            closeTime: 3000,
            type: 'danger',
            position: ['center', [-0.42, 0]],
            title: false,
            speed: 'normal',
            animation: true,
            animShow: 'fadeIn',
            animHide: 'fadeOut'
          });

      else{
        $.ajax({
          url: "/saveenseignant",
          type: "POST",
          data: {
              nomenseignant: nomenseignant,
              prenomenseignant: prenomenseignant,
              datenaissanceenseignant: datenaissanceenseignant,
              sexe: sexe,
              _token: $("#csrfenseignant").val()
          },
          dataType: 'html',
          success : function(code_html, statut){
           // code_html contient le HTML renvoyé
            $.alert("L'enseignant "+nomenseignant+" "+prenomenseignant+" a été inscrit avec succès", {
              autoClose:true,
              closeTime: 3000,
              type: 'warning',
              position: ['center', [-0.42, 0]],
              title: false,
              speed: 'normal',
              animation: true,
              animShow: 'fadeIn',
              animHide: 'fadeOut'
            });

            $('#nomenseignant').val("");
            $('#prenomenseignant').val("");
            $('#datenaissancessanceenseignant').val("");
            $('#sexe').val();
          }
        })
      }
    }
</script>
@endsection
