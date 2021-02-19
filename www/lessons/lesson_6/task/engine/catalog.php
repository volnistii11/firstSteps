<?php
function getCatalog() {
return getAssocResult("SELECT id, name, price FROM catalog WHERE 1 ORDER BY id DESC");
}

function getCatalogOne($catalog_id) {
return getAssocResult("SELECT name, description FROM catalog WHERE id = '{$catalog_id}'")[0];
}