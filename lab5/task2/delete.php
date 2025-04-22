<?php
function deleteRow($pdo, $ids)
{
    $placeholders = implode(',', array_fill(0, count($ids), '?'));  
    $sql = "DELETE FROM tov WHERE id IN ($placeholders)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($ids);  
}
