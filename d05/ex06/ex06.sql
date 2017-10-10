SELECT titre, resum from film
WHERE LOREM(resum) LIKE '%vincent%'
ORDER BY id_film;
