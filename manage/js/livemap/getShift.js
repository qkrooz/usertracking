function getShift() {
  // Analisis del turno en el cual nos encontramos para el fetch estatico
  if (
    (currentTime >= shiftStart.first && currentTime <= shiftStart.seccond) ||
    currentTime == shiftStart.first
  ) {
    shift = 1;
    nextShift = 2;
    futureShift = 3;
    shiftHeader = "1er Turno";
    nextShiftHeader = "2do Turno";
    futureShiftHeader = "3er Turno";
  } else if (
    (currentTime >= shiftStart.seccond && currentTime <= shiftEnd.seccond) ||
    currentTime == shiftStart.seccond
  ) {
    shift = 2;
    nextShift = 3;
    futureShift = 1;
    shiftHeader = "2do Turno";
    nextShiftHeader = "3er Turno";
    futureShiftHeader = "1er Turno";
  } else if (
    (currentTime >= shiftStart.seccondFix && currentTime <= shiftStart.third) ||
    currentTime == shiftStart.seccondFix
  ) {
    shift = 2;
    nextShift = 3;
    futureShift = 1;
    shiftHeader = "2do Turno";
    nextShiftHeader = "3er Turno";
    futureShiftHeader = "1er Turno";
  } else if (
    (currentTime >= shiftStart.third && currentTime <= shiftStart.first) ||
    currentTime == shiftStart.third
  ) {
    shift = 3;
    nextShift = 1;
    futureShift = 2;
    shiftHeader = "3er Turno";
    nextShiftHeader = "1er Turno";
    futureShiftHeader = "2do Turno";
  } else {
    // alert(shift);
    alert("ERROR 5000");
  }
}
