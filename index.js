const puestos = [];

function agregarPuesto(nombre) {
  puestos.push(nombre);
  return puestos;
}

function asignarTurno() {
  if (puestos.length === 0) return null;
  // Asignar turno al primer puesto disponible (ejemplo simple)
  return puestos.shift();
}

// Exportamos funciones para pruebas
module.exports = { agregarPuesto, asignarTurno };
