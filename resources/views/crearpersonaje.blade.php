@extends('layouts.app')

@section('content')

@if (Route::has('login'))
@auth

<style>
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;
}

input {
  padding: 5px;
  display:inline-block !important;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 5px 10px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 25px;
  width: 25px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 100%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #dfb351;
}
.hijos
{
  margin-top:10px !important;
  margin-bottom:10px !important;
}

@media screen and (max-width: 320px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:50% !important;
    }
}

@media screen and (min-width: 375px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:42% !important;
    }
}

@media screen and (min-width: 424px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:37% !important;
    }
}

@media screen and (min-width: 427px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:28% !important;
    }
}

@media screen and (min-width: 768px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:21% !important;
    }
}

@media screen and (min-width: 1023px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:16% !important;
    }
}

@media screen and (min-width: 1439px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:12% !important;
    }
}

.quitar{
  display:none !important;
}

.poner{
  display:block  !important;
}

</style>

<form method="POST" action="{{route('registrar')}}">
    {!! csrf_field() !!}  
   <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center; margin-top:5px !important; margin-bottom:10px !important;">
    <span class="step">1</span>
    <span class="step">2</span>
    <span class="step">3</span>
  </div>
  
  <div class="container tab">
  <h1>Datos del personaje</h1>
    <div class="row">
      <div class="col-sm-12 text-center">
          <select name="raza" class="hijos" style="padding:5px !important; ">
            <option disabled selected value> -- Elija una raza -- </option>
            <option value="Humano">Humano</option>
            <option value="Elfo">Elfo</option>
            <option value="SemiElfo">SemiElfo</option>
            <option value="Orco">Orco</option>
            <option value="SemiOrco">SemiOrco</option>
            <option value="Enano">Enano</option>
            <option value="Gnomo">Gnomo</option>
            <option value="Mediano">Mediano</option>
          </select>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <input class="hijos" type="text" placeholder="Nombre del personaje"  name="nombrePersonaje">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <input class="hijos" type="text" placeholder="Apodo del personaje"  name="apodo">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <input class="hijos" type="text" placeholder="Altura personaje en metros"  name="altura">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <input class="hijos" type="number" placeholder="Edad" name="edad" min="1" max="110">
          <input class="hijos hijosv2" type="text" placeholder="Peso en kg" name="peso">
        </div>
    </div>
    <div class="row">    
          <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            <input type="radio" name="sexo" value="F"> Femenino<br>
            <input type="radio" name="sexo" value="M"> Masculino<br>
          </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <textarea class="hijos" name="personalidad" placeholder="Personalidad" id="personalidad" cols="28" rows="5"></textarea>
        </div>
    </div>
        <!-- <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
        
    <div class="form-group" style="width:200px !important; margin:auto !important;padding-bottom: 15px;" >
        <button class="btn btn-primary btn-block"  type="submit">Crear personaje</button>
    </div>
         -->
  </div>
  <div class="container tab">
   <h1>Clase y equipamiento</h1>
   <div class="row">
     <div class="col-sm-12 col-md-12 col-lg-12 text-center">
         <input class="hijos" type="number" placeholder="Nivel" name="nivel" min="0" max="100">
     </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <select name="clase" class="hijos" style="padding:5px !important;" onchange='annadirArmas(this.value),tipoArmadura(this.value)'>
            <option disabled selected value> -- Elija una clase -- </option>
            <option value="Barbaro">Barbaro</option>--
            <option value="Bardo">Bardo</option>
            <option value="Clérigo">Clérigo</option>-
            <option value="Druida">Druida</option>-
            <option value="Explorador">Explorador</option>
            <option value="Guerrero">Guerrero</option>--
            <option value="Hechicero">Hechicero</option>-
            <option value="Mago">Mago</option>-
            <option value="Monje">Monje</option>-
            <option value="Paladín">Paladín</option>--
            <option value="Pícaro">Pícaro</option>
          </select>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <select name="arma" class="hijos" id="selectArma" style="padding:5px !important;" disabled onchange='habilitarEscudo(this.value)'>
            <option disabled selected> -- Elija un arma-- </option>
            <!--<option value="Espadas">Espadas</option>
            <option value="Hachas">Hachas</option>
            <option value="Mazas">Mazas</option>
            <option value="Mandoble">Mandoble</option>
            <option value="Bastones">Bastones</option>
            <option value="Cetro">Cetro</option>
            <option value="Varitas">Varitas</option>
            <option value="Arcos">Arcos</option>
            <option value="Cuchillos">Cuchillos</option>
            <option value="Puñales">Puñales</option>
            <option value="Pico">Pico</option>
            <option value="Ballestas">Ballestas</option>-->
          </select>
      </div>

      <div id="armadura">
      
      </div>

      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <input type="text" name="escudo" placeholder="Escribe el tipo de escudo" id="escudo" style="text-align:center !important;" disabled>
      </div>
      
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <input class="hijos" type="text" placeholder="Habilidad 1"  name="habilidad1">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <input class="hijos" type="text" placeholder="Habilidad 2"  name="habilidad2">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <input class="hijos" type="text" placeholder="Habilidad 3"  name="habilidad3">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <input class="hijos" type="text" placeholder="Habilidad 4"  name="habilidad4">
      </div>
  </div>
  </div>

  <div class="container tab">
  <h1>Características y objetos</h1>
      <div class="row ">
        <div class="col-sm-6 col-md-6 col-lg-6 text-center">
            <input class="hijos" type="number" placeholder="fuerza" name="fuerza" id="">
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 text-center">
            <input class="hijos" type="number" placeholder="destreza" name="destreza" id="">
        </div>
      </div>
      <div class="row ">
        <div class="col-sm-6 col-md-6 col-lg-6 text-center">
            <input class="hijos" type="number" placeholder="constitución" name="constitucion" id="">
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 text-center">
            <input class="hijos" type="number" placeholder="inteligencia" name="inteligencia" id="">
        </div>
      </div>
      <div class="row ">
        <div class="col-sm-6 col-md-6 col-lg-6 text-center">
            <input class="hijos" type="number" placeholder="sabiduria" name="sabiduria" id="">
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 text-center">
            <input class="hijos" type="number" placeholder="carisma" name="carisma" id="">
        </div>
      </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <textarea class="hijos" name="objetos" placeholder="Incluir 4 objetos como máximo" id="objetos" cols="28" rows="5"></textarea>
      </div>    
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <input class="hijos" type="text" placeholder="Nombre de la partida"  name="nickPartida">
      </div>
    </div>
  </div>

  <div style="overflow:auto;">
    <div>
      <button style="float:left;"type="button" id="prevBtn" onclick="nextPrev(-1)">Atras</button>
      <button style="float:right;" type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
      <div class="form-group quitar" id="divCrear" style="width:200px !important; margin:auto !important;padding-bottom: 15px; float:right !important;">
          <button class="btn btn-primary btn-block" id="crearV" type="submit">Crear personaje</button>
      </div>
    </div>
  </div>
</form>
<script src="{{asset('js/propio.js')}}"></script>
@else
<style>

</style>

<div style="" >
    <h1 style="text-align:center !important; font-weight:bold !important; align-content: center;">Debe iniciar sesión o registrarse</h1>
</div>
</div>

@endauth
@endif
@endsection
