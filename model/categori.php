<?php

function categori_all()
{
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM categori";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function categori_one($categori_id)
{
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM categori WHERE categori_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$categori_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function categori_add($data = [])
{
    $conn = pdo_get_connection();
    $sql = "INSERT INTO categori(categori_name) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function categori_delete($categori_id)
{
    $conn = pdo_get_connection();
    $sql = "DELETE FROM categori WHERE categori_id={$categori_id}";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function categori_update($data = [])
{
    $conn = pdo_get_connection();
    $sql = "UPDATE `categori` SET `categori_name` = ? WHERE `categori`.`categori_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
