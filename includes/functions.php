<?php

function getActualites($limit = 6)
{
    $pdo = getDB();

    $stmt = $pdo->prepare("
        SELECT *
        FROM actualites
        WHERE visible = 1
        ORDER BY date_publication DESC
        LIMIT :lim
    ");

    $stmt->bindValue(':lim', (int)$limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getTournois($limit = 6)
{
    $pdo = getDB();

    $stmt = $pdo->prepare("
        SELECT *
        FROM tournois
        WHERE visible = 1
        ORDER BY date_tournoi ASC
        LIMIT :lim
    ");

    $stmt->bindValue(':lim', (int)$limit, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getJoueurs()
{
    $pdo = getDB();

    return $pdo
        ->query("
            SELECT *
            FROM joueurs
            WHERE visible = 1
            ORDER BY niveau DESC
        ")
        ->fetchAll();
}