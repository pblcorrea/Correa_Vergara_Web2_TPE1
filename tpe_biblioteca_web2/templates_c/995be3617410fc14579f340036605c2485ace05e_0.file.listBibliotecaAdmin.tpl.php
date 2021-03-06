<?php
/* Smarty version 3.1.39, created on 2021-11-20 22:30:56
  from 'C:\xampp\htdocs\tp\Correa_Vergara_Web2_TPE1\tpe_biblioteca_web2\templates\listBibliotecaAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61996910cf0c05_80555411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '995be3617410fc14579f340036605c2485ace05e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tp\\Correa_Vergara_Web2_TPE1\\tpe_biblioteca_web2\\templates\\listBibliotecaAdmin.tpl',
      1 => 1637443839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/header.tpl' => 1,
    'file:templates/footer.tpl' => 1,
  ),
),false)) {
function content_61996910cf0c05_80555411 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h1>

<div class="container">

    <table class="table table-hover tabla">
        <thead>
            <tr>
                <th>Libro</th>
                <th>Autor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['biblioteca']->value, 'libro');
$_smarty_tpl->tpl_vars['libro']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['libro']->value) {
$_smarty_tpl->tpl_vars['libro']->do_else = false;
?>
                <tr>
                    <td>
                    <a href="viewBook/<?php echo $_smarty_tpl->tpl_vars['libro']->value->id_libro;?>
/<?php echo $_smarty_tpl->tpl_vars['libro']->value->nombre;?>
/<?php echo $_smarty_tpl->tpl_vars['libro']->value->apellido;?>
"><?php echo $_smarty_tpl->tpl_vars['libro']->value->titulo;?>
</a>
                    </td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['libro']->value->nombre;?>
 <?php echo $_smarty_tpl->tpl_vars['libro']->value->apellido;?>

                    </td>
                    <td>
                        <a href="updateBook/<?php echo $_smarty_tpl->tpl_vars['libro']->value->id_libro;?>
" class="btn btn-outline-dark">Editar</a>
                        <a href="deleteBook/<?php echo $_smarty_tpl->tpl_vars['libro']->value->id_libro;?>
" class="btn btn-outline-dark">Borrar</a>

                    </td>

                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


        </tbody>
    </table>
</div>

<div class="container border p-5 colorFondo" >

    <h2> Agregar nuevo libro</h2>


    <form action="addLibro" method="POST" >

        <div class="row">
            <div class="col">
                <div>
                    <label for="" class="form-label">T??tulo</label>
                </div>
                <input type="text" class="form-control" name="titulo" placeholder="T??tulo" required>
            </div>

            <div class="col">
                <div>
                    <label for="" class="form-label">A??o de publicaci??n</label>
                </div>
                <input type="text" class="form-control" placeholder="A??o publicaci??n" name="anio" required>
            </div>


            <div class="col">
                <div>
                    <label for="" class="form-label"> Autor:</label>
                </div>

                <select name="autor" class="form-select">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['autores']->value, 'autor');
$_smarty_tpl->tpl_vars['autor']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['autor']->value) {
$_smarty_tpl->tpl_vars['autor']->do_else = false;
?>

                        <option value="<?php echo $_smarty_tpl->tpl_vars['autor']->value->id_autor;?>
"><?php echo $_smarty_tpl->tpl_vars['autor']->value->nombre;?>
 <?php echo $_smarty_tpl->tpl_vars['autor']->value->apellido;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                </select>
            </div>
        </div>

        <p class="pt-4"> Sinopsis: </p>

        <textarea name="sinopsis" class="form-control" cols="40" rows="3"></textarea>
        <div class="pt-4">
            <input type="submit" class="btn btn-success" value="Agregar">
        </div>

    </form>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:templates/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
