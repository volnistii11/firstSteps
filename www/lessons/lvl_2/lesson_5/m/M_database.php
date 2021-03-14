<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . '/../config/config.php');

function getDb()
{
    static $db = null;
    if (is_null($db)) {
        try {
            $db = new PDO('mysql:host=' . HOST . ';dbname=' . DB . ';charset=utf8', USER, PASS);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    return $db;
}

/*
 * ������� ��� ���������� ������� �� ��������� ������
 * ������ ������������ � ���� �������������� �������
 * ���� �� ��������� ������ ��� ���������� � ���� �������
 * ������� ���������� ������� � ���� �������
 */

function getAssocResult($sql)
{

    $result = getDb()->query($sql);
    $array_result = [];
    while ($row = $result->fetch()) {
        $array_result[] = $row;
    }

    return $array_result;
}


function executeQuery($sql)
{
    $result = getDb()->exec($sql);
    return $result;
}
