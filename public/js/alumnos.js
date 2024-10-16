document.addEventListener("DOMContentLoaded", () => {
    if (document.getElementById("form-alumno")) {
        cargarAlumnos();
        
        document.getElementById("form-alumno").addEventListener("submit", (e) => {
            e.preventDefault();
            registrarAlumno();
        });
    } else {
    
        cargarInfoAlumno();
    }
});

const registrarAlumno = () => {
    const data = new FormData();
    data.append('nombre', document.getElementById('nombre').value);
    data.append('apellido', document.getElementById('apellido').value);
    data.append('anio_ingreso', document.getElementById('anio_ingreso').value);
    data.append('carrera', document.getElementById('carrera').value);
    data.append('fecha_nacimiento', document.getElementById('fecha_nacimiento').value);

    fetch('app/controller/registrar_alumno.php', {
        method: 'POST',
        body: data
    }).then(response => response.json())
      .then(data => {
          alert(data.mensaje);
          cargarAlumnos();
          document.getElementById("form-alumno").reset();
      });
};

const cargarAlumnos = () => {
    fetch('app/controller/listar_alumnos.php')
        .then(response => response.json())
        .then(data => {
            const listado = document.getElementById("listado-alumnos");
            listado.innerHTML = "";
            data.forEach(alumno => {
                listado.innerHTML += `
                    <tr>
                        <td>${alumno.id}</td>
                        <td>${alumno.nombre}</td>
                        <td>${alumno.apellido}</td>
                        <td>${alumno.anio_ingreso}</td>
                        <td>${alumno.carrera}</td>
                        <td>${alumno.fecha_nacimiento}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editarAlumno(${alumno.id})">Editar</button>
                        </td>
                    </tr>
                `;
            });
        });
};

const cargarInfoAlumno = () => {
    fetch('app/controller/ver_alumno.php')
        .then(response => response.json())
        .then(data => {
            const info = document.getElementById("info-alumno");
            info.innerHTML = `
                <p>Nombre: ${data.nombre}</p>
                <p>Apellido: ${data.apellido}</p>
                <p>Año de Ingreso: ${data.anio_ingreso}</p>
                <p>Carrera: ${data.carrera}</p>
                <p>Fecha de Nacimiento: ${data.fecha_nacimiento}</p>
            `;
        });
};
