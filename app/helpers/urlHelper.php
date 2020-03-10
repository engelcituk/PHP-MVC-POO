<?php
// sencilla redirecion a una pagina
function redirect($pagina){
    header('location: '.URLROOT.'/'.$pagina);
}