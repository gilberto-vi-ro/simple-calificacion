
$('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
    $('#content').toggleClass('active');
});

$('.more-button,.body-overlay').on('click', function () {
    $('#sidebar,.body-overlay').toggleClass('show-nav');
});

let activedItemStudent = false;

let getStudents =[];
let dataStudent = [];

let getAsignaturas = [];

let getSubjectsQualification =[];
let dataSubjectsQualification = [];

listStudents();

/*====================================================
ALUMNOS
====================================================*/

function listStudents(){
    getStudents = loadAjax(BASE_URL+"db/getAlumnos", "GET");
    getStudents = JSON.parse(getStudents);

    let cardContent = getStudents.data.map((value, i,) => (
        ` <div class="sl-item" onClick="activeItemStudent(event,${value.id_alumno})">
            <div class="sl-content">
                <p>
                    <i class="fas fa-user-graduate"  style="margin-right: 5px;"></i>
                    ${value.apellido+" "+value.nombre}
                </p>
                <p>${value.semestre+" "+value.grupo}</p>
            </div>
            <div class="sl-edit">
                <i class="fas fa-edit" data-toggle="modal" data-target="#modalEditAlumno" onclick="findStudent(${value.id_alumno},'edit')"></i>
                <i class="fas fa-trash-alt" data-toggle="modal" data-target="#modalDeleteAlumno" onclick="findStudent(${value.id_alumno})"></i>
            </div>
        </div>`
    ));
    // Object.values(federativeEntitiesJson).map((value, i,) => (
    //                   <option key={i} value={value}>{value}</option>
    //                 ))
    $('#cardContentAlumnos').html(cardContent);
}



function activeItemStudent(e,id){
    activedItemStudent = true;
    findStudent(id);
    listSubjects();
    listSubjectsQualification();
    $("#cardContentAlumnos .sl-item").removeClass("active");
    e.target.classList.add('active');
}

function findStudent(id,action=null){
    dataStudent = getStudents.data.find(objeto => objeto.id_alumno == id);
    if(action=="edit"){
        $('#formEditAlumno [name="id_alumno"]').val(dataStudent.id_alumno);
        $('#formEditAlumno [name="nombre"]').val(dataStudent.nombre);
        $('#formEditAlumno [name="apellido"]').val(dataStudent.apellido);
        $('#formEditAlumno [name="semestre"]').val(dataStudent.semestre);
        $('#formEditAlumno [name="grupo"]').val(dataStudent.grupo);
    }
    
}

function addAlumno(){
    let form = new FormData(document.getElementById('formAddAlumno'));
    // form.append('addNewTask', 1 ); 
    let res = loadAjax(BASE_URL+"db/addAlumno", "POST" , form);
    res = JSON.parse(res);
    listStudents();
    $('#formAddAlumno')[0].reset();
    $('.modal').modal('hide');
}

function editAlumno(){
    let form = new FormData(document.getElementById('formEditAlumno'));
    // form.append('addNewTask', 1 ); 
    let res = loadAjax(BASE_URL+"db/editAlumno", "POST" , form);
    res = JSON.parse(res);
    listStudents();
    $('#formAddAlumno')[0].reset();
    $('.modal').modal('hide');
}

function deleteAlumno(){
    let res = loadAjax(BASE_URL+"db/deleteAlumno/"+dataStudent.id_alumno, "DELETE" );
    res = JSON.parse(res);
    listStudents();
    listSubjectsQualification();
    $('.modal').modal('hide');
}

/*====================================================
ASIGNATURAS
====================================================*/

function listSubjects(){
    getAsignaturas = loadAjax(BASE_URL+"db/getAsignaturas/", "GET");
    getAsignaturas = JSON.parse(getAsignaturas);
    let selects = '<option hidden="" value="">Seleciona una Asignatura</option>';

    $.each(getAsignaturas.data,function(k,v){ //recorremos los resultados
					
        selects += `<option value="${v.id_asignatura}">${v.asignatura}</option>`;
    });

    $('.asignaturaCalificacion [name="id_asignatura"]').html(selects);
}

/*====================================================
ASIGNATURASCALIFICACIONES
====================================================*/

function listSubjectsQualification(){

    getSubjectsQualification = loadAjax(BASE_URL+"db/getAsignaturasCalificacion/"+dataStudent.id_alumno, "GET");
    getSubjectsQualification = JSON.parse(getSubjectsQualification);

    let cardContentAsignaturas = "";
    let cardContentCalificaciones = "";

    $.each(getSubjectsQualification.data,function(k,value){ //recorremos los resultados
					
        cardContentAsignaturas+=
         ` <div class="sl-item">
            <div class="sl-content">
                <p>
                    <i class="fas fa-book-open" style="margin-right: 5px;"></i>
                    ${value.asignatura}
                </p>
            </div>
            <div class="sl-edit">
                <i class="fas fa-edit" data-toggle="modal" data-target="#modalEditAsignaturaCalificacion" onclick="findSubjectsQualification(${value.id_calificacion},'edit')"></i>
                <i class="fas fa-trash-alt" data-toggle="modal" data-target="#modalDeleteAsignaturaCalificacion" onclick="findSubjectsQualification(${value.id_calificacion})"></i>
            </div>
        </div>`
        cardContentCalificaciones+=
            ` <div class="sl-item">
                <div class="sl-content">
                    <p>
                        <i class="fas fa-check-circle" style="margin-right: 5px;"></i>
                        ${value.calificacion}
                    </p>
                </div>
              </div>`
    
    });
    
    $('#cardContentAsignaturas').html(cardContentAsignaturas);
    $('#cardContentCalificaciones').html(cardContentCalificaciones);
}

function findSubjectsQualification(id=null,action=null){
    if(!activedItemStudent){
        alert("Primero selecciona un alumno");
        activedItemStudent = false;
        return;
    }
    if (id!=null){
        dataSubjectsQualification = getSubjectsQualification.data.find(objeto => objeto.id_calificacion == id);
        $('.asignaturaCalificacion [name="calificacion"]').val(dataSubjectsQualification.calificacion);
        $('.asignaturaCalificacion [name="id_calificacion"]').val(dataSubjectsQualification.id_calificacion);
        $('#formEditAsignaturaCalificacion [name="id_asignatura"]').val(dataSubjectsQualification.id_asignatura);
    }
       
    $('.asignaturaCalificacion [name="id_alumno"]').val(dataStudent.id_alumno);
    
}

function addAsignaturaCalificacion(){
    if(!activedItemStudent){
        alert("Primero selecciona un alumno");
        activedItemStudent = false;
        return;
    }
    let form = new FormData(document.getElementById('formAddAsignaturaCalificacion'));
    // form.append('addNewTask', 1 ); 
    loadAjax(BASE_URL+"db/addAsignaturaCalificacion", "POST" , form);
    listSubjectsQualification();
    $('#formAddAsignaturaCalificacion')[0].reset();
    $('.modal').modal('hide');
}


function editAsignaturaCalificacion(){
    let form = new FormData(document.getElementById('formEditAsignaturaCalificacion'));
    // form.append('addNewTask', 1 ); 
  
    loadAjax(BASE_URL+"db/editAsignaturaCalificacion", "POST" , form);
    listSubjectsQualification();
    $('#formEditAsignaturaCalificacion')[0].reset();
    $('.modal').modal('hide');
}

function deleteAsignaturaCalificacion(){
    let res = loadAjax(BASE_URL+"db/deleteAsignaturaCalificacion/"+dataSubjectsQualification.id_calificacion, "DELETE" );
    listSubjectsQualification();
    $('.modal').modal('hide');
}