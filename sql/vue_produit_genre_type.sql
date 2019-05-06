create or replace view vue_produit_genre_type as select
produit.id_produit,produit.nom_produit,produit.description,
produit.prix,produit.image,produit.stock,
genre.id_genre,genre.nom_genre,
type.id_type,type.nom_type
from produit,type,genre
where produit.id_genre = genre.id_genre
and produit.id_type = type.id_type
order by nom_produit;