<?php

$routes = [
    '/'         => 'Ikatta\controller\VigntIkattaController#index@GET',
    '/example'  => 'Ikatta\controller\VigntIkattaController#example@GET',
    '/data-out' => 'Ikatta\controller\VigntIkattaController#getDataOutz@POST',
    '/data-in'  => 'Ikatta\controller\VigntIkattaController#getDataInz@POST',
];

?>