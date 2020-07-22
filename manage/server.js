var app = require("express")();
var http = require("http").createServer(app);
var io = require("socket.io")(http);
app.get("/", (req, res) => {
  res.sendFile(__dirname + "/index.php");
});
io.on("connection", (socket) => {
  console.log("a user connected");
  socket.on("disconnect", () => {
    console.log("user disconnected");
  });
  socket.on("add-user-data", function (data) {
    var sso = data.sso;
    var line = data.line;
    io.emit("add-user-callback", { sso: sso, line: line });
  });
  socket.on("delete-user", function (data) {
    var id = data.id;
    io.emit("delete-user-callback", { id: id });
  });
  socket.on("hola-mundo", function (data) {
    console.log(data.id);
    io.emit("checking-callback", { mensaje: "desde el servidor, hola!" });
  });
  // CHECKING FUNCTIONS
  socket.on("append-into-livemapline", function (data) {
    io.emit("append-into-livemapline-callback", data);
  });
});
http.listen(3000, () => {
  console.log("listening *:3000");
});
