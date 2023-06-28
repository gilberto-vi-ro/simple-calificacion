
$('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
    $('#content').toggleClass('active');
});

$('.more-button,.body-overlay').on('click', function () {
    $('#sidebar,.body-overlay').toggleClass('show-nav');
});

let getSubjects =[];
let dataSubject = [];
listSubjects();

function listSubjects(){
    getSubjects = loadAjax(BASE_URL+"db/getAsignaturas", "GET");
    getSubjects = JSON.parse(getSubjects);

    let cardContent = getSubjects.data.map((value, i,) => (
        `<div class="sl-item">
                <div class="sl-content">
                <p>
                    <i class="fas fa-book-open" style="margin-right: 5px;"></i>
                        ${value.asignatura}
                </p>
            </div>
            <div class="sl-edit">
                <i class="fas fa-edit" data-toggle="modal" data-target="#modalEditSubject" onClick="findSubject(${value.id_asignatura})"></i>
                <i class="fas fa-trash-alt" data-toggle="modal" data-target="#modalDeleteSubject" onClick="findSubject(${value.id_asignatura})"></i>
            </div>
        </div>`
    ));
    // Object.values(federativeEntitiesJson).map((value, i,) => (
    //                   <option key={i} value={value}>{value}</option>
    //                 ))
    $('#cardContent').html(cardContent);
}
function findSubject(id){
    dataSubject = getSubjects.data.find(objeto => objeto.id_asignatura == id);
    $('#formEditSubject [name="id_asignatura"]').val(dataSubject.id_asignatura);
    $('#formEditSubject [name="asignatura"]').val(dataSubject.asignatura);
}

function addSubject(){
    let form = new FormData(document.getElementById('formAddSubject'));
    // form.append('addNewTask', 1 ); 
    let res = loadAjax(BASE_URL+"db/addAsignatura", "POST" , form);
    res = JSON.parse(res);
    listSubjects();
    $('#formAddSubject')[0].reset();
    $('.modal').modal('hide');
}

function editSubject(){
    let form = new FormData(document.getElementById('formEditSubject'));
    // form.append('addNewTask', 1 ); 
    let res = loadAjax(BASE_URL+"db/editAsignatura", "POST" , form);
    res = JSON.parse(res);
    listSubjects();
    $('#formAddSubject')[0].reset();
    $('.modal').modal('hide');
}

function deleteSubject(){
    let res = loadAjax(BASE_URL+"db/deleteAsignatura/"+dataSubject.id_asignatura, "DELETE" );
    res = JSON.parse(res);
    listSubjects();
    $('.modal').modal('hide');
}