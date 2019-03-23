**Lancer le programme**

Dans le dossier du projet, lancer la commande `php cryptoproject.php` ou `./cryptoproject`.

**L'interface**

Trois options sont disponibles, pour sélectionner celle qui vous intéresse il vous suffit d'écrire sur
l'entrée standard du terminal le nombre associé à l'option puis d'appuyer sur la touche ENTREE.

Par exemple, pour générer une clé publique il faut écrire "1" sur le terminal et d'appuyer sur entrée.

Une fois l'étape accompli, les paramètres à fournir seront explicitement demandé, et ces derniers
sont à fournir directement sur le stdin du terminal. Les différents formats attendus sont
explicitement énoncés ci-dessous. En cas de paramètre rentré sous le mauvais format, le programme
vous demandera de retaper la valeur sous le bon format attendu.

Les résultats seront fournis sur la sortie standard une fois tous les paramètres nécessaires insérés.
Les résultats ne contiendront uniquement les informations importantes à conserver et/ou à
transmettre, et seront délimités par des tirets.

**Format des paramètres à fournir**

Toutes les clés attendues devront être rentré sans double ou simple quotes, et les éléments des clés
seront délimités par des virgules. Aucun espace n'est attendu après ces dernières.

- La clé secrète 'S' doit être sous le format x,y,z (Ex : 1,2,5,10). C'est une clé super croissante,
    c'est donc une suite croissante de n nombres tels que le j -ème terme doit être plus grand
        que la somme des j-1 termes qui le précèdent dans la suite. (Ex : 1,2,5,10,20,50,100,200)
- L'entier 'm' doit être supérieur à la somme de tous les termes de 'S' (Ex: 512).
- L'entier 'e' doit être supérieur à 1 tout en étant inférieur et premier à l'entier 'm' (1 < 'e' <
	    'm'). (Ex : pour 'm' = 512, 'e' = 255)
- La clé publique 'S'' doit être sous le format x,y,z (Ex : 1,2,5,10).
- Le message à chiffrer doit être entré directement sans simple ou double quotes. (Ex :
	        PREPETNA)
- L'entier 'n' doit être supérieur ou égale à 2 et inferieur ou égale à la longueur du message à
		    chiffrer. (Ex : pour PREPETNA, 2 <= 'n' <= 8, 'n' = 6)
- La permutation 'P' doit être sous le format x,y,z (Ex : 1,2,5,10)
- Le message chiffré est composé uniquement de nombres et d'espaces. (Ex : 677 6543 676
		        1002 766 789)


**Confidentialité des informations**

- La clé secrète est privée.
- La clé publique est comme son nom l'indique public aux autres, son possesseur devra la
    transmettre à la personne souhaitant chiffrer son message.
- La permutation doit être privée.
- Les entiers e, m sont privés.
- L'entier n doit être connu par la personne voulait la déchiffrer.
- Le message crypté peut naturellement être connu par n'importe qui.
