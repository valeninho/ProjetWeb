CREATE OR REPLACE VIEW vue_voiture_couleur
    AS
     SELECT 
	voiture.id_voiture,
	voiture.marque,
	voiture.modele,
	voiture.image,
	couleur.nomcouleur,
    type.id_type,
    type.nom_type
   FROM voiture,
    type,
    couleur
  WHERE voiture.id_type = type.id_type AND voiture.couleur = couleur.id_couleur
  ORDER BY voiture.marque;