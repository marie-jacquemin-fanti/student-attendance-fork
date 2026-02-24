<?php

include 'connexion.php';

function getAllStudents(): ?array
{
    try {
        global $pdo;

        return $pdo->query('SELECT id, matricule, first_name, last_name, birth_date, profile_photo, email FROM students WHERE deleted_at IS NULL ORDER BY last_name, first_name')->fetchAll();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return null;
}

function getAllStudentWhereFirstNameContainsA(): ?array
{
    try {
        global $pdo;

        return $pdo->query('SELECT count(*)
                                 FROM students')->fetch();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return null;
}

function getStudent()
{
    try {
        global $pdo;

        return $pdo->query("SELECT *
FROM students WHERE first_name LIKE '%a%'")->fetch();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
