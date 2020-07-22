function getStatus() {
  switch (shift) {
    // Este Scope modifica el State para el CURRENT no para los que estan fuera de turno.
    case 1:
      if (
        currentTime >= shiftStart.first &&
        currentTime <= shiftEnd.first - margin
      ) {
        newStatus = "entrada";
      } else {
        newStatus = "salida";
      }
      break;
    case 2:
      if (
        (currentTime >= shiftStart.seccond &&
          currentTime <= shiftEnd.seccond - margin) ||
        (currentTime >= shiftStart.seccondFix &&
          currentTime <= shiftEnd.seccondFix - margin)
      ) {
        newStatus = "entrada";
      } else {
        newStatus = "salida";
      }
      break;
    case 3:
      if (
        currentTime >= shiftStart.third &&
        currentTime < shiftEnd.third - margin
      ) {
        newStatus = "entrada";
      } else {
        newStatus = "salida";
      }
      break;
    default:
      break;
  }
}
