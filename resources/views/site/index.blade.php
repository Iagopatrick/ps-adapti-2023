{{-- Front-end começa aqui! --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  
  <link rel="stylesheet" href="{{asset('site/css/style.css')}}" type ="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <title>IP</title>
</head>
<body>
  <main class="main" id="main-id">
    

    <div id="container-cards-id" class="container-cards">  
      @foreach ($alunos as $aluno)
        <div id="card-principal" class="card" >
        
            <img src="{{asset($aluno->imagem)}}" alt="Imagem do Aluno">
            <div class="nome-div">Nome
              <p class="nome-aluno fonte-menor">{{$aluno->nome}}</p>
            </div>
            <div>Curso
              <p class="fonte-menor">{{$aluno->curso->curso }}</p></div>
            <div class="descricao-div">Descrição
              <p class="descricao-aluno fonte-menor">{{$aluno->descricao}}</p>
              </div>
            @if ($aluno->contratado) 
              <button class="contratado">Contratado</button>
              @else
              
              <form action="{{route('aluno.contratar', $aluno)}}" method="post">
                @csrf
                <button class="nao-contratado" type="submit">Contratar</button>
              </form>
              

            @endif
        </div>
        
        @endforeach
      </div>

    
        
    </div>
    <div id="div-navbar">
      <nav id="navbar">
        <button id="botao-darkmode"><span class="material-symbols-outlined">
          dark_mode
          </span></button>
        <button><span class="material-symbols-outlined">
          tune
          </span></button>
        
        
          <div class="div-logo">
            <img src="{{asset('site/logo/Logo-contratado!.png')}}" alt="Logo contratado" class="logo">

          </div>


      </nav>
    </div>
    
    
  </main>


  <script src="{{asset('site/js/script.js')}}"></script>
</body>
<footer>
  Conheça mais sobre nós! equipe Contratado!
</footer>
</html>


