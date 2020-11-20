# Exercici de filtratge amb World
### Pasos per que funcioni el codi:
**1er.** Has de tindre un entorn LAMP o XAMPP instalat al teu ordinador si utilitza Linux o Windows respectivament.
**2n.** Descomprimeix el fitxer '*world.sql.zip*' i importa la base de dades a MySQL/MariaDB.
**3r.** Crea un usuari a MySQL, posa-li una contrasenya i asigna-li el permisos necessaris per poder llegir i insertar files a aquesta base de dades.
**4t.** Accedeix als fitxers '*filterWorld.php*' i '*filterWorld2.php*' i canvia la part de *$conn = mysqli_connect('localhost','El teu usuari','La teva contraseña');* per les dades del teu usuari afegit anteriorment.
**5è.** Mou la carpeta d'aquest repositori a on tinguis configurat l'Apache per proporcionar documents.
**6è.** Accedeix al teu navegador i escriu **localhost** .
