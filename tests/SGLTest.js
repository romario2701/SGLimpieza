const { agregarPuesto, asignarTurno } = require('../index.js');

function testAgregarYAsignar() {
  agregarPuesto("Puesto 1");
  agregarPuesto("Puesto 2");

  const turno1 = asignarTurno();
  const turno2 = asignarTurno();
  const turno3 = asignarTurno(); // No quedan puestos

  if (turno1 !== "Puesto 1") throw new Error("Error en turno1");
  if (turno2 !== "Puesto 2") throw new Error("Error en turno2");
  if (turno3 !== null) throw new Error("Error en turno3");

  console.log("Todas las pruebas pasaron ✅");
}

testAgregarYAsignar();
