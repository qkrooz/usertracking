<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
include 'serverConnection.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="refresh" content="1800" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../img/gelogo.png" type="image/x-icon" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/a04ea66e37.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/jquery-confirm.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/index.view.css" />
    <title>User Tracking</title>
  </head>
  <body>
    <div class="container-fluid d-flex flex-column">
      <header class="row">
        <div class="col-auto img-col d-flex align-items-center">
          <img src="../img/gelogocolor.png" alt="ge-image" />
        </div>
        <div class="col text-col d-flex align-items-center flex-grow-1">
          <h3>User Tracking |</h3>
          <h6 class="m-0 text-muted ml-3">IT Support Team</h6>
        </div>
        <!-- Default dropleft button -->
        <div
          class="initial-selector d-flex align-items-center mr-2 animated fadeInDown faster"
        >
          <select
            style="width: 15em;"
            name="line-selector"
            id="line-selector"
            class="custom-select custom-select-lg text-center"
          >
            <option value="0" selected>
              Selecciona una linea
            </option>
            <option value="1">01</option>
            <option value="2">02</option>
            <option value="3">03</option>
            <option value="4">04</option>
            <option value="5">05</option>
            <option value="6">06</option>
            <option value="7">07</option>
            <option value="8">08</option>
            <option value="9">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="23">23</option>
            <option value="24">24</option>
          </select>
        </div>
        <div class="btn-group dropleft p-2" style="display: none !important;">
          <button
            id="dropdown-config-button"
            type="button"
            class="btn btn-secondary rounded"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fa fa-cog"></i>
          </button>

          <div class="dropdown-menu p-3" id="dropdown-config">
            <select
              style="width: 15em;"
              name="line-selector"
              id="line-selector"
              class="custom-select custom-select-lg text-center"
            >
              <option value="0" selected>
                Selecciona una linea
              </option>
              <option value="1">01</option>
              <option value="2">02</option>
              <option value="3">03</option>
              <option value="4">04</option>
              <option value="5">05</option>
              <option value="6">06</option>
              <option value="7">07</option>
              <option value="8">08</option>
              <option value="9">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="23">23</option>
              <option value="24">24</option>
            </select>
          </div>
        </div>
      </header>
      <section
        class="row description-section d-flex flex-column justify-content-center align-items-start shadow-sm border-bottom"
      >
        <h6 class="m-0 ml-5 p-1 text-muted">Checking Dashboard</h6>
      </section>
      <main class="row flex-grow-1 d-flex flex-row">
        <!-- Controles -->
        <div
          id="checking-controls"
          class="col-auto h-100 d-flex flex-column bg-light border-right pt-3 pb-3"
        >
          <!-- Hora -->
          <div
            class="time d-flex flex-column justify-content-center align-items-center"
          >
            <h1
              id="identificador-de-hora"
              class="border pt-1 pb-2 pr-3 pl-3 rounded bg-white shadow-sm d-flex align-items-center"
            >
              <div class="spinner-border p-0 m-0" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </h1>
          </div>
          <!-- Selector de linea -->
          <div
            class="line-selector d-flex flex-column justify-content-center align-items-center p-3"
          >
            <h3 class="font-weight-bold m-0" style="font-size: 300%;">
              Celda
            </h3>
            <div class="spinner m-3" id="line-spinner"></div>
            <h1
              id="line-number"
              class="m-0 font-weight-bold"
              style="font-size: 1000%;"
            ></h1>
          </div>
          <!-- TURNO ACTUAL -->
          <div
            class="current-shift text-center bg-lignt border p-4 rounded shadow-sm text-black"
            id="current-shift-header-outter"
            style="display: none;"
          >
            <h3 id="current-shift-header" class="m-0 font-weight-bold"></h3>
          </div>
          <!-- Lista de eventos -->
          <div
            class="events flex-grow-1 d-flex flex-column justify-content-start align-items-center pt-0"
          >
            <div class="p-3 mb-3 w-100 text-center border bg-success rounded">
              <h4 class="font-weight-bold text-white m-0">Entrada</h4>
            </div>
            <!-- <div class="p-3 mb-3 w-100 text-center border bg-primary rounded">
              <h4 class="font-weight-bold text-white m-0">Turno</h4>
            </div> -->
            <div class="p-3 border w-100 text-center bg-danger rounded">
              <h4 class="font-weight-bold text-white m-0">Salida</h4>
            </div>
          </div>
        </div>
        <!-- Contenido principal -->
        <div class="col flex-grow-1 d-flex flex-column main-content">
          <!-- user list -->
          <div id="turnos" class="row h-100 flex-grow-1 border-bottom d-flex">
            <div
              id="select-message"
              class="w-100 h-100 d-flex justify-content-center align-items-center"
              style="display: none !important;"
            >
              <h1 class="mb-0 text-muted">
                Selecciona una Línea para comenzar
              </h1>
            </div>
            <!-- TURNO COMPLETO -->
            <!-- TURNO PRINCIPAL -->
            <div
              id="shift-col-outter-id1"
              class="col-12 bg-light shift-col-outter d-flex flex-column flex-grow-1"
            >
              <!-- shiftHeader -->
              <div
                class="row d-flex justify-content-center bg-dark"
                id="shift-header-container"
              >
                <h3
                  id="shift-header1"
                  class="shift-header-class text-white bg-dark display-6 rounded shadow-sm m-0"
                ></h3>
              </div>
              <!-- user-cards -->
              <div
                id="user-cards1"
                class="row p-3 d-flex flex-grow-1 justify-content-around"
              >
                <!-- Spinner for user-cards-1 -->
                <div
                  class="cuad"
                  id="user-cards1-spinner"
                  style="display: none;"
                ></div>
              </div>
              <!-- user-cards -->
            </div>
            <!-- TURNO SECUNDARIO -->
            <div
              id="shift-col-outter-id2"
              class="col-12 bg-light shift-col-outter d-flex flex-column border-right border-left"
            >
              <!-- shiftHeader -->
              <div class="row d-flex justify-content-center bg-dark">
                <h3
                  id="shift-header2"
                  class="shift-header-class text-white bg-dark display-6 rounded shadow-sm m-0"
                ></h3>
              </div>
              <!-- user-cards -->
              <div
                id="user-cards2"
                class="row p-3 flex-grow-1 d-flex justify-content-around"
              ></div>
              <!-- user-cards -->
            </div>

            <!-- TURNO COMPLETO -->
          </div>
          <!-- scanner -->
          <div
            class="row scanner-area bg-light d-flex justify-content-end align-items-center shadow-sm sticky-bottom"
          >
            <i class="fas fa-id-badge mr-4 display-3"></i>
            <i class="fas fa-arrow-right mr-4 display-4"></i>
            <div class="form-group pr-4 pt-4">
              <form id="scanner-form">
                <input
                  id="scanner-input"
                  type="text"
                  class="form-control form-control-lg"
                  name="sso"
                />
              </form>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.5.0.js"
      integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>
    <script
      type="text/javascript"
      src="../node_modules/socket.io-client/dist/socket.io.js"
    ></script>
    <script type="text/javascript" src="js/socketConnection.js"></script>
    <script src="js/serializeJSON.js"></script>
    <script src="js/jquery-confirm.js"></script>
    <!-- Variables del entorno -->
    <script type="text/javascript" src="js/variables.js"></script>
    <!-- Obtenemos el tiempo actual del servidor -->
    <script type="text/javascript" src="js/currentTime.js"></script>
    <!-- Reloj -->
    <script type="text/javascript" src="js/showingTime.js"></script>
    <!-- Calculo del turno en el que nos encontramos actualmente. -->
    <script type="text/javascript" src="js/getShift.js"></script>
    <!-- Calculo del estado recibiendo como paramentro el shift -->
    <script type="text/javascript" src="js/getStatus.js"></script>
    <!-- Inicializacion de la aplicacion con todos los lineamientos requeridos -->
    <script type="text/javascript" src="js/init-app.js"></script>
    <!-- Line selector -->
    <script type="text/javascript" src="js/line-selector.js"></script>
    <!-- Acciones en el escaner -->
    <script type="text/javascript" src="js/scanner-actions.js"></script>
  </body>
</html>
