<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="assets/stylelogout.css" />
  </head>

  <body>
    <div class="logout-page">
      <div class="card text-center">
        <div class="card-body">
          <h1>Logout</h1>

          <p>Deseja realmente sair do sistema?</p>

          <button class="btn btn-primary">Sim, Sair</button>

          <button class="btn btn-secondary">Não, Cancelar</button>
        </div>
      </div>
    </div>

    <script>
      const cancelButton = document.querySelector(".btn-secondary");

      cancelButton.addEventListener("click", () => {
        
        window.history.back();

        // window.location.href = "/dashboard";

      });
    </script>
  </body>
</html>
