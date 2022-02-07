@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h2 class="text-white font-weight-bold">"Ser emprendedor no es ser un soñador. El soñador está en las nubes. El emprendedor fabrica un avión para llegar a ellas."</h2>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Joan Boluda</p>
                        <a class="btn btn-primary btn-xl" href=" {{ url('/negocios') }}">Comenzar</a>
                    </div>
                </div>
            </div>
        </header>
       
@endsection
<style>
header.masthead {
  padding-top: 10rem;
  padding-bottom: calc(10rem - 4.5rem);
  background: linear-gradient(to bottom, rgba(168, 168, 136, 0.61) 0%, rgba(155, 153, 135, 0.8) 100%), url("https://images.unsplash.com/photo-1519751138087-5bf79df62d5b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80");
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-size: cover;
}
header.masthead h1, header.masthead .h1 {
  font-size: 2.25rem;
}
@media (min-width: 992px) {
  header.masthead {
    height: 100vh;
    min-height: 40rem;
    padding-top: 4.5rem;
    padding-bottom: 0;
  }
  header.masthead p {
    font-size: 1.15rem;
  }
  header.masthead h1, header.masthead .h1 {
    font-size: 3rem;
  }
}
@media (min-width: 1200px) {
  header.masthead h1, header.masthead .h1 {
    font-size: 3.5rem;
  }
}
</style>