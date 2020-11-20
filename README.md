# Exercici de filtratge amb World
### Pasos per que funcioni el codi:
1. Has de tindre un entorn LAMP o XAMPP instal·lat al teu ordinador, tant si utilitza Linux o Windows respectivament.
2. Descomprimeix el fitxer '*world.sql.zip*' i importa la base de dades a MySQL/MariaDB.
3. Crea un usuari a MySQL, posa-li una contrasenya i asigna-li el permisos necessaris per poder llegir i insertar files a aquesta base de dades.
4. Accedeix als fitxers '*filterWorld.php*' i '*filterWorld2.php*' i canvia la part de *$conn = mysqli_connect('localhost','El teu usuari','La teva contraseña');* per les dades del teu usuari afegit anteriorment.
5. Mou la carpeta d'aquest repositori a on tinguis configurat l'Apache per proporcionar documents.
6. Accedeix al teu navegador i escriu **localhost** .
