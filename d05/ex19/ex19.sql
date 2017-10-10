SELECT DATEDIFF(MAX(DATE), MIN(DATE)) AS 'uptime' FROM historique_membre
GROUP BY id_film;
