<?php
  session_save_path();

if(!isset($_SESSION)) 
{ 
  session_save_path();
    session_start(); 
} 
include 'serverConnection.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
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
    <link rel="stylesheet" href="css/tables.view.css" />
    <title>User Tracking | Manage</title>
  </head>
  <body>
    <div class="container-fluid d-flex flex-column w-100 h-100">
      <header class="row">
        <div class="col-auto img-col d-flex align-items-center">
          <img src="../img/gelogocolor.png" alt="ge-image" />
        </div>
        <div class="col text-col d-flex align-items-center">
          <h3>User Tracking |</h3>
          <h6 class="m-0 text-muted ml-3">IT Support Team</h6>
        </div>
      </header>
      <section
        class="row description-section d-flex flex-column justify-content-center align-items-start shadow-sm border-bottom"
      >
        <h6 class="m-0 ml-5 p-1 text-muted">Gestión de usuarios</h6>
      </section>
      <main class="row flex-grow-1 d-flex">
        <!-- ASIDE -->
        <div class="col-2 bg-light border-right h-100">
          <!-- Nav Links -->
          <nav>
            <div
              class="row nav1 p-4 d-flex flex-column border-bottom"
              id="nav-tab"
              role="tablist"
            >
              <a
                id="nav-manage-tab"
                data-toggle="tab"
                href="#nav-manage"
                role="tab"
                aria-controls="nav-manage"
                aria-selected="true"
                class="manage-link d-flex align-items-center text-white rounded shadow-sm p-2 mb-2"
                ><i class="fas manage-icon mr-2 fa-wrench"></i>Gestión de
                Usuarios</a
              >
              <a
                id="nav-logs-tab"
                data-toggle="tab"
                href="#nav-logs"
                role="tab"
                aria-controls="nav-logs"
                aria-selected="false"
                class="manage-link d-flex align-items-center text-white rounded shadow-sm p-2 mb-2"
                ><i class="fas manage-icon mr-2 fa-history"></i>Historial</a
              >
              <a
                id="nav-livemap-tab"
                data-toggle="tab"
                href="#nav-livemap"
                role="tab"
                aria-controls="nav-livemap"
                aria-selected="false"
                class="manage-link d-flex align-items-center text-white rounded shadow-sm p-2 mb-2"
                ><i class="fas manage-icon mr-2 fa-compass"></i>Mapa en vivo</a
              >
              <a
                id="nav-profiles-tab"
                data-toggle="tab"
                href="#nav-profiles"
                role="tab"
                aria-controls="nav-profiles"
                aria-selected="false"
                class="manage-link d-flex align-items-center text-white rounded shadow-sm p-2 mb-2 active"
                ><i class="fas manage-icon mr-2 fa-user"></i>Perfiles</a
              >
            </div>
          </nav>
          <!-- Nav Links ENDS-->
        </div>
        <!-- ASIDE -->
        <div class="col-10 tab-content bg-light h-100" id="nav-tabContent">
          <!-- MANAGE TAB -->
          <div
            class="row h-100 tab-pane fade pt-2"
            id="nav-manage"
            role="tabpanel"
            aria-labelledby="nav-manage-tab"
          >
            <div class="col-12 h-100 col-before-tables">
              <!-- TABLA DE USUARIOS -->
              <div class="row d-flex flex-row justify-content-start p-2">
                <form
                  id="search-form"
                  class="input-group input-group-lg search-input-outer"
                >
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      id="1"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Puedes buscar por SSO, Celda, Estación o Turno"
                      ><i class="fas fa-search text-muted"></i
                    ></span>
                  </div>
                  <input
                    id="search-input"
                    type="text"
                    class="form-control"
                    aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Puedes buscar por SSO, Celda, Estación o Turno"
                  />
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                      Buscar
                    </button>
                  </div>
                </form>
                <div
                  id="line-selector-container"
                  class="row w-auto d-flex align-items-center ml-4"
                >
                  <p class="mb-0 mr-2 text-muted">
                    Filtrar por celda:
                  </p>
                  <select
                    name="line-selector"
                    class="text-center custom-select custom-select-lg select-styles"
                  >
                    <option value="all">Todos</option>
                    <option value="1">Celda 1</option>
                    <option value="2">Celda 2</option>
                    <option value="3">Celda 3</option>
                    <option value="4">Celda 4</option>
                    <option value="5">Celda 5</option>
                    <option value="6">Celda 6</option>
                    <option value="7">Celda 7</option>
                    <option value="8">Celda 8</option>
                    <option value="9">Celda 9</option>
                    <option value="10">Celda 10</option>
                    <option value="11">Celda 11</option>
                    <option value="12">Celda 12</option>
                    <option value="13">Celda 13</option>
                    <option value="14">Celda 14</option>
                    <option value="15">Celda 15</option>
                    <option value="16">Celda 16</option>
                    <option value="17">Celda 17</option>
                    <option value="18">Celda 18</option>
                    <option value="19">Celda 19</option>
                    <option value="20">Celda 20</option>
                    <option value="21">Celda 21</option>
                    <option value="21">Celda 22</option>
                    <option value="23">Celda 23</option>
                    <option value="24">Celda 24</option>
                  </select>
                </div>
              </div>
              <!-- Table starts -->
              <div class="row table-header bg-white">
                <table>
                  <thead>
                    <tr>
                      <th width="3%" class="index">#</th>
                      <th>SSO</th>
                      <th>Celda</th>
                      <th>Estacion</th>
                      <th>Estatus</th>
                      <th>Turno</th>
                      <th class="button-th"></th>
                    </tr>
                  </thead>
                </table>
              </div>
              <div class="row table-body bg-white">
                <table id="fetched-content"></table>
              </div>
              <!-- TABLA DE USUARIOS -->
            </div>
          </div>
          <!-- MANAGE TAB -->
          <!-- LOGS TAB -->
          <div
            class="row h-100 tab-pane fade"
            id="nav-logs"
            role="tabpanel"
            aria-labelledby="nav-logs-tab"
          >
            <div class="col-12 h-100 pt-2 col-before-tables">
              <div
                class="row p-2 d-flex justify-content-between align-items-center"
              >
                <div class="filters d-flex align-items-center">
                  <form
                    id="search-form2"
                    class="input-group input-group-lg search-input-outer"
                  >
                    <div class="input-group-prepend">
                      <span
                        class="input-group-text"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Puedes buscar por SSO, Celda, Estación o Turno"
                        ><i class="fas fa-search text-muted"></i
                      ></span>
                    </div>
                    <input
                      id="search-input2"
                      type="text"
                      class="form-control"
                      aria-label="Large"
                      aria-describedby="inputGroup-sizing-sm"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Puedes buscar por SSO, Celda, Estación o Turno"
                    />
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit">
                        Buscar
                      </button>
                    </div>
                  </form>
                  <div class="row w-auto d-flex align-items-center ml-4">
                    <p class="mb-0 mr-2 text-muted">
                      Filtrar por celda:
                    </p>
                    <select
                      name="line-selector"
                      class="text-center custom-select custom-select-lg select-styles"
                    >
                      <option value="all">Todos</option>
                      <option value="1">Celda 1</option>
                      <option value="2">Celda 2</option>
                      <option value="3">Celda 3</option>
                      <option value="4">Celda 4</option>
                      <option value="5">Celda 5</option>
                      <option value="6">Celda 6</option>
                      <option value="7">Celda 7</option>
                      <option value="8">Celda 8</option>
                      <option value="9">Celda 9</option>
                      <option value="10">Celda 10</option>
                      <option value="11">Celda 11</option>
                      <option value="12">Celda 12</option>
                      <option value="13">Celda 13</option>
                      <option value="14">Celda 14</option>
                      <option value="15">Celda 15</option>
                      <option value="16">Celda 16</option>
                      <option value="17">Celda 17</option>
                      <option value="18">Celda 18</option>
                      <option value="19">Celda 19</option>
                      <option value="20">Celda 20</option>
                      <option value="21">Celda 21</option>
                      <option value="21">Celda 22</option>
                      <option value="23">Celda 23</option>
                      <option value="24">Celda 24</option>
                    </select>
                  </div>
                  <div
                    id="date-picker-container"
                    class="d-flex align-items-center ml-4"
                  >
                    <p class="text-muted mb-0 mr-2">Desde:</p>
                    <input
                      type="date"
                      id="date-picker"
                      name="date-picker"
                      class="form-control form-control-lg"
                    />
                  </div>
                </div>

                <button class="btn btn-success">
                  <i class="fas fa-print mr-2"></i>Descargar Historial
                </button>
              </div>
              <div class="row table-header bg-white">
                <table>
                  <thead>
                    <tr>
                      <th>Fecha y Hora</th>
                      <th>Registro</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <div class="row table-body bg-white">
                <table id="fetched-content2"></table>
              </div>
            </div>
          </div>
          <!-- LOGS TAB -->
          <!-- LIVEMAP TAB -->
          <div
            class="row h-100 tab-pane fade"
            id="nav-livemap"
            role="tabpanel"
            aria-labelledby="nav-livemap-tab"
          >
            <div class="col-12 d-flex flex-column h-100" id="livemap-container">
              <div
                class="row bg-light border-bottom d-flex align-items-center p-2"
                name="livemap-header"
              >
                <div class="rounded border bg-white p-2 mr-3">
                  <h3 id="clock" class="m-0 display-5"></h3>
                </div>
                <div class="shift-header-container flex-grow-1">
                  <h2
                    id="livemap-header"
                    class="font-weight-bold text-muted"
                  ></h2>
                </div>

                <div class="d-flex align-items-center">
                  <p class="mb-0 mr-2 text-muted">Celda:</p>
                  <select id="livemap-line-selector" class="custom-select">
                    <option value="0">Selecciona una Celda</option>
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
                    <option value="24" selected>24</option>
                  </select>
                </div>
              </div>
              <div class="row flex-grow-1 p-4 bf-light" name="livemap-body">
                <!-- No Line selected message -->
                <div
                  id="no-line-selected"
                  class="w-100 h-100 d-flex justify-content-center align-items-center"
                >
                  <h1 class="m-0 text-muted font-weight-bold">
                    Selecciona una línea.
                  </h1>
                </div>
                <!-- No Line selected message -->
                <div class="col-12 rounded border shadow-sm d-flex flex-column">
                  <div class="row d-flex justify-content-between">
                    <div class="line-header pl-3 pt-2">
                      <h1 class="m-0 font-weight-bold">
                        Celda <span class="m-0" id="line-number">24</span>
                      </h1>
                    </div>
                    <div class="user-quantity-container pr-3 pt-2">
                      <h1 class="font-weight-bold">
                        <span class="m-0" id="user-quantity">8</span>/8
                      </h1>
                    </div>
                  </div>
                  <!-- MACHINES AND USERS -->
                  <div
                    class="row flex-grow-1 px-3 d-flex justify-content-between"
                  >
                    <div class="col-auto col-master">
                      <!-- MACHINES ROW -->
                      <div class="row no-gutters">
                        <div
                          class="border rounded shadow-sm mr-2 col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">CO&PO</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-001</p>
                          </div>
                        </div>
                        <div
                          class="border rounded shadow-sm mr-2 col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">STAMP</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-002</p>
                          </div>
                        </div>
                        <div
                          class="border rounded shadow-sm col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">OVEN</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-003</p>
                          </div>
                        </div>
                      </div>
                      <!-- MACHINES ROW -->
                      <!-- USER ROW -->
                      <div
                        id="user-card1"
                        class="row no-gutters p-2 d-flex justify-content-center"
                      ></div>
                      <!-- USER ROW -->
                    </div>
                    <div class="col-auto col-master">
                      <!-- MACHINES ROW -->
                      <div class="row no-gutters">
                        <div
                          class="border rounded shadow-sm mr-2 col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">RF#1</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-004</p>
                          </div>
                        </div>
                        <div
                          class="border rounded shadow-sm col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">RF#2</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-005</p>
                          </div>
                        </div>
                      </div>
                      <!-- MACHINES ROW -->
                      <!-- USER ROW -->
                      <div
                        id="user-card2"
                        class="row no-gutters p-2 d-flex justify-content-center"
                      ></div>
                      <!-- USER ROW -->
                    </div>
                    <div class="col-auto col-master">
                      <!-- MACHINES ROW -->
                      <div class="row no-gutters">
                        <div
                          class="border rounded shadow-sm mr-2 col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">RF#3</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-001</p>
                          </div>
                        </div>
                        <div
                          class="border rounded shadow-sm col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">RF#4</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-002</p>
                          </div>
                        </div>
                      </div>
                      <!-- MACHINES ROW -->
                      <!-- USER ROW -->
                      <div
                        id="user-card3"
                        class="row no-gutters p-2 d-flex justify-content-center"
                      ></div>
                      <!-- USER ROW -->
                    </div>
                    <div class="col-auto col-master">
                      <!-- MACHINES ROW -->
                      <div class="row no-gutters">
                        <div
                          class="border rounded shadow-sm col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">TRIMM</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-001</p>
                          </div>
                        </div>
                      </div>
                      <!-- MACHINES ROW -->
                      <!-- USER ROW -->
                      <div
                        id="user-card4"
                        class="row no-gutters p-2 d-flex justify-content-center"
                      ></div>
                      <!-- USER ROW -->
                    </div>
                    <div class="col-auto col-master">
                      <!-- MACHINES ROW -->
                      <div class="row no-gutters">
                        <div
                          class="border rounded shadow-sm col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">TUBE1</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-001</p>
                          </div>
                        </div>
                      </div>
                      <!-- MACHINES ROW -->
                      <!-- USER ROW -->
                      <div
                        id="user-card5"
                        class="row flex-grow-1 no-gutters p-2 d-flex justify-content-center"
                      ></div>
                      <!-- USER ROW -->
                      <!-- MACHINES ROW -->
                      <div class="row no-gutters">
                        <div
                          class="border rounded shadow-sm col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">TUBE2</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-001</p>
                          </div>
                        </div>
                      </div>
                      <!-- MACHINES ROW -->
                      <!-- USER ROW -->
                      <div
                        id="user-card6"
                        class="row flex-grow-1 no-gutters p-2 d-flex justify-content-center"
                      ></div>
                      <!-- USER ROW -->
                    </div>
                    <div class="col-auto col-master">
                      <!-- MACHINES ROW -->
                      <div class="row no-gutters">
                        <div
                          class="border rounded shadow-sm col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">LEAK</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-001</p>
                          </div>
                        </div>
                      </div>
                      <!-- MACHINES ROW -->
                      <!-- USER ROW -->
                      <div
                        id="user-card7"
                        class="row no-gutters p-2 d-flex justify-content-center"
                      ></div>
                      <!-- USER ROW -->
                    </div>
                    <div class="col-auto col-master">
                      <!-- MACHINES ROW -->
                      <div class="row no-gutters">
                        <div
                          class="border rounded shadow-sm mr-2 col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">AUTOBAG</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-004</p>
                          </div>
                        </div>
                        <div
                          class="border rounded shadow-sm col p-1 d-flex flex-column justify-content-between align-items-center"
                        >
                          <div class="row no-gutters p-2">
                            <p class="station-name">PACK</p>
                          </div>
                          <div
                            class="row no-gutters p-2 bg-primary machine-square rounded shadow-sm"
                          ></div>
                          <div class="row no-gutters p-2">
                            <p class="mb-0">SN-005</p>
                          </div>
                        </div>
                      </div>
                      <!-- MACHINES ROW -->
                      <!-- USER ROW -->
                      <div
                        id="user-card8"
                        class="row no-gutters p-2 d-flex justify-content-center"
                      ></div>
                      <!-- USER ROW -->
                    </div>
                  </div>
                  <!-- MACHINES AND USERS -->
                </div>
              </div>
            </div>
          </div>
          <!-- LIVEMAP TAB -->
          <!-- PROFILES TAB -->
          <div
            class="row h-100 tab-pane fade show active"
            id="nav-profiles"
            role="tabpanel"
            aria-labelledby="nav-profiles-tab"
          >
            <div class="col-12 h-100 d-flex flex-column">
              <div
                class="row bg-light border-bottom d-flex align-items-center p-2"
                name="profiles-header"
              >
                <form
                  id="search-form3"
                  class="input-group input-group-lg search-input-outer"
                >
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Puedes buscar por SSO, Celda, Estación o Turno"
                      ><i class="fas fa-search text-muted"></i
                    ></span>
                  </div>
                  <input
                    id="search-input3"
                    type="text"
                    class="form-control"
                    aria-label="Large"
                    aria-describedby="inputGroup-sizing-sm"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Puedes buscar por SSO, Celda, Estación o Turno"
                  />
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">
                      Buscar
                    </button>
                  </div>
                </form>
              </div>
              <nav class="row shadow-sm pt-2">
                <div
                  class="nav nav-tabs border-bottom w-100 pl-2"
                  id="nav-tab2"
                  role="tablist"
                >
                  <a
                    class="nav-item profile-link nav-link active"
                    id="nav-profile-tab"
                    data-toggle="tab"
                    href="#nav-profile"
                    role="tab"
                    aria-controls="nav-profile"
                    aria-selected="true"
                    >Perfil</a
                  >
                  <a
                    class="nav-item profile-link nav-link"
                    id="nav-career-tab"
                    data-toggle="tab"
                    href="#nav-career"
                    role="tab"
                    aria-controls="nav-career"
                    aria-selected="false"
                    >Carrera en GE</a
                  >
                  <a
                    class="nav-item profile-link nav-link"
                    id="nav-training-tab"
                    data-toggle="tab"
                    href="#nav-training"
                    role="tab"
                    aria-controls="nav-training"
                    aria-selected="false"
                    >Entrenamiento</a
                  >
                  <a
                    class="nav-item profile-link nav-link"
                    id="nav-medhistory-tab"
                    data-toggle="tab"
                    href="#nav-medhistory"
                    role="tab"
                    aria-controls="nav-medhistory"
                    aria-selected="false"
                    >Historial Médico</a
                  >
                </div>
              </nav>
              <div
                class="row flex-grow-1 bg-white tab-content"
                id="nav-tabContent2"
              >
                <div
                  class="w-100 tab-pane fade show active"
                  id="nav-profile"
                  role="tabpanel"
                  aria-labelledby="nav-profile-tab"
                >
                  <div
                    class="col-8 h-100 shadow bg-white border-right border-left offset-2"
                  >
                    <div
                      class="row bg-white primary-info p-5 border-bottom shadow-sm d-flex"
                    >
                      <div class="user-pic mr-5 rounded col-auto">
                        <img
                          src="https://supportcentral.gecdn.com/images/person/temp/212559103.jpg"
                          alt="user-picture"
                          class="rounded"
                        />
                      </div>
                      <div class="col-auto flex-grow-1">
                        <h1
                          class="user-name text-muted font-weight-normal text-right"
                        >
                          Víctor Alejandro Martínez Próspero
                        </h1>
                        <h4 class="user-name font-weight-light text-right">
                          IT Support Engineer
                        </h4>
                        <hr />
                        <h5 class="text-right">212774780</h5>
                        <div class="status text-right mb-2">
                          <i class="far fa-circle text-muted mr-2"></i
                          ><span>Offline</span>
                        </div>
                        <div class="links float-right d-flex flex-row">
                          <div class="p-2">
                            <i class="fas text-muted fa-envelope"></i>
                          </div>
                          <div class="p-2">
                            <i class="fab text-muted fa-skype"></i>
                          </div>
                          <div class="pr-0 pt-2 pl-1">
                            <i class="fas text-muted fa-globe-americas"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row no-gutters divider p-3 w-100">
                      <div
                        class="d-flex align-items-center justify-content-start personal-info w-100 p-3 rounded shadow-sm border"
                      >
                        <i
                          class="fas fa-user user-information-icon mr-2 text-primary"
                        ></i
                        ><span class="text-primary">Información Personal</span>
                      </div>
                    </div>
                    <div
                      class="personal-info-content w-100 d-flex justify-content-around pb-3"
                    >
                      <div class="rfc-container px-4">
                        <p class="rfc mb-0">RFC</p>
                        <h4 class="text-muted">0101010101</h4>
                      </div>
                      <div class="curp-container px-4">
                        <p class="rfc mb-0">CURP</p>
                        <h4 class="text-muted">01010101010101010</h4>
                      </div>
                      <div class="age-container px-4">
                        <p class="rfc mb-0">Edad</p>
                        <h4 class="text-muted">25</h4>
                      </div>
                      <div class="nss-container px-4">
                        <p class="rfc mb-0">NSS</p>
                        <h4 class="text-muted">01010101010</h4>
                      </div>
                    </div>
                    <div
                      class="personal-info-content w-100 d-flex justify-content-around pb-3"
                    >
                      <div class="rfc-container px-4">
                        <p class="rfc mb-0">Estado Civil</p>
                        <h4 class="text-muted">Soltero</h4>
                      </div>
                      <div class="curp-container px-4">
                        <p class="rfc mb-0">Dirección</p>
                        <h4 class="text-muted">
                          Calle Héroes, Revolución, Ciudad Juárez, Chihuahua
                        </h4>
                      </div>
                      <div class="age-container px-4">
                        <p class="rfc mb-0">C.P</p>
                        <h4 class="text-muted">32575</h4>
                      </div>
                    </div>
                    <div class="row no-gutters divider p-3 w-100">
                      <div
                        class="d-flex align-items-center justify-content-start contact-info w-100 p-3 rounded shadow-sm border"
                      >
                        <i
                          class="fas fa-phone user-information-icon mr-2 text-primary"
                        ></i
                        ><span class="text-primary">Contacto</span>
                      </div>
                    </div>
                    <div
                      class="personal-info-content w-100 d-flex justify-content-around pb-3"
                    >
                      <div class="rfc-container px-4">
                        <p class="rfc mb-0">Correo Electrónico</p>
                        <h4 class="text-muted">victor.A.martinez@ge.com</h4>
                      </div>
                      <div class="curp-container px-4">
                        <p class="rfc mb-0">Teléfono</p>
                        <h4 class="text-muted">656 1594580</h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="w-100 h-100 tab-pane fade"
                  id="nav-career"
                  role="tabpanel"
                  aria-labelledby="nav-career-tab"
                ></div>
                <div
                  class="w-100 tab-pane fade"
                  id="nav-training"
                  role="tabpanel"
                  aria-labelledby="nav-training-tab"
                >
                  <div
                    class="col-8 h-100 offset-2 shadow bg-white border-right border-left overflow-auto"
                  >
                    <div class="row no-gutters w-100 d-flex flex-column p-3">
                      <h4>Entrenamientos pendientes</h4>
                      <div class="p-2">
                        <table>
                          <thead>
                            <th>Documentado</th>
                            <th>Concepto</th>
                            <th>Documento</th>
                            <th>Revision</th>
                            <th>Fecha requerido</th>
                            <th>Dias restantes</th>
                            <th>Evidencia requerida</th>
                            <th>Enlace</th>
                          </thead>
                        </table>
                        <table>
                          <tbody>
                            <tr>
                              <td>Esperando</td>
                              <td>
                                Covid - Todo sobre la prevención del COVID-19
                              </td>
                              <td>DOC2404385</td>
                              <td>1</td>
                              <td>06/25/2020</td>
                              <td>2</td>
                              <td>Si</td>
                              <td>Ir</td>
                            </tr>
                            <tr>
                              <td>Esperando</td>
                              <td>
                                COVID - Plan de acción para el hogar ante
                                COVID-19
                              </td>
                              <td>DOC2404385</td>
                              <td>1</td>
                              <td>06/25/2020</td>
                              <td>2</td>
                              <td>Si</td>
                              <td>Ir</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row no-gutters w-100 d-flex flex-column p-3">
                      <h4>Entrenamientos completados</h4>
                      <div class="p-2">
                        <table>
                          <thead>
                            <th>Documentado</th>
                            <th>Concepto</th>
                            <th>Documento</th>
                            <th>Revision</th>
                            <th>Fecha requerido</th>
                            <th>Dias restantes</th>
                            <th>Evidencia requerida</th>
                            <th>Enlace</th>
                          </thead>
                        </table>
                        <table>
                          <tbody>
                            <tr>
                              <td>Esperando</td>
                              <td>
                                GEHC_01.016.BOP Production and Process Controls
                                Change Work Instruction
                              </td>
                              <td>DOC2404385</td>
                              <td>1</td>
                              <td>06/25/2020</td>
                              <td>2</td>
                              <td>Si</td>
                              <td>Ir</td>
                            </tr>
                            <tr>
                              <td>Esperando</td>
                              <td>
                                ESD Process Verification Visual Aid - Ayuda
                                Visual del Proceso de Verificacion de ESD
                              </td>
                              <td>DOC2404385</td>
                              <td>1</td>
                              <td>06/25/2020</td>
                              <td>2</td>
                              <td>Si</td>
                              <td>Ir</td>
                            </tr>
                            <tr>
                              <td>Esperando</td>
                              <td>
                                Shelf Life application database audits &
                                dispositions WI
                              </td>
                              <td>DOC2404385</td>
                              <td>1</td>
                              <td>06/25/2020</td>
                              <td>2</td>
                              <td>Si</td>
                              <td>Ir</td>
                            </tr>
                            <tr>
                              <td>Esperando</td>
                              <td>
                                COVID - Plan de acción para el hogar ante
                                COVID-19
                              </td>
                              <td>DOC2404385</td>
                              <td>1</td>
                              <td>06/25/2020</td>
                              <td>2</td>
                              <td>Si</td>
                              <td>Ir</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="p-2 w-100 tab-pane fade"
                  id="nav-medhistory"
                  role="tabpanel"
                  aria-labelledby="nav-medhistory-tab"
                >
                  ...
                </div>
              </div>
            </div>
          </div>
          <!-- PROFILES TAB -->
        </div>
      </main>
      <!-- Add Modal -->
      <div
        class="modal fade"
        id="addModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">
                Agregar usuario
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form id="add-form" class="w-100">
                <div class="form-group">
                  <label for="sso">SSO:</label>
                  <input
                    class="form-control"
                    type="text"
                    name="sso"
                    id="sso"
                    required
                  />
                  <div class="d-flex justify-content-end">
                    <span id="sso-error-msg" style="color: red; display: none;"
                      ><i class="fas fa-times mr-2" style="color: red;"></i>Este
                      SSO ya existe</span
                    >
                  </div>
                </div>
                <div class="form-group">
                  <label for="line">Celda:</label>
                  <select class="custom-select" name="line" id="line">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="station">Estación en la que inicia:</label>
                  <select class="custom-select" name="station" id="station">
                    <option value="RF1RF2">RF1/RF2</option>
                    <option value="TRIM">Trimming</option>
                    <option value="STAMP">Stamp</option>
                    <option value="ENS">Ensamble</option>
                    <option value="LKT">Lkt</option>
                    <option value="AUB">Auto Bagger</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="shift">Turno:</label>
                  <select class="custom-select" name="shift" id="shift">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
                <div class="d-flex justify-content-end mb-2">
                  <button type="submit" class="btn btn-primary">
                    Agregar nuevo usuario
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Add Modal -->
      <!-- Edition Modal -->
      <div
        class="modal fade"
        id="editModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle1">
                Editar Usuario
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form id="edit-form" class="w-100" data-id="">
                <div class="form-group">
                  <label for="sso">SSO:</label>
                  <input
                    class="form-control"
                    type="text"
                    name="sso"
                    id="sso-edit"
                    readonly
                  />
                  <div class="d-flex justify-content-end">
                    <span
                      id="sso-error-msg-edit"
                      style="color: red; display: none;"
                      ><i class="fas fa-times mr-2" style="color: red;"></i>Este
                      SSO ya existe</span
                    >
                  </div>
                </div>
                <div class="form-group">
                  <label for="line">Celda:</label>
                  <select class="custom-select" name="line" id="line-edit">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="station">Estación en la que inicia:</label>
                  <select
                    class="custom-select"
                    name="station"
                    id="station-edit"
                  >
                    <option value="RF1RF2">RF1/RF2</option>
                    <option value="TRIM">Trimming</option>
                    <option value="STAMP">Stamp</option>
                    <option value="ENS">Ensamble</option>
                    <option value="LKT">Lkt</option>
                    <option value="AUB">Auto Bagger</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="shift">Turno:</label>
                  <select class="custom-select" name="shift" id="shift-edit">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  </select>
                </div>
                <div class="d-flex justify-content-end mb-2">
                  <button type="submit" class="btn btn-primary">
                    Actualizar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Edition Modal -->
      <!-- Status Edit Modal -->
      <div
        class="modal fade"
        id="editStatusModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle2">
                Modificación del estatus
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body d-flex justify-content-center">
              <form
                id="edit-status-form"
                class="w-100"
                data-id=""
                data-oldstatus=""
              >
                <div class="form-group">
                  <label for="sso">SSO:</label>
                  <input
                    class="form-control"
                    type="text"
                    name="sso"
                    id="sso-status-edit"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="status">Estatus:</label>
                  <select class="custom-select" name="status" id="status-edit">
                    <option value="na">N/A</option>
                    <option value="entrada">Entrada</option>
                    <option value="en turno">En turno</option>
                    <option value="salida">Salida</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="justification">Justificación:</label>
                  <textarea
                    class="form-control"
                    id="justification"
                    name="justification"
                    rows="3"
                    required
                  ></textarea>
                </div>
                <div class="d-flex justify-content-end mb-2">
                  <button type="submit" class="btn btn-primary">
                    Modificar Estatus
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Status Edit Modal -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script type="text/javascript" src="js/socketConnection.js"></script>
    <script type="text/javascript" src="js/serializeJSON.js"></script>
    <script type="text/javascript" src="js/forcetabs.js"></script>
    <script type="text/javascript" src="js/fetch-users.js"></script>
    <script type="text/javascript" src="js/jquery-confirm.js"></script>
    <script type="text/javascript" src="js/add.js"></script>
    <script type="text/javascript" src="js/search.js"></script>
    <script type="text/javascript" src="js/only-numbers.js"></script>
    <script type="text/javascript" src="js/edit.js"></script>
    <script type="text/javascript" src="js/modify-status.js"></script>
    <script type="text/javascript" src="js/socketFunctions.js"></script>
    <script type="text/javascript" src="js/init-app.js"></script>
    <!-- LIVE MAP -->
    <script type="text/javascript" src="js/livemap/variables.js"></script>
    <script type="text/javascript" src="js/livemap/currentTime.js"></script>
    <script type="text/javascript" src="js/livemap/showingTime.js"></script>
    <script type="text/javascript" src="js/livemap/getShift.js"></script>
    <script type="text/javascript" src="js/livemap/init-app.js"></script>
    <script type="text/javascript" src="js/livemap/fetch-users.js"></script>
    <script type="text/javascript" src="js/livemap/line-selector.js"></script>
  </body>
</html>
