{include file="templates/header.tpl" }

<div class="card mx-auto mt-3 detalleLibro colorFondo colorLetra">
    <div class="card-body">
        <h1 class="card-title">{$titulo}</h1>
        <p class="card-text">{$libro -> sinopsis}</p>
    </div>
    <ul class="list-group list-group-flush ">
        <li class="list-group-item colorFondo colorLetra">Autor: {$autor}</li>
        <li class="list-group-item colorFondo colorLetra">Año de publicación: {$libro->anio}</li>
    </ul>
   
</div>

{include file="templates/footer.tpl" }